<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Costume;
use App\Helpers\HelpText;
use Hash;
use Response;
use Validator;
use Auth;

class UserProfileController extends Controller
{
    protected $user_information;
    protected $costume;

    public function __construct(
        User $user_information,
        Costume $costume
    )
    {
        $this->user_information = $user_information;
        $this->costume = $costume;
    }

    public function profile()
    {
        if (!\Auth::check()) {

            return redirect()->route('home');
        }
        $iduser = User::find(Auth::User()->id)->id;
        $users = $this->user_information->get();
        $costumes =  $this->costume->where('user_id', '=', $iduser)
            ->orderBy('id', 'desc')->paginate(5);

        return view('frontend.users.profiles', compact('categories', 'users', 'costumes'));
    }

    public function editUserInformation(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'full_name' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()
                ->route('profile')
                ->withErrors($validator);
        }

        $users = User::find(Auth::User()->id);
        $users->fill($request->all());
        $users->save();

        return redirect()->route('profile');
    }

    public function showUploadAvatar(Request $request)
    {
        $user = User::find(Auth::user()->id);

        if ($request->hasFile('image_upload')) {
            HelpText::deleteFile($user->avatar);

            $nameFile = $request->image_upload->hashName();
            $path = $request->file('image_upload')->store('upload/user/image', 'uploads');
            $user->avatar = $path;
            $user->save();
        }

        return redirect()->route('profile');
    }

    public function changePasswordUser(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'old_password' => 'required',
            'new_password' => 'required|min:4|max:30',
            'confirm' => 'required|same:new_password|min:4|max:30',
        ]);

        $user = User::find(Auth::user()->id);

        if ($validator->fails()) {
            $messages = $validator->messages();
            $data['error']['status'] = true;
            $data['error']['old_password'] = $messages->first('old_password');
            $data['error']['new_password'] = $messages->first('new_password');
            $data['error']['confirm'] = $messages->first('confirm');

            return redirect()
                ->route('profile')
                ->withErrors($validator);
        }

        $data['error']['status'] = false;
        if (!Hash::check($request->old_password, $user->password)) {
            $data['error']['status'] = true;
            $data['error']['old_password'] = __('Old password not correct!');
        } else {
            $user->password = bcrypt($request->new_password);
            $user->save();
            $data['message'] = __('Change password successfully!');
        }

        return redirect()->route('profile');
    }
}


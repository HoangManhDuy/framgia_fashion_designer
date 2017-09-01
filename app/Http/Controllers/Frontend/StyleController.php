<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Style;
use App\Models\Topic;
use Illuminate\Http\Request;
use Session;
use Auth;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class StyleController extends Controller
{
    protected $topic;
    protected $style;
    protected $comment;

    public function __construct(
        Topic $topic,
        Style $style,
        Comment $comment
    )
    {
        $this->topic = $topic;
        $this->style = $style;
        $this->comment = $comment;
    }

    public function postComment(Request $request)
    {
        $style = $request->styleId_1;
        $comment = $request->comment;
        $comment_1 = new Comment();
        $comment_1->style_id = $style;
        $comment_1->content = $comment;
        $comment_1->user_id = Auth::User()->id;
        $comment_1->costume_id = '1';
        $comment_1->save();
        $showStyle = $this->style->where('id', $style)->get();
        $listComment = $this->comment->where('style_id', $style)->get();
        $listUser = User::all();

        return view('frontend.comments.comment', compact(['showStyle', 'listComment', 'listUser']));
    }

    public function getCommentStyle(Request $request)
    {
        $styleId = $request->styleId;
        $showStyle = $this->style->where('id', $styleId)->get();
        $listComment = $this->comment->where('style_id', $styleId)->get();
        $listUser = User::all();

        return view('frontend.comments.comment', compact(['showStyle', 'listComment', 'listUser']));
    }

    public function getStyle(Request $request)
    {
        $listTopic = $this->topic->get();
        $listStyle = $this->style->get();
        $current_topic = $this->topic->get;

        return view('frontend.style.stylepage', compact(['listTopic', 'listStyle', 'current_topic']));
    }

    public function postStyle(Request $request)
    {
        $style = new Style;
        $style->tittle = $request->tittle;
        $style->description = $request->description;
        $path = $request->file('image')->store('upload/style/image', 'uploads');
        $style->image = $path;
        $style->save();

        return view('Frontend.admin.admin');
    }

    public function getTopicStyle(Request $request, $topic_id)
    {
        $listTopic = $this->topic->get();
        $topics = Topic::with('topic_style.style')->find($topic_id);
        $listStyle = [];
        foreach ($topics->topic_style as $style) {
            $listStyle[] = $style->style;
        }
        $current_topic = $topic_id;
        return view('frontend.style.stylepage', compact(['listTopic', 'listStyle', 'current_topic']));
    }
}

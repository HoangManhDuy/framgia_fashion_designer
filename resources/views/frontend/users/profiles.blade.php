@extends('frontend.layouts.master')

@section('custom-css')
    {{ Html::style('/css/profile/style_profile.css', ['rel' => 'stylesheet', 'type' => 'text/css']) }}
    {{ Html::style('/css/profile/custom-style_profile.css', ['rel' => 'stylesheet', 'type' => 'text/css']) }}
@endsection

@section('content')
    <!-- Profile -->
    <div class="container">
        <div class="row">
            <div class="profile-head">
                <div class="col-md-4 col-sm-4 col-xs-12 img-icon">
                    @if((Auth::User()->avatar) != null)
                        <img src="{!! url(Auth::User()->avatar) !!}" class="img-responsive"/>
                    @else
                        <img src="{!! asset('/images/avatar.png') !!}" class="img-responsive"/>
                    @endif
                    <a href="javascript:void(0)" class="edit-icon" data-toggle="modal"
                       data-target="#modalAvatar">
                        <i class="fa fa-pencil"></i>{{ __('edit') }}
                    </a>
                </div><!--col-md-4 col-sm-4 col-xs-12 close-->
                <div class="col-md-8 col-sm-8 col-xs-12">
                    <h5>{!! Auth::User()->full_name !!}</h5>
                    <ul>
                        <li><span class="glyphicon glyphicon-user"></span>
                            {{ __('gender') }}: {!! __(Auth::User()->gender) !!}
                        </li>
                        <li><span class="glyphicon glyphicon-calendar"></span>
                            {{ __('birthday') }}: {!! Auth::User()->birthday !!}
                        </li>
                        <li><span class="glyphicon glyphicon-map-marker"></span>
                            {{ __('address') }}: {!! Auth::User()->address !!}
                        </li>
                        <li><span class="glyphicon glyphicon-phone"></span>
                            {{ __('phone') }}: {!! Auth::User()->phone !!}</a>
                        </li>
                        <li><span class="glyphicon glyphicon-envelope"></span>
                            {{ __('email') }}: {!! Auth::User()->email !!}</a>
                        </li>
                        <li><span class="glyphicon glyphicon-comment"></span>
                            {{ __('description') }}: {!! Auth::User()->description !!}</li>
                        <li>
                            <a href="javascript:void(0)" class="span-edit-profile text-warning" data-toggle="modal"
                               data-target="#per-info">( {{ __('change profile') }}<i class="fa fa-pencil"></i> )
                            </a>
                            <a href="javascript:void(0)" class="span-edit-profile text-warning" data-toggle="modal"
                               data-target="#modalPassword">( {{ __('change password') }}<i class="fa fa-pencil"></i> )
                            </a>
                        </li>
                    </ul>
                </div><!--col-md-8 col-sm-8 col-xs-12 close-->
            </div>
        </div><!--//profile-head close-->
        <div class="row">
            <div class="profile-content">
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <div class="block">
                        <div class="block-title">
                            <h2>{{ __('topic has joined') }}</h2>
                            <hr>
                        </div>
                        <div class="block-content">

                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <div class="block">
                        <div class="block-title">
                            <h2>{{ __('the costumes are designed') }}</h2>
                            <hr>
                        </div>
                        <div class="block-content">
                            <ul class="event-list">
                                @foreach($costumes as $costume)
                                    <li>
                                        <div class="info">
                                            <h2 class="title">{!! $costume->name !!}</h2>
                                            <p class="desc">{!! $costume->description !!}</p>
                                            <a href="#">{{ __('Chi tiết') }}</a>
                                            <ul>
                                                <li class="item-rate"><span class="fa fa-heart"></span>Like</li>
                                                <li class="item-rate">
                                                    <div id="stars-existing" class="starrr" data-rating='4'>
                                                        <id class="fa fa-star"></id>
                                                        <id class="fa fa-star"></id>
                                                        <id class="fa fa-star"></id>
                                                        <id class="fa fa-star-o"></id>
                                                        Rate
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                            <div class="col-lg-12" id="page-paginate">{{ $costumes->links('frontend.components.paginate-review') }}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- dialog edit avatar-->
        @if (isset($errors))
            @foreach($errors->all() as $error)
                alert($errors) <br>
            @endforeach
        @endif
        <div id="modalAvatar" class="modal fade" role="dialog">
            <div class="modal-dialog form-edit">
                <!-- Modal content-->
                <div class="modal-content">
                    {{ Form::open([ 'route' => 'upload.avatar', 'method' => 'post', 'files' => 'true' ]) }}
                        <div class="modal-header">
                            {{ Form::button('x', [ 'class' => 'close', 'data-dismiss' => 'modal' ]) }}
                            <h4 class="modal-title">{{ __('upload avatar') }}</h4>
                        </div>
                        <div class="modal-body ">
                            <div class="wrap-upload">
                                <div class="row">
                                    <a href="javascript:void(0)" id="attachfile">
                                        <div class="col-md-12 col-sm-12 col-sx-12 button-upload-avatar">
                                            <i class="fa fa-plus" aria-hidden="true"></i>
                                            <span>{{ __('upload image') }}</span>
                                        </div>
                                    </a>
                                </div>
                                <div class="row">
                                    <div class="wrap-image-upload">
                                        <div class="col-md-3 col-lg-3">
                                        </div>
                                        <div class="col-md-6 col-lg-6 img-padding-circle image-upload"
                                             align="center">
                                            @if((Auth::User()->avatar) != null)
                                                <img alt="User Pic" id="image_target" src="{!! url(Auth::User()->avatar) !!}"
                                                     class="img-circle img-responsive" width="300px" height="300px"/>
                                            @else
                                                <img alt="User Pic" id="image_target" src="{!! asset('/images/avatar.png') !!}"
                                                     class="img-circle img-responsive" width="300px" height="300px"/>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="wrap-upload-note">
                                    <span><b>{{ __('note') }}:
                                        </b>{{ __("Image's size recomment: width and width less than 350px") }}
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            {{ Form::file('image_upload', [ 'id' => 'edit_photo' ]) }}
                            {{ Form::submit('Save', [ 'id' => 'submit_photo', 'class' => 'btn btn-success' ]) }}
                        </div>
                    {{ Form::close() }}
                </div>
            </div>
        </div>
        <!-- //end dialog edit avatar-->

        <!-- dialog edit information-->
        <div id="per-info" class="modal fade" role="dialog">
            <div class="modal-dialog form-edit">
                <!-- Modal content-->
                <div class="modal-content">
                    {{ Form::open([ 'route' => 'edit.profile', 'method' => 'post' ]) }}
                        <div class="modal-header">
                            {{ Form::button('x', [ 'class' => 'close', 'data-dismiss' => 'modal' ]) }}
                            <h4 class="modal-title">{{ __('edit profile') }}</h4>
                        </div>
                        <div class="modal-body ">
                            <div class="row">
                                <div class="form-group col-md-6 col-xs-12">
                                    {{ Form::label('full_name', __('full name')) }}
                                    {{ Form::text('full_name', Auth::User()->full_name,
                                        [ 'class' => 'form-control display_name' ])
                                    }}
                                </div>
                                <div class="form-group col-md-6 col-xs-12">
                                    {{ Form::label('display_name', __('display name')) }}
                                    {{ Form::text('display_name', Auth::User()->full_name,
                                        [ 'class' => 'form-control display_name' ])
                                    }}
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-4 col-xs-12">
                                    {{ Form::label('gender', __('gender')) }}
                                    {{ Form::select('gender',
                                        [
                                            'male' => __('male'),
                                            'female' => __('female'),
                                            'other' => __('other')
                                        ],
                                        Auth::User()->gender,
                                        [ 'class' => 'form-control' ])
                                    }}
                                </div>
                                <div class="form-group col-md-4 col-xs-12">
                                    {{ Form::label('birthday', __('birthday')) }}
                                    {{ Form::date('birthday', Auth::User()->birthday, [ 'class' => 'form-control date_of_birth' ]) }}
                                </div>
                                <div class="form-group col-md-4 col-xs-12">
                                    {{ Form::label('phone', __('phone')) }}
                                    {{ Form::text('phone', Auth::User()->phone, [ 'class' => 'form-control phone' ]) }}
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6 col-xs-12">
                                    {{ Form::label('address', __('address')) }}
                                    {{ Form::text('address', Auth::User()->address, [ 'class' => 'form-control address' ]) }}
                                </div>
                                <div class="form-group col-md-6 col-xs-12">
                                    {{ Form::label('nationality', __('nationality')) }}
                                    {{ Form::text('nationality', Auth::User()->nationality, [ 'class' => 'form-control' ]) }}
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-12 col-xs-12">
                                    {{ Form::label('description', __('description')) }}
                                    {{ Form::textarea('description', Auth::User()->description, [ 'class' => 'form-control', 'size' => '0x6' ]) }}
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            {{ Form::submit('Save', [ 'class' => 'btn btn-default' ]) }}
                        </div>
                    {{ Form::close() }}
                </div>
            </div>
        </div>
        <!--//end edit information -->

        <!-- dialog edit password-->
        <div id="modalPassword" class="modal fade" role="dialog">
            <div class="modal-dialog form-edit">
                <!-- Modal content-->
                <div class="modal-content">
                    {{ Form::open([ 'route' => 'change.password', 'method' => 'post' ]) }}
                        <div class="modal-header">
                            {{ Form::button('x', [ 'class' => 'close', 'data-dismiss' => 'modal' ]) }}
                            <h4 class="modal-title">{{ __('edit password') }}</h4>
                        </div>
                        <div class="modal-body ">
                            <form>
                                <div class="form-group">
                                    {{ Form::label('old_password', __('old password')) }}
                                    {{ Form::password('old_password',
                                        [
                                        'class' => 'form-control',
                                        'placeholder' => 'old password'
                                        ]
                                    ) }}
                                </div>
                                <div class="form-group">
                                    {{ Form::label('new_password', __('new password')) }}
                                    {{ Form::password('new_password',
                                        [
                                        'class' => 'form-control',
                                        'placeholder' => 'new password'
                                        ]
                                    ) }}
                                </div>
                                <div class="form-group">
                                    {{ Form::label('confirm', __('confirm password')) }}
                                    {{ Form::password('confirm',
                                        [
                                        'class' => 'form-control',
                                        'placeholder' => 'confirm password'
                                        ]
                                    ) }}
                                </div>
                            </form>
                            <div class="modal-footer">
                                <button class="btn btn-success user-change-password">{{ __('change') }}</button>
                            </div>
                        </div>
                    {{ Form::close() }}
                </div>
            </div>
        </div>       <!-- //end dialog edit password-->
    </div><!--container header close-->
    <!-- //Profile -->
@endsection('content')

@section('script')
    {{--{{ Html::script('/js/search.js', ['type' => 'text/javascript']) }}--}}
@endsection('script')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    {{ Html::style('bower_components/bootstrap/dist/css/bootstrap.css', ['rel' => 'stylesheet', 'type' => 'text/css']) }}
    {{ Html::style('bower_components/font-awesome/css/font-awesome.min.css', ['rel' => 'stylesheet', 'type' => 'text/css']) }}
    {{ Html::style('css/admin.css', ['rel' => 'stylesheet']) }}
    {{ Html::script('bower_components/jquery/dist/jquery.min.js', ['type' => 'text/javascript']) }}
    {{ Html::script('bower_components/ResponsiveSlides/responsiveslides.min.js') }}
    {{ Html::script('js/admin.js',['rel' => 'stylesheet','type' => 'text/javascript'])}}
    {{--    {{ Html::style('css/style_profile.css', ['rel' => 'stylesheet']) }}--}}
    {{ Html::style('home-style.css', ['rel' => 'stylesheet']) }}
    @include('frontend.layouts.library.javascrip')


</head>
<body>
@php
    $error = array();
@endphp

<!--header-->
{{--<div id="top-nav" class="navbar navbar-inverse navbar-static-top">--}}
<div class="container">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="icon-toggle"></span>
        </button>
        <a class="navbar-brand" href="#">Dashboard</a>
    </div>
    <div class="navbar-collapse collapse">
        <ul class="nav navbar-nav navbar-right">

            <li class="dropdown">
                <a class="dropdown-toggle" role="button" data-toggle="dropdown" href="#"><i
                            class="glyphicon glyphicon-user"></i> Admin <span class="caret"></span></a>
                <ul id="g-account-menu" class="dropdown-menu" role="menu">
                    <li><a href="#">My Profile</a></li>
                </ul>
            </li>
            <li><a href="{{route('logout')}}"><i class="glyphicon glyphicon-lock"></i> Logout</a></li>
        </ul>
    </div>
</div><!-- /container -->
{{--</div>--}}
<!-- /Header -->

<!-- Main -->
<div class="container">
    <div class="row">
        <div class="col-md-3">
            <!-- Left column -->
            <a href="#"><strong><i class="glyphicon glyphicon-wrench"></i> Tools</strong></a>

            <hr>

            <ul class="list-unstyled">
                <li class="nav-header">
                    <a href="#" data-toggle="collapse" data-target="#userMenu">
                        {{--<h5>Settings <i class="glyphicon glyphicon-chevron-down"></i></h5>--}}
                        {{--------------------------------------------------------------------}}
                        <h5>Settings<i class=" glyphicon glyphicon-chevron-right"></i></h5>
                    </a>
                    <ul class="list-unstyled collapse  " id="userMenu">
                        {{--<ul style="display:none;">--}}
                        <li>
                            <a href="{{route('home')}}"><i class="glyphicon glyphicon-home"></i>
                                <i class="btn btn-primary view-pdf">Home</i>
                            </a>
                        </li>
                        <li><a href="#"><i class="glyphicon glyphicon-envelope"></i>
                                <i class="btn btn-primary view-pdf"> Messages</i>
                                <span
                                        class="badge badge-info">4  </span></a></li>
                        <li>
                            <a>
                                <i class="glyphicon glyphicon-pencil">
                                </i>
                                <i class="btn btn-primary view-pdf" data-toggle="modal"
                                   data-target="#per-info">Style
                                </i>
                                {{--<i class="fa fa-pencil" aria-hidden="true"></i>)--}}
                            </a>
                            <div id="per-info" class="modal fade" role="dialog">
                                <div class="modal-dialog">
                                    <div class="modal-content form-edit admin_form_v2">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal">&times;
                                            </button>
                                            <h4 class="modal-title">Them style</h4>
                                        </div>
                                        <form class="form-horizontal" action="{{ route('postStyle') }}" method="post"
                                              enctype="multipart/form-data">
                                            {{csrf_field()}}
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="form-group col-md-8">
                                                        <label for="display_name">Tittle</label>
                                                        <input class="form-control " type="text"
                                                               name="tittle"
                                                               placeholder="tittle">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="form-group col-md-8">
                                                        <label for="image">image</label>
                                                        <input class="form-control " type="file"
                                                               name="image">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="form-group col-md-8">
                                                        <label for="display_name">Description</label>
                                                        <textarea class="form-control " type="text"
                                                                  name="description"
                                                                  placeholder="description"></textarea>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <input type="submit" class="btn btn-default" value="Add Style"/>

                                                </div>


                                            </div>

                                        </form>

                                    </div>

                                </div>

                            </div>
                        </li>
                        <li>
                            <a>
                                <i class="glyphicon glyphicon-pencil">
                                </i>
                                <i class="btn btn-primary view-pdf" data-toggle="modal"
                                   data-target="#per-info_2">Produces
                                </i>
                                {{--<i class="fa fa-pencil" aria-hidden="true"></i>)--}}
                            </a>
                            <!-- dialog edit information-->
                            <div id="per-info_2" class="modal fade" role="dialog">
                                <div class="modal-dialog">
                                    <!-- Modal content-->
                                    <div class="modal-content form-edit">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            <h4 class="modal-title">Thêm Produces</h4>
                                        </div>
                                        <form class="form-horizontal" action="{{ route('postProduce') }}"
                                              method="POST" enctype="multipart/form-data">
                                            {{ csrf_field() }}
                                            <div class="modal-body ">


                                                <div class="row">
                                                    <div class="form-group col-md-8">
                                                        <label for="display_name">name Produce</label>
                                                        <input class="form-control " type="text"
                                                               name="produce_name"
                                                               placeholder="name produce">
                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <label for="category_id">{{__('categories')}}</label>
                                                        <select id="category_id" name="category_id">
                                                            @foreach($categories as $category)
                                                                <option value="{{($category->id)}}">{{$category->category_name}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>

                                                </div>
                                                <div class="row">
                                                    <div class="form-group col-md-8">
                                                        <label for="image">Image</label>
                                                        <input type="file" class="form-control"
                                                               name="image"
                                                        >
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="form-group col-md-8">
                                                        <label for="money">Price</label>
                                                        <input type="number" class="form-control" name="price">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="form-group col-md-8">
                                                        <label for="description">Mô Tả</label>
                                                        <textarea class="form-control" type="text" row="6"
                                                                  id="description" name="description"></textarea>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="form-group col-md-8">
                                                        <label for="color">Color</label>
                                                        <select id="color" name="color">
                                                            <option value="Black"
                                                                    class="admin_black"
                                                            >Black
                                                            </option>
                                                            <option value="Blue" class="admin_blue"
                                                                    selected="selected">Blue
                                                            </option>
                                                            <option value="Red"
                                                                    class="admin_red">Red
                                                            </option>
                                                            <option value="White"
                                                                    class="admin_white">White
                                                            </option>

                                                        </select>
                                                    </div>
                                                    {{--</div>--}}
                                                    {{--<div class="row"    >--}}
                                                    <div class="form-group col-md-3" class="admin_form_1">

                                                        <label for="gender">{{__('gender')}}</label>
                                                        <select id="gender" name="gender">
                                                            <option value="male">
                                                                {{__('male')}}
                                                            </option>
                                                            <option value="female">
                                                                {{__('female')}}
                                                            </option>

                                                        </select>
                                                        {{--<div class="controls">--}}
                                                        {{--<label class="radio inline" for="gender-0">--}}
                                                        {{--<input name="gender" id="gender-0" value="Male"--}}
                                                        {{--checked="checked" type="radio">--}}
                                                        {{--Male--}}
                                                        {{--</label>--}}
                                                        {{--<label class="radio inline" for="gender-1">--}}
                                                        {{--<input name="gender" id="gender-1" value="Female"--}}
                                                        {{--type="radio">--}}
                                                        {{--Female--}}
                                                        {{--</label>--}}


                                                        {{--</div>--}}

                                                    </div>


                                                </div>
                                                <div class="modal-footer">
                                                    <input type="submit" class="btn btn-default" value="Add Produce"/>
                                                    {{--<button type="submit" class="btn btn-default" data-dismiss="modal">Add--}}
                                                    {{--Topic--}}
                                                    {{--</button>--}}
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </li>
                        {{--<li><a href="#"><i class="glyphicon glyphicon-user"></i> Topic</a></li>--}}
                        {{---------------------topic-----------------------------------------------}}
                        <li>
                            <a>
                                <i class="glyphicon glyphicon-pencil">
                                </i>
                                <i class="btn btn-primary view-pdf" data-toggle="modal"
                                   data-target="#per-info_1">Topic
                                </i>
                                {{--<i class="fa fa-pencil" aria-hidden="true"></i>)--}}
                            </a>
                            <!-- dialog edit information-->
                            <div id="per-info_1" class="modal fade" role="dialog">
                                <div class="modal-dialog">
                                    <!-- Modal content-->
                                    <div class="modal-content form-edit">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            <h4 class="modal-title">Thêm topic</h4>
                                        </div>
                                        <form class="form-horizontal" action="{{ route('postTopic') }}"
                                              method="POST" enctype="multipart/form-data">
                                            {{ csrf_field() }}
                                            <div class="modal-body ">

                                                <div class="row">
                                                    <div class="form-group col-md-8">
                                                        <label for="display_name">name topic</label>
                                                        <input class="form-control " type="text"
                                                               name="topic_name"
                                                               placeholder="name topic">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="form-group col-md-8">
                                                        <label for="image">Image</label>
                                                        <input type="file" class="form-control"
                                                               name="image"
                                                        >
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="form-group col-md-8">
                                                        <label for="description">Mô Tả</label>
                                                        <textarea class="form-control" type="text" row="6"
                                                                  id="description" name="description"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <input type="submit" class="btn btn-default" value="Add Topic"/>
                                                {{--<button type="submit" class="btn btn-default" data-dismiss="modal">Add--}}
                                                {{--Topic--}}
                                                {{--</button>--}}
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </li>
                        {{----------------topic-------------------------------------}}

                        <li>
                            <a>
                                <i class="glyphicon glyphicon-pencil"></i>
                                <i class="btn btn-primary view-pdf" data-toggle="modal"
                                   data-target="#per-info_3">Role
                                </i>
                                {{--<i class="fa fa-pencil" aria-hidden="true"></i>)--}}
                            </a>

                        </li>
                        <li><a href="{{route('logout')}}"><i class="glyphicon glyphicon-off"></i>
                                <i class="btn btn-primary view-pdf">
                                    Logout
                                </i>
                            </a></li>
                    </ul>

                </li>
                {{--<li>--}}
                {{--<a></a>--}}
                {{--</li>--}}
                <li class="nav-header">
                    <a href="#" data-toggle="collapse" data-target="#menu2">
                        <h5>Notification<i class="glyphicon glyphicon-chevron-right"></i></h5>
                    </a>

                    <ul class="list-unstyled collapse " id="menu2">
                        <li><a href="#">Infor</a>
                        </li>
                        <li><a href="#">Views</a>
                        </li>
                        <li><a href="#">Requests</a>
                        </li>
                        <li><a href="#">Timetable</a>
                        </li>
                        <li><a href="#">Alerts</a>
                        </li>
                    </ul>
                </li>
                <li class="nav-header">
                    <a href="#" data-toggle="collapse" data-target="#menu3">
                        <h5>Social Media <i class="glyphicon glyphicon-chevron-right"></i></h5>
                    </a>

                    <ul class="list-unstyled collapse " id="menu3">
                        <li><a href="#"><i class="glyphicon glyphicon-circle"></i> Facebook</a></li>
                        <li><a href="#"><i class="glyphicon glyphicon-circle"></i> Twitter</a></li>
                    </ul>
                </li>
            </ul>

            <hr>

            <a href="#"><strong><i class="glyphicon glyphicon-link"></i> Resources</strong></a>

            <hr>

            {{--<ul class="nav nav-pills nav-stacked">--}}
            {{--<li class="nav-header"></li>--}}
            {{--<li><a href="#"><i class="glyphicon glyphicon-list"></i> Layouts & Templates</a></li>--}}
            {{--<li><a href="#"><i class="glyphicon glyphicon-briefcase"></i> Toolbox</a></li>--}}
            {{--<li><a href="#"><i class="glyphicon glyphicon-link"></i> Widgets</a></li>--}}
            {{--<li><a href="#"><i class="glyphicon glyphicon-list-alt"></i> Reports</a></li>--}}
            {{--<li><a href="#"><i class="glyphicon glyphicon-book"></i> Pages</a></li>--}}
            {{--<li><a href="#"><i class="glyphicon glyphicon-star"></i> Social Media</a></li>--}}
            {{--</ul>--}}

            {{--<hr>--}}
            {{--<ul class="nav nav-stacked">--}}
            {{--<li class="active"><a href="http://bootply.com" title="The Bootstrap Playground"--}}
            {{--target="ext">Playground</a>--}}
            {{--</li>--}}
            {{--<li><a href="/tagged/bootstrap-3">Bootstrap 3</a></li>--}}
            {{--<li><a href="/61518" title="Bootstrap 3 Panel">Panels</a></li>--}}
            {{--<li><a href="/61521" title="Bootstrap 3 Icons">Glyphicons</a></li>--}}
            {{--<li><a href="/61523" title="Bootstrap 3 ListGroup">List Groups</a></li>--}}
            {{--<li><a href="#">GitHub</a></li>--}}
            {{--<li><a href="/61518" title="Bootstrap 3 Slider">Carousel</a></li>--}}
            {{--<li><a href="/62603">Layout</a></li>--}}
            {{--</ul>--}}

            {{--<hr>--}}
        </div><!-- /col-3 -->
        <div class="col-md-9">

            <!-- column 2 -->
            <ul class="list-inline pull-right">
                <li><a href="#"><i class="glyphicon glyphicon-cog"></i></a></li>
                <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><i
                                class="glyphicon glyphicon-comment"></i><span class="count">3</span></a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="#">1. Is there a way..</a></li>
                        <li><a href="#">2. Hello, admin. I would..</a></li>
                        <li><a href="#"><strong>All messages</strong></a></li>
                    </ul>
                </li>
                <li><a href="#"><i class="glyphicon glyphicon-user"></i></a></li>
                <li><a title="Add Widget" data-toggle="modal" href="#addWidgetModal"><span
                                class="glyphicon glyphicon-plus-sign"></span> Add Widget</a></li>
            </ul>
            <a href="#"><strong><i class="glyphicon glyphicon-dashboard"></i> My Dashboard</strong></a>

            <hr>

            <div class="row">


                <!-- center left-->
                <div class="col-md-6">
                    {{--<div class="well">Inbox Messages <span class="badge pull-right">3</span></div>--}}

                    {{--<hr>--}}

                    {{--<div class="btn-group btn-group-justified">--}}
                    {{--<a href="#" class="btn btn-primary col-sm-3">--}}
                    {{--<i class="glyphicon glyphicon-plus"></i><br>--}}
                    {{--Service--}}
                    {{--</a>--}}
                    {{--<a href="#" class="btn btn-primary col-sm-3">--}}
                    {{--<i class="glyphicon glyphicon-cloud"></i><br>--}}
                    {{--Cloud--}}
                    {{--</a>--}}
                    {{--<a href="#" class="btn btn-primary col-sm-3">--}}
                    {{--<i class="glyphicon glyphicon-cog"></i><br>--}}
                    {{--Tools--}}
                    {{--</a>--}}
                    {{--<a href="#" class="btn btn-primary col-sm-3">--}}
                    {{--<i class="glyphicon glyphicon-question-sign"></i><br>--}}
                    {{--Help--}}
                    {{--</a>--}}
                    {{--</div>--}}

                    {{--<hr>--}}

                    <div class="panel panel-default">
                        <div class="panel-heading"><h4>Reports</h4></div>
                        <div class="panel-body">

                            <small>Success</small>
                            <div class="progress">
                                <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="72"
                                     aria-valuemin="0" aria-valuemax="100" style="width: 72%">
                                    <span class="sr-only">72% Complete</span>
                                </div>
                            </div>
                            <small>Info</small>
                            <div class="progress">
                                <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="20"
                                     aria-valuemin="0" aria-valuemax="100" style="width: 20%">
                                    <span class="sr-only">20% Complete</span>
                                </div>
                            </div>
                            <small>Warning</small>
                            <div class="progress">
                                <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="60"
                                     aria-valuemin="0" aria-valuemax="100" style="width: 60%">
                                    <span class="sr-only">60% Complete (warning)</span>
                                </div>
                            </div>
                            <small>Danger</small>
                            <div class="progress">
                                <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="80"
                                     aria-valuemin="0" aria-valuemax="100" style="width: 80%">
                                    <span class="sr-only">80% Complete</span>
                                </div>
                            </div>

                        </div><!--/panel-body-->
                    </div><!--/panel-->

                    <hr>

                    <!--tabs-->
                {{--<div class="container">--}}
                {{--<div class="col-md-4">--}}
                {{--<ul class="nav nav-tabs" id="myTab">--}}
                {{--<li class="active"><a href="#profile" data-toggle="tab">Profile</a></li>--}}
                {{--<li><a href="#messages" data-toggle="tab">Messages</a></li>--}}
                {{--<li><a href="#settings" data-toggle="tab">Settings</a></li>--}}
                {{--</ul>--}}

                {{--<div class="tab-content">--}}
                {{--<div class="tab-pane active" id="profile">--}}
                {{--<h4><i class="glyphicon glyphicon-user"></i></h4>--}}
                {{--Lorem profile dolor sit amet, consectetur adipiscing elit. Duis pharetra varius--}}
                {{--quam sit amet vulputate.--}}
                {{--<p>Quisque mauris augue, molestie tincidunt condimentum vitae, gravida a libero.--}}
                {{--Aenean sit amet felis--}}
                {{--dolor, in sagittis nisi.</p>--}}
                {{--</div>--}}
                {{--<div class="tab-pane" id="messages">--}}
                {{--<h4><i class="glyphicon glyphicon-comment"></i></h4>--}}
                {{--Message ipsum dolor sit amet, consectetur adipiscing elit. Duis pharetra varius--}}
                {{--quam sit amet vulputate.--}}
                {{--<p>Quisque mauris augu.</p>--}}
                {{--</div>--}}
                {{--<div class="tab-pane" id="settings">--}}
                {{--<h4><i class="glyphicon glyphicon-cog"></i></h4>--}}
                {{--Lorem settings dolor sit amet, consectetur adipiscing elit. Duis pharetra varius--}}
                {{--quam sit amet vulputate.--}}
                {{--<p>Quisque mauris augue, molestie.</p>--}}
                {{--</div>--}}
                {{--</div>--}}
                {{--</div>--}}
                {{--</div>--}}

                <!--/tabs-->

                    <hr>

                    <div class="panel panel-default">
                        <div class="panel-heading"><h4>New Requests</h4></div>
                        <div class="panel-body">
                            <div class="list-group">
                                <a href="#" class="list-group-item active">Hosting virtual mailbox serv..</a>
                                <a href="#" class="list-group-item">Dedicated server doesn't..</a>
                                <a href="#" class="list-group-item">RHEL 6 install on new..</a>
                            </div>
                        </div>
                    </div>

                </div><!--/col-->
                <div class="col-md-6">
                    {{--<div class="panel panel-default">--}}
                    {{--<div class="panel-heading"><h4>Notices</h4></div>--}}
                    {{--<div class="panel-body">--}}

                    {{--<div class="alert alert-info">--}}
                    {{--<button type="button" class="close" data-dismiss="alert">×</button>--}}
                    {{--This is a dismissable alert.. just sayin'.--}}
                    {{--</div>--}}

                    {{--This is a dashboard-style layout that uses Bootstrap 3. You can use this template as a--}}
                    {{--starting point to create something more unique.--}}
                    {{--<br><br>--}}
                    {{--Visit the Bootstrap Playground at <a href="http://bootply.com">Bootply</a> to tweak this--}}
                    {{--layout or discover more useful code snippets.--}}
                    {{--</div>--}}
                    {{--</div>--}}

                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>Visits</th>
                            <th>ROI</th>
                            <th>Source</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>45</td>
                            <td>2.45%</td>
                            <td>Direct</td>
                        </tr>
                        <tr>
                            <td>289</td>
                            <td>56.2%</td>
                            <td>Referral</td>
                        </tr>
                        <tr>
                            <td>98</td>
                            <td>25%</td>
                            <td>Type</td>
                        </tr>
                        <tr>
                            <td>..</td>
                            <td>..</td>
                            <td>..</td>
                        </tr>
                        <tr>
                            <td>..</td>
                            <td>..</td>
                            <td>..</td>
                        </tr>
                        </tbody>
                    </table>

                    {{--<div class="panel panel-default">--}}
                    {{--<div class="panel-heading">--}}
                    {{--<div class="panel-title">--}}
                    {{--<i class="glyphicon glyphicon-wrench pull-right"></i>--}}
                    {{--<h4>Post Request</h4>--}}
                    {{--</div>--}}
                    {{--</div>--}}
                    {{--<div class="panel-body">--}}

                    {{--<form class="form form-vertical">--}}

                    {{--<div class="control-group">--}}
                    {{--<label>Name</label>--}}
                    {{--<div class="controls">--}}
                    {{--<input type="text" class="form-control" placeholder="Enter Name">--}}
                    {{--</div>--}}
                    {{--</div>--}}

                    {{--<div class="control-group">--}}
                    {{--<label>Message</label>--}}
                    {{--<div class="controls">--}}
                    {{--<textarea class="form-control"></textarea>--}}
                    {{--</div>--}}
                    {{--</div>--}}

                    {{--<div class="control-group">--}}
                    {{--<label>Category</label>--}}
                    {{--<div class="controls">--}}
                    {{--<select class="form-control">--}}
                    {{--<option>options</option>--}}
                    {{--</select>--}}
                    {{--</div>--}}
                    {{--</div>--}}

                    {{--<div class="control-group">--}}
                    {{--<label></label>--}}
                    {{--<div class="controls">--}}
                    {{--<button type="submit" class="btn btn-primary">--}}
                    {{--Post--}}
                    {{--</button>--}}
                    {{--</div>--}}
                    {{--</div>--}}

                    {{--</form>--}}


                    {{--</div><!--/panel content-->--}}
                    {{--</div><!--/panel-->--}}

                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <div class="panel-title"><h4>Engagement</h4></div>
                        </div>
                        <div class="panel-body">
                            <div class="col-xs-4 text-center"><img src="http://placehold.it/80/BBBBBB/FFF"
                                                                   class="img-circle img-responsive"></div>
                            <div class="col-xs-4 text-center"><img src="http://placehold.it/80/EFEFEF/555"
                                                                   class="img-circle img-responsive"></div>
                            <div class="col-xs-4 text-center"><img src="http://placehold.it/80/EEEEEE/222"
                                                                   class="img-circle img-responsive"></div>
                        </div>
                    </div><!--/panel-->

                </div><!--/col-span-6-->

            </div><!--/row-->

            <hr>

            <a href="#"><strong><i class="glyphicon glyphicon-comment"></i> Discussions</strong></a>

            <hr>

            <div class="row">
                <div class="col-md-12">
                    <ul class="list-group">
                        <li class="list-group-item"><a href="#"><i class="glyphicon glyphicon-flash"></i>
                                <small>(3 mins ago)</small>
                                The 3rd page reports don't contain any links. Does anyone know why..</a></li>
                        <li class="list-group-item"><a href="#"><i class="glyphicon glyphicon-flash"></i>
                                <small>(1 hour ago)</small>
                                Hi all, I've just post a report that show the relationship betwe..</a></li>
                        <li class="list-group-item"><a href="#"><i class="glyphicon glyphicon-heart"></i>
                                <small>(2 hrs ago)</small>
                                Paul. That document you posted yesterday doesn't seem to contain the over..</a></li>
                        <li class="list-group-item"><a href="#"><i class="glyphicon glyphicon-heart-empty"></i>
                                <small>(4 hrs ago)</small>
                                The map service on c243 is down today. I will be fixing the..</a></li>
                        <li class="list-group-item"><a href="#"><i class="glyphicon glyphicon-heart"></i>
                                <small>(yesterday)</small>
                                I posted a new document that shows how to install the services layer..</a></li>
                        <li class="list-group-item"><a href="#"><i class="glyphicon glyphicon-flash"></i>
                                <small>(yesterday)</small>
                                ..</a></li>
                    </ul>
                </div>
            </div>
        </div><!--/col-span-9-->
    </div>
</div>
<!-- /Main -->

{{--<footer class="text-center">This Bootstrap 3 dashboard layout is compliments of <a--}}
{{--href="http://www.bootply.com/85850"><strong>Bootply.com</strong></a></footer>--}}

<div class="modal" id="addWidgetModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title">Add Widget</h4>
            </div>
            <div class="modal-body">
                <p>Add a widget stuff here..</p>
            </div>
            <div class="modal-footer">
                <a href="#" data-dismiss="modal" class="btn">Close</a>
                <a href="#" class="btn btn-primary">Save changes</a>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dalog -->
</div><!-- /.modal -->
{{--@section('custom-css')--}}
{{--<link rel="stylesheet" type="text/css" media="all" href="css/home-style.css">--}}
{{--@endsection('custom-css')--}}
</body>


</html>



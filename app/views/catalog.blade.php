@extends('subLayout')
@section('nav-bar')
<div class="navbar-wrapper">
  <div class="container-fluid">
    <nav class="navbar navbar-inverse" role="navigation">
      <div class="container-fluid" id="nav-bar-container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Vi vu</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          <ul class="nav navbar-nav">
            <li >
              <a href="{{URL::to('/')}}">Trang chủ</a>
            </li>
            <li>
              <a href="about">Liên hệ</a>
            </li>
            <li class="dropdown active">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                Khám phá
                <span class="caret"></span>
              </a>
              <ul class="dropdown-menu" role="menu">
                <li>
                  <a href="#">Hình ảnh</a>
                </li>
                <li>
                  <a href="#">Chuyên đề</a>
                </li>
                <li>
                  <a href="#">Khuyến mại</a>
                </li>
              </ul>
            </li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li>              
              <a href="{{URL::to('/')}}/login/fb">Đăng nhập với&nbsp&nbsp<img src="{{URL::to('/')}}/images/icon/facebook.png"></a>
            </li>
          </ul>
        </div>
        <!-- /.navbar-collapse --> </div>
      <!-- /.container-fluid --> </nav>
  </div>
</div>
@stop
@section('slide-banner')
<div id="mini-banner">{{HTML::image('/images/banhmi_minibanner.jpg')}}</div>
@stop
@section('detailed-item')
<div class="row-cut">
  <h1 class="cut-block">{{$pageName}}</h1>
</div>
<div class="container items">
  @foreach($listTopics as $topic)
  <div class="col-md-2 item" >
    <img class="pic" src="{{URL::to('/')}}/images/post-img/{{$topic->
    getAllPicPath->first()->imgPath}}"/>
    <div class="pic-des">
      <p>{{$topic->tName}}</p>
    </div>
  </div>
  @endforeach
</div>
@stop
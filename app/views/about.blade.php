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
          <a class="navbar-brand" href="#">Brand</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          <ul class="nav navbar-nav">
            <li class="active">
              <a href="{{URL::to('/')}}">Trang chủ</a>
            </li>
            <li>
              <a href="about">Liên hệ</a>
            </li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                Khám phá
                <span class="caret"></span>
              </a>
              <ul class="dropdown-menu" role="menu">
                <li>
                  <a href="{{URL::to('/')}}/gallery">Hình ảnh</a>
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
<div id="mini-banner">
  <div id="mini-banner">{{HTML::image('/images/aboutus_minibanner.jpg')}}</div>
</div>
@stop
@section('detailed-item')
<div class="container">
<div class="team">
  <div class="center wow fadeInDown">
    <h2>M2T Team</h2>
    <p class="lead">
      Chúng tôi đến từ lớp Việt Nhật IS1
    </p>
  </div>

  <div class="row clearfix">
    <div class="col-md-4 col-sm-6">
      <div class="single-profile-top wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="300ms">
        <div class="media">
          <div class="pull-left">
            <a href="#">
              <img class="media-object" src="{{URL::to('/')}}/images/icon/minhpd.jpg" alt=""></a>
          </div>
          <div class="media-body">
            <h4>Phạm Đức Minh</h4>
            <h5>Team</h5>
            <ul class="tag clearfix">
              <li class="btn">
                <a href="#">PHP</a>
              </li>
              <li class="btn">
                <a href="#">Laravel</a>
              </li>
              <li class="btn">
                <a href="#">JSP</a>
              </li>
              <li class="btn">
                <a href="#">.Net</a>
              </li>
              <li class="btn">
                <a href="#">Struts</a>
              </li>
            </ul>

            <ul class="social_icons">
              <li>
                <a href="#"> <i class="fa fa-facebook"></i>
                </a>
              </li>
              <li>
                <a href="#"> <i class="fa fa-twitter"></i>
                </a>
              </li>
              <li>
                <a href="#">
                  <i class="fa fa-google-plus"></i>
                </a>
              </li>
            </ul>
          </div>
        </div>
        <!--/.media -->
        <p>
          Running stone gather no moss.
        </p>
      </div>
    </div>
    <!--/.col-lg-4 -->

    <div class="col-md-4 col-sm-6 col-md-offset-2">
      <div class="single-profile-top wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="300ms">
        <div class="media">
          <div class="pull-left">
            <a href="#">
              <img class="media-object" src="{{URL::to('/')}}/images/icon/trungnt.jpg" alt=""></a>
          </div>
          <div class="media-body">
            <h4>Nguyễn Thành Trung</h4>
            <h5>Team</h5>
            <ul class="tag clearfix">
              <li class="btn">
                <a href="#">Web</a>
              </li>
              <li class="btn">
                <a href="#">Ui</a>
              </li>
              <li class="btn">
                <a href="#">Ux</a>
              </li>
              <li class="btn">
                <a href="#">Photoshop</a>
              </li>
            </ul>
            <ul class="social_icons">
              <li>
                <a href="#">
                  <i class="fa fa-facebook"></i>
                </a>
              </li>
              <li>
                <a href="#">
                  <i class="fa fa-twitter"></i>
                </a>
              </li>
              <li>
                <a href="#">
                  <i class="fa fa-google-plus"></i>
                </a>
              </li>
            </ul>
          </div>
        </div>
        <!--/.media -->
        <p>
          There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable.
        </p>
      </div>
    </div>
    <!--/.col-lg-4 --> </div>
  <!--/.row -->
  <div class="row team-bar">
    <div class="first-one-arrow hidden-xs">
      <hr></div>
    <div class="first-arrow hidden-xs">
      <hr>
      <i class="fa fa-angle-up"></i>
    </div>
    <div class="second-arrow hidden-xs">
      <hr>
      <i class="fa fa-angle-down"></i>
    </div>
    <div class="third-arrow hidden-xs">
      <hr>
      <i class="fa fa-angle-up"></i>
    </div>
    <div class="fourth-arrow hidden-xs">
      <hr>
      <i class="fa fa-angle-down"></i>
    </div>
  </div>
  <!--skill_border-->

  <div class="row clearfix">
    <div class="col-md-4 col-sm-6 col-md-offset-2">
      <div class="single-profile-bottom wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="600ms">
        <div class="media">
          <div class="pull-left">
            <a href="#">
              <img class="media-object" src="{{URL::to('/')}}/images/icon/toan.jpg" alt=""></a>
          </div>

          <div class="media-body">
            <h4>Phan Đức Toàn</h4>
            <h5>Team</h5>
            <ul class="tag clearfix">
              <li class="btn">
                <a href="#">Web</a>
              </li>
              <li class="btn">
                <a href="#">Ui</a>
              </li>
              <li class="btn">
                <a href="#">CSS&HTML</a>
              </li>
              <li class="btn">
                <a href="#">Java</a>
              </li>
            </ul>
            <ul class="social_icons">
              <li>
                <a href="#">
                  <i class="fa fa-facebook"></i>
                </a>
              </li>
              <li>
                <a href="#">
                  <i class="fa fa-twitter"></i>
                </a>
              </li>
              <li>
                <a href="#">
                  <i class="fa fa-google-plus"></i>
                </a>
              </li>
            </ul>
          </div>
        </div>
        <!--/.media -->
        <p>
          There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable.
        </p>
      </div>
    </div>
    
  </div>
  <!--/.row-->
</div>
<!--section-->
</div>
<br/>
@stop
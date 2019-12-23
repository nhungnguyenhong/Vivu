@extends('subLayout')
@section('nav-bar')
<div class="navbar-wrapper">
  <div class="container-fluid">
    <nav class="navbar navbar-inverse" role="navigation">
      <div class="container-fluid" id="nav-bar-container">
        <!-- Brand and toggle get grouped for better mobile display -->
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
<div id="mini-banner">{{HTML::image('/images/banhmi_minibanner.jpg')}}</div>
@stop
@section('detailed-item')
<div class="row-cut">
  <!-- <h1 class="cut-block">
  <span class="cut-block-content">Gà rán sốt tiêu</span>
</h1>
-->
<span class="cut-block">
  <h1 class="cut-block-content">{{$topic->tName}}</h1>
</span>
</div>
<div id="detailed-item-container" class="container-fluid">
<div id="detailed-item" class="row">
  <img id="detailed-image" src="{{URL::to('/')}}/images/detailed/{{$topic->
  getAllPicPath->first()->imgPath}}"/>
  <div class="container-fluid" id="detailed-item-layer">
    <div class="col-md-8"></div>
    <div id="detailed-item-left" class="col-md-4">
      <h3>{{$topic->tName}}</h3>
      {{$topic->tDescription}}
    </div>
  </div>
</div>
</div>
<br/>
<br/>
<div class="row-cut">
<h1 class="cut-block">
  <span class="cut-block-content">Cộng đồng</span>
</h1>
</div>

<div class="container">

<div class="col-md-8">
  <table class="table table-striped comment-list">
    @foreach($topic->getAllComment as $cItem)
    <tr>
      <td>
        {{$cItem->content}}
        <br/>
      </td>
      <td>
        bởi
        <a>{{$cItem->usrID}}</a>
      </td>
    </tr>
    @endforeach
  </table>
  <div class="comment-box-new">
    <form action="{{URL::to('/')}}/dev/comment" method="GET">
          <input type="hidden" name="tID" value="{{$topic->id}}" />
          <input type="hidden" name="user" value="andanh" class="form-control comment-new" />
          <input type="text" name="comment" class="form-control comment-new" />
          <input type="submit" class="btn btn-default comment-btn" value="Chia sẻ" />
          bởi
          <a>ẩn danh</a>
    </form>
  </div>
</div>

<div class="col-md-4" id="rating">
  <h3 >Đánh giá</h3>
  <div id="rating-content">
    <div class="rating-item">
      <div class="rating-text">Giá thành</div>
      <h4><span class="glyphicon glyphicon-credit-card"></span>
        {{$topic->tVote_1}}</h4>
    </div>
    <div class="rating-item">
      <div class="rating-text">Độ hài lòng</div>
      <h4><span class="glyphicon glyphicon-hand-up"></span>
        {{$topic->tVote_3}}</h4>
    </div>
    <div class="rating-item">
      <div class="rating-text">Vị trí</div>
      <h4><span class="glyphicon glyphicon-bullhorn"></span>
        {{$topic->tVote_2}}</h4>
    </div>
    <br/>
  </div>
</div>
</div>
@stop
@section('related')
<div class="row-cut">
<h1 class="cut-block">
  <span class="cut-block-content">Có liên quan</span>
</h1>
</div>
<div class="items container">
@foreach($relatedTopics as $topic)
<div class="col-md-2 item" >
  <img class="pic img-responsive" src="{{URL::to('/')}}/images/post-img/{{$topic->
  getAllPicPath->first()->imgPath}}"/>
  <div class="pic-des">
    <p>{{$topic->tName}}</p>
  </div>
</div>
@endforeach
</div>
@stop
@section('map')
<div class="row-cut">
<h1 class="cut-block">
  <span class="cut-block-content">Địa điểm gần bạn</span>
</h1>
</div>
<div class="container">
<div id="gmap_canvas" style="height:500px;width:auto;"></div>
<style>#gmap_canvas img{max-width:none;background:none}</style>
<script type="text/javascript"> 
          function initialize() {
            var myLatlng = new google.maps.LatLng(21.0226967,105.8369637);
            var mapOptions = {
              zoom: 16,
              center:  myLatlng,
              mapTypeId: google.maps.MapTypeId.ROADMAP
            };            

            var map = new google.maps.Map(document.getElementById('gmap_canvas'),
            mapOptions);            
            // Try W3C Geolocation (Preferred)
            if(navigator.geolocation) {
              browserSupportFlag = true;
              navigator.geolocation.getCurrentPosition(function(position) {
                initialLocation = new google.maps.LatLng(position.coords.latitude,position.coords.longitude);
                var marker = new google.maps.Marker({
                  position: initialLocation,
                  title:"Bạn đang ở đây!"
                });
                map.setCenter(initialLocation);
                marker.setMap(map);
              }, function() {
                handleNoGeolocation(browserSupportFlag);
              });
            }else {
              browserSupportFlag = false;
              handleNoGeolocation(browserSupportFlag);
            }
            function handleNoGeolocation(errorFlag) {
              if (errorFlag == true) {
                alert("Không tìm ra vị trí.");
                initialLocation = myLatlng;
              } else {
                alert("Bạn ở sao Hỏa à! Tôi để bạn ở Hà Nội nhé :)");
                initialLocation = myLatlng;
              }
              map.setCenter(initialLocation);
            }
            //Get all place and draw to map
            $.getJSON("dev/allplace", function (data) {
              if (data) {                
                  $.each(data, function (index, object) {
                    var contentString = '<div id = "markerContent">'+
                      '<p>' + object.tName + '</p>' + '</div>';
                    
                    var image = {url:'{{URL::to('/')}}/images/icon/yellow_pin.png',                      
                        scaledSize: new google.maps.Size(50, 50),                        
                        origin: new google.maps.Point(0,0),                        
                        anchor: new google.maps.Point(0, 32)};
                    var myLatLng = new google.maps.LatLng(object.tLat, object.tLong);

                    var infowindow = new google.maps.InfoWindow({
                        content: contentString,
                         maxWidth: 100
                    });

                    var foodMarker = new google.maps.Marker({
                        position: myLatLng,
                        map: map,
                        icon: image,
                        title: object.tName                        
                    });

                    google.maps.event.addListener(foodMarker, 'click', function() {
                    infowindow.open(map,foodMarker);
                    });

                  });
              } else {

              }
            });
          }// End load script

          function loadScript() {
          var script = document.createElement('script');
          script.type = 'text/javascript';
          script.src = 'https://maps.googleapis.com/maps/api/js?v=3.exp&' +
          'callback=initialize';
          document.body.appendChild(script);
          }

          window.onload = loadScript;
        </script>
</div>        
@stop
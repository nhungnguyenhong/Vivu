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
          <a class="navbar-brand" href="#">Vivu</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          <ul class="nav navbar-nav">
            <li>
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
<div id="mini-banner">{{HTML::image('/images/search_minibanner.jpg')}}</div>
@stop
@section('detailed-item')
<div class="row-cut">
  <h1 class="cut-block">Kết quả tìm kiếm</h1>
</div>
<div class="container items">
  @foreach($topics as $topic)
  <div class="col-md-2 item" >
    <img class="pic" src="{{URL::to('/')}}/images/post-img/{{$topic->
    getAllPicPath->first()->imgPath}}"/>
    <div class="pic-des">
      <p>
        {{$topic->tName}}
        <a href="{{URL::to('/')}}/details?id={{$topic->
          id}} ">
          <span class="glyphicon glyphicon-circle-arrow-right"></span>
        </a>
      </p>
      <div class="pic-des-price">{{$topic->tPrice}}.000đ</div>
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
            $.getJSON("{{URL::to('/')}}/dev/allplace", function (data) {
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
<br/>
<br/>
@stop
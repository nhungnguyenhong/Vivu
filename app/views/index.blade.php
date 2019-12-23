@extends('layout')
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
<div id="myCarousel" class="carousel slide" data-ride="carousel">
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
    <li data-target="#myCarousel" data-slide-to="1"></li>
    <li data-target="#myCarousel" data-slide-to="2"></li>
    <li data-target="#myCarousel" data-slide-to="3"></li>
  </ol>
  <div class="carousel-inner">
    <div class="item">
      {{HTML::image('/images/banhmi.jpg')}}
      <div class="container"></div>
    </div>
    <div class="item">
      {{HTML::image('/images/noithatcafe.jpg')}}
      <div class="container"></div>
    </div>
    <div class="item">
      {{HTML::image('/images/thaibg.jpg')}}
      <div class="container"></div>
    </div>
    <div class="item active">
      <!-- {{HTML::image('/images/buffetrestaurant.jpg')}} -->
      <div style="width: 1349px; height: 500px; background-color: red">
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
      <div class="container"></div>
    </div>
  </div>
  <div class="carousel-caption">
    <form role="form" class="form-inline" method="GET" action="searchResults">
      <div class="form-group">
        <input id="autocomplete-ajax" name='query' type="text input" class="form-control" placeholder="Tìm kiếm..."></div>
      <button id="search-button" type="submit" class="btn btn-default">
        <span class="glyphicon glyphicon-search"></span>
      </button>
    </form>
    <div id="search-trend">
      <!-- FIXME:  -->
      @foreach($randomSearchKey as $item)
      <a href="{{URL::to('/')}}/searchResults/{{$item->value}}"><span class="label label-default">{{$item->data}}</span></a>
      @endforeach
    </div>
  </div>
  <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left"></span>
  </a>
  <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right"></span>
  </a>
</div>
<!-- /.carousel -->
@stop
@section('recipe-region')
<div class="row-cut">
  <h1 class="cut-block">Món ngon nổi bật</h1>
</div>
<div class="items container">
  @foreach($recipeTopics as $topic)
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
@section('place-region')
<div class="row-cut">
  <h1 class="cut-block">Địa chỉ thú vị</h1>
</div>
<div class="items container">
  @foreach($placeTopics as $topic)
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
@section('impression-region')
<!-- Three columns of text below the carousel -->
<div class="row">
  <div class="col-lg-4">
    <img class="img-circle" src="{{URL::to('/')}}/images/impression/sangchanh.jpg" alt="Generic placeholder image" style="width: 140px; height: 140px;">
    <h2>Ăn sang chảnh</h2>
    <p>
      Nếu như bạn muốn tìm một nhà hàng, một quán café sang trọng, yên tĩnh để thưởng thức hương vị của những giọt cà phê, một ly sinh tố hay bổ sung năng lượng cho một ngày làm việc.. Nếu như bạn muốn tìm một không gian trang trọng, ấm cũng, gần gũi cho các buổi tiệc tùng, các cuộc liên hoan nhưng bạn còn phân vân!
    </p>
    <p>
      <a class="btn btn-default" href="{{URL::to('/')}}/catalog/catalog_01" role="button">Xem thêm &raquo;</a>
    </p>
  </div>
  <!-- /.col-lg-4 -->
  <div class="col-lg-4">
    <img class="img-circle" src="{{URL::to('/')}}/images/impression/kinhte.jpg" alt="Generic placeholder image" style="width: 140px; height: 140px;">
    <h2>Chơi hết mình</h2>
    <p>
      Cùng với việc trải nghiệm các loại hình giải trí, du khách tới đây còn nhận được một “món quà” đầy ý nghĩa và đẹp mắt đó chính là những công trình thiết kế sang trọng, hiện đại mang đậm phong cách của các thành phố lớn trên thế giới.
    </p>
    <p>
      <a class="btn btn-default" href="{{URL::to('/')}}/catalog/catalog_02" role="button">Xem thêm &raquo;</a>
    </p>
  </div>
  <!-- /.col-lg-4 -->
  <div class="col-lg-4">
    <img class="img-circle" src="{{URL::to('/')}}/images/impression/khampha.jpg" alt="Generic placeholder image" style="width: 140px; height: 140px;">
    <h2>Tour khám phá</h2>
    <p>
      Từ Hàng Vải chúng mình chỉ cần đi thêm vài trăm mét nữa là sẽ đến phố Bát Đàn. Con phố nhỏ yên bình này ngày xưa vốn được nhắc đến với những cửa hàng bán đồ gốm sứ gia dụng như bát đĩa, ấm chén, chum vại.. Ngày nay như nhiều phố cổ khác, Bát Đàn cũng không còn duy trì được nghề cũ nữa.
    </p>
    <p>
      <a class="btn btn-default" href="{{URL::to('/')}}/catalog/catalog_03" role="button">Xem thêm &raquo;</a>
    </p>
  </div>
  <!-- /.col-lg-4 -->
</div>
<!-- /.row -->
@stop
@section('feature-region')
<div class="row-cut">
  <h1 class="cut-block">Hôm nay có gì</h1>
</div>
@foreach($newestTopics as $key => $topic)
@if( $key % 2 == 0)
<div class="row featurette">
  <div class="col-md-7">
    <h2 class="featurette-heading">{{$topic->tName}}</h2>
    <p class="lead">{{$topic->tDescription}}</p>
    <a href="{{URL::to('/')}}/details?id={{$topic->id}}">đọc thêm</a>
    <br/>
    <br/>
    <div class="comment-box">
      <div class="comment-box-header">
        <h4>Cộng đồng</h4>
      </div>
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
  </div>
  <div class="col-md-5">
    <img class="pic img-responsive" src="{{URL::to('/')}}/images/post-img/{{$topic->getAllPicPath->first()->imgPath}}"/></div>
</div>
@else
<div class="row featurette">
  <div class="col-md-5">
    <img class="pic img-responsive" src="{{URL::to('/')}}/images/post-img/{{$topic->getAllPicPath->first()->imgPath}}"/></div>
  <div class="col-md-7">
    <h2 class="featurette-heading">{{$topic->tName}}</h2>
    <p class="lead">{{$topic->tDescription}}</p>
    <a href="{{URL::to('/')}}/details?id={{$topic->id}}">đọc thêm</a>
    <br/>
    <br/>
    <div class="comment-box">
      <div class="comment-box-header">
        <h4>Cộng đồng</h4>
      </div>
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
        <form>
          <input type="text" class="form-control comment-new" />
          <input type="submit" class="btn btn-default comment-btn" value="Chia sẻ" />
          bởi
          <a>ẩn danh</a>
        </form>
      </div>
    </div>
  </div>
</div>
@endif
<hr class="featurette-divider">
@endforeach
@stop
<!DOCTYPE html>
<html>
    <meta charset="utf-8" />
<head>
    <title>Vivu Ha Noi</title>
    {{HTML::style('/css/bootstrap.css')}}   
    {{HTML::style('/css/carousel.css')}}
    {{HTML::style('/css/customize.css')}}
    {{HTML::script('/js/jquery-1.8.2.min.js')}}
    {{HTML::script('/js/bootstrap.min.js')}}
</head>
<body>
    <!-- Nav-bar region
    ================================================== -->
    @yield('nav-bar')
    <!-- Carousel
    ================================================== -->
    @yield('slide-banner')
    <!-- Marketing messaging and featurettes
    ================================================== -->
    <!-- Wrap the rest of the page in another container to center all the content. -->

    <div class="container marketing">
        @yield('impression-region')
        <!-- START THE FEATURETTES -->
        @yield('feature-region')
        <!-- Recipe region
    ================================================== -->
        @yield('recipe-region')
        <!-- Place region
    ================================================== -->
        @yield('place-region')
        <!-- /END THE FEATURETTES -->
        <!-- FOOTER --> </div>
    <!-- /.container -->
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <div class="col">
                        <h4>Liên hệ</h4>
                        <ul>
                            <li>Số 1 Đại Cồ Việt</li>
                            <li>Phone: +84 724 1234 567 | Fax: +84 724 1234 567</li>
                            <li>
                                Email:
                                <a href="mailto:hello@example.com" title="Email Us">hello@example.com</a>
                            </li>
                            <li>
                                Skype:
                                <a href="skype:my.business?call" title="Skype us">my-business</a>
                            </li>                            
                        </ul>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="col">
                        <h4>Mailing list</h4>
                        <p>
                            Đăng ký và nhận thông tin mới nhất từ chúng tôi.
                        </p>
                        <form class="form-inline">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Email address..." />
                                <span class="input-group-btn">
                                    <button class="btn btn-primary" type="button">Go!</button>
                                </span>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="col col-social-icons">
                        <h4>Liên kết với chúng tôi</h4>
                        <a href="#"> <i class="fa fa-facebook"></i>
                        </a>
                        <a href="#"> <i class="fa fa-google-plus"></i>
                        </a>
                        <a href="#">
                            <i class="fa fa-linkedin"></i>
                        </a>
                        <a href="#">
                            <i class="fa fa-twitter"></i>
                        </a>
                        <a href="#">
                            <i class="fa fa-skype"></i>
                        </a>
                        <a href="#">
                            <i class="fa fa-pinterest"></i>
                        </a>
                        <a href="#">
                            <i class="fa fa-youtube-play"></i>
                        </a>
                        <a href="#">
                            <i class="fa fa-flickr"></i>
                        </a>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="col">
                        <h4>Về chúng tôi</h4>
                        <p>
                            Nhóm M2T
                            <br />
                            <br />
                            <a href="#" class="btn btn-two">Thử ngay!</a>
                        </p>
                    </div>
                </div>
            </div>

            <hr />

            <div class="row">
                <div class="copyright" style="width: 100%">
                    <center>2014 &copy; Vivu. All rights reserverd.</center>
                </div>
                <div class="col-lg-3 footer-logo"></div>
            </div>
        </div>
    </footer>
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    {{HTML::script('/js/jquery.autocomplete.js')}}
    <script type="text/javascript">
        $('#autocomplete-ajax').autocomplete({
            serviceUrl: 'dev/allquery',
            onSelect: function (suggestion) {
                //Do nothing
            }
        });
    </script>
</body>
</html>
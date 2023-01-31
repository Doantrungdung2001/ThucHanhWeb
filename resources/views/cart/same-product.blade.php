<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Fashi Template">
    <meta name="keywords" content="Fashi, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cart</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Muli:300,400,500,600,700,800,900&display=swap" rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="assets/css/cart/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="assets/css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="assets/css/cart/themify-icons.css" type="text/css">
    <link rel="stylesheet" href="assets/css/cart/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="assets/css/cart/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="assets/css/cart/nice-select.css" type="text/css">
    <link rel="stylesheet" href="assets/css/cart/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="assets/css/cart/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="assets/css/cart/style.css" type="text/css">
    <style>
        #change-item-cart table tbody tr td img {
            width: 70px;
        }
    </style>
</head>

<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- Breadcrumb Section Begin -->
    <div class="breacrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text product-more">
                        <a href="{{ url('/') }}"><i class="fa fa-home"></i> Home</a>
                        <span>Shopping Cart</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Section Begin -->
    <div class="nav-item">
        <div class="container">
            <nav class="nav-menu mobile-menu">
                <ul>
                    <li><a href="{{ url('/Cart') }}">Giỏ hàng</a></li>
                    <li><a href="{{ url('/same-product') }}">Sản phẩm tương tự</a></li>
                    <li><a href="{{ url('/buy-again') }}">Mua lại hàng</a></li>
                </ul>
            </nav>
            <div id="mobile-menu-wrap"></div>
        </div>
    </div>
    <!-- Product Shop Section Begin -->
    <section class="product-shop spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 order-1 order-lg-2">
                    <div class="product-list">
                        <div class="row">
                            @foreach ($brand_product as $prd)
                                <div class="col-lg-4 col-sm-6">
                                    <div class="product-item">

                                        <div class="pi-pic">
                                            <img src="{{ $prd->image_path }}" alt="">
                                            <div class="sale pp-sale">Sale</div>
                                            <div class="icon">
                                                <i class="icon_heart_alt"></i>
                                            </div>
                                            <ul>
                                                <li class="w-icon active"><a href="#"><i
                                                            class="icon_bag_alt"></i></a></li>
                                                <li class="quick-view"><a onclick="AddCart({{ $prd->id }})"
                                                        href="javascript:">Thêm giỏ hàng</a></li>
                                                <li class="w-icon"><a href="#"><i class="fa fa-random"></i></a>
                                                </li>
                                            </ul>
                                        </div>

                                        <div class="pi-text">
                                            <div class="catagory-name">Towel</div>
                                            <a href="#">
                                                <h5>{{ $prd->name }}</h5>
                                            </a>
                                            <div class="product-price">
                                                {{ number_format($prd->price) }}₫
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>
    <!-- Product Shop Section End -->

    <!-- Partner Logo Section Begin -->
    <div class="partner-logo">
        <div class="container">
            <div class="logo-carousel owl-carousel">
                <div class="logo-item">
                    <div class="tablecell-inner">
                        <img src="assets/img/logo-carousel/logo-1.png" alt="">
                    </div>
                </div>
                <div class="logo-item">
                    <div class="tablecell-inner">
                        <img src="assets/img/logo-carousel/logo-2.png" alt="">
                    </div>
                </div>
                <div class="logo-item">
                    <div class="tablecell-inner">
                        <img src="assets/img/logo-carousel/logo-3.png" alt="">
                    </div>
                </div>
                <div class="logo-item">
                    <div class="tablecell-inner">
                        <img src="assets/img/logo-carousel/logo-4.png" alt="">
                    </div>
                </div>
                <div class="logo-item">
                    <div class="tablecell-inner">
                        <img src="assets/img/logo-carousel/logo-5.png" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Partner Logo Section End -->

    <!-- Footer Section Begin -->
    <footer class="footer-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="footer-left">
                        <div class="footer-logo">
                            <a href="#"><img src="assets/img/footer-logo.png" alt=""></a>
                        </div>
                        <ul>
                            <li>Address: 60-49 Road 11378 New York</li>
                            <li>Phone: +65 11.188.888</li>
                            <li>Email: hello.colorlib@gmail.com</li>
                        </ul>
                        <div class="footer-social">
                            <a href="#"><i class="fa fa-facebook"></i></a>
                            <a href="#"><i class="fa fa-instagram"></i></a>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                            <a href="#"><i class="fa fa-pinterest"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 offset-lg-1">
                    <div class="footer-widget">
                        <h5>Information</h5>
                        <ul>
                            <li><a href="#">About Us</a></li>
                            <li><a href="#">Checkout</a></li>
                            <li><a href="#">Contact</a></li>
                            <li><a href="#">Serivius</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-2">
                    <div class="footer-widget">
                        <h5>My Account</h5>
                        <ul>
                            <li><a href="#">My Account</a></li>
                            <li><a href="#">Contact</a></li>
                            <li><a href="#">Shopping Cart</a></li>
                            <li><a href="#">Shop</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="newslatter-item">
                        <h5>Join Our Newsletter Now</h5>
                        <p>Get E-mail updates about our latest shop and special offers.</p>
                        <form action="#" class="subscribe-form">
                            <input type="text" placeholder="Enter Your Mail">
                            <button type="button">Subscribe</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="copyright-reserved">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="copyright-text">
                            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0.
Copyright &copy;<script>
    document.write(new Date().getFullYear());
</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://www.facebook.com/thuy.huynhvan" target="_blank">Huynh Van Thuy</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        </div>
                        <div class="payment-pic">
                            <img src="assets/assets/img/payment-method.png" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- Footer Section End -->

    <!-- Js Plugins -->
    <script src="assets/js/bootstrap3/jquery-3.3.1.min.js"></script>
    <script src="assets/js/bootstrap3/bootstrap.min.js"></script>
    <script src="assets/js/bootstrap3/jquery-ui.min.js"></script>
    <script src="assets/js/bootstrap3/jquery.countdown.min.js"></script>
    <script src="assets/js/bootstrap3/jquery.nice-select.min.js"></script>
    <script src="assets/js/bootstrap3/jquery.zoom.min.js"></script>
    <script src="assets/js/bootstrap3/jquery.dd.min.js"></script>
    <script src="assets/js/bootstrap3/jquery.slicknav.js"></script>
    <script src="assets/js/bootstrap3/owl.carousel.min.js"></script>
    <script src="assets/js/bootstrap3/main.js"></script>

    <!-- JavaScript -->
    <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>

    <!-- CSS -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css" />
    <!-- Default theme -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.min.css" />
    <!-- Semantic UI theme -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/semantic.min.css" />
    <!-- Bootstrap theme -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/bootstrap.min.css" />

    <script>
        function AddCart(id) {
            $.ajax({
                url: 'detail/AddtoCart/' + id,
                type: 'GET',

                success: function(response) {
                    RenderCart(response);
                    alertify.success('Thêm sản phẩm thành công');
                },
                error: function(response, error) {
                    // handleException(request , message , error);
                    console.log(error);
                    console.log(response);
                }
            });
        }
        //console.log(id);
        $("#change-item-cart").on("click", ".si-close i", function() {
            //console.log($(this).data("id"));
            $.ajax({
                url: 'Delete-Item-Cart/' + $(this).data("id"),
                type: 'GET',
            }).done(function(response) {
                RenderCart(response);
                // $("#change-item-cart").empty();
                // $("#change-item-cart").html(response);
                alertify.success('Xóa sản phẩm thành công');
            });
        });

        function RenderCart(response) {
            $("#change-item-cart").empty();
            $("#change-item-cart").html(response);
            $("#total-quanty-show").text($("#total-quanty-cart").val());
            console.log($("#total-quanty-cart").val());
        }
    </script>
</body>

</html>

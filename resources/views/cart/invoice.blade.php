<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Fashi Template">
    <meta name="keywords" content="Fashi, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Invoice</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Muli:300,400,500,600,700,800,900&display=swap" rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="assets/css/cart/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="assets/css/cart/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="assets/css/cart/themify-icons.css" type="text/css">
    <link rel="stylesheet" href="assets/css/cart/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="assets/css/cart/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="assets/css/cart/nice-select.css" type="text/css">
    <link rel="stylesheet" href="assets/css/cart/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="assets/css/cart/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="assets/css/cart/style.css" type="text/css">
    
    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Muli:300,400,500,600,700,800,900&display=swap" rel="stylesheet">


    <style>
        .cart-pic img{
            width: 100%;
        }
        .proceed-checkout button{
            width: 100%;
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
                        <a href=""><i class="fa fa-home"></i> Trang chủ</a>
                        <span>Hóa đơn</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Section Begin -->


    <!-- Shopping Cart Section Begin -->
    <section class="shopping-cart spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12" id ="list-cart">
                    <div class="cart-table">
                        <table>
                            <thead>
                                <tr>
                                    {{-- <th>Hình ảnh</th>
                                    <th class=""></th> 
                                    {{-- <th>Giá</th>
                                    <th>Số lượng</th>
                                    <th>Kích thước</th>
                                    <th>Màu sắc</th>
                                    <th>Tổng</th>
                                    <th>Lưu</th> --}}
                                    {{-- <th>Xóa</th>--}}
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($product as $item)
                                <tr>
                                    <td class="cart-pic-buy-again second-row"><img src="{{$item->image_url}}" alt=""></td>
                                    <td class="cart-title second-row">
                                        
                                        <div class="row2">
                                            <div class="col-lg-12 offset-lg-24">
                                                <div class="proceed-checkout">
                                                    <ul>
                                                        <li class="subtotal-1">Tên sản phẩm   <span>{{$item->name}}</span></li>
                                                        <li class="subtotal-1">Số lượng  <span>{{$item->quanty}}</span></li>
                                                        <li class="subtotal-1">Kích thước <span>{{$item->size}}</span></li>
                                                        <li class="subtotal-1">Màu sắc <span>{{$item->color}}</span></li>
                                                        <li class="cart-total">Giá <span>{{number_format($item->price)}}₫</span></li>
                                                    </ul>
                                                    
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    
                                </tr>
                                @endforeach
                            
                            </tbody>
                        </table>
                    </div>
                    <div class="row">
                        <div class="col-lg-4 offset-lg-8">
                            <div class="proceed-checkout">
                                <ul>
                                    <li class="subtotal">Tổng số lượng : <span>{{$totalQuanty}}</span></li>
                                    <li class="cart-total">Tổng giá :<span>{{number_format($totalPrice)}}₫</span></li>
                                    @php
                                        $vn_to_usd = $totalPrice/23083;
                                    @endphp
                                </ul>
                                <form action="{{url('/Sucess-payment')}}" method="get" class="pay">
                                    @csrf
                                    <button type="submit" class="proceed-btn-pay" name="redirect">Thanh toán nhận hàng</button>
                                </form>
                                <form action="{{url('/VN-pay-payment')}}" method="post" >
                                    @csrf
                                    <input type="hidden" name="totalPrice" value="{{$totalPrice}}">
                                    <button type="submit" class="proceed-btn-pay" name="redirect">Thanh toán VNpay</button>
                                </form>
                                <div id="paypal-button" class="proceed-btn-3"></div>
                                <input type="hidden" id="vn_to_usd" value="{{round($vn_to_usd,2)}}">
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Shopping Cart Section End -->	

    <!-- Footer Section Begin -->
    <footer class="footer-section">
        <div class="copyright-reserved">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="copyright-text">
                        </div>
                        <div class="payment-pic">
                            <img src="assets/img/payment-method.png" alt="">
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
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
    <!-- Default theme -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.min.css"/>
    <!-- Semantic UI theme -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/semantic.min.css"/>
    <!-- Bootstrap theme -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/bootstrap.min.css"/>

    <script src="https://www.paypalobjects.com/api/checkout.js"></script>
    <script>
        var usd = document.getElementById('vn_to_usd').value;
        paypal.Button.render({
            // Configure environment
            env: 'sandbox',
            client: {
                sandbox: 'AVqDaxF9UvIaHkU3RklDxiUj1XftODJbTuHgnEZUoUoe2HQDHw7XSssaISb0rM7vZz5IWCXWSu1wMn4K',
                production: 'demo_production_client_id'
            },
            // Customize button (optional)
            locale: 'en_US',
            style: {
            size: 'small',
            color: 'gold',
            shape: 'pill',
            },

            // Enable Pay Now checkout flow (optional)
            commit: true,

            // Set up a payment
            payment: function(data, actions) {
            return actions.payment.create({
                transactions: [{
                amount: {
                    total: `${usd}`,
                    currency: 'USD'
                }
                }]
            });
            },
            // Execute the payment
            onAuthorize: function(data, actions) {
            return actions.payment.execute().then(function() {
                // Show a confirmation message to the buyer
                window.alert('Thanh toán thành công!');
                window.alert('Cảm ơn bạn đã sử dụng dịch vụ của chúng tôi!');
                window.location.replace('/Sucess-payment');

            });
            }
        }, '#paypal-button');

    </script>

</body>

</html>
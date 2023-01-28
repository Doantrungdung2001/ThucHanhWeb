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
    
    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Muli:300,400,500,600,700,800,900&display=swap" rel="stylesheet">


    <style>
        .cart-pic img{
            width: 100px;
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
                        <a href="{{url('/')}}"><i class="fa fa-home"></i> Home</a>
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
                    <li><a href="{{url('/Cart')}}">Giỏ hàng</a></li>
                    <li><a href="{{url('/same-product')}}">Sản phẩm tương tự</a></li>
                    <li><a href="{{url('/buy-again')}}">Mua lại hàng</a></li>
                </ul>
            </nav>
            <div id="mobile-menu-wrap"></div>
        </div>
    </div>

    <!-- Shopping Cart Section Begin -->
    <section class="shopping-cart spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12" id ="list-cart">
                    <div class="cart-table">
                        <table>
                            <thead>
                                <tr>
                                    <th>Hình ảnh</th>
                                    <th class="p-name">Tên sản phẩm</th>
                                    <th>Giá</th>
                                    <th>Số lượng</th>
                                    <th>Kích thước</th>
                                    <th>Màu sắc</th>
                                    <th>Tổng</th>
                                    <th>Lưu</th>
                                    <th>Xóa</th>                
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($cart as $item)
                                <tr>
                                    <td class="cart-pic first-row"><img src="{{ asset('assets/images/products') }}/{{ $item->image_url }}" alt=""></td>
                                    <td class="cart-title first-row">
                                        <h5>{{$item->name}}</h5>
                                    </td>
                                    <td class="p-price first-row">{{number_format($item->price)}}₫</td>
                                    <td class="qua-col first-row">
                                        <div class="quantity">
                                            <div class="pro-qty">
                                                <input id="quanty-item-{{$item->id_product}}" type="text" value="{{$item->quanty}}">
                                            </div>
                                        </div>
                                    </td>
                                    <td class="size-td first-row">
                                        <h5>{{$item->size}}</h5>
                                    </td>
                                    <td class="color-td first-row">
                                        <h5>{{$item->color}}</h5>
                                    </td>
                                    <td class="total-price first-row">{{number_format($item->total_price)}}₫</td>
                                    <td class="close-td first-row"><i class="fa fa-save" onclick="SaveItemListCart({{$item->id_product}});"></i></td>
                                    <td class="close-td first-row"><i class="fa fa-close" onclick="DeleteItemListCart({{$item->id_product}});"></i></td>
                                    
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
                                </ul>
                                <a href="{{url('/create-invoice')}}" class="proceed-btn">Đặt hàng</a>
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

    <script>
        function DeleteItemListCart(id){
            //console.log(id);
            $.ajax({
                url:'Delete-Item-List-Cart/'+id,
                type:'GET',
            }).done(function(response){
            
                RenderListCart(response);
                alertify.success('Xóa sẩn phẩm thành công');
            });
        }
        
        function SaveItemListCart(id){
            //console.log(id);
            
            $.ajax({
                url:'Save-Item-List-Cart/'+id+'/'+$("#quanty-item-"+id).val(),
                type:'GET',
            }).done(function(response){
                //console.log($("#quanty-item-"+id).val());
                if($("#quanty-item-"+id).val() == 0){
                    DeleteItemListCart(id);
                }else{
                    if($("#quanty-item-"+id).val() >= 100){
                        alertify.success('Cập nhật thất bại');
                    }else{
                        RenderListCart(response);
                        alertify.success('Cập nhật thành công');
                    }
                }
                
            });
           
        }
        
        function RenderListCart(response){
            $("#list-cart").empty();
            $("#list-cart").html(response);
            /*-------------------
		    Quantity change
	        --------------------- */
            var proQty = $('.pro-qty');
            proQty.prepend('<span class="dec qtybtn">-</span>');
            proQty.append('<span class="inc qtybtn">+</span>');
            proQty.on('click', '.qtybtn', function () {
                var $button = $(this);
                var oldValue = $button.parent().find('input').val();
                if ($button.hasClass('inc')) {
                    var newVal = parseFloat(oldValue) + 1;
                } else {
                    // Don't allow decrementing below zero
                    if (oldValue > 0) {
                        var newVal = parseFloat(oldValue) - 1;
                    } else {
                        newVal = 0;
                    }
                }
                $button.parent().find('input').val(newVal);
            });
        }
    </script>
</body>

</html>
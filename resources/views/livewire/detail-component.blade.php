aa<main id="main" class="main-site">
    <div class="container">
        <div class="wrap-breadcrumb">
            <ul>
                <li class="item-link"><a href="#" class="link">home</a></li>
                <li class="item-link"><span>detail</span></li>
            </ul>
        </div>
        <div class="row">
            <div class="col-lg-9 col-md-8 col-sm-8 col-xs-12 main-content-area">
                <div class="wrap-product-detail">
                    <div class="detail-media">
                        <div class="product-gallery">
                            <img src="{{ asset('assets/images/products') }}/{{ $product->image_path }}"
                                alt="product thumbnail" />
                        </div>
                    </div>
                    <div class="detail-info">
                        <div class="product-rating">
                            <i class="fa fa-star" aria-hidden="true"></i>
                            <i class="fa fa-star" aria-hidden="true"></i>
                            <i class="fa fa-star" aria-hidden="true"></i>
                            <i class="fa fa-star" aria-hidden="true"></i>
                            <i class="fa fa-star" aria-hidden="true"></i>
                            <a href="#" class="count-review">(05 review)</a>
                        </div>
                        <h2 class="product-name">{{ $product->name }}</h2>
                        {{-- <div class="short-desc">
                            <ul>
                                <li>7,9-inch LED-backlit, 130Gb</li>
                                <li>Dual-core A7 with quad-core graphics</li>
                                <li>FaceTime HD Camera 7.0 MP Photos</li>
                            </ul>
                        </div> --}}
                        {{-- <div class="wrap-social">
                            <a class="link-socail" href="#"><img
                                    src="{{ asset('assets/images/social-list.png') }}" alt=""></a>
                        </div> --}}
                        <div class="wrap-price"><span class="product-price">${{ $product->price }}</span></div>
                        <div class="stock-info in-stock">
                            <p class="availability">Availability: <b>In Stock</b></p>
                        </div>
                        {{-- <form action="{{ route('product.addToCart', ['id' => $product->id]) }}" method="get" id="change-item-cart"> --}}
                        <form method="get" id="change-item-cart">
                            <p>Màu sắc:</p>
                            @foreach ($product->colors()->select('color_id')->get() as $color)
                                <input type="radio" id="{{ $color->color_id }}" name="color"
                                    value="{{ $color->color_id }}">
                                <label
                                    for="{{ $color->color_id }}">{{ $colors[((int) $color->color_id) - 1]->name }}</label>
                            @endforeach
                            <br>

                            <p>Kích cỡ</p>
                            @foreach ($product->sizes()->select('size_id')->get() as $size)
                                <input type="radio" id="{{ $size->size_id }}" name="size"
                                    value="{{ $size->size_id }}">
                                <label
                                    for="{{ $size->size_id }}">{{ $sizes[((int) $size->size_id) - 1]->name }}</label>
                            @endforeach

                            <div class="quantity">
                                <span>Quantity:</span>
                                <div class="quantity-input">
                                    <input id="quantity" type="text" name="quatity" value="1" data-max="120"
                                        pattern="[0-9]*">

                                    <a class="btn btn-increase" onclick="increaseValue()" href="#">+</a>
                                    <a class="btn btn-reduce" onclick="reduceValue()" href="#">-</a>
                                </div>
                            </div>
                            <div class="wrap-butons">
                                {{-- <input class="btn add-to-cart" type="submit" value="Add to Cart"> --}}
                                @if (Auth::check())
                                    <a class="btn add-to-cart" onclick="AddCart({{ $product->id }})"
                                        href="javascript:">Add To Cart</a>
                                @else
                                    <a class="btn add-to-cart" href="{{ url('/login') }}">Add To Cart</a>
                                @endif
                            </div>

                        </form>
                    </div>
                    <div class="advance-info">
                        <div class="tab-control normal">
                            <a href="#description" class="tab-control-item active">description</a>
                        </div>
                        <div class="tab-contents">
                            <div class="tab-content-item active" id="description">
                                {{ $product->content }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--end main products area-->

            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12 sitebar">
                <div class="widget widget-our-services ">
                    <div class="widget-content">
                        <ul class="our-services">

                            <li class="service">
                                <a class="link-to-service" href="#">
                                    <i class="fa fa-truck" aria-hidden="true"></i>
                                    <div class="right-content">
                                        <b class="title">Free Shipping</b>
                                        <span class="subtitle">On Oder Over $99</span>
                                        <p class="desc">Lorem Ipsum is simply dummy text of the printing...</p>
                                    </div>
                                </a>
                            </li>

                            <li class="service">
                                <a class="link-to-service" href="#">
                                    <i class="fa fa-gift" aria-hidden="true"></i>
                                    <div class="right-content">
                                        <b class="title">Special Offer</b>
                                        <span class="subtitle">Get a gift!</span>
                                        <p class="desc">Lorem Ipsum is simply dummy text of the printing...</p>
                                    </div>
                                </a>
                            </li>

                            <li class="service">
                                <a class="link-to-service" href="#">
                                    <i class="fa fa-reply" aria-hidden="true"></i>
                                    <div class="right-content">
                                        <b class="title">Order Return</b>
                                        <span class="subtitle">Return within 7 days</span>
                                        <p class="desc">Lorem Ipsum is simply dummy text of the printing...</p>
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div><!-- Categories widget-->

                <div class="widget mercado-widget widget-product">
                    <h2 class="widget-title">Popular Products</h2>
                    <div class="widget-content">
                        <ul class="products">
                            <li class="product-item">
                                <div class="product product-widget-style">
                                    <div class="thumbnnail">
                                        <a href="detail.html"
                                            title="Radiant-360 R6 Wireless Omnidirectional Speaker [White]">
                                            <figure><img src="{{ asset('assets/images/products/digital_1.jpg') }}"
                                                    alt="">
                                            </figure>
                                        </a>
                                    </div>
                                    <div class="product-info">
                                        <a href="#" class="product-name"><span>Radiant-360 R6 Wireless
                                                Omnidirectional
                                                Speaker...</span></a>
                                        <div class="wrap-price"><span class="product-price">$168.00</span></div>
                                    </div>
                                </div>
                            </li>

                            <li class="product-item">
                                <div class="product product-widget-style">
                                    <div class="thumbnnail">
                                        <a href="detail.html"
                                            title="Radiant-360 R6 Wireless Omnidirectional Speaker [White]">
                                            <figure><img src="{{ asset('assets/images/products/digital_17.jpg') }}"
                                                    alt="">
                                            </figure>
                                        </a>
                                    </div>
                                    <div class="product-info">
                                        <a href="#" class="product-name"><span>Radiant-360 R6 Wireless
                                                Omnidirectional
                                                Speaker...</span></a>
                                        <div class="wrap-price"><span class="product-price">$168.00</span></div>
                                    </div>
                                </div>
                            </li>

                            <li class="product-item">
                                <div class="product product-widget-style">
                                    <div class="thumbnnail">
                                        <a href="detail.html"
                                            title="Radiant-360 R6 Wireless Omnidirectional Speaker [White]">
                                            <figure><img src="{{ asset('assets/images/products/digital_18.jpg') }}"
                                                    alt="">
                                            </figure>
                                        </a>
                                    </div>
                                    <div class="product-info">
                                        <a href="#" class="product-name"><span>Radiant-360 R6 Wireless
                                                Omnidirectional
                                                Speaker...</span></a>
                                        <div class="wrap-price"><span class="product-price">$168.00</span></div>
                                    </div>
                                </div>
                            </li>

                            <li class="product-item">
                                <div class="product product-widget-style">
                                    <div class="thumbnnail">
                                        <a href="detail.html"
                                            title="Radiant-360 R6 Wireless Omnidirectional Speaker [White]">
                                            <figure><img src="{{ asset('assets/images/products/digital_20.jpg') }}"
                                                    alt="">
                                            </figure>
                                        </a>
                                    </div>
                                    <div class="product-info">
                                        <a href="#" class="product-name"><span>Radiant-360 R6 Wireless
                                                Omnidirectional
                                                Speaker...</span></a>
                                        <div class="wrap-price"><span class="product-price">$168.00</span></div>
                                    </div>
                                </div>
                            </li>

                        </ul>
                    </div>
                </div>

            </div>
            <!--end sitebar-->
        </div>
        <!--end row-->

    </div>
    <!--end container-->

    <body>
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
                    url: 'AddtoCart/' + id,
                    type: 'GET',

                    success: function(response) {
                        RenderCart(response);
                        //alertify.success('Thêm sản phẩm thành công');

                        //window.location.replace('/Update-Total-Quantity');
                        //window.location.replace('/shop');
                    },
                    error: function(response, error) {
                        // handleException(request , message , error);
                        console.log(error);
                        console.log(response);
                    }
                });
            }
            //console.log(id);

            function RenderCart(response) {
                $("#change-item-cart").empty();
                $("#change-item-cart").html(response);

            }

            function increaseValue() {
                var value = parseInt(document.getElementById('quantity').value, 10);
                value = isNaN(value) ? 0 : value;
                value++;
                document.getElementById('quantity').value = value;
            }

            function reduceValue() {
                var value = parseInt(document.getElementById('quantity').value, 10);
                value = isNaN(value) ? 0 : value;
                value--;
                document.getElementById('quantity').value = value;
            }
        </script>
    </body>
</main>

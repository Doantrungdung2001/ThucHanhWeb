<div class="col-lg-12" id="list-cart">
    <div class="cart-table">
        <table>
            <thead>
                <tr>

                </tr>
            </thead>
            <tbody>
                @foreach ($cart as $item)
                    <tr>
                        <td class="cart-pic-buy-again second-row"><img src="{{ $item->image_url }}" alt=""></td>
                        <td class="cart-title second-row">
                            <div class="row2">
                                <div class="col-lg-12 offset-lg-24">
                                    <div class="proceed-checkout">
                                        <ul>
                                            <li class="subtotal">Tên sản phẩm : <span>{{ $item->name }}</span></li>
                                            <li class="cart-total">Giá :<span>{{ number_format($item->price) }}₫</span>
                                            </li>
                                            <li class="cart-total">Màu sắc :<span>{{ $item->color }}</span></li>
                                            <li class="cart-total">Số lượng :<span>{{ $item->quanty }}</span></li>
                                        </ul>

                                    </div>
                                </div>
                            </div>
                            <div class="row2">
                                <div class="col-lg-4 offset-lg-8">
                                    <div class="proceed-checkout">
                                        <a onclick="AddCart({{ $item->id_product }})" href="javascript:"
                                            class="proceed-btn">Mua lại hàng</a>
                                        <a href="#" class="proceed-btn-2"
                                            onclick="DeleteItemListCart({{ $item->id_product }});">Xóa</a>
                                    </div>
                                </div>
                            </div>

                        </td>

                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

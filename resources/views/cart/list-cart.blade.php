
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
                    <td class="cart-pic first-row"><img src="{{$item->image_url}}" alt=""></td>
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
                    <td class="close-td first-row"><i class="ti-save" onclick="SaveItemListCart({{$item->id_product}});"></i></td>
                    <td class="close-td first-row"><i class="ti-close" onclick="DeleteItemListCart({{$item->id_product}});"></i></td>
                    
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
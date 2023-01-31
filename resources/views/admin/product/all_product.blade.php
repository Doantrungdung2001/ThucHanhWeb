@extends('admin_layout')

@section('css')
    <link rel="stylesheet" href="{{ asset('assets/admins/product/all/all.css') }}">
@endsection
@section('js')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{ asset('assets/admins/product/all/all.js') }}"></script>
@endsection
@section('admin_content')
    <!-- Responsive Table -->
    <div class="row">

        <div class="col-md-12 md-4">
            <div class="card mb-4">
                <h5 class="card-header">Liệt kê sản phẩm</h5>
                <div class="card-body">
                    <div class="table-responsive text-nowrap">
                        <table class="table">
                            <thead>
                                <tr class="text-nowrap">
                                    <th>#</th>
                                    <th>Tên sản phẩm</th>
                                    <th>Hình ảnh</th>
                                    <th>Giá</th>
                                    <th>Danh mục sản phẩm</th>
                                    <th>Hãng</th>
                                    <th>Màu sắc</th>
                                    <th>Kích cỡ</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($products as $product)
                                    <tr>
                                        <th scope="row">{{ $product->id }}</th>
                                        <td>{{ $product->name }}</td>
                                        <td>
                                            <img class="product_image_150_100"
                                                src="{{ asset('assets/images/products') }}/{{ $product->image_path }}"
                                                alt="" width="100" height="100">
                                        </td>
                                        <td>{{ number_format($product->price) }}</td>
                                        <td>{{ optional($product->category)->name }}</td>
                                        <td>{{ $product->brand->name }}</td>
                                        <td>
                                            @foreach ($product->colors()->select('color_id')->get() as $color)
                                                <button>{{ $colors[((int) $color->color_id) - 1]->name }}</button>
                                            @endforeach
                                        </td>
                                        <td>
                                            @foreach ($product->sizes()->select('size_id')->get() as $size)
                                                <button>{{ $sizes[((int) $size->size_id) - 1]->name }}</button>
                                            @endforeach
                                        </td>
                                        <td>
                                            <div class="dropdown">
                                                <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                                    data-bs-toggle="dropdown">
                                                    <i class="bx bx-dots-vertical-rounded"></i>
                                                </button>
                                                <div class="dropdown-menu">
                                                    <a class="dropdown-item"
                                                        href="{{ route('product.edit', ['id' => $product->id]) }}"><i
                                                            class="bx bx-edit-alt me-1"></i> Chỉnh sửa</a>
                                                    <a class="dropdown-item action_delete" href=""
                                                        data-url="{{ route('product.delete', ['id' => $product->id]) }}"><i
                                                            class="bx bx-trash me-1"></i> Xóa</a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!--/ Responsive Table -->
        </div>
        <div class="col-md-12 md-4">
            {!! $products->links() !!}
        </div>
    </div>
@endsection

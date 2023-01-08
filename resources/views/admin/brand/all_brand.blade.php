@extends('admin_layout')
@section('admin_content')
<!-- Responsive Table -->
<div class="row">

    <div class="col-md-12 md-4">
        <div class="card mb-4">
            <h5 class="card-header">Liệt kê nhãn hiệu</h5>
            <div class="card-body">
                <div class="table-responsive text-nowrap">
                    <table class="table">
                        <thead>
                            <tr class="text-nowrap">
                                <th>#</th>
                                <th>Tên nhãn hiệu</th>
                                <th>Số điện thoại</th>
                                <th>Email</th>
                                <th>Địa chỉ</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($brands as $brand)
                            <tr>
                                <th scope="row">{{ $brand->id }}</th>
                                <td>{{ $brand->name }}</td>
                                <td>{{ $brand->phone_number }}</td>
                                <td>{{ $brand->email }}</td>
                                <td>{{ $brand->address }}</td>
                                <td>
                                    <div class="dropdown">
                                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                            data-bs-toggle="dropdown">
                                            <i class="bx bx-dots-vertical-rounded"></i>
                                        </button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="{{ route('brand.edit', ['id'=> $brand->id]) }}"><i
                                                    class="bx bx-edit-alt me-1"></i> Chỉnh sửa</a>
                                            <a class="dropdown-item" href="{{ route('brand.delete', ['id'=> $brand->id]) }}"><i
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
        {!! $brands->links() !!}
    </div>
</div>
@endsection

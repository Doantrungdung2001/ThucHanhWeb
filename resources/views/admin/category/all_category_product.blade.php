@extends('admin_layout')
@section('admin_content')
<!-- Responsive Table -->
<div class="row">

    <div class="col-md-12 md-4">
        <div class="card mb-4">
            <h5 class="card-header">Liệt kê danh mục sản phẩm</h5>
            <div class="card-body">
                <div class="table-responsive text-nowrap">
                    <table class="table">
                        <thead>
                            <tr class="text-nowrap">
                                <th>#</th>
                                <th>Tên danh mục</th>
                                <th>Mô tả</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($categories as $category)
                            <tr>
                                <th scope="row">{{ $category->id }}</th>
                                <td>{{ $category->name }}</td>
                                <td>{{ $category->description }}</td>
                                <td>
                                    <div class="dropdown">
                                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                            data-bs-toggle="dropdown">
                                            <i class="bx bx-dots-vertical-rounded"></i>
                                        </button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="{{ route('category.edit', ['id'=> $category->id]) }}"><i
                                                    class="bx bx-edit-alt me-1"></i> Chỉnh sửa</a>
                                            <a class="dropdown-item" href="{{ route('category.delete', ['id'=> $category->id]) }}"><i
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
        {!! $categories->links() !!}
    </div>
</div>
@endsection

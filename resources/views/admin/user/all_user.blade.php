@extends('admin_layout')

@section('css')
    <link rel="stylesheet" href="{{ asset('assets/admins/user/all/all.css') }}">
@endsection
@section('js')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{ asset('assets/admins/user/all/all.js') }}"></script>
@endsection
@section('admin_content')
    <!-- Responsive Table -->
    <div class="row">

        <div class="col-md-12 md-4">
            <div class="card mb-4">
                <h5 class="card-header">Danh sách người dùng</h5>
                <div class="card-body">
                    <div class="table-responsive text-nowrap">
                        <table class="table">
                            <thead>
                                <tr class="text-nowrap">
                                    <th>#</th>
                                    <th>Tên</th>
                                    <th>Hình ảnh</th>
                                    <th>Email</th>
                                    <th>Quyền</th>
                                    <th>Số điện thoại</th>
                                    <th>Ngày sinh</th>
                                    <th>Địa chỉ</th>
                                    <th>Trạng thái</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                    <tr>
                                        <th scope="row">{{ $user->id }}</th>
                                        <td>{{ $user->name }}</td>
                                        <td>
                                            <img class="product_image_150_100" src="" alt="" width="100"
                                                height="100">
                                        </td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->role }}</td>
                                        <td>{{ $user->sdt }}</td>
                                        <td>{{ $user->ngay_sinh }}</td>
                                        <td>{{ $user->dia_chi }}</td>
                                        <td>{{ $user->trang_thai }}</td>
                                        <td>
                                            <div class="dropdown">
                                                <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                                    data-bs-toggle="dropdown">
                                                    <i class="bx bx-dots-vertical-rounded"></i>
                                                </button>
                                                <div class="dropdown-menu">
                                                    <a class="dropdown-item"
                                                        href="{{ route('user.edit', ['id' => $user->id]) }}"><i
                                                            class="bx bx-edit-alt me-1"></i> Chỉnh sửa</a>
                                                    <a class="dropdown-item action_delete_user" href=""
                                                        data-url="{{ route('user.delete', ['id' => $user->id]) }}"><i
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
            {!! $users->links() !!}
        </div>
    </div>
@endsection

@extends('admin_layout')

@section('admin_content')
    <!-- Basic Layout -->
    <div class="row">
        <div class="col-md-12 md-4">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0">Thêm người dùng</h5>
                </div>
                <div class="card-body">
                    <form action="/admin/user/store" method="post">
                        @csrf
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-default-name">Tên</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="basic-default-name" placeholder="Tên"
                                    name="name" />
                            </div>
                        </div>
                        {{-- <div class="row mb-3">
                            <label for="html5-url-input" class="col-md-2 col-form-label">Hình ảnh</label>
                            <div class="col-md-10">
                                <input class="form-control" type="url" value="" id="html5-url-input"
                                    name="image_path">
                            </div>
                        </div> --}}
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-default-name">Email</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="basic-default-name" placeholder="Email"
                                    name="email" />
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="largeSelect" class="col-sm-2 col-form-label">Quyền</label>
                            <div class="col-sm-10">
                                <select id="largeSelect" class="form-select" name="role">
                                    <option value="">Chọn quyền của người dùng</option>
                                    {!! $htmlOptionRole !!}
                                </select>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-default-name">Số điện thoại</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="basic-default-name"
                                    placeholder="Số điện thoại" name="sdt" />
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-default-name">Ngày sinh</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="date" value="0000-00-00" id="html5-date-input"
                                    name="ngay_sinh">

                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-default-name">Địa chỉ</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="basic-default-name" placeholder="Địa chỉ"
                                    name="dia_chi" />
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-default-name">Trạng thái</label>
                            <div class="col-sm-10">
                                <select id="largeSelect" class="form-select" name="trang_thai">
                                    <option value="">Chọn trạng thái của người dùng</option>
                                    {!! $htmlOptionTrangThai !!}
                                </select>
                            </div>
                        </div>

                        <div class="row justify-content-end">
                            <div class="col-sm-10">
                                <button type="submit" class="add_user">Thêm</button>
                            </div>
                        </div>
                </div>
                </form>
            </div>
        </div>
    </div>
    </div>
@endsection

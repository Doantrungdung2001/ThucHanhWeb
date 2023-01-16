@extends('admin_layout')
@section('admin_content')

<!-- Basic Layout -->
<div class="row">
    <div class="col-md-12 md-4">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0">Thêm nhãn hiệu sản phẩm</h5>
            </div>
            <div class="card-body">
                <form action="/admin/brand/store" method="post">
                    @csrf
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="basic-default-name">Tên nhãn hiệu</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="basic-default-name"
                                placeholder="Tên nhãn hiệu" name="name" />
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="basic-default-name">Số điện thoại</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="basic-default-name"
                                placeholder="Số điện thoại" name="phone_number" />
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="basic-default-name">Email</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="basic-default-name"
                                placeholder="Email" name="email" />
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="basic-default-name">Địa chỉ</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="basic-default-name"
                                placeholder="Địa chỉ" name="address" />
                        </div>
                    </div>
                    <div class="row justify-content-end">
                        <div class="col-sm-10">
                            <button type="submit" class="add_brand">Thêm</button>
                        </div>
                    </div>
            </div>
            </form>
        </div>
    </div>
</div>
</div>

@endsection

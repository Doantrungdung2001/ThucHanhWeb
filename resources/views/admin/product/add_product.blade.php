@extends('admin_layout')

@section('css')
    <link href="{{ asset('/vendor/select2/select2.min.css') }}" rel="stylesheet" />
@endsection
@section('admin_content')
    <!-- Basic Layout -->
    <div class="row">
        <div class="col-md-12 md-4">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0">Thêm sản phẩm</h5>
                </div>
                <div class="card-body">
                    <form action="/admin/product/store" method="post">
                        @csrf
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-default-name">Tên sản phẩm</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="basic-default-name"
                                    placeholder="Tên sản phẩm" name="name" />
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="html5-url-input" class="col-md-2 col-form-label">Hình ảnh</label>
                            <div class="col-md-10">
                                <input class="form-control" type="url" value="" id="html5-url-input"
                                    name="image_path">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-default-name">Giá sản phẩm</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="basic-default-name"
                                    placeholder="Giá sản phẩm" name="price" />
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-default-name">Slug</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="basic-default-name"
                                    placeholder="Slug" name="slug" />
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="largeSelect" class="col-sm-2 col-form-label">Chọn danh mục sản phẩm</label>
                            <div class="col-sm-10">
                                <select id="largeSelect" class="form-select form-select-lg category_select2"
                                    name="category_id">
                                    {!! $htmlOptionCategory !!}
                                </select>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="largeSelect" class="col-sm-2 col-form-label">Chọn nhãn hiệu sản phẩm</label>
                            <div class="col-sm-10">
                                <select id="largeSelect" class="form-select form-select-lg brand_select2" name="brand_id">
                                    {!! $htmlOptionBrand !!}
                                </select>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="largeSelect" class="col-sm-2 col-form-label">Chọn màu sắc sản phẩm</label>
                            <div class="col-sm-10">
                                <select class="form-control color_select2" multiple="multiple" name="color[]">
                                    <option>Chọn màu sắc</option>
                                    {!! $htmlOptionColor !!}
                                </select>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="largeSelect" class="col-sm-2 col-form-label">Chọn kích cỡ sản phẩm</label>
                            <div class="col-sm-10">
                                <select class="form-control size_select2" multiple="multiple" name="size[]">
                                    <option>Chọn kích cỡ</option>
                                    {!! $htmlOptionSize !!}
                                </select>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-default-message">Nội dung</label>
                            <div class="col-sm-10">
                                <textarea style="resize:none" row="5" id="basic-default-message" class="form-control tinymce_editor_init"
                                    placeholder="Nội dung" aria-describedby="basic-icon-default-message2" name="content"></textarea>
                            </div>
                        </div>
                        <div class="row justify-content-end">
                            <div class="col-sm-10">
                                <button type="submit" class="add_product">Thêm</button>
                            </div>
                        </div>
                </div>
                </form>
            </div>
        </div>
    </div>
    </div>
@endsection

@section('js')
    <script src="{{ asset('/vendor/select2/select2.min.js') }}"></script>
    <script src="https://cdn.tiny.cloud/1/xgismh10ife1slchx21w1ffu7qw4yry1hrxngrc6ef4x2uuk/tinymce/5/tinymce.min.js"
        referrerpolicy="origin"></script>
    <script src="/assets/admins/product/add/add.js"></script>
@endsection

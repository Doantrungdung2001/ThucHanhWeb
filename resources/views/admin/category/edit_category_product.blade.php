@extends('admin_layout')
@section('admin_content')
    <!-- Basic Layout -->
    <div class="row">
        <div class="col-md-12 md-4">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0">Chỉnh sửa danh mục sản phẩm</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('category.update', ['id' => $categories->id]) }}" method="post">
                        @csrf
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-default-name">Tên danh mục</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="basic-default-name"
                                    placeholder="Tên danh mục" name="name" value="{{ $categories->name }}" />
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-default-name">Slug</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="basic-default-name" placeholder="Slug"
                                    name="slug" value="{{ $categories->slug }}" />
                            </div>
                        </div>

                        <div class="row justify-content-end">
                            <div class="col-sm-10">
                                <button type="submit" class="update_category_product">Chỉnh sửa</button>
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
    <script src="/assets/admins/category/add/add.js"></script>
@endsection

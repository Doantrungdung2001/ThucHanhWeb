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
                <form action="{{ route('category.update', ['id' => $categories->id])}}" method="post">
                    @csrf
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="basic-default-name">Tên danh mục</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="basic-default-name"
                                placeholder="Tên danh mục" name="name" value="{{ $categories->name }}"/>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="basic-default-message">Mô tả danh mục</label>
                        <div class="col-sm-10">
                            <textarea style="resize:none" row="5" id="basic-default-message" class="form-control"
                                placeholder="Mô tả danh mục" aria-describedby="basic-icon-default-message2" name="description">{{ $categories->description }}</textarea>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="largeSelect" class="col-sm-2 col-form-label">Chọn danh mục cha</label>
                        <div class="col-sm-10">
                            <select id="largeSelect" class="form-select form-select-lg" name="parentID">
                                <option value="0">Chọn danh mục cha</option>
                                {!! $htmlOption !!}
                            </select>
                        </div>
                    </div>
                    <div class="row justify-content-end">
                        <div class="col-sm-10">
                            <button type="submit" class="add_category_product">Chỉnh sửa</button>
                        </div>
                    </div>
            </div>
            </form>
        </div>
    </div>
</div>
</div>

@endsection

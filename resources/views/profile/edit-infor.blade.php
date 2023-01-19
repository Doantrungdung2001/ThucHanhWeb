@extends('layouts.app')

@section('content')
    <style>
        .btn-outline-primary px-4:hover{
            color: white;
        }
    </style>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Edit Information') }}</div>

                    <form action="{{ route('validate-infor') }}" method="POST">
                        @csrf
                        <div class="card-body">
                            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @elseif (session('error'))
                                <div class="alert alert-danger" role="alert">
                                    {{ session('error') }}
                                </div>
                            @endif

                            <div class="mb-3">
                                <label class="form-label">Tên đăng nhập</label>
                                <input name="name" type="text" value="{{ $user->name }}" class="form-control @error('name') is-invalid @enderror">
                                @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Họ và tên</label>
                                <input name="ho_va_ten" type="text" value="{{ $user->ho_va_ten }}" class="form-control @error('name') is-invalid @enderror">
                                @error('ho_va_ten')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Địa chỉ</label>
                                <input name="dia_chi" type="text" value="{{ $user->dia_chi }}" class="form-control @error('name') is-invalid @enderror">
                                @error('dia_chi')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Số điện thoại</label>
                                <input name="sdt" type="text" value="{{ $user->sdt }}" class="form-control @error('name') is-invalid @enderror">
                                @error('sdt')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="card-footer">
                            <button class="btn btn-outline-primary px-4">Submit</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

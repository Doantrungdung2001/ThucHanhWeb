
@extends('layouts.app')

@section('content')

    <style>
        .social-list{
            /* display:flex; */
            list-style:none;
            justify-content:center;
            padding:0;
        }
        .btn-outline-primary px-4 a :hover{
            color: white;!important
        }

    </style>
    <div class="container mt-5">
    
        <div class="row d-flex justify-content-center">
            
            <div class="col-md-7">
                
                <div class="card p-3 py-4">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="text-center">
                        <img src="https://png.pngtree.com/png-vector/20190909/ourlarge/pngtree-outline-user-icon-png-image_1727916.jpg" width="100" class="rounded-circle">
                    </div>
                    
                    <div class="text-center mt-3">
                        <span class="bg-secondary p-1 px-4 rounded text-white">Active</span>
                        <br>
                        <br>
                        <ul class="social-list">
                            <li>Tên đăng nhập: {{ $user->name }}</li>
                            <li>Email: {{ $user->email }}</li>
                            <li>Họ và tên: {{ $user->ho_va_ten}}</li>
                            <li>Số điện thoại: {{ $user->sdt }}</li>
                            <li>Ngày sinh: {{ $user->ngay_sinh }}</li>
                            <li>Địa chỉ: {{ $user->dia_chi }}</li>
                            <li>Ngày tạo:{{ $user->created_at }}</li>
                        </ul>
                        
                        <div class="buttons">
                            
                            <button class="btn btn-outline-primary px-4">
                                <a style="text-decoration: none" href="{{ route('change-password') }}">{{ __('Thay đổi mật khẩu') }}</a>
                            </button>
                            <button class="btn btn-outline-primary px-4">
                                <a style="text-decoration: none" href="{{ route('sendChange-email') }}">{{ __('Thay đổi email') }}</a>
                            </button>
                            <button class="btn btn-outline-primary px-4">
                                <a style="text-decoration: none " href="{{ route('edit-infor') }}">{{ __('Thay đổi thông tin') }}</a>
                            </button>
                        </div>
                        
                        
                    </div>
                    
                   
                    
                    
                </div>
                
            </div>
            
        </div>
        
    </div>

@endsection


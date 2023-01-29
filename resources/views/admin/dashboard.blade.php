@extends('admin_layout')
@section('admin_content')
<h3>Chào mừng @php print(Auth::user()->name); @endphp đến với trang quản trị</h3>
<img src="https://lh3.googleusercontent.com/bOhXrUBojZE3bnjToKeYpnmCOBhyMsVaPeHQX2NaFG_M220Kbu7NraVHJWsaFm8KM67QaI7l3tjotki75s3bt3Zixbk04D4pHqpe1f7_k1rpKNujIfZk6buhxAudcqCvg6bHlFMEYQ=w2400">
@endsection
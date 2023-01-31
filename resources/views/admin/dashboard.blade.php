@extends('admin_layout')
@section('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
    <script>
        var ctx = document.getElementById("myPieChart");
        var myPieChart = new Chart(ctx, {
            type: 'doughnut',
            data: {
                labels: {!! json_encode($chart->labels) !!},
                datasets: [{
                    data: {!! json_encode($chart->dataset) !!},
                    backgroundColor: ['#4e73df', '#1cc88a'],
                    hoverBackgroundColor: ['#2e59d9', '#17a673'],
                    hoverBorderColor: "rgba(234, 236, 244, 1)",
                }],
            },
            options: {
                maintainAspectRatio: false,
                tooltips: {
                    backgroundColor: "rgb(255,255,255)",
                    bodyFontColor: "#858796",
                    borderColor: '#dddfeb',
                    borderWidth: 1,
                    xPadding: 15,
                    yPadding: 15,
                    displayColors: false,
                    caretPadding: 10,
                },
                legend: {
                    position: 'left',
                    display: true

                },
                cutoutPercentage: 80,
                title: {
                    position: 'bottom',
                    display: true,
                    text: 'Người dùng'
                },
            },
        });

        var ctx1 = document.getElementById("myPieChart1");
        var myPieChart1 = new Chart(ctx1, {
            type: 'doughnut',
            data: {
                labels: {!! json_encode($chart1->labels) !!},
                datasets: [{
                    data: {!! json_encode($chart1->dataset) !!},
                    backgroundColor: ["#b91d47", "#00aba9", "#2b5797", "#e8c3b9", "#1e7145"],
                    hoverBackgroundColor: ['#2e59d9', '#17a673', '#2c9faf'],
                    hoverBorderColor: "rgba(234, 236, 244, 1)",
                }],
            },
            options: {
                maintainAspectRatio: false,
                tooltips: {
                    backgroundColor: "rgb(255,255,255)",
                    bodyFontColor: "#858796",
                    borderColor: '#dddfeb',
                    borderWidth: 1,
                    xPadding: 15,
                    yPadding: 15,
                    displayColors: false,
                    caretPadding: 10,
                },
                legend: {
                    position: 'left',
                    display: true
                },
                cutoutPercentage: 80,
                title: {
                    position: 'bottom',
                    display: true,
                    text: 'Sản phẩm'
                },
            },
        });
    </script>
@endsection
@section('admin_content')
    <h3>Chào mừng @php print(Auth::user()->name); @endphp đến với trang quản trị</h3>
    <div class="row">
        <div class="col-md-6 col-lg-4 col-xl-4 order-0 mb-4">
            <div class="card h-100">
                <div class="card-header d-flex align-items-center justify-content-between pb-0">
                    <div class="card-title mb-0">
                        <h5 class="m-0 me-2">Thống kê đơn hàng</h5>
                        <small class="text-muted">Tổng doanh thu: 420.125.000 VNĐ</small>
                    </div>
                </div>
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <div class="d-flex flex-column align-items-center gap-1">
                            <h2 class="mb-2">258</h2>
                            <span>Tổng đơn hàng</span>
                        </div>
                        <div id="orderStatisticsChart"></div>
                    </div>
                    <ul class="p-0 m-0">
                        <li class="d-flex mb-4 pb-1">
                            <div class="avatar flex-shrink-0 me-3">
                                <span class="avatar-initial rounded bg-label-primary"><i
                                        class="bx bx-mobile-alt"></i></span>
                            </div>
                            <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                <div class="me-2">
                                    <h6 class="mb-0">Quần</h6>
                                    {{-- <small class="text-muted">Mobile, Earbuds, TV</small> --}}
                                </div>
                                <div class="user-progress">
                                    <small class="fw-semibold">82.5k</small>
                                </div>
                            </div>
                        </li>
                        <li class="d-flex mb-4 pb-1">
                            <div class="avatar flex-shrink-0 me-3">
                                <span class="avatar-initial rounded bg-label-success"><i class='bx bxs-t-shirt'></i></span>
                            </div>
                            <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                <div class="me-2">
                                    <h6 class="mb-0">Áo</h6>
                                    {{-- <small class="text-muted">T-shirt, Jeans, Shoes</small> --}}
                                </div>
                                <div class="user-progress">
                                    <small class="fw-semibold">23.8k</small>
                                </div>
                            </div>
                        </li>
                        <li class="d-flex mb-4 pb-1">
                            <div class="avatar flex-shrink-0 me-3">
                                <span class="avatar-initial rounded bg-label-info"><i class="bx bx-home-alt"></i></span>
                            </div>
                            <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                <div class="me-2">
                                    <h6 class="mb-0">Giầy, dép</h6>
                                    {{-- <small class="text-muted">Fine Art, Dining</small> --}}
                                </div>
                                <div class="user-progress">
                                    <small class="fw-semibold">849k</small>
                                </div>
                            </div>
                        </li>
                        <li class="d-flex">
                            <div class="avatar flex-shrink-0 me-3">
                                <span class="avatar-initial rounded bg-label-secondary"><i
                                        class="bx bx-football"></i></span>
                            </div>
                            <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                <div class="me-2">
                                    <h6 class="mb-0">Phụ kiện</h6>
                                    {{-- <small class="text-muted">Football, Cricket Kit</small> --}}
                                </div>
                                <div class="user-progress">
                                    <small class="fw-semibold">99</small>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="col-md-6 col-lg-4 order-1 mb-4">
            <div class="card h-100">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h5 class="card-title m-0 me-2">Thống kê người dùng và sản phẩm</h5>
                </div>
                <div class="card-body">
                    <ul class="p-0 m-0">
                        <li class="d-flex mb-4 pb-1">
                            <canvas id="myPieChart" style="width:100%;max-width:700px"></canvas>
                        </li>
                        <li class="d-flex mb-4 pb-1">
                            <canvas id="myPieChart1" style="width:100%;max-width:700px"></canvas>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-4 order-2 mb-4">
            <div class="row">
                <div class="col-lg-6 col-md-12 col-6 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-title d-flex align-items-start justify-content-between">
                                <div class="avatar flex-shrink-0">
                                    <span class="avatar-initial rounded bg-label-success">
                                        <i class='bx bx-user' style='color:#26ce33'></i>
                                    </span>
                                </div>
                            </div>

                            <span class="fw-semibold d-block mb-1">Tổng số người dùng</span>
                            <h3 class="card-title mb-2">{{ $total[0] }}</h3>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 col-6 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-title d-flex align-items-start justify-content-between">
                                <div class="avatar flex-shrink-0">
                                    <span class="avatar-initial rounded bg-label-primary">
                                        <i class='bx bxl-product-hunt'></i>
                                    </span>
                                </div>
                            </div>
                            <span>Tống số sản phẩm</span>
                            <h3 class="card-title text-nowrap mb-1">{{ $total[1] }}</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

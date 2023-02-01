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
                    text: 'Người dùng: {{ $total[0] }}'
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
                    text: 'Sản phẩm: {{ $total[1] }}'
                },
            },
        });
    </script>
@endsection
@section('admin_content')
    <h3>Chào mừng @php print(Auth::user()->name); @endphp đến với trang quản trị</h3>
    <div class="row">
        <div class="col-lg-8 mb-4 order-0">
            <div class="card h-100">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h5 class="card-title m-0 me-2">Thống kê doanh thu</h5>
                </div>
                <div class="card-body">
                    <div class="col-lg-6 col-md-12 col-6 mb-4">
                        <ul class="p-0 m-0">
                            <li class="d-flex mb-4 pb-1">
                                <div class="avatar flex-shrink-0 me-3">
                                    <img src="../assets/img/icons/unicons/wallet.png" alt="User" class="rounded" />
                                </div>
                                <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                    <div class="me-2">
                                        <small class="text-muted d-block mb-1">Tổng số đơn hàng</small>
                                    </div>
                                    <div class="user-progress d-flex align-items-center gap-1">
                                        <h6 class="mb-0">{{ $total[2] }}</h6>
                                        <span class="text-muted">đơn hàng</span>
                                    </div>
                                </div>
                            </li>
                            <li class="d-flex mb-4 pb-1">
                                <div class="avatar flex-shrink-0 me-3">
                                    <img src="../assets/img/icons/unicons/paypal.png" alt="User" class="rounded" />
                                </div>
                                <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                    <div class="me-2">
                                        <small class="text-muted d-block mb-1">Tổng doanh thu</small>
                                    </div>
                                    <div class="user-progress d-flex align-items-center gap-1">
                                        <h6 class="mb-0">{{ $total[3] }}</h6>
                                        <span class="text-muted">VND</span>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h5 class="card-title m-0 me-2">Top sản phẩm bán chạy</h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive text-nowrap">
                        <table class="table">
                            <thead>
                                <tr class="text-nowrap">
                                    <th>Tên sản phẩm</th>
                                    <th>Số lượng</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($topProduct as $item)
                                    <tr>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->totalProduct }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
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
    </div>
@endsection

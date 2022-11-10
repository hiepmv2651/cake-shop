<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-9">
                                <div class="d-flex align-items-center align-self-start">
                                    <h3 class="text-muted font-weight-normal">Sản phẩm tháng trước:
                                        {{$previous_products}}</h3>
                                    <p class="text-success ml-2 mb-0 font-weight-medium">+{{$now_products}}</p>
                                </div>
                            </div>
                            @if($now_products >= $previous_1products)
                            <div class="col-3">
                                <div class="icon icon-box-success ">
                                    <span class="mdi mdi-arrow-top-right icon-item"></span>
                                </div>
                            </div>
                            @else
                            <div class="col-3">
                                <div class="icon icon-box-danger">
                                    <span class="mdi mdi-arrow-bottom-left icon-item"></span>
                                </div>
                            </div>
                            @endif
                        </div>
                        <br>
                        <h6 class="text-muted font-weight-normal">Sản phẩm trước đây: {{$previous_1products}}</h6>
                        <h6 class="text-muted font-weight-normal">Tổng sản phẩm: {{$total_products}}</h6>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-9">
                                <div class="d-flex align-items-center align-self-start">
                                    <h3 class="text-muted font-weight-normal">Người dùng tháng trước:
                                        {{$previous_users}}
                                    </h3>
                                    <p class="text-success ml-2 mb-0 font-weight-medium">+{{$now_users}}</p>
                                </div>
                            </div>
                            @if($now_users >= $previous_1users)
                            <div class="col-3">
                                <div class="icon icon-box-success ">
                                    <span class="mdi mdi-arrow-top-right icon-item"></span>
                                </div>
                            </div>
                            @else
                            <div class="col-3">
                                <div class="icon icon-box-danger">
                                    <span class="mdi mdi-arrow-bottom-left icon-item"></span>
                                </div>
                            </div>
                            @endif
                        </div>
                        <br>
                        <h6 class="text-muted font-weight-normal">Người dùng trước đây: {{$previous_1users}}</h6>
                        <h6 class="text-muted font-weight-normal">Tổng người dùng: {{$total_users}}</h6>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-9">
                                <div class="d-flex align-items-center align-self-start">
                                    <h3 class="text-muted font-weight-normal">Hóa đơn tháng trước: {{$previous_orders}}
                                    </h3>
                                    <p class="text-success ml-2 mb-0 font-weight-medium">+{{$now_orders}}</p>
                                </div>
                            </div>
                            @if($now_orders >= $previous_1orders)
                            <div class="col-3">
                                <div class="icon icon-box-success ">
                                    <span class="mdi mdi-arrow-top-right icon-item"></span>
                                </div>
                            </div>
                            @else
                            <div class="col-3">
                                <div class="icon icon-box-danger">
                                    <span class="mdi mdi-arrow-bottom-left icon-item"></span>
                                </div>
                            </div>
                            @endif
                        </div>
                        <h6 class="text-muted font-weight-normal">Hóa đơn trước đây: {{$previous_1orders}}</h6>
                        <h6 class="text-muted font-weight-normal">Tổng hóa đơn: {{$total_orders}}</h6>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-9">
                                <div class="d-flex align-items-center align-self-start">
                                    <h3 class="text-muted font-weight-normal">Đơn hàng đã giao tháng trước:
                                        {{$previous_devivered}}</h3>
                                    <p class="text-success ml-2 mb-0 font-weight-medium">+{{$now_devivered}}</p>
                                </div>
                            </div>
                            @if($now_devivered >= $previous_1devivered)
                            <div class="col-3">
                                <div class="icon icon-box-success ">
                                    <span class="mdi mdi-arrow-top-right icon-item"></span>
                                </div>
                            </div>
                            @else
                            <div class="col-3">
                                <div class="icon icon-box-danger">
                                    <span class="mdi mdi-arrow-bottom-left icon-item"></span>
                                </div>
                            </div>
                            @endif
                        </div>
                        <h6 class="text-muted font-weight-normal">Đơn hàng đã giao trước đây: {{$previous_1devivered}}
                        </h6>
                        <h6 class="text-muted font-weight-normal">Tổng đơn hàng đã giao: {{$total_devivered}}</h6>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-9">
                                <div class="d-flex align-items-center align-self-start">
                                    <h3 class="text-muted font-weight-normal">Đơn hàng đã hủy tháng
                                        trước: {{$previous_processing}}</h3>
                                    <p class="text-success ml-2 mb-0 font-weight-medium">+{{$now_processing}}</p>
                                </div>
                            </div>
                            @if($now_processing >= $previous_1processing)
                            <div class="col-3">
                                <div class="icon icon-box-success ">
                                    <span class="mdi mdi-arrow-top-right icon-item"></span>
                                </div>
                            </div>
                            @else
                            <div class="col-3">
                                <div class="icon icon-box-danger">
                                    <span class="mdi mdi-arrow-bottom-left icon-item"></span>
                                </div>
                            </div>
                            @endif
                        </div>
                        <h6 class="text-muted font-weight-normal">Đơn hàng đã hủy trước đây: {{$previous_1processing}}
                        </h6>
                        <h6 class="text-muted font-weight-normal">Tổng đơn hàng đã hủy: {{$total_processing}}</h6>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-9">
                                <div class="d-flex align-items-center align-self-start">
                                    <h3 class="text-muted font-weight-normal">Tổng tiền tháng trước:
                                        {{$previous_sum_orders}}</h3>
                                    <p class="text-success ml-2 mb-0 font-weight-medium">+{{$now_sum_orders}}</p>
                                </div>
                            </div>
                            @if($now_sum_orders >= $previous_1sum_orders)
                            <div class="col-3">
                                <div class="icon icon-box-success ">
                                    <span class="mdi mdi-arrow-top-right icon-item"></span>
                                </div>
                            </div>
                            @else
                            <div class="col-3">
                                <div class="icon icon-box-danger">
                                    <span class="mdi mdi-arrow-bottom-left icon-item"></span>
                                </div>
                            </div>
                            @endif
                        </div>
                        <h6 class="text-muted font-weight-normal">Tổng tiền trước đây: {{$previous_1sum_orders}} VNĐ
                        </h6>
                        <h6 class="text-muted font-weight-normal">Tổng tiền kiếm được: {{$sum_orders}} VNĐ</h6>
                    </div>
                </div>
            </div>
        </div>


        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Khách Hàng Theo Khu Vực</h4>
                        <div class="row">
                            <div class="col-md-5">
                                <div class="table-responsive">
                                    <table class="table">
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <i class="flag-icon flag-icon-vn"></i>
                                                </td>
                                                <td>Nha Trang</td>
                                                <td class="text-right"> 1500 </td>
                                                <td class="text-right font-weight-medium"> 56.35% </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <i class="flag-icon flag-icon-vn"></i>
                                                </td>
                                                <td>Cam Ranh</td>
                                                <td class="text-right"> 800 </td>
                                                <td class="text-right font-weight-medium"> 33.25% </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <i class="flag-icon flag-icon-vn"></i>
                                                </td>
                                                <td>Hà Nội</td>
                                                <td class="text-right"> 760 </td>
                                                <td class="text-right font-weight-medium"> 15.45% </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <i class="flag-icon flag-icon-vn"></i>
                                                </td>
                                                <td>Hồ Chí Minh</td>
                                                <td class="text-right"> 450 </td>
                                                <td class="text-right font-weight-medium"> 25.00% </td>
                                            </tr>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="col-md-7">
                                <div id="audience-map" class="vector-map"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- content-wrapper ends -->
    <!-- partial:partials/_footer.html -->
    <footer class="footer">
        <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright ©
                bootstrapdash.com 2020</span>
            <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center"> Free <a
                    href="https://www.bootstrapdash.com/bootstrap-admin-template/" target="_blank">Bootstrap
                    admin templates</a> from Bootstrapdash.com</span>
        </div>
    </footer>
    <!-- partial -->
</div>
<!-- main-panel ends -->
</div>
<!-- page-body-wrapper ends -->
</div>
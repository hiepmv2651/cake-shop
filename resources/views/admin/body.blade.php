<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-9">
                                <div class="d-flex align-items-center align-self-start">
                                    <h3 class="text-muted font-weight-normal">
                                    </h3>
                                    <p class="text-success ml-2 mb-0 font-weight-medium"></p>
                                </div>
                            </div>

                            <div class="col-3">
                                <div class="icon icon-box-success ">
                                    <span class="mdi mdi-arrow-top-right icon-item"></span>
                                </div>
                            </div>

                        </div>
                        <br>
                        <h6 class="text-muted font-weight-normal">{{$dtngay}}</h6>
                        <h6 class="text-muted font-weight-normal">Doanh thu trong ngày</h6>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-9">
                                <div class="d-flex align-items-center align-self-start">
                                    <h3 class="text-muted font-weight-normal">
                                    </h3>
                                    <p class="text-success ml-2 mb-0 font-weight-medium"></p>
                                </div>
                            </div>

                            <div class="col-3">
                                <div class="icon icon-box-success ">
                                    <span class="mdi mdi-arrow-top-right icon-item"></span>
                                </div>
                            </div>

                        </div>
                        <br>
                        <h6 class="text-muted font-weight-normal">{{$dhngay}}</h6>
                        <h6 class="text-muted font-weight-normal">Đơn hàng chưa duyệt trong ngày</h6>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-9">
                                <div class="d-flex align-items-center align-self-start">
                                    <h3 class="text-muted font-weight-normal">
                                    </h3>
                                    <p class="text-success ml-2 mb-0 font-weight-medium"></p>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="icon icon-box-success ">
                                    <span class="mdi mdi-arrow-top-right icon-item"></span>
                                </div>
                            </div>

                        </div>
                        <h6 class="text-muted font-weight-normal">{{$now_sum_orders}}</h6>
                        <h6 class="text-muted font-weight-normal">Tổng doanh thu tháng</h6>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-9">
                                <div class="d-flex align-items-center align-self-start">
                                    <h3 class="text-muted font-weight-normal">
                                    </h3>
                                    <p class="text-success ml-2 mb-0 font-weight-medium"></p>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="icon icon-box-success ">
                                    <span class="mdi mdi-arrow-top-right icon-item"></span>
                                </div>
                            </div>

                        </div>
                        <h6 class="text-muted font-weight-normal">{{$now_don_duyet}}
                        </h6>
                        <h6 class="text-muted font-weight-normal">Tổng đơn hàng đã duyệt và thanh toán trong tháng</h6>
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
            <span class="text-muted d-block text-center text-sm-left d-sm-inline-block"></span>
            <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center"> CakeShop.com 2022</span>
        </div>
    </footer>
    <!-- partial -->
</div>
<!-- main-panel ends -->
</div>
<!-- page-body-wrapper ends -->
</div>
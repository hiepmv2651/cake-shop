<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    @include('admin.css')
    <link rel="stylesheet" href="https://cdn.datatables.net/datetime/1.2.0/css/dataTables.dateTime.min.css">
    <style>
        .h2_font {
            font-size: 40px;
            padding-bottom: 40px;
            text-align: center;
        }

        .dataTables_length select {
            background-color: white !important;
        }

        .dataTables_info,
        .dt-datetime-month,
        .dt-datetime-year,
        .dt-datetime-clear,
        .dt-datetime-today,
        .dt-datetime-label {
            color: black !important;
        }
    </style>

</head>

<body>
    <div class="container-scroller">
        <!-- partial:partials/_sidebar.html -->
        @include('admin.sidebar')
        <!-- partial -->
        @include('admin.header')
        <div class="main-panel">
            <div class="content-wrapper">
                @if(session()->has('message'))
                <div class="alert alert-success" style="text-align: center" x-data="{show:true}"
                    x-init="setTimeout(() => show=false, 3000)" x-show="show">
                    {{session('message')}}
                </div>
                @endif

                <h2 class="h2_font">Xem Hóa Đơn</h2>

                <div class="w-full px-6 py-4 my-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
                    <table border="0" cellspacing="5" cellpadding="5">
                        <tbody>
                            <tr>
                                <td style="color: black">Ngày bắt đầu:</td>
                                <td><input style="color: black; margin-bottom: 10px" type="text" id="min" name="min">
                                </td>
                            </tr>
                            <tr>
                                <td style="color: black">Ngày kết thúc:</td>
                                <td><input style="color: black" type="text" id="max" name="max"></td>
                            </tr>
                        </tbody>
                    </table>

                    <table id="example" class="table is-striped" style="width:100%" style="background-color: white">
                        <thead>
                            <tr>
                                <th>STT</th>
                                <th>Mã HĐ</th>
                                <th>Ngày Đặt</th>
                                <th>SĐT</th>
                                <th>Địa Chỉ</th>
                                <th>Ghi Chú</th>
                                <th>Tên Khách Hàng</th>
                                <th>Trạng Thái</th>
                                <th>Thanh Toán</th>
                                <th>Tổng Tiền</th>

                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $value)
                            <tr>
                                <td>{{$loop->iteration}}</td>\
                                <td>{{$value->id}}</td>
                                <td>{{$value->ngaydat}}</td>
                                <td>{{$value->phone}}</td>
                                <td>{{$value->address}}</td>
                                <td>{{$value->description}}</td>

                                <td>{{$value->user->name}}</td>
                                <td>{{$value->trangthais->name}}</td>
                                <td>{{$value->payment_status}}</td>
                                <td>{{$value->tongtien}} VNĐ</td>
                                <td>
                                    <a href="{{url('detail_hoadon', $value->id)}}" class="btn btn-primary">Detail</a>
                                    <a href="{{url('update_hoadon', $value->id)}}"
                                        class="btn btn-inverse-warning">Edit</a>
                                    @if(auth::user()->usertype == 1)
                                    <a onclick="return confirm('Are you sure to delete this')"
                                        href="{{url('delete_hd', $value->id)}}" class="btn btn-danger">Delete</a>
                                    @else
                                    @endif
                                </td>
                            </tr>

                            @endforeach

                        </tbody>
                    </table>

                </div>
            </div>
        </div>

        <!-- container-scroller -->
        <!-- plugins:js -->
        <script src="admin/assets/vendors/js/vendor.bundle.base.js"></script>

        <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
        <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bulma.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.2/moment.min.js"></script>
        <script src="https://cdn.datatables.net/datetime/1.2.0/js/dataTables.dateTime.min.js"></script>
        <script>
            var minDate, maxDate;

            // Custom filtering function which will search data in column four between two values
            $.fn.dataTable.ext.search.push(
                function(settings, data, dataIndex) {
                    var min = minDate.val();
                    var max = maxDate.val();
                    var date = new Date(data[1]);

                    if (
                        (min === null && max === null) ||
                        (min === null && date <= max) ||
                        (min <= date && max === null) ||
                        (min <= date && date <= max)
                    ) {
                        return true;
                    }
                    return false;
                }
            );


            $(document).ready(function() {
                minDate = new DateTime($('#min'), {
                    i18n: {
                        months: ['Tháng 1', 'Tháng 2', 'Tháng 3', 'Tháng 4', 'Tháng 5', 'Tháng 6', 'Tháng 7', 'Tháng 8', 'Tháng 9', 'Tháng 10', 'Tháng 11', 'Tháng 12'],
                        weekdays: ['C.Nhật', 'Thứ 2', 'Thứ 3', 'Thứ 4', 'Thứ 5', 'Thứ 6', 'Thứ 7']
                    },
                    buttons: {
                        today: true,
                        clear: true
                    },
                    format: 'YYYY-MM-DD'
                });
                maxDate = new DateTime($('#max'), {
                    i18n: {
                        months: ['Tháng 1', 'Tháng 2', 'Tháng 3', 'Tháng 4', 'Tháng 5', 'Tháng 6', 'Tháng 7', 'Tháng 8', 'Tháng 9', 'Tháng 10', 'Tháng 11', 'Tháng 12'],
                        weekdays: ['C.Nhật', 'Thứ 2', 'Thứ 3', 'Thứ 4', 'Thứ 5', 'Thứ 6', 'Thứ 7']
                    },
                    buttons: {
                        today: true,
                        clear: true
                    },
                    format: 'YYYY-MM-DD'
                });
                var table = $('#example').DataTable({
                    "language": {
                        "lengthMenu": " _MENU_ ",
                        "zeroRecords": "Không tìm thấy",
                        "info": "Hiển thị trang _PAGE_ / _PAGES_",
                        "infoEmpty": "Không có dữ liệu",
                        "infoFiltered": "(Được lọc từ _MAX_ mục)",
                        "search": "Tìm kiếm:",
                        "paginate": {
                            "first": "Trang đầu",
                            "last": "Trang cuối",
                            "next": "Sau",
                            "previous": "Trước",
                        },
                        buttons: {
                            colvis: 'Chọn mục không xuất',
                        },
                        select: {
                            rows: " (%d dòng được chọn)"
                        }
                    },
                    "lengthMenu": [
                        [10, 25, 50, -1],
                        [10, 25, 50, "All"]
                    ],
                    scrollX: true,
                    autoWidth: false,
                    columnDefs: [{
                        targets: ['_all'],
                        className: 'mdc-data-table__cell',
                    }, ],
                });
                $('#min, #max').on('change', function() {
                    table.draw();
                });
            });
        </script>
        <script src="//unpkg.com/alpinejs" defer></script>
        <!-- endinject -->
        <!-- Plugin js for this page -->
        <script src="admin/assets/vendors/chart.js/Chart.min.js"></script>
        <script src="admin/assets/vendors/progressbar.js/progressbar.min.js"></script>
        <script src="admin/assets/vendors/jvectormap/jquery-jvectormap.min.js"></script>
        <script src="admin/assets/vendors/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
        <script src="admin/assets/vendors/owl-carousel-2/owl.carousel.min.js"></script>
        <!-- End plugin js for this page -->
        <!-- inject:js -->
        <script src="admin/assets/js/off-canvas.js"></script>
        <script src="admin/assets/js/hoverable-collapse.js"></script>
        <script src="admin/assets/js/misc.js"></script>
        <script src="admin/assets/js/settings.js"></script>
        <script src="admin/assets/js/todolist.js"></script>
        <!-- endinject -->
        <!-- Custom js for this page -->
        <script src="admin/assets/js/dashboard.js"></script>

        <!-- End custom js for this page -->
</body>

</html>

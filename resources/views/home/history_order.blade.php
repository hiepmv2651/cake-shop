<!DOCTYPE html>
<html>

<head>
    <!-- Basic -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.9.3/css/bulma.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bulma.min.css">
    @include('home.css2')
</head>

<body>
    <div class="hero_area">
        <!-- header section strats -->
        @include('home.header')
        <!-- end header section -->
        <br>
        <div style="width: 90%; margin-left: auto; margin-right: auto;">
            <table id="example" class="table is-striped" style="width:100%">
                <thead>
                    <tr>
                        <th>Mã Hóa Đơn</th>
                        <th>Ngày Đặt</th>
                        <th>SĐT</th>
                        <th>Địa Chỉ</th>
                        <th>Ghi Chú</th>
                        <th>Tên Khách Hàng</th>
                        <th>Trạng Thái</th>
                        <th>Thanh Toán</th>
                        <th>Tổng Tiền</th>
                        <th>Hành Động</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($history as $value)
                    <tr>
                        <td>{{$value->id}}</td>
                        <td>{{$value->ngaydat}}</td>
                        <td>{{$value->phone}}</td>
                        <td>{{$value->address}}</td>
                        <td>{{$value->description}}</td>
                        <td>{{$value->user->name}}</td>
                        <td>{{$value->trangthais->name}}</td>
                        <td>{{$value->payment_status}}</td>
                        <td>{{$value->tongtien}}</td>

                        <td>

                            <a href="{{url('order_details', $value->id)}}" class="btn btn-danger">Xem Chi Tiết</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>

            </table>
        </div>

    </div>
    <br>

    @include('home.footer')
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bulma.min.js"></script>
    <script></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bulma.min.js"></script>
    <script></script>
    <script>
        $(document).ready(function() {
            $('#example').DataTable({
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

            });
        });
    </script>
    <!-- jQery -->

    <!-- popper js -->
    <script src="home/js/popper.min.js"></script>
    <!-- bootstrap js -->
    <script src="home/js/bootstrap.js"></script>
    <!-- custom js -->
    <script src="home/js/custom.js"></script>

</body>

</html>

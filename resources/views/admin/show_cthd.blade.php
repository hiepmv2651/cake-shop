<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    @include('admin.css')
    <style>
        .h2_font {
            font-size: 40px;
            padding-bottom: 40px;
            text-align: center;
        }

        .dataTables_length select {
            background-color: white !important;
        }

        .dataTables_info {
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
                @if (session()->has('message'))
                    <div class="alert alert-success" style="text-align: center" x-data="{ show: true }"
                        x-init="setTimeout(() => show = false, 3000)" x-show="show">
                        {{ session('message') }}
                    </div>
                @endif

                <h2 class="h2_font">Xem Chi Tiết Hóa Đơn</h2>

                <div class="w-full px-6 py-4 my-4 bg-white shadow-md overflow-hidden sm:rounded-lg">

                    <table id="example" class="table is-striped" style="width:100%" style="background-color: white">
                        <thead>
                            <tr>
                                <th>STT</th>
                                <th>Mã CTHĐ</th>
                                <th>Giá Tiền</th>
                                <th>Số Lượng</th>
                                <th>Mã Hóa Đơn</th>
                                <th>Tên Sản Phẩm</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $value)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $value->id }}</td>
                                    <td>{{ number_format($value->price) }} VNĐ</td>
                                    <td>{{ $value->quantity }}</td>
                                    <td>{{ $value->hoadon_id }}</td>
                                    <td>{{ $value->products->title }}</td>

                                    <td>
                                        <a href="{{ url('update_cthoadon', $value->id) }}"
                                            class="btn btn-inverse-warning">Edit</a>
                                        @if (auth::user()->usertype == 1)
                                            <a onclick="return confirm('Are you sure to delete this')"
                                                href="{{ url('delete_cthd', $value->id) }}"
                                                class="btn btn-danger">Delete</a>
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
        @include('admin.js')
        <!-- End custom js for this page -->
</body>

</html>

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

                    <table id="example" class="table is-striped" style="width:100%" style="background-color: white">
                        <thead>
                            <tr>
                                <th>STT</th>
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
                            @php
                            $i = 1;
                            @endphp
                            @foreach ($data as $value)
                            <tr>
                                <td>{{$i}}</td>
                                <td>{{$value->ngaydat}}</td>
                                <td>{{$value->phone}}</td>
                                <td>{{$value->address}}</td>
                                <td>{{$value->description}}</td>

                                <td>{{$value->user->name}}</td>
                                <td>{{$value->trangthais->name}}</td>
                                <td>{{$value->payment_status}}</td>
                                <td>{{$value->tongtien}}</td>
                                <td>
                                    <a href="{{url('detail_hoadon', $value->id)}}" class="btn btn-primary">Detail</a>
                                    <a href="{{url('update_hoadon', $value->id)}}"
                                        class="btn btn-inverse-warning">Edit</a>
                                    <a onclick="return confirm('Are you sure to delete this')"
                                        href="{{url('delete_hd', $value->id)}}" class="btn btn-danger">Delete</a>
                                </td>
                            </tr>
                            @php
                            $i++;
                            @endphp
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
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
                @if(session()->has('message'))
                <div class="alert alert-success" style="text-align: center" x-data="{show:true}"
                    x-init="setTimeout(() => show=false, 3000)" x-show="show">
                    {{session('message')}}
                </div>
                @endif

                <h2 class="h2_font">Danh Sách Khách Hàng</h2>

                <div class="w-full px-6 py-4 my-4 bg-white shadow-md overflow-hidden sm:rounded-lg">

                    <table id="example" class="table is-striped" style="width:100%" style="background-color: white">
                        <thead>
                            <tr>
                                <th>STT</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>SĐT</th>
                                <th>Địa Chỉ</th>
                                <th>Giới Tính</th>
                                <th>Ảnh Đại Diện</th>
                                <th>Hành Động</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $i = 1;
                            @endphp
                            @foreach ($data as $value)
                            @php

                            if($value->gender == 1)
                            $gt = 'Nam';
                            else {
                            $gt = 'Nữ';
                            }
                            @endphp
                            <tr>
                                <td>{{$i}}</td>
                                <td>{{$value->name}}</td>
                                <td>{{$value->email}}</td>
                                <td>{{$value->phone}}</td>
                                <td>{{$value->address}}</td>
                                <td>{{$gt}}</td>
                                <td><img src="{{asset('storage/'.$value->profile_photo_path)}}" alt=""></td>

                                <td>
                                    <a href="{{url('send_email', $value->id)}}" class="btn btn-primary">Gửi email</a>
                                    <a href="{{url('update_user', $value->id)}}" class="btn btn-inverse-warning">Sửa</a>
                                    <a onclick="return confirm('Bạn có chắc chắn muốn xóa không?')"
                                        href="{{url('delete_user', $value->id)}}" class="btn btn-danger">Xóa</a>
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
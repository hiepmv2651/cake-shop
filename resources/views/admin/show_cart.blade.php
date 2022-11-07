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

                <h2 class="h2_font">Xem Giỏ Hàng</h2>

                <div class="w-full px-6 py-4 my-4 bg-white shadow-md overflow-hidden sm:rounded-lg">

                    <table id="example" class="table is-striped" style="width:100%" style="background-color: white">
                        <thead>
                            <tr>
                                <th>STT</th>
                                <th>Tên khách hàng</th>
                                <th>Tên sản phẩm</th>
                                <th>Số lượng</th>
                                <th>Giá</th>

                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $value)
                            @php
                            $i = 1;

                            @endphp
                            <tr>
                                <td>{{$i}}</td>
                                <td>{{$value->user->name}}</td>
                                <td>{{$value->products->title}}</td>
                                <td>{{$value->quantity}}</td>
                                <td>{{$value->price}}</td>



                                <td>

                                    <a onclick="return confirm('Are you sure to delete this')"
                                        href="{{url('delete_gh', $value->id)}}" class="btn btn-danger">Delete</a>
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
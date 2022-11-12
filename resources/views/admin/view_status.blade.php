<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    @include('admin.css')
    <style type="text/css">
        .div_center {
            text-align: center;
            padding-top: 40px;
        }

        .h2_font {
            font-size: 40px;
            padding-bottom: 40px;
        }

        .input_color {
            color: black;
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
        <!-- partial -->
        <div class="main-panel">
            <div class="content-wrapper">

                @if(session()->has('message'))
                <div class="alert alert-success" style="text-align: center" x-data="{show:true}"
                    x-init="setTimeout(() => show=false, 3000)" x-show="show">
                    {{session('message')}}
                </div>
                @endif

                <div class="div_center">
                    <h2 class="h2_font">Thêm Trạng Thái Đơn Hàng</h2>

                    <form action="{{url('/add_status')}}" method="POST">
                        @csrf
                        <input type="text" class="input_color" name="name" placeholder="Nhập tên...">
                        <input type="submit" class="btn btn-primary" value="Thêm" name="submit">
                        @error('name')
                        <p class="mt-3 list-disc list-inside text-sm text-red-600">
                            {{$message}}
                        </p>
                        @enderror
                    </form>
                </div>
                <br>
                <div class="w-full px-6 py-4 my-4 bg-white shadow-md overflow-hidden sm:rounded-lg">

                    <table id="example" class="table is-striped" style="width:100%">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Tên trạng thái</th>
                                <th>Thời gian tạo</th>
                                <th>Thời gian cập nhật</th>
                                <th>Hành động</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $value)
                            <tr>
                                <td>{{$value->id}}</td>
                                <td>{{$value->name}}</td>
                                <td>{{\Carbon\Carbon::createFromFormat('Y-m-d H:i:s',
                                    $value->created_at->setTimezone('Asia/Ho_Chi_Minh'))->format('g:i A
                                    d/m/Y')}}</td>
                                <td>{{\Carbon\Carbon::createFromFormat('Y-m-d H:i:s',
                                    $value->updated_at->setTimezone('Asia/Ho_Chi_Minh'))->format('g:i A
                                    d/m/Y')}}</td>
                                <td>

                                    <a href="{{url('update_status', $value->id)}}"
                                        class="btn btn-inverse-warning">Sửa</a>


                                    <a onclick="return confirm('Are you sure to delete this')"
                                        href="{{url('delete_status', $value->id)}}" class="btn btn-danger">Xóa</a>
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
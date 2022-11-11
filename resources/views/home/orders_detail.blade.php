<!DOCTYPE html>
<html>

<head>
    @include('home.css')
   
</head>

<body>
    <div class="hero_area">
        <!-- header section strats -->
        @include('home.header')
        <!-- end header section -->


        <div style="width: 90%; margin-left: auto; margin-right: auto;">
            <table id="example" class="table is-striped" style="width:100%">
                <thead>
                    <tr>
                        <th>Tên Sản Phẩm</th>
                        <th>Ảnh Sản Phẩm</th>
                        <th>Số Lượng</th>
                        <th>Giá Tiền</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($orderde as $value)
                    <tr>           
                        <td>{{$value->products->title}}</td>
                        <td><img src="{{asset('storage/'.$value->image)}}" height="80px" width="150" alt=""></td> 
                        <td>{{$value->quantity}}</td>
                        <td>{{$value->price}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <!-- footer start -->
        @include('home.footer')
        <!-- footer end -->
    </div>


    <!-- jQery -->
    @include('home.js')

</body>

</html>
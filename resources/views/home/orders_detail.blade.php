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

        


        <div class="col-sm-6 col-md-4 col-lg-4" style="margin:auto; width:50%; padding:30px">
            <div class="box">

                <div class="img-box" style="padding: 20px">
                    <img src="{{asset('storage/'.$value->image)}}" alt="">
                </div>
                <div class="detail-box">
                    <h5>Name :
                        {{$value->product_id}}
                    </h5>

                    <h5>Payment Status:
                        {{$value->payment_status}}
                    </h5>
                    <h5>Quantity:
                        {{$value->quantity}}
                    </h5>
                    <h5>Price:
                        {{$value->price}}
                    </h5>
                    <h6 style="color: blue">
                        ${{$value->price}}
                    </h6>





                </div>
            </div>
        </div>


        <!-- footer start -->
        @include('home.footer')
        <!-- footer end -->
    </div>


    <!-- jQery -->
    @include('home.js')

</body>

</html>
<section class="product_section layout_padding">
    <div class="container">
        <div class="heading_container heading_center">
            <h2>
                <span>Sản Phẩm</span> Của Chúng Tôi
            </h2>
            <br /><br />

            <div>
                <form action="{{url('product_search')}}" method="GET">
                    @csrf
                    <input style="width: 500px" type="text" name="search" placeholder="Nhập...">
                    <input type="submit" value="Tìm kiếm" name="" id="">
                </form>
            </div>
        </div>

        @if(session()->has('message'))
        <div class="alert alert-success" style="text-align: center" x-data="{show:true}"
            x-init="setTimeout(() => show=false, 3000)" x-show="show">
            {{session('message')}}
        </div>
        @endif

        <div class="row">
            @foreach ($product as $value)
            <div class="col-sm-6 col-md-4 col-lg-4">
                <div class="box">
                    <div class="option_container">
                        <div class="options">
                            <a href="{{url('product_details', $value->id)}}" class="option1">
                                Xem Chi Tiết
                            </a>
                            <form action="{{url('add_cart', $value->id)}}" method="POST">
                                @csrf
                                <input type="number" name="quantity" min="1" max="20" value="1">
                                <input type="submit" value="Thêm vào giỏ">
                            </form>
                        </div>
                    </div>
                    <div class="img-box">
                        <img src="{{asset('storage/'.$value->image)}}" alt="">
                    </div>
                    <div class="detail-box">
                        <h5>
                            {{$value->title}}
                        </h5>

                        @if ($value->discount_price != null)
                        <h6 style="color: red">
                            ${{$value->discount_price}}
                        </h6>

                        <h6 style="text-decoration: line-through; color:blue">
                            ${{$value->price}}
                        </h6>

                        @else
                        <h6 style="color: blue">
                            ${{$value->price}}
                        </h6>

                        @endif
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <div>
            {{$product->links()}}
        </div>
        <div class="btn-box">
            <a href="{{url('product')}}">
                Xem tất cả sản phẩm
            </a>
        </div>
    </div>
</section>
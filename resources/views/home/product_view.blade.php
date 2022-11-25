<section class="product_section layout_padding">
    <div class="container">
        <div class="heading_container heading_center">

            <div>
                <form action="{{url('search_product')}}" method="GET">
                    @csrf
                    <input style="width: 500px" type="text" name="search" placeholder="Tìm Kiếm Sản Phẩm">
                    <input type="submit" value="Tìm Kiếm" name="" id="">
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
                                Chi Tiết Sản Phẩm
                            </a>
                            <form action="{{url('add_cart', $value->id)}}" method="POST">
                                @csrf
                                <input type="number" name="quantity" min="1" max="20" value="1">
                                <input type="submit" value="Thêm Vào Giỏ">
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

                        <h6 style="color: blue">
                            {{$value->price}} VNĐ
                        </h6>

                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <div class="d-flex" style="margin-top: 30px">
            <div class="mx-auto">
                {{$product->links("pagination::bootstrap-4")}}
            </div>
        </div>
        <div class="btn-box">
            <a href="{{url('product')}}">
                Xem Tất Cả Sản Phẩm
            </a>
        </div>
    </div>
</section>

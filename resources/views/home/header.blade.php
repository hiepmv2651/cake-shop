<header class="header_section">
    <div class="container">
        <nav class="navbar navbar-expand-lg custom_nav-container ">
            <a class="navbar-brand" href="{{url('/')}}"><img width="250" src="/images/cakeshop.png" alt="#" /></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class=""> </span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav">
                    <li class="nav-item active">
                        <a class="nav-link" href="{{url('/')}}">Trang Chủ <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{url('product')}}">Sản Phẩm</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{url('lienhe')}}">Liên Hệ</a>
                    </li>
                    @if (Route::has('login'))

                    @auth

                    <li class="nav-item">
                        <a class="nav-link" style="background-color: skyblue; " href="{{url('show_cart')}}">Cart [ <span
                                style="color: green;">{{App\Models\cart::where('user_id','=',Auth::user()->id)->count()}}]</span></a>
                    </li>

                    @else

                    <li class="nav-item">
                        <a class="nav-link" style="background-color: skyblue; " href="{{url('show_cart')}}">Giỏ Hàng [ 0
                            ]</a>
                    </li>
                    @endauth

                    @endif
                    <li class="nav-item">
                        <a class="nav-link" href="{{url('show_order')}}">Order</a>
                    </li>
                    <form class="form-inline">
                        <button class="btn  my-2 my-sm-0 nav_search-btn" type="submit">
                            <i class="fa fa-search" aria-hidden="true"></i>
                        </button>
                    </form>
                    @if (Route::has('login'))

                    @auth
                    <x-app-layout>
                    </x-app-layout>
                    @else
                    <li class="nav-item">
                        <a class="btn btn-primary" id="logincss" href="{{ route('login') }}">Login</a>
                    </li>
                    <li class=" nav-item">
                        <a class="btn btn-success" href="{{ route('register') }}">Register</a>
                    </li>
                    @endauth
                    @endif
                </ul>
            </div>
        </nav>
    </div>
</header>
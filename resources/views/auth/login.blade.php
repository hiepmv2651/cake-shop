<!-- Basic -->
<meta charset="utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<!-- Mobile Metas -->
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
<!-- Site Metas -->
<meta name="keywords" content="" />
<meta name="description" content="" />
<meta name="author" content="" />
<link rel="shortcut icon" href="images/favicon.png" type="">
<title>Cake Shop</title>
<!-- bootstrap core css -->
<link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap.css')}}" />
<!-- font awesome style -->
<link href="{{asset('css/font-awesome.min.css')}}" rel="stylesheet" />
<!-- Custom styles for this template -->
<link href="{{asset('css/style.css')}}" rel="stylesheet" />
<!-- responsive style -->
<link href="{{asset('css/responsive.css')}}" rel="stylesheet" />

<header class="header_section">
    <div class="container">
        <nav class="navbar navbar-expand-lg custom_nav-container ">
            <a class="navbar-brand" href="{{url('/')}}"><img width="250" src="/images/cakeshop.png" alt="#" /></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
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
                        <a class="nav-link" style="background-color: skyblue; " href="{{url('show_cart')}}">Giỏ Hàng [
                            <span style="color: green;">{{App\Models\cart::where('user_id','=',Auth::user()->id)->count()}}]</span></a>
                    </li>

                    @else

                    <li class="nav-item">
                        <a class="nav-link" style="background-color: skyblue; " href="{{url('show_cart')}}">Giỏ Hàng [ 0
                            ]</a>
                    </li>
                    @endauth

                    @endif
                    <li class="nav-item">
                        <a class="nav-link" href="{{url('show_order')}}">Đơn Hàng</a>
                    </li>
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
<div style="height: 15px; background-color:#F7444E;">
</div>

<x-guest-layout>
    <x-jet-authentication-card>
    <div style="width: 100%; text-align: center;">
                  <h1>ĐĂNG NHẬP</h1>
    </div>
        <x-slot name="logo">
            <!-- <x-jet-authentication-card-logo /> -->

        </x-slot>

        <x-jet-validation-errors class="mb-4" />

        @if (session('status'))
        <div class="mb-4 font-medium text-sm text-green-600">
            {{ session('status') }}
        </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf
           
            <div>
                <x-jet-label for="email" value="{{ __('Email') }}" />
                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            </div>

            <div class="mt-4">
                <x-jet-label for="password" value="{{ __('Password') }}" />
                <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
            </div>

            <div class="block mt-4">
                <label for="remember_me" class="flex items-center">
                    <x-jet-checkbox id="remember_me" name="remember" />
                    <span class="ml-2 text-sm text-gray-600">{{ __('Ghi nhớ') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                    {{ __('Quên mật khẩu?') }}
                </a>
                @endif

                <x-jet-button class="ml-4">
                    {{ __('Đăng Nhập') }}
                </x-jet-button>
            </div>
        </form>
    </x-jet-authentication-card>
</x-guest-layout>

<div style="height: 15px; background-color:#F7444E;">
</div>
<footer>
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="full">
                    <div class="logo_footer">
                        <a href="#"><img width="210" src="/images/cakeshop.png" alt="#" /></a>
                    </div>
                    <div class="information_f">
                        <p><strong>ĐỊA CHỈ:</strong> 46 Quang Trung, Nha Trang </p>
                        <p><strong>TELEPHONE:</strong> 0987664220</p>
                        <p><strong>EMAIL:</strong> banbanhkhk@gmail.com</p>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="row">
                    <div class="col-md-7">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="widget_menu">
                                    <h3>Menu</h3>
                                    <ul>
                                        <li><a href="{{url('/')}}">Trang Chủ</a></li>
                                        <li><a href="{{url('product')}}">Sản Phẩm</a></li>
                                        <li><a href="#">Danh Mục</a></li>
                                        <li><a href="#">Giới Thiệu</a></li>
                                        <li><a href="{{url('lienhe')}}">Liên Hệ</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="widget_menu">
                                    <h3>Tài Khoản</h3>
                                    <ul>
                                        <li><a href="#">Thông Tin</a></li>
                                        <li><a href="{{ route('register') }}">Đăng Xuất</a></li>
                                        <li><a href="{{ route('login') }}">Đăng Nhập</a></li>
                                        <li><a href="{{url('show_cart')}}">Giỏ Hàng</a></li>
                                        <li><a href="{{url('show_order')}}">Đơn Hàng</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="widget_menu">
                            <h3>BẢN TIN</h3>
                            <div class="information_f">
                                <p>Đăng ký nhận bản tin của chúng tôi.</p>
                            </div>
                            <div class="form_sub">
                                <form>
                                    <fieldset>
                                        <div class="field">
                                            <input type="email" placeholder="Enter Your Mail" name="email" />
                                            <input type="submit" value="Đăng Ký" />
                                        </div>
                                    </fieldset>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<div class="cpy_">
    <p class="mx-auto">
        CakeShop.com 2022
    </p>
</div>
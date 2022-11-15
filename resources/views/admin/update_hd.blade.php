<!DOCTYPE html>
<html lang="en">

<head>
    <base href="/public">
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

        label {
            display: inline-block;
            width: 200px;
        }

        .div_design {
            padding-bottom: 15px;
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
                <div class="div_center">
                    @if(session()->has('message'))
                    <div class="alert alert-success" style="text-align: center" x-data="{show:true}" x-init="setTimeout(() => show=false, 3000)" x-show="show">
                        {{session('message')}}
                    </div>
                    @endif

                    <h2 class="h2_font">Cập Nhật Hóa Đơn</h2>


                </div>
                <div class="min-h-screen flex flex-col sm:justify-center items-center pt-1 sm:pt-0 bg-gray-100">
                    <div class="w-full sm:max-w-md px-6 py-4 my-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
                        <form action="{{url('/edit_hoadon', $data->id)}}" method="post" enctype="multipart/form-data">
                            @csrf

                            <div>
                                <x-jet-label for="ngaydat" value="{{ __('Ngày Đặt') }}" />
                                <x-jet-input id="ngaydat" class="block mt-1 w-full input_color" type="date" name="ngaydat" value="{{$data->ngaydat}}" required autocomplete="ngaydat" />
                                @error('ngaydat')
                                <ul class="mt-3 list-disc list-inside text-sm text-red-600">
                                    <li>{{$message}}</li>
                                </ul>
                                @enderror

                            </div>

                            <div class="mt-4">
                                <x-jet-label for="phone" value="{{ __('SĐT') }}" />
                                <x-jet-input id="phone" class="block mt-1 w-full input_color" type="number" name="phone" value="{{$data->phone}}" required />
                                @error('phone')
                                <ul class="mt-3 list-disc list-inside text-sm text-red-600">
                                    <li>{{$message}}</li>
                                </ul>
                                @enderror
                            </div>

                            <div class="mt-4">
                                <x-jet-label for="address" value="{{ __('Địa Chỉ') }}" />
                                <x-jet-input id="address" class="block mt-1 w-full input_color" type="text" name="address" value="{{$data->address}}" required />
                                @error('address')
                                <ul class="mt-3 list-disc list-inside text-sm text-red-600">
                                    <li>{{$message}}</li>
                                </ul>
                                @enderror
                            </div>

                            <div class="mt-4">
                                <x-jet-label for="description" value="{{ __('Mô Tả') }}" />
                                <x-jet-input id="description" class="block mt-1 w-full input_color" type="text" name="description" value="{{$data->description}}" required />
                                @error('description')
                                <ul class="mt-3 list-disc list-inside text-sm text-red-600">
                                    <li>{{$message}}</li>
                                </ul>
                                @enderror
                            </div>

                            <div class="mt-4">
                                <x-jet-label for="tongtien" value="{{ __('Tổng Tiền') }}" />
                                <x-jet-input id="tongtien" class="block mt-1 w-full input_color" type="number" name="tongtien" value="{{$data->tongtien}}" required />
                                @error('tongtien')
                                <ul class="mt-3 list-disc list-inside text-sm text-red-600">
                                    <li>{{$message}}</li>
                                </ul>
                                @enderror
                            </div>

                            <div class="mt-4">
                                <x-jet-label for="user_id" value="{{ __('Người Mua') }}" />

                                <select name="user_id" class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm input_color" required>
                                    <option value="{{$data->user_id}}">{{$data->user->name}}</option>
                                    @foreach ($value as $item)
                                    <option value="{{$item->id}}">
                                        {{$item->name}}
                                    </option>
                                    @endforeach

                                </select>

                                @error('user_id')
                                <ul class="mt-3 list-disc list-inside text-sm text-red-600">
                                    <li>{{$message}}</li>
                                </ul>
                                @enderror
                            </div>

                            <div class="mt-4">
                                <x-jet-label for="trangthai_id" value="{{ __('Trạng Thái') }}" />

                                <select name="trangthai_id" class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm input_color" required>
                                    <option value="{{$data->trangthai_id}}">{{$data->trangthais->name}}</option>
                                    @foreach ($index as $item)
                                    <option value="{{$item->id}}">
                                        {{$item->name}}
                                    </option>
                                    @endforeach

                                </select>

                                @error('trangthai_id')
                                <ul class="mt-3 list-disc list-inside text-sm text-red-600">
                                    <li>{{$message}}</li>
                                </ul>
                                @enderror
                            </div>

                            <div class="mt-4">
                                <x-jet-label for="payment_status" value="{{ __('Thanh Toán') }}" />

                                <select name="payment_status" class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm input_color" required>
                                    <option value="Chưa Thanh Toán">
                                        Chưa Thanh Toán
                                    </option>
                                    <option value="Đã Thanh Toán">
                                        Đã Thanh Toán
                                    </option>



                                </select>
                                @error('payment_status')
                                <p class="mt-3 list-disc list-inside text-sm text-red-600">
                                    {{$message}}
                                </p>
                                @enderror
                            </div>

                            <div class="flex items-center justify-end mt-4">

                                <x-jet-button class="ml-4">
                                    {{ __('Cập Nhập') }}
                                </x-jet-button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- container-scroller -->
        <!-- plugins:js -->
        @include('admin.js')
        <!-- End custom js for this page -->
</body>

</html>
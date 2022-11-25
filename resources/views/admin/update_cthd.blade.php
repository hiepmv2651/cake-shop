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
                    <div class="alert alert-success" style="text-align: center" x-data="{show:true}"
                        x-init="setTimeout(() => show=false, 3000)" x-show="show">
                        {{session('message')}}
                    </div>
                    @endif

                    <h2 class="h2_font">Cập Nhật Chi Tiết Hóa Đơn</h2>


                </div>
                <div class="min-h-screen flex flex-col sm:justify-center items-center pt-1 sm:pt-0 bg-gray-100">
                    <div class="w-full sm:max-w-md px-6 py-4 my-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
                        <form action="{{url('/edit_cthoadon', $data->id)}}" method="post" enctype="multipart/form-data">
                            @csrf

                            <div>
                                <x-jet-label for="quantity" value="{{ __('Số Lượng') }}" />
                                <x-jet-input id="quantity" class="block mt-1 w-full input_color" type="number"
                                    name="quantity" value="{{$data->quantity}}" required autocomplete="quantity" />
                                @error('quantity')
                                <ul class="mt-3 list-disc list-inside text-sm text-red-600">
                                    <li>{{$message}}</li>
                                </ul>
                                @enderror

                            </div>


                            <div class="mt-4">
                                <x-jet-label for="hoadon_id" value="{{ __('Mã Hóa Đơn') }}" />

                                <select name="hoadon_id"
                                    class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm input_color"
                                    required>
                                    <option value="{{$data->hoadon_id}}">{{$data->hoadon_id}}</option>
                                    @foreach ($value as $item)
                                    <option value="{{$item->id}}">
                                        {{$item->id}}
                                    </option>
                                    @endforeach

                                </select>

                                @error('hoadon_id')
                                <ul class="mt-3 list-disc list-inside text-sm text-red-600">
                                    <li>{{$message}}</li>
                                </ul>
                                @enderror
                            </div>

                            <div class="mt-4">
                                <x-jet-label for="Product_id" value="{{ __('Tên Sản Phẩm') }}" />

                                <select name="Product_id"
                                    class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm input_color"
                                    required>
                                    <option value="{{$data->Product_id}}">{{$data->products->title}}</option>
                                    @foreach ($index as $item)
                                    <option value="{{$item->id}}">
                                        {{$item->title}}
                                    </option>
                                    @endforeach

                                </select>

                                @error('Product_id')
                                <ul class="mt-3 list-disc list-inside text-sm text-red-600">
                                    <li>{{$message}}</li>
                                </ul>
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

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
                @if(session()->has('message'))
                <div class="alert alert-success" style="text-align: center" x-data="{show:true}"
                    x-init="setTimeout(() => show=false, 3000)" x-show="show">
                    {{session('message')}}
                </div>
                @endif

                <h2 class="h2_font">Thêm Chi Tiết Hóa Đơn</h2>

                <div class="min-h-screen flex flex-col sm:justify-center items-center pt-1 sm:pt-0 bg-gray-100">
                    <div class="w-full sm:max-w-md px-6 py-4 my-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
                        <form action="{{url('/add_cthoadon')}}" method="post">
                            @csrf

                            <div class="mt-4">
                                <x-jet-label for="quantity" value="{{ __('Số Lượng') }}" />
                                <x-jet-input id="quantity" class="block mt-1 w-full input_color" type="number"
                                    name="quantity" :value="old('quantity')" required />
                                @error('quantity')
                                <p class="mt-3 list-disc list-inside text-sm text-red-600">
                                    {{$message}}
                                </p>
                                @enderror
                            </div>

                            <div class="mt-4">
                                <x-jet-label for="hoadon_id" value="{{ __('Mã Hóa Đơn') }}" />

                                <select name="hoadon_id"
                                    class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm input_color"
                                    required>
                                    @foreach ($data as $value)
                                    <option value="{{$value->id}}">
                                        {{$value->id}}
                                    </option>
                                    @endforeach

                                </select>
                                @error('hoadon_id')
                                <p class="mt-3 list-disc list-inside text-sm text-red-600">
                                    {{$message}}
                                </p>
                                @enderror
                            </div>

                            <div class="mt-4">
                                <x-jet-label for="Product_id" value="{{ __('Tên Sản Phẩm') }}" />

                                <select name="Product_id"
                                    class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm input_color"
                                    required>
                                    @foreach ($index as $value)
                                    <option value="{{$value->id}}">
                                        {{$value->title}}
                                    </option>
                                    @endforeach

                                </select>
                                @error('Product_id')
                                <p class="mt-3 list-disc list-inside text-sm text-red-600">
                                    {{$message}}
                                </p>
                                @enderror
                            </div>

                            <div class="flex items-center justify-end mt-4">

                                <x-jet-button class="ml-4">
                                    {{ __('Thêm') }}
                                </x-jet-button>
                            </div>
                        </form>
                    </div>
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

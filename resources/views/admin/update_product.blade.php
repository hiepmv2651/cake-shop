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

                    <h2 class="h2_font">Sửa Thông Tin Sản Phẩm</h2>


                </div>
                <div class="min-h-screen flex flex-col sm:justify-center items-center pt-1 sm:pt-0 bg-gray-100">
                    <div class="w-full sm:max-w-md px-6 py-4 my-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
                        <form action="{{url('/edit_product', $data->id)}}" method="post" enctype="multipart/form-data">
                            @csrf

                            <div>
                                <x-jet-label for="title" value="{{ __('Tên') }}" />
                                <x-jet-input id="title" class="block mt-1 w-full input_color" type="text" name="title"
                                    value="{{$data->title}}" required autocomplete="title" />
                                @error('title')
                                <ul class="mt-3 list-disc list-inside text-sm text-red-600">
                                    <li>{{$message}}</li>
                                </ul>
                                @enderror

                            </div>

                            <div class="mt-4">
                                <x-jet-label for="description" value="{{ __('Mô Tả') }}" />
                                <x-jet-input id="description" class="block mt-1 w-full input_color" type="text"
                                    name="description" value="{{$data->description}}" required />
                                @error('description')
                                <ul class="mt-3 list-disc list-inside text-sm text-red-600">
                                    <li>{{$message}}</li>
                                </ul>
                                @enderror
                            </div>

                            <div class="mt-4">
                                <x-jet-label for="image" value="{{ __('Hình') }}" />
                                <img style="margin: auto" height="100px" width="100px"
                                    src="{{asset('storage/'.$data->image)}}" alt="">
                                <x-jet-input id="image" class="block mt-1 w-full input_color" type="file"
                                    name="image" />
                                @error('image')
                                <ul class="mt-3 list-disc list-inside text-sm text-red-600">
                                    <li>{{$message}}</li>
                                </ul>
                                @enderror
                            </div>

                            <div class="mt-4">
                                <x-jet-label for="price" value="{{ __('Giá') }}" />
                                <x-jet-input id="price" class="block mt-1 w-full input_color" type="number" name="price"
                                    value="{{$data->price}}" required />
                                @error('price')
                                <ul class="mt-3 list-disc list-inside text-sm text-red-600">
                                    <li>{{$message}}</li>
                                </ul>
                                @enderror
                            </div>

                            <div class="mt-4">
                                <x-jet-label for="category" value="{{ __('Loại Bánh') }}" />

                                <select name="category"
                                    class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm input_color"
                                    required>
                                    <option value="{{$data->category}}">{{$data->category}}</option>
                                    @foreach ($value as $item)
                                    <option value="{{$item->category_name}}">
                                        {{$item->category_name}}
                                    </option>
                                    @endforeach

                                </select>

                                @error('category')
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
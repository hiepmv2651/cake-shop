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

                    <h2 class="h2_font">Sửa Thông Tin Trạng Thái</h2>


                </div>
                <div class="min-h-screen flex flex-col sm:justify-center items-center pt-1 sm:pt-0 bg-gray-100">
                    <div class="w-full sm:max-w-md px-6 py-4 my-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
                        <form action="{{url('/edit_status', $data->id)}}" method="post" enctype="multipart/form-data">
                            @csrf

                            <div>
                                <x-jet-label for="title" value="{{ __('Tên') }}" />
                                <x-jet-input id="title" class="block mt-1 w-full input_color" type="text" name="name"
                                    value="{{$data->name}}" required autocomplete="title" />
                                @error('name')
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

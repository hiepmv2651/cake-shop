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
                @if (session()->has('message'))
                    <div class="alert alert-success" style="text-align: center" x-data="{ show: true }"
                        x-init="setTimeout(() => show = false, 3000)" x-show="show">
                        {{ session('message') }}
                    </div>
                @endif

                <h2 class="h2_font">Thêm User</h2>

                <div class="min-h-screen flex flex-col sm:justify-center items-center pt-1 sm:pt-0 bg-gray-100">
                    <div class="w-full sm:max-w-md px-6 py-4 my-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
                        <form method="POST" action="{{ url('/create_user') }}">
                            @csrf

                            <div>
                                <x-jet-label for="name" value="{{ __('Tên') }}" />
                                <x-jet-input id="name" class="block mt-1 w-full input_color" type="text"
                                    name="name" :value="old('name')" required autofocus autocomplete="name" />
                                @error('name')
                                    <p class="mt-3 list-disc list-inside text-sm text-red-600">
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>

                            <div class="mt-4">
                                <x-jet-label for="email" value="{{ __('Email') }}" />
                                <x-jet-input id="email" class="block mt-1 w-full input_color" type="email"
                                    name="email" :value="old('email')" required />
                                @error('email')
                                    <p class="mt-3 list-disc list-inside text-sm text-red-600">
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>

                            <div class="mt-4">
                                <x-jet-label for="phone" value="{{ __('Số Điện Thoại') }}" />
                                <x-jet-input id="phone" class="block mt-1 w-full input_color" type="number"
                                    name="phone" :value="old('phone')" required />
                                @error('phone')
                                    <p class="mt-3 list-disc list-inside text-sm text-red-600">
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>

                            <div class="mt-4">
                                <x-jet-label for="address" value="{{ __('Địa Chỉ') }}" />
                                <x-jet-input id="address" class="block mt-1 w-full input_color" type="text"
                                    name="address" :value="old('address')" required />
                                @error('address')
                                    <p class="mt-3 list-disc list-inside text-sm text-red-600">
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>

                            <div class="mt-4">
                                <x-jet-label for="usertype" value="{{ __('Quyền Người Dùng') }}" />

                                <select name="usertype"
                                    class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm input_color"
                                    required>
                                    <option value="0">Khách Hàng</option>
                                    <option value="2" @if (old('usertype') == 2) selected @endif>Nhân Viên
                                    </option>
                                </select>
                                @error('usertype')
                                    <p class="mt-3 list-disc list-inside text-sm text-red-600">
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>

                            <div class="mt-4">
                                <x-jet-label for="gender" value="{{ __('Giới Tính') }}" />

                                <select name="gender"
                                    class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm input_color"
                                    required>
                                    <option value="1">Nam</option>
                                    <option value="2" @if (old('gender') == 2) selected @endif>Nữ</option>
                                </select>
                                @error('gender')
                                    <p class="mt-3 list-disc list-inside text-sm text-red-600">
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>

                            <div class="mt-4">
                                <x-jet-label for="password" value="{{ __('Mật Khẩu') }}" />
                                <x-jet-input id="password" class="block mt-1 w-full input_color" type="password"
                                    name="password" required autocomplete="new-password" />
                                @error('password')
                                    <p class="mt-3 list-disc list-inside text-sm text-red-600">
                                        {{ $message }}
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

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <base href="/public">
    @include('admin.css')
    <style type="text/css">
        label {
            display: inline-block;
            width: 150px;
            font-size: 15px;
            font-weight: bold;
        }

        .input_color {
            color: black;
        }
    </style>
</head>

<body>
    <div class="container-scroller">
        <!-- partial:partials/_sidebar.html -->
        @include('admin.sidebar')
        <!-- partial -->
        @include('admin.header')
        <!-- partial -->
        <div class="main-panel">
            <div class="content-wrapper">
                <h2 style="text-align: center">Send Email to {{$user->email}}</h2>
                <div class="min-h-screen flex flex-col sm:justify-center items-center pt-1 sm:pt-0 bg-gray-100">
                    <div class="w-full sm:max-w-md px-6 py-4 my-4 bg-white shadow-md overflow-hidden sm:rounded-lg">

                        <form action="{{url('send_user_email', $user->id)}}" method="POST">
                            @csrf

                            <div>
                                <x-jet-label for="" value="{{ __('Email Greeting') }}" />
                                <x-jet-input id="greeting" class="block mt-1 w-full input_color" type="text"
                                    name="greeting" :value="old('ngaydat')" required autofocus
                                    autocomplete="greeting" />
                                @error('greeting')
                                <p class="mt-3 list-disc list-inside text-sm text-red-600">
                                    {{$message}}
                                </p>
                                @enderror

                            </div>

                            <div class="mt-4">
                                <x-jet-label for="" value="{{ __('Email Firstling') }}" />
                                <x-jet-input id="firstline" class="block mt-1 w-full input_color" type="text"
                                    name="firstline" :value="old('firstline')" required />
                                @error('firstline')
                                <p class="mt-3 list-disc list-inside text-sm text-red-600">
                                    {{$message}}
                                </p>
                                @enderror
                            </div>

                            <div class="mt-4">
                                <x-jet-label for="" value="{{ __('Email Body') }}" />
                                <x-jet-input id="body" class="block mt-1 w-full input_color" type="text" name="body"
                                    :value="old('body')" required />
                                @error('body')
                                <p class="mt-3 list-disc list-inside text-sm text-red-600">
                                    {{$message}}
                                </p>
                                @enderror
                            </div>

                            <div class="mt-4">
                                <x-jet-label for="" value="{{ __('Email Button') }}" />
                                <x-jet-input id="button" class="block mt-1 w-full input_color" type="text" name="button"
                                    :value="old('button')" required />
                                @error('button')
                                <p class="mt-3 list-disc list-inside text-sm text-red-600">
                                    {{$message}}
                                </p>
                                @enderror
                            </div>

                            <div class="mt-4">
                                <x-jet-label for="" value="{{ __('Email Url') }}" />
                                <x-jet-input id="url" class="block mt-1 w-full input_color" type="text" name="url"
                                    :value="old('url')" required />
                                @error('url')
                                <p class="mt-3 list-disc list-inside text-sm text-red-600">
                                    {{$message}}
                                </p>
                                @enderror
                            </div>

                            <div class="mt-4">
                                <x-jet-label for="" value="{{ __('Email Last Line') }}" />
                                <x-jet-input id="lastline" class="block mt-1 w-full input_color" type="text"
                                    name="lastline" :value="old('lastline')" required />
                                @error('lastline')
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
        <!-- container-scroller -->
        <!-- plugins:js -->
        @include('admin.js')
        <!-- End custom js for this page -->
</body>

</html>
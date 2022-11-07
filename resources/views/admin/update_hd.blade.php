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

                    <h2 class="h2_font">Edit product</h2>

                    <form action="{{url('/edit_product', $data->id)}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="div_design">
                            <label>Product title</label>
                            <input class="input_color" type="text" value="{{$data->title}}" name="title"
                                placeholder="Write the title" required>
                            @error('title')
                            <p style="color: red; margin-top: 10px;">{{$message}}</p>
                            @enderror
                        </div>

                        <div class="div_design">
                            <label>Product description:</label>
                            <input class="input_color" type="text" value="{{$data->description}}" name="description"
                                placeholder="Write the description" required>
                            @error('description')
                            <p style="color: red; margin-top: 10px;">{{$message}}</p>
                            @enderror
                        </div>

                        <div class="div_design">
                            <label>Product price:</label>
                            <input class="input_color" type="number" value="{{$data->price}}" name="price"
                                placeholder="Write the price" required>
                            @error('price')
                            <p style="color: red; margin-top: 10px;">{{$message}}</p>
                            @enderror
                        </div>

                        <div class="div_design">
                            <label>Product category:</label>
                            <select name="category" class="input_color" required>
                                <option value="{{$data->category}}">{{$data->category}}</option>
                                @foreach ($value as $item)
                                <option value="{{$item->category_name}}">
                                    {{$item->category_name}}
                                </option>
                                @endforeach
                            </select>
                            @error('category')
                            <p style="color: red; margin-top: 10px;">{{$message}}</p>
                            @enderror
                        </div>

                        <div class="div_design">
                            <label>Product image:</label>
                            <img style="margin: auto" height="100px" width="100px"
                                src="{{asset('storage/'.$data->image)}}" alt="">
                            <input type="file" name="image">
                            @error('image')
                            <p style="color: red; margin-top: 10px;">{{$message}}</p>
                            @enderror
                        </div>

                        <div class="div_design">
                            <input type="submit" value="Edit Product" class="btn btn-primary">
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- container-scroller -->
        <!-- plugins:js -->
        @include('admin.js')
        <!-- End custom js for this page -->
</body>

</html>
<!DOCTYPE html>
<html>

<head>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"
        integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.9.3/css/bulma.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bulma.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/select/1.4.0/css/select.dataTables.min.css">

    @include('home.css')

    <style>
        #overlay,
        #overlay1 {
            position: fixed;
            display: none;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: rgba(0, 0, 0, 0.5);
            z-index: 2;
            cursor: pointer;
        }

        #text {
            position: absolute;
            top: 50%;
            left: 50%;
            font-size: 50px;
            color: white;
            transform: translate(-50%, -50%);
            -ms-transform: translate(-50%, -50%);
        }
    </style>
</head>

<body>
    @include('sweetalert::alert')
    <div class="hero_area">
        <!-- header section strats -->
        @include('home.header')

        <!-- end header section -->

        @if (session()->has('message'))
            <div class="alert alert-success" style="text-align: center" x-data="{ show: true }" x-init="setTimeout(() => show = false, 6000)"
                x-show="show">
                {{ session('message') }}
            </div>
        @endif

        <br>
        <form method="POST">
            @csrf

            <div style=" width: 90%; margin-left: auto; margin-right: auto;">

                <input type="button" value="Chọn tất cả" id="selectAll"
                    style="width: 165px; height: 38px; background-color: #80BDE3" class="btn btn-primary" />

                <input type="button" value="Bỏ chọn tất cả" id="removeAll"
                    style="width: 165px; height: 38px; background-color: red" class="btn btn-danger" />
                <input type="button" onclick="on()" id="btn"
                    style="text-align: center; background-color: orange; width: 165px" class="btn btn-danger"
                    value="Thanh Toán">

                <table id="example" class="table is-striped" style="width:100%">
                    <thead>
                        <tr>
                            <th></th>
                            <th>STT</th>
                            <th>Tên Sản Phẩm</th>
                            <th>Ảnh</th>
                            <th>Số Lượng</th>
                            <th>Giá</th>
                            <th>Hành Động</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($cart as $value)
                            @php
                                $quantity = 0;
                            @endphp
                            <tr>
                                <td><input type="checkbox" class="selectbox" id="clear" value="{{ $value->id }}"
                                        name="ids[]">
                                </td>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $value->products->title }}</td>
                                <td><img src="{{ asset('storage/' . $value->image) }}" height="80px" width="150"
                                        alt=""></td>
                                <td>{{ $value->quantity }}</td>
                                <td>{{ $value->price }} VNĐ</td>
                                <td>
                                    <a onclick="on1()" style="color: white" class="btn btn-primary">Cập Nhật</a>

                                    <a onclick="confirmation(event)" href="{{ url('delete_cart', $value->id) }}"
                                        class="btn btn-danger">Xóa</a>
                                </td>
                            </tr>
                            <div id="overlay1">
                                <div
                                    class="min-h-screen flex flex-col sm:justify-center items-center pt-1 sm:pt-0 bg-gray-100">
                                    <div
                                        class="w-full sm:max-w-md px-6 py-4 my-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
                                        <div
                                            style="margin-left: auto; margin-right: auto; text-align: center; padding-bottom: 20px"">
                                            <h1 style=" font-size: 25px; padding-bottom: 5px">Cập Nhập Số Lượng Sản
                                                Phẩm</h1>
                                        </div>

                                        <h2 style=" font-size: 20px; padding-bottom: 15px; text-align:center">
                                            {{ $cart[$quantity]->products->title }}</h2>
                                        <img src="{{ asset('storage/' . $value->image) }}" height="80px" width="150"
                                            style="margin-left: auto;
                                    margin-right: auto;display: block;"
                                            alt="">
                                        <h2 style=" font-size: 20px; padding-bottom: 15px; text-align:center">
                                            Giá tiền: {{ $cart[$quantity]->products->price }} VNĐ</h2>
                                        <input id="myInput3" type="number" min="1" max="20"
                                            class="input_color" required name="quantity[]"
                                            value="{{ $cart[$quantity]->quantity }}">
                                        @error('quantity[]')
                                            <p class="mt-3 list-disc list-inside text-sm text-red-600">
                                                {{ $message }}
                                            </p>
                                        @enderror

                                        <div
                                            style="display: flex;
                                    justify-content: center;
                                    align-items: center;
                                    ">
                                            @method('PUT')
                                            <button id="btn1"
                                                style="margin-top: 10px; display: block;
                                        margin-left: auto;
                                        margin-right: auto;
                                        width: 40%; background-color: red"
                                                type="button" class=" btn btn-danger" onclick="off1()">Đóng</button>
                                            <button
                                                style="margin-top: 10px; display: block;
                                        margin-left: auto;
                                        margin-right: auto;
                                        width: 40%; background-color: blue"
                                                type="submit" class=" btn btn-primary"
                                                formaction="{{ url('capnhat_cart', [$value->id, $quantity]) }}">Cập
                                                Nhật</button>

                                        </div>

                                    </div>
                                </div>
                            </div>
                            @php
                                $quantity = 1;
                            @endphp
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th colspan="6" style="text-align:right">Tổng Tiền:</th>
                            <th></th>
                        </tr>
                    </tfoot>
                </table>

                <div>
                    @method('DELETE')
                    <button id="myBtn2" disabled formaction="{{ url('delete_select') }}" type="submit"
                        style="background-color: red; margin-bottom: 15px" class="btn btn-danger">Xóa Toàn
                        Bộ Sản Phẩm
                    </button>
                </div>
            </div>
            <div id="overlay">
                <div class="min-h-screen flex flex-col sm:justify-center items-center pt-1 sm:pt-0 bg-gray-100">
                    <div class="w-full sm:max-w-md px-6 py-4 my-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
                        <div style="margin-left: auto; margin-right: auto; text-align: center; padding-bottom: 20px"">
                            <h1 style=" font-size: 25px; padding-bottom: 15px">Hãy tích vào sản phẩm cần thanh toán
                                trước
                                khi nhấn
                                vào phương thức thanh toán</h1>
                        </div>

                        @method('PUT')
                        @csrf
                        <input id="myInput1" type="text" class="input_color" name="address"
                            placeholder="Nhập địa chỉ giao hàng">
                        @error('address')
                            <p class="mt-3 list-disc list-inside text-sm text-red-600">
                                {{ $message }}
                            </p>
                        @enderror
                        <input id="myInput2" type="number" class="input_color" name="phone"
                            placeholder="Nhập số điện thoại liên hệ">
                        @error('phone')
                            <p class="mt-3 list-disc list-inside text-sm text-red-600">
                                {{ $message }}
                            </p>
                        @enderror
                        <div>
                            <div
                                style="margin-left: auto; margin-right: auto; text-align: center; padding-bottom: 20px"">
                                <h1 style=" font-size: 25px; padding-bottom: 15px">Chọn Phương Thức Thanh Toán</h1>
                                <input id="thanhtoan" type="hidden" name="thanhtoan" value="" />

                                <button id="myBtn" onclick="pay()" disabled formaction="{{ url('cash_order') }}"
                                    class="btn btn-danger">Cash On
                                    Delivery</button>
                                <button id="myBtn1" disabled formaction="{{ url('stripe') }}" onclick="pay()"
                                    class="btn btn-danger">Pay
                                    Using
                                    Card</button>
                            </div>
                        </div>
                        <button id="btn1"
                            style="margin-top: 10px; display: block;
                            margin-left: auto;
                            margin-right: auto;
                            width: 40%; background-color: red"
                            type="button" class=" btn btn-danger" onclick="off()">Đóng</button>

                    </div>
                </div>
            </div>
        </form>
    </div>
    <!-- footer start -->
    @include('home.footer')
    <!-- footer end -->
    </div>
    <script>
        if (window.history.replaceState) {
            window.history.replaceState(null, null, window.location.href);
        }
    </script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/select/1.4.0/js/dataTables.select.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bulma.min.js"></script>
    <script>
        var totalprice;
        $(document).ready(function() {
            var table = $('#example').DataTable({
                "language": {
                    "lengthMenu": " _MENU_ ",
                    "zeroRecords": "Không tìm thấy",
                    "info": "Hiển thị trang _PAGE_ / _PAGES_",
                    "infoEmpty": "Không có dữ liệu",
                    "infoFiltered": "(Được lọc từ _MAX_ mục)",
                    "search": "Tìm kiếm:",
                    "paginate": {
                        "first": "Trang đầu",
                        "last": "Trang cuối",
                        "next": "Sau",
                        "previous": "Trước",
                    },
                    buttons: {
                        colvis: 'Chọn mục không xuất',
                    },
                    select: {
                        rows: " (%d dòng được chọn)"
                    }
                },
                "lengthMenu": [
                    [10, 25, 50, -1],
                    [10, 25, 50, "All"]
                ],
                select: true,
                columnDefs: [{
                    orderable: false,
                    className: 'select-checkbox',
                }],
                select: {
                    style: 'multi',
                    selector: 'td input:first-child'
                },
                order: [
                    [1, 'asc']
                ],
                footerCallback: function(row, data, start, end, display) {
                    var api = this.api();

                    // Remove the formatting to get integer data for summation
                    var intVal = function(i) {
                        return typeof i === 'string' ? i.replace(/[\VNĐ,]/g, '') * 1 : typeof i ===
                            'number' ? i : 0;
                    };
                    total = api
                        .column(5)
                        .data()
                        .reduce(function(a, b) {
                            return intVal(a) + intVal(b);
                        }, 0);

                    // Total over this page
                    pageTotal = api.rows({
                        selected: true
                    }).data().pluck(5).reduce(function(a, b) {
                        return intVal(a) + intVal(b);
                    }, 0);

                    totalprice = pageTotal
                    // Update footer
                    $(api.column(6).footer()).html(pageTotal + ' VNĐ' + ' (' + total + ' VNĐ)');
                },
            });

            $("#selectAll").on("click", function(e) {
                $('.selectbox').prop('checked', true);
                table.rows().select();
                table.draw();
            });
            $("#removeAll").on("click", function() {
                $('.selectbox').prop('checked', false);
                table.rows().deselect();
                table.draw();
            });

            table.on('select deselect', function() {
                $('#myBtn, #myBtn1, #myBtn2').prop('disabled', !table.rows('.selected').count());
                table.draw();
            })

        });

        function pay() {
            document.getElementById('thanhtoan').value = totalprice;
            $(document).ready(function() {
                var table = $('#example').DataTable();
                $('.selectbox').prop('checked', false);
                table.rows().deselect();
                table.draw();
                document.getElementById('myInput1').value = '';
                document.getElementById('myInput2').value = '';
            });
        }
    </script>

    <script>
        function confirmation(ev) {
            ev.preventDefault();
            var urlToRedirect = ev.currentTarget.getAttribute('href');
            console.log(urlToRedirect);
            swal({
                    title: "Bạn có chắc chắn hủy sản phẩm này không?",
                    text: "Bạn sẽ không thể hoàn nguyên điều này!",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willCancel) => {
                    if (willCancel) {
                        window.location.href = urlToRedirect;
                    }
                });
        }
    </script>
    <script>
        function on() {
            document.getElementById("overlay").style.display = "block";
        }

        function off() {
            document.getElementById('myInput1').value = ''
            document.getElementById('myInput2').value = ''
            document.getElementById("overlay").style.display = "none";
        }

        function on1() {
            document.getElementById("overlay1").style.display = "block";
        }

        function off1() {
            document.getElementById('myInput3').value = ''
            document.getElementById("overlay1").style.display = "none";
        }
    </script>
    <!-- jQery -->
    <!-- popper js -->
    <script src="home/js/popper.min.js"></script>
    <!-- bootstrap js -->
    <script src="home/js/bootstrap.js"></script>
    <!-- custom js -->
    <script src="home/js/custom.js"></script>
</body>

</html>

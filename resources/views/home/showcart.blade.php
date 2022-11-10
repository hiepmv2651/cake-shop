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
</head>

<body>
    @include('sweetalert::alert')
    <div class="hero_area">
        <!-- header section strats -->
        @include('home.header')
        <!-- end header section -->

        @if(session()->has('message'))
        <div class="alert alert-success" style="text-align: center" x-data="{show:true}"
            x-init="setTimeout(() => show=false, 3000)" x-show="show">
            {{session('message')}}
        </div>
        @endif

        <form method="POST">
            @csrf

            <div style="width: 90%; margin-left: auto; margin-right: auto;">

                <input type="button" value="Chọn tất cả" id="selectAll"
                    style="width: 165px; height: 38px; background-color: #80BDE3" class="btn btn-primary" />

                <input type="button" value="Bỏ chọn tất cả" id="removeAll"
                    style="width: 165px; height: 38px; background-color: red" class="btn btn-danger" />
                <table id="example" class="table is-striped" style="width:100%">
                    <thead>
                        <tr>
                            <th></th>
                            <th>Tên Sản Phẩm</th>
                            <th>Ảnh</th>
                            <th>Số Lượng</th>
                            <th>Giá</th>
                            <th>Hành Động</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($cart as $value)
                        <tr>
                            <td><input type="checkbox" class="selectbox" value="{{$value->id}}" name="ids[]">
                            </td>
                            <td>{{$value->products->title}}</td>
                            <td><img src="{{asset('storage/'.$value->image)}}" height="80px" width="150" alt=""></td>
                            <td>{{$value->quantity}}</td>
                            <td>${{$value->price}}</td>
                            <td>
                                <a onclick="confirmation(event)" href="{{url('delete_cart', $value->id)}}"
                                    class="btn btn-danger">Xóa</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th colspan="5" style="text-align:right">Tổng Tiền:</th>
                            <th></th>
                        </tr>
                    </tfoot>
                </table>
                <div>
                    <div style="margin-left: auto; margin-right: auto; text-align: center; padding-bottom: 20px"">
                        <h1 style=" font-size: 25px; padding-bottom: 15px">Chọn Phương Thức Thanh Toán</h1>
                        <input id="thanhtoan" type="hidden" name="thanhtoan" value="" />

                        <button id="myBtn" onclick="pay()" disabled formaction="{{url('cash_order')}}"
                            class="btn btn-danger">Cash On
                            Delivery</button>
                        <button id="myBtn1" disabled formaction="{{url('stripe')}}" onclick="pay()"
                            class="btn btn-danger">Pay
                            Using
                            Card</button>
                    </div>
                </div>
                <div>
                    @method('DELETE')
                    <button id="myBtn2" disabled formaction="{{url('delete_select')}}" type="submit"
                        style="background-color: red" class="btn btn-danger">Xóa Toàn Bộ Sản Phẩm
                    </button>
                </div>

            </div>
        </form>
    </div>

    <!-- footer start -->
    @include('home.footer')
    <!-- footer end -->
    </div>
    
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/select/1.4.0/js/dataTables.select.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bulma.min.js"></script>

    <script>
        var totalprice;
        $(document).ready(function () {
    var table = $('#example').DataTable({
        select: true,
                columnDefs: [{
                    orderable: false,
                    className: 'select-checkbox',
                }],
                select: {
                    style: 'multi',
                    selector: 'td input:first-child'
                },
                order: [[1, 'asc']],
        footerCallback: function (row, data, start, end, display) {
            var api = this.api();
 
            // Remove the formatting to get integer data for summation
            var intVal = function (i) {
                return typeof i === 'string' ? i.replace(/[\$,]/g, '') * 1 : typeof i === 'number' ? i : 0;
            };

            total = api
                .column(3)
                .data()
                .reduce(function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0);
 
            // Total over this page
            pageTotal = api.rows({ selected: true }).data().pluck(3).reduce(function (a, b) {
                        return intVal(a) + intVal(b);
                    }, 0);
                
                totalprice = pageTotal
            // Update footer
            $(api.column(5).footer()).html('$' + pageTotal + ' ( $' + total + ' total)');
        },
    });
    $("#selectAll").on("click", function (e) {
                $('.selectbox').prop('checked', true);
                table.rows().select();
                table.draw();
            });


            $("#removeAll").on("click", function () {
                $('.selectbox').prop('checked', false);
                table.rows().deselect();
                table.draw();
            });
            
            table.on('select deselect', function () {
                $('#myBtn, #myBtn1, #myBtn2').prop('disabled', !table.rows( '.selected' ).count());
                table.draw();
            })
            
});

function pay() {
    document.getElementById('thanhtoan').value = totalprice;
          
        }
    </script>
    <script>
        $('.selectall').click(function(){
            $('.selectbox').prop('checked', $(this).prop('checked'));
        });

        $('.selectbox').change(function(){
            var total = $('.selectbox').length;
            var number = $('.selectbox:checked').length;
            if(total == number) {
                $('.selectall').prop('checked', true);
            }
            else {
                $('.selectall').prop('checked', false);

            }

        });
    </script>

    <script>
        function confirmation(ev) {
          ev.preventDefault();
          var urlToRedirect = ev.currentTarget.getAttribute('href');  
          console.log(urlToRedirect); 
          swal({
              title: "Are you sure to cancel this product",
              text: "You will not be able to revert this!",
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
    <!-- jQery -->
    <!-- popper js -->
    <script src="home/js/popper.min.js"></script>
    <!-- bootstrap js -->
    <script src="home/js/bootstrap.js"></script>
    <!-- custom js -->
    <script src="home/js/custom.js"></script>

</body>

</html>
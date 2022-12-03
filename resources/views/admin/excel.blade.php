<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    @include('admin.css')
    <style>
        .div_center {
            text-align: center;

        }

        .h2_font {
            font-size: 40px;
            padding-bottom: 40px;
            text-align: center;
        }

        .dataTables_length select {
            background-color: white !important;
        }

        .dataTables_info {
            color: black !important;
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

                <div class="w-full px-6 py-4 my-4 bg-white shadow-md overflow-hidden sm:rounded-lg">

                    <table id="example" class="table is-striped" style="width:100%" style="background-color: white">
                        <thead>
                            <tr>
                                <th>Mã HĐ</th>
                                <th>Ngày Đặt</th>
                                <th>SĐT</th>
                                <th>Địa Chỉ</th>
                                <th>Ghi Chú</th>
                                <th>Tên Khách Hàng</th>
                                <th>Trạng Thái</th>
                                <th>Thanh Toán</th>
                                <th>Tổng Tiền</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($value as $value)
                                <tr>
                                    <td>{{ $value->id }}</td>
                                    <td>{{ $value->ngaydat }}</td>
                                    <td>{{ $value->phone }}</td>
                                    <td>{{ $value->address }}</td>
                                    <td>{{ $value->description }}</td>

                                    <td>{{ $value->user_id }}</td>
                                    <td>{{ $value->trangthai_id }}</td>
                                    <td>{{ $value->payment_status }}</td>
                                    <td>{{ number_format($value->tongtien) }} VNĐ</td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>

                </div>

                @for ($i = 0; $i < count($item); $i++)
                    <div class="w-full px-6 py-4 my-4 bg-white shadow-md overflow-hidden sm:rounded-lg">

                        <table id="example{{ _($i + 2) }}" class="table is-striped" style="width:100%"
                            style="background-color: white" data-rowonetitle="Chi Tiết Hóa Đơn {{ _($data[$i]) }}"
                            data-sheetname="Chi Tiết Hóa Đơn {{ _($data[$i]) }}">
                            <thead>
                                <tr>
                                    <th>STT</th>
                                    <th>Mã CTHĐ</th>
                                    <th>Giá Tiền</th>
                                    <th>Số Lượng</th>
                                    <th>Mã Hóa Đơn</th>
                                    <th>Tên Sản Phẩm</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($item[$i] as $value)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $value->id }}</td>
                                        <td>{{ number_format($value->price) }} VNĐ</td>
                                        <td>{{ $value->quantity }}</td>
                                        <td>{{ $value->orders->id }}</td>
                                        <td>{{ $value->products->title }}</td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>

                    </div>
                @endfor
            </div>
        </div>

        <!-- container-scroller -->
        <!-- plugins:js -->
        <script src="admin/assets/vendors/js/vendor.bundle.base.js"></script>

        <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
        <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bulma.min.js"></script>
        <script type="text/javascript" src="https://cdn.datatables.net/buttons/2.2.3/js/dataTables.buttons.min.js"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
        <script type="text/javascript" src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.html5.min.js"></script>
        <script>
            $(document).ready(function() {
                function getHeaderNames(table) {
                    // Gets header names.
                    //params:
                    //  table: table ID.
                    //Returns:
                    //  Array of column header names.

                    var header = $(table).DataTable().columns().header().toArray();

                    var names = [];
                    header.forEach(function(th) {
                        names.push($(th).html());
                    });

                    return names;
                }

                function buildCols(data) {
                    // Builds cols XML.
                    //To do: define widths for each column.
                    //Params:
                    //  data: row data.
                    //Returns:
                    //  String of XML formatted column widths.

                    var cols = '<cols>';

                    for (i = 0; i < data.length; i++) {
                        colNum = i + 1;
                        cols += '<col min="' + colNum + '" max="' + colNum + '" width="20" customWidth="1"/>';
                    }

                    cols += '</cols>';

                    return cols;
                }

                function buildRow(data, rowNum, styleNum) {
                    // Builds row XML.
                    //Params:
                    //  data: Row data.
                    //  rowNum: Excel row number.
                    //  styleNum: style number or empty string for no style.
                    //Returns:
                    //  String of XML formatted row.

                    var style = styleNum ? ' s="' + styleNum + '"' : '';

                    var row = '<row r="' + rowNum + '">';

                    for (i = 0; i < data.length; i++) {
                        colNum = (i + 10).toString(36).toUpperCase(); // Convert to alpha

                        var cr = colNum + rowNum;

                        row += '<c t="inlineStr" r="' + cr + '"' + style + '>' +
                            '<is>' +
                            '<t>' + data[i] + '</t>' +
                            '</is>' +
                            '</c>';
                    }

                    row += '</row>';

                    return row;
                }

                function getTableData(table, title) {
                    // Processes Datatable row data to build sheet.
                    //Params:
                    //  table: table ID.
                    //  title: Title displayed at top of SS or empty str for no title.
                    //Returns:
                    //  String of XML formatted worksheet.

                    var header = getHeaderNames(table);
                    var table = $(table).DataTable();
                    var rowNum = 1;
                    var mergeCells = '';
                    var ws = '';

                    ws += buildCols(header);
                    ws += '<sheetData>';

                    if (title.length > 0) {
                        ws += buildRow([title], rowNum, 51);
                        rowNum++;

                        mergeCol = ((header.length - 1) + 10).toString(36).toUpperCase();

                        mergeCells = '<mergeCells count="1">' +
                            '<mergeCell ref="A1:' + mergeCol + '1"/>' +
                            '</mergeCells>';
                    }

                    ws += buildRow(header, rowNum, 2);
                    rowNum++;

                    // Loop through each row to append to sheet.
                    table.rows().every(function(rowIdx, tableLoop, rowLoop) {
                        var data = this.data();

                        // If data is object based, then it needs to be converted
                        // to an array before sending to buildRow()
                        ws += buildRow(data, rowNum, '');

                        rowNum++;
                    });

                    ws += '</sheetData>' + mergeCells;

                    return ws;

                }

                function setSheetName(xlsx, name) {
                    // Changes tab title for sheet.
                    //Params:
                    //  xlsx: xlxs worksheet object.
                    //  name: name for sheet.

                    if (name.length > 0) {
                        var source = xlsx.xl['workbook.xml'].getElementsByTagName('sheet')[0];
                        source.setAttribute('name', name);
                    }
                }

                function addSheet(xlsx, table, title, name, sheetId) {
                    //Clones sheet from Sheet1 to build new sheet.
                    //Params:
                    //  xlsx: xlsx object.
                    //  table: table ID.
                    //  title: Title for top row or blank if no title.
                    //  name: Name of new sheet.
                    //  sheetId: string containing sheetId for new sheet.
                    //Returns:
                    //  Updated sheet object.

                    //Add sheet2 to [Content_Types].xml => <Types>
                    //============================================
                    var source = xlsx['[Content_Types].xml'].getElementsByTagName('Override')[1];
                    var clone = source.cloneNode(true);
                    clone.setAttribute('PartName', '/xl/worksheets/sheet' + sheetId + '.xml');
                    xlsx['[Content_Types].xml'].getElementsByTagName('Types')[0].appendChild(clone);

                    //Add sheet relationship to xl/_rels/workbook.xml.rels => Relationships
                    //=====================================================================
                    var source = xlsx.xl._rels['workbook.xml.rels'].getElementsByTagName('Relationship')[0];
                    var clone = source.cloneNode(true);
                    clone.setAttribute('Id', 'rId' + sheetId + 1);
                    clone.setAttribute('Target', 'worksheets/sheet' + sheetId + '.xml');
                    xlsx.xl._rels['workbook.xml.rels'].getElementsByTagName('Relationships')[0].appendChild(clone);

                    //Add second sheet to xl/workbook.xml => <workbook><sheets>
                    //=========================================================
                    var source = xlsx.xl['workbook.xml'].getElementsByTagName('sheet')[0];
                    var clone = source.cloneNode(true);
                    clone.setAttribute('name', name);
                    clone.setAttribute('sheetId', sheetId);
                    clone.setAttribute('r:id', 'rId' + sheetId + 1);
                    xlsx.xl['workbook.xml'].getElementsByTagName('sheets')[0].appendChild(clone);

                    //Add sheet2.xml to xl/worksheets
                    //===============================
                    var newSheet = '<?xml version="1.0" encoding="UTF-8" standalone="yes"?>' +
                        '<worksheet xmlns="http://schemas.openxmlformats.org/spreadsheetml/2006/main" xmlns:r="http://schemas.openxmlformats.org/officeDocument/2006/relationships" xmlns:mc="http://schemas.openxmlformats.org/markup-compatibility/2006" xmlns:x14ac="http://schemas.microsoft.com/office/spreadsheetml/2009/9/ac" mc:Ignorable="x14ac">' +
                        getTableData(table, title) +

                        '</worksheet>';

                    xlsx.xl.worksheets['sheet' + sheetId + '.xml'] = $.parseXML(newSheet);

                }


                $('#example').DataTable({
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
                    dom: 'Bfrtip',

                    buttons: [{
                        extend: 'excelHtml5',
                        text: 'Excel',
                        customize: function(xlsx) {
                            setSheetName(xlsx, 'Hóa Đơn');

                            // process additional DataTables in the web page:
                            $('table').each(function(index) {
                                if (index > 0) {
                                    var tableID = '#' + $(this).attr('id');
                                    var rowOneTitle = $(this).attr('data-rowonetitle');
                                    var sheetName = $(this).attr('data-sheetname');
                                    var sheetID = index + 1;
                                    addSheet(xlsx, tableID, rowOneTitle, sheetName,
                                    sheetID);
                                }
                            });

                        }

                    }],




                });

            });
        </script>
        <script src="//unpkg.com/alpinejs" defer></script>
        <!-- endinject -->
        <!-- Plugin js for this page -->
        <script src="admin/assets/vendors/chart.js/Chart.min.js"></script>
        <script src="admin/assets/vendors/progressbar.js/progressbar.min.js"></script>
        <script src="admin/assets/vendors/jvectormap/jquery-jvectormap.min.js"></script>
        <script src="admin/assets/vendors/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
        <script src="admin/assets/vendors/owl-carousel-2/owl.carousel.min.js"></script>
        <!-- End plugin js for this page -->
        <!-- inject:js -->
        <script src="admin/assets/js/off-canvas.js"></script>
        <script src="admin/assets/js/hoverable-collapse.js"></script>
        <script src="admin/assets/js/misc.js"></script>
        <script src="admin/assets/js/settings.js"></script>
        <script src="admin/assets/js/todolist.js"></script>
        <!-- endinject -->
        <!-- Custom js for this page -->
        <script src="admin/assets/js/dashboard.js"></script>
        <!-- End custom js for this page -->
</body>

</html>

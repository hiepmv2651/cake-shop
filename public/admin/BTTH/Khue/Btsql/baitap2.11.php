<?php include('config.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm sữa mới</title>
</head>

<?php
    if (isset($_POST['submit'])) {
        $ten = $_POST['ten'];
        $ho = $_POST['diachi'];
        $diachi = $_POST['diachi'];
        $malop = $_POST['malop'];

        $sql = "INSERT INTO thongtin_sinhvien (ten,ho,diachi,idlop) VALUES ('$ten', '$ho', '$diachi','$malop')";
        $result = mysqli_query($conn, $sql);
    }
?>

<body>
    <form action="" method="POST">
        <table align="center" bgcolor="pink">
            <tr>
                <td colspan="2" align="center" bgcolor="red">
                    <h1 style="color: white ;">THÊM SỮA MỚI</h1>
                </td>
            </tr>
            <tr>
                <td>Mã sữa:</td>
                <td>
                    <input type="text" name="maSua">
                </td>
            </tr>
            <tr>
                <td>Tên sữa:</td>
                <td>
                    <input type="text" name="tenSua">
                </td>
            </tr>
            <tr>
                <td>Hãng sữa:</td>
                <td>
                    <input type="text">
                </td>
            </tr>
            <tr>
                <td>Loại sữa:</td>
                <td>
                    <input type="text">
                </td>
            </tr>
            <tr>
                <td>Trong lượng:</td>
                <td>
                    <input type="text">
                </td>
            </tr>
            <tr>
                <td>Đơn giá:</td>
                <td>
                    <input type="text">
                </td>
            </tr>
            <tr>
                <td>Thành phần dinh dưỡng:</td>
                <td>
                    <input type="text">
                </td>
            </tr>
            <tr>
                <td>Lợi ích:</td>
                <td>
                    <input type="text">
                </td>
            </tr>
            <tr>
                <td>Hình ảnh:</td>
                <td>
                    <input type="text">
                </td>
            </tr>
            <tr>
                <td colspan="2" align="center">
                    <input type="submit" name="submit" value="Thêm mới">
                </td>
            </tr>
        </table>
    </form>
</body>
</html>
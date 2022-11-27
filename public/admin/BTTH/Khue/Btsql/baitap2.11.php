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
        $maSua = $_POST['maSua'];
        $tenSua = $_POST['tenSua'];
        $Ma_hang_sua = $_POST['Ma_hang_sua'];
        $Ma_loai_sua = $_POST['Ma_loai_sua'];
        $trongLuong = $_POST['trongLuong'];
        $donGia = $_POST['donGia'];
        $ttdinhduong = $_POST['ttdinhduong'];
        $loiIch = $_POST['loiIch'];
        $hinhAnh = $_POST['hinhAnh'];

        $sql = "INSERT INTO sua (Ma_sua,Ten_sua,Ma_hang_sua,Ma_loai_sua,Trong_luong,Don_gia,TP_Dinh_Duong,Loi_ich,Hinh) 
        VALUES ('$maSua', '$tenSua', '$Ma_hang_sua', '$Ma_loai_sua', '$trongLuong', '$donGia', '$ttdinhduong', '$loiIch', '$hinhAnh')";

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
                <input type="text" name="maSua" id="" value="<?php echo $maSua ?? '' ?>" size="25">
                </td>
            </tr>
            <tr>
                <td>Tên sữa:</td>
                <td>
                <input type="text" name="tenSua" id="" value="<?php echo $tenSua ?? '' ?>" size="25">
                </td>
            </tr>
            <tr>
            <td>Hãng sữa</td>
                <td>
                <select name="Ma_hang_sua">
                        <?php
                        $sql2 = "SELECT * FROM `hang_sua`";
                        $res = mysqli_query($conn, $sql2);
                        if ($res == true) {
                            $count = mysqli_num_rows($res);
                            if ($count >= 1) {
                                while ($row = mysqli_fetch_array($res)) {
                                    $Ma_hang_sua = $row['Ma_hang_sua'];
                                    $Ten_hang_sua = $row['Ten_hang_sua'];
                                    echo "<option value='$Ma_hang_sua'>";
                                    echo $Ten_hang_sua;
                                    echo "</option>";
                                }
                            }
                        }
                        ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Loại sữa:</td>
                <td>
                <select name="Ma_loai_sua">
                        <?php
                        $sql2 = "SELECT * FROM `loai_sua`";
                        $res = mysqli_query($conn, $sql2);
                        if ($res == true) {
                            $count = mysqli_num_rows($res);
                            if ($count >= 1) {
                                while ($row = mysqli_fetch_array($res)) {
                                    $Ma_loai_sua = $row['Ma_loai_sua'];
                                    $Ten_loai = $row['Ten_loai'];
                                    echo "<option value='$Ma_loai_sua'>";
                                    echo $Ten_loai;
                                    echo "</option>";
                                }
                            }
                        }
                        ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Trong lượng:</td>
                <td>
                <input type="text" name="trongLuong" id="" value="<?php echo $trongLuong ?? '' ?>" size="25"> (gr hoặc ml)
                </td>
            </tr>
            <tr>
                <td>Đơn giá:</td>
                <td>
                    <input type="text" name="donGia" id="" value="<?php echo $donGia ?? '' ?>" size="25">(VNĐ)
                </td>
            </tr>
            <tr>
                <td>Thành phần dinh dưỡng:</td>
                <td>
                    <input type="text" name="ttdinhduong" id="" value="<?php echo $ttdinhduong ?? '' ?>" size="25">
                </td>
            </tr>
            <tr>
                <td>Lợi ích:</td>
                <td>
                <input type="text" name="loiIch" id="" value="<?php echo $loiIch ?? '' ?>" size="25">
                </td>
            </tr>
            <tr>
                <td>Hình ảnh:</td>
                <td>
                <input type="text" name="hinhAnh" id="" value="<?php echo $hinhAnh ?? '' ?>" size="25">
                </td>
            </tr>
            <tr>
                <td colspan="2" align="center">
                    <input type="submit" name="submit" value="Thêm mới">
                </td>
            </tr>
            <tr>
                <td colspan="2" align="center" style="color: red;">
                    <?php
                    if (isset($result))
                        if (!$result) die('Query failed');
                        else echo "Thành công!";
                    ?>
                </td>
            </tr>
        </table>
    </form>
</body>
</html>
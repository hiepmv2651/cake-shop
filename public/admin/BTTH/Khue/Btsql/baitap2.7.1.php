<?php include('config.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dạng cột có link</title>
    <style>
        img{
            width: 40%;
        }

        td{
            text-align: center;
            width: 150px;
            padding-top: 0;
            margin-top: 0;
        }

        img{
            width: 60px;
            height: 60px;
        }

        th{
            color: brown;
            background-color: burlywood;
            font-size: 20px;
        }

        *{
            font-family: Arial, Helvetica, sans-serif;
        }
    </style>
</head>
<body>
    <?php
        if (!function_exists('currency_format')) {
            function currency_format($number, $suffix = 'VNĐ')
            {
                if (!empty($number)) {
                    return number_format($number, 0, ',', '.') . "{$suffix}";
                }
            }
        }
    ?>
    <table align="center" border="1">
        <tr>
            <th colspan="5">THÔNG TIN CÁC SẢN PHẨM</th>
        </tr>
        <?php
        //

        $sql = "SELECT * FROM sua";
        $res = mysqli_query($conn, $sql);
        $count = mysqli_num_rows($res);
        if ($res == true) {
            echo "<tr>";
            $dem=1;
            while ($row = mysqli_fetch_assoc($res)) {
                $dem++;
                $ma=$row['Ma_sua'];
                $ten_sua = $row['Ten_sua'];
                $ma_hang_sua = $row['Ma_hang_sua'];
                $ma_loai_sua = $row['Ma_loai_sua'];
                $trong_luong = $row['Trong_luong'];
                $don_gia = $row['Don_gia'];
                $hinh = $row['Hinh'];
                $sql2 = "SELECT Ten_hang_sua FROM hang_sua WHERE Ma_hang_sua='$ma_hang_sua' ";
                $res2 = mysqli_query($conn, $sql2);
                $row2 = mysqli_fetch_assoc($res2);
                $ten_hang_sua = $row2['Ten_hang_sua'];
                $sql3 = "SELECT Ten_loai FROM loai_sua WHERE Ma_loai_sua='$ma_loai_sua' ";
                $res3 = mysqli_query($conn, $sql3);
                $row3 = mysqli_fetch_assoc($res3);
                $ten_loai = $row3['Ten_loai'];
                //
                echo "<td><b>";
                ?>
                <a href='baitap2.7.2.php?id=<?php echo $ma; ?>'><?php echo  $ten_sua; ?></a></b>
                <?php
                echo "<br>".$trong_luong." gr - ";
                echo " ".currency_format($don_gia)."<br>";
                ?>
                <img src="Hinh_sua/<?php echo $hinh; ?>">
                <?php 
                if($dem==6)
                {
                    echo "</tr>";
                    echo "<tr>";
                    $dem=1;
                }
            }
            }
        ?>
    </table>
</body>
</html>

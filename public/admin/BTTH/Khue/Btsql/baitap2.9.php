<?php include('config.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tìm kiếm đơn giản</title>
    <style>
        table {
            width: 100%;
            background-color: beige;
        }
        table tr td{
            padding: 0;
        }

        th {
            color: brown;
            background-color: bisque;
            font-size: 25px;
        }

        b {
            font-style: italic;
        }

        .bb {
            color: red;
        }

        img {
            width: 100%;
        }

        font {
            color: red;
        }

        .tdd {
            text-align: center;
            font-weight: bolder;
        }

        .bb2 {
            color: brown;
            font-size: 15px;
        }

        input[type="submit"] {
            background-color: burlywood;
        }
    </style>
</head>
<body>
    <?php
        //tien te
        if (!function_exists('currency_format')) {
            function currency_format($number, $suffix = 'VNĐ')
            {
                if (!empty($number)) {
                    return number_format($number, 0, ',', '.') . "{$suffix}";
                }
            }
        }
        echo "<form action='' method='POST'>";
        echo "<table align='center' border='1'>";
        echo "<tr><th colspan='2'>TÌM KIẾM THÔNG TIN SỮA</th></tr>";
    ?>

    <tr>
        <th colspan="2">
            <b class="bb2">Tên sữa: </b><input type="search" name="search" value="<?php if (isset($search)) echo $search; ?>">
            <input type="submit" name="submit" value="Tìm kiếm">
        </th>
    </tr>
    <?php
        //tim kiem
        if (isset($_POST['submit'])) {
            //
            $search = $_POST['search'];
            $sql = "SELECT * FROM sua WHERE Ten_sua LIKE '%$search%' ";
            $res = mysqli_query($conn, $sql);
            $count = mysqli_num_rows($res);
            if ($count > 0) {
                echo "<tr><td colspan='2' class='tdd'>Có " . $count . " sản phẩm được tìm thấy!</td></tr>";
                while ($row = mysqli_fetch_assoc($res)) {
                    $ten_sua = $row['Ten_sua'];
                    $ma_hang_sua = $row['Ma_hang_sua'];
                    $trong_luong = $row['Trong_luong'];
                    $don_gia = $row['Don_gia'];
                    $hinh = $row['Hinh'];
                    $tp_dd = $row['TP_Dinh_Duong'];
                    $loi_ich = $row['Loi_ich'];
                    $sql2 = "SELECT Ten_hang_sua FROM hang_sua WHERE Ma_hang_sua='$ma_hang_sua' ";
                    $res2 = mysqli_query($conn, $sql2);
                    $row2 = mysqli_fetch_assoc($res2);
                    $ten_hang_sua = $row2['Ten_hang_sua'];
                    echo "<tr>";
                    echo "<th colspan='2'>" . $ten_sua . " - " . $ten_hang_sua . "</th>";
                    echo "</tr>";
                    echo "<tr>";
                    echo "<td>";
    ?>
            <img src="Hinh_sua/<?php echo $hinh; ?>" />
    <?php
            echo "</td>";
            echo "<td><b>Thành phần dinh dưỡng: </b><br>" . $tp_dd;
            echo "<br><b>Lợi ích: </b><br>" . $loi_ich;
            echo "<br><b>Trọng lượng: </b>" . "<font>" . $trong_luong . "</font>" . " gr - " . "<b>Đơn giá: </b>" . "<font>" . currency_format($don_gia) . "</font></td>";
            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='2' class='tdd'>Không tìm thấy sản phẩm này!</td></tr>";
    }
        }
            echo "</table>";
            echo "</form>";
    ?>
    
</body>
</html>



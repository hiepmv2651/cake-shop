<?php include('config.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List đơn giản</title>
    <style>
        img{
            width: 80px;
            height: 80px;
        }

        table tr td{
            padding: 1%;
            align-self: center;
        }

        th{
            color: crimson;
            background-color: blanchedalmond;
            font-size: larger;
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
            <th colspan="2">THÔNG TIN CÁC SẢN PHẨM</th>
        </tr>
        <?php
        //
        //phan trang
        $rowsPerPage = 3;
        if (!isset($_GET['page'])) {
            $_GET['page'] = 1;
        }
        $offset = ($_GET['page'] - 1) * $rowsPerPage;

        $sql = "SELECT * FROM sua LIMIT $offset, $rowsPerPage";
        $res = mysqli_query($conn, $sql);
        $count = mysqli_num_rows($res);
        $maxPage = ceil($count / $rowsPerPage);
        if ($res == true) {
            while ($row = mysqli_fetch_assoc($res)) {
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
                echo "<tr>";
                echo "<td align='center'>";
        ?>
                <img src="Hinh_sua/<?php echo $hinh; ?>">
        <?php
                echo "</td>";
                echo "<td><b>" . $ten_sua . "</b>";
                echo "<br>Nhà sản xuất: " . $ten_hang_sua;
                echo "<br>" . $ten_loai . " - ";
                echo " " . $trong_luong . " gr - ";
                echo " " . currency_format($don_gia) . "</td>";
                echo "</tr>";
                }
            }
        ?>
    </table>

    <div style="text-align: center;">
        <?php
            $re = mysqli_query($conn, 'select * from sua');
            $numRows = mysqli_num_rows($re);
            $maxPage = floor($numRows/$rowsPerPage) + 1;
            if ($_GET['page'] > 1){
                echo "<a href=" .$_SERVER['PHP_SELF']."?page=".(1)."> << </a> ";
                echo "<a href=" .$_SERVER['PHP_SELF']."?page=".($_GET['page']-1)."> < </a> "; //gắn thêm nút Back
            }
            for ($i=1 ; $i<=$maxPage ; $i++)
            {
                if ($i == $_GET['page'])
                {
                    echo '<b>'.$i.'</b> '; //trang hiện tại sẽ được bôi đậm
                }
                else echo "<a href=" .$_SERVER['PHP_SELF']. "?page=".$i."> ".$i."</a> ";
            }
            if ($_GET['page'] < $maxPage) {
                echo "<a href=" . $_SERVER['PHP_SELF'] . "?page=".($_GET['page'] + 1) . "> > </a>";  //gắn thêm nút Next
                echo "<a href=" . $_SERVER['PHP_SELF'] . "?page=".($maxPage) . "> >> </a>";
            }
        ?>
  </div>
</body>
</html>
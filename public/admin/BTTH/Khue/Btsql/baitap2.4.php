<?php include('config.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Phan Trang</title>
    <style>
        tr:nth-child(2n){
            color: brown;
        }
        
        tr:nth-child(2n+1){
            background-color: #FEDFC2;
            color: black;
        }

        th{
            color: brown;
        }

        h2{
            text-align: center;
            color: crimson;
            font-family: 'Courier New', Courier, monospace;
            font-weight: bolder;
        }
    </style>
</head>

<body>
<?php
    if (!function_exists('currency_format')) {
        function currency_format($number, $suffix = 'VNĐ'){
            if (!empty($number)) {
                return number_format($number, 0, ',', '.') . "{$suffix}";
            }
        }
    }
    $sn=1;
?>

<h2>THÔNG TIN SỮA</h2>
    <table align="center" border="1"  style="border-collapse:collapse">
        <tr>
            <th>Số TT</th>
            <th>Tên sữa</th>
            <th>Hãng sữa</th>
            <th>Loại sữa</th>
            <th>Trọng lượng</th>
            <th>Đơn giá</th>
        </tr>
        <?php
            //phan trang
            // Số mẩu tin trên mỗi trang
            $rowsPerPage = 5;
            if (!isset($_GET['page'])) {
                $_GET['page'] = 1;
            }

            // vị trí của mẩu tin đầu tiên trên mỗi trang
            $offset = ($_GET['page'] - 1) * $rowsPerPage;

            // lấy $rowsPerPage mẫu tin, bắt đầu từ vị trí $offset
            $sql="SELECT * FROM sua LIMIT $offset, $rowsPerPage";
            $res=mysqli_query($conn, $sql);

            // tổng số mẫu tin cần hiển thị
            $count = mysqli_num_rows($res);

            //tính tổng số trang
            $maxPage=ceil($count / $rowsPerPage);
            if($res==true){
                while($row=mysqli_fetch_assoc($res)){
                    $ten_sua=$row['Ten_sua'];
                    $ma_hang_sua=$row['Ma_hang_sua'];
                    $ma_loai_sua=$row['Ma_loai_sua'];
                    $trong_luong=$row['Trong_luong'];
                    $don_gia=$row['Don_gia'];
                    $sql2="SELECT Ten_hang_sua FROM hang_sua WHERE Ma_hang_sua='$ma_hang_sua' ";
                    $res2=mysqli_query($conn, $sql2);
                    $row2=mysqli_fetch_assoc($res2);
                    $ten_hang_sua=$row2['Ten_hang_sua'];
                    $sql3="SELECT Ten_loai FROM loai_sua WHERE Ma_loai_sua='$ma_loai_sua' ";
                    $res3=mysqli_query($conn, $sql3);
                    $row3=mysqli_fetch_assoc($res3);
                    $ten_loai=$row3['Ten_loai'];
                    echo "<tr>";
                    echo "<td>".$sn++."</td>";
                    echo "<td>".$ten_sua."</td>";
                    echo "<td>".$ten_hang_sua."</td>";
                    echo "<td>".$ten_loai."</td>";
                    echo "<td>".$trong_luong." gram</td>";
                    echo "<td class ='dg'>".currency_format($don_gia)."</td>";
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
            for ($i=1; $i<=$maxPage; $i++)
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


 
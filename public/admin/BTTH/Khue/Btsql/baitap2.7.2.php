<?php include('config.php'); ?>
<!DOCTYPE html>
<html>
<head>
<meta charset='utf-8'>
  <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Thư viện - Trang chủ</title>
    <link rel="stylesheet" href="../css/admin.css">
    <link rel="stylesheet" href="../btsql/style2.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        table{
            width: 85%;
        }
        th{
            color: brown;
            background-color: bisque;
            font-size: 25px;
        }
        b{
            font-style: italic;
        }
        .bb{
            text-align: right;
        }
        table tr td{
            padding: 1%;
        }

    </style>
</head>
<body>
  
    <div class="main-content">
    <div class="wrapper">
      
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
    //
    $id=$_GET['id'];
    $sql="SELECT * FROM sua WHERE Ma_sua='$id' ";
    $res=mysqli_query($conn, $sql);
    $row=mysqli_fetch_assoc($res);
    $ten_sua=$row['Ten_sua'];
    $ma_hang_sua = $row['Ma_hang_sua'];
    $trong_luong = $row['Trong_luong'];
    $don_gia = $row['Don_gia'];
    $hinh = $row['Hinh'];
    $tp_dd=$row['TP_Dinh_Duong'];
    $loi_ich=$row['Loi_ich'];
    $sql2 = "SELECT Ten_hang_sua FROM hang_sua WHERE Ma_hang_sua='$ma_hang_sua' ";
    $res2 = mysqli_query($conn, $sql2);
    $row2 = mysqli_fetch_assoc($res2);
    $ten_hang_sua = $row2['Ten_hang_sua'];
    echo "<table align='center' border='1'>";
        echo "<tr>";
            echo "<th colspan='2'>".$ten_sua." - ".$ten_hang_sua."</th>";
        echo "</tr>";
        echo "<tr>";
        echo "<td>";
        ?>
        <img src="Hinh_sua/<?php echo $hinh; ?>">
        <?php
        echo "</td>";
        echo "<td><b>Thành phần dinh dưỡng: </b><br>".$tp_dd;
        echo "<br><b>Lợi ích: </b><br>".$loi_ich;
        echo "<br><div class='bb'><b>Trọng lượng: </b>".$trong_luong." gr - "."<b>Đơn giá: </b>".currency_format($don_gia)."</div></td>";
        echo "</tr>";
        echo "<tr><td align='right'><a href='javascript:window.history.go(-1)'>Quay về</a></td></tr>";
    echo "</table>";
    ?>
    </div>
</div>
    

<?php include('config.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thong Tin Khach Hang</title>
    <style>
        tr:nth-child(even){background-color: #FEDFC2}
        th{
                color: red;
                text-align: center;
        }
    </style>
</head>

<body>
    <h3 align="center" >THÔNG TIN KHÁCH HÀNG</h3>
    <table align="center" border="1" style="border-collapse:collapse">
        <tr style="background-color: white">
            <th>Mã khách hàng</th>
            <th>Tên khách hàng</th>
            <th>Giới tính</th>
            <th>Địa chỉ</th>
            <th>Điện thoại</th>
            <th>Email</th>
        </tr>
        <?php
            $sql ="SELECT * FROM khach_hang";
            $res = mysqli_query($conn, $sql);
            if($res == true)
            {
                if(mysqli_num_rows($res)!=0)
                {
                    while($rows = mysqli_fetch_assoc($res))
                    {
                        $gt="Nam";
                        if($rows['Phai'] == 1)
                        {
                            $gt="Nữ";
                        }
                        echo "<tr>";
                        echo "<td>".$rows['Ma_khach_hang']."</td>";
                        echo "<td>".$rows['Ten_khach_hang']."</td>";
                        echo "<td style='text-align:center'>".$gt."</td>";
                        echo "<td>".$rows['Dia_chi']."</td>";
                        echo "<td>".$rows['Dien_thoai']."</td>";
                        echo "<td>".$rows['Email']."</td>";
                        echo "</tr>";
                    }
                }
            }
        ?>
    </table>
</body>
</html>
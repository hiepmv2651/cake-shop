<?php include('config.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>THÔNG TIN HÃNG SỮA</title>
</head>
<body>
<h3 align="center"  style="color: blue;" >THÔNG TIN HÃNG SỮA</h3>
<table align="center" border="1" style="border-collapse:collapse">
        <tr>
            <th>Mã hãng sữa</th>
            <th>Tên hãng sữa</th>
            <th>Địa chỉ</th>
            <th>SĐT</th>
            <th>Email</th>
        </tr>
        <?php
        $sql = "SELECT * FROM hang_sua";
        $res = mysqli_query($conn, $sql);
        if($res == true)
        {
            if(mysqli_num_rows($res)!=0)
            {
                while ($rows=mysqli_fetch_assoc($res)) {
                    echo "<tr>";
                    echo "<td>".$rows['Ma_hang_sua']."</td>";
                    echo "<td>".$rows['Ten_hang_sua']."</td>";
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
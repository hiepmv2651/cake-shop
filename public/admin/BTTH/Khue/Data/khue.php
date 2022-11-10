<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db_lophoc";
$conn = mysqli_connect($servername, $username, $password, $dbname);

$thongBao = "";

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if (isset($_POST['submit'])){
    $ten=$_POST['ten'];
    $ho=$_POST['ho'];
    $diachi=$_POST['diachi'];
    $mssv="MSSV01";
    if (isset($ten) && isset($ho) && isset($diachi)){
        $sql = "INSERT INTO `hocsinh`(`mssv`, `ten`, `ho`, `diachi`)
        VALUES ('$mssv','$ten','$ho','$diachi')";
        mysqli_query($conn, $sql);
        $thongBao = "Thanh Cong";

      
    }else{
        $thongBao = "Ban Phai Nhap Dung!";
    }
}

if (isset($_POST['xoa'])){
    $ten="";
    $ho="";
    $diachi="";
}

?>
<body>

<form action="" method="POST">
    <table align="center" bgcolor="orange">
        <tr ><td colspan="2" align="center"> <h1 >Nhap Thong Tin SV</h1></td></tr>
        <tr >
            <td>Ten:</td>
            <td>
                <input type="text" name="ten" value="" >
            </td>
        </tr>
        <tr>
            <td>Ho:</td>
            <td>
                <input type="text" name="ho" value="">
            </td>
        </tr>
        <tr>
            <td>Dia Chi:</td>
            <td>
                <input type="text" name="diachi" value="">
            </td>
        </tr>
        <tr>
            <td>Lop:</td>
            <td>
                <input type="text" name="lop" value="">
            </td>
        </tr>
       <tr>
        <td colspan="2" align="center">
            <input type="submit" name="submit" value="Gui">
            <input type="submit" name="xoa" value="Xoa">
            <input type="submit" name="xemketqua" value="Xem Ket Qua">
        </td>
       </tr>
       <tr>
        <td colspan="2" align="center">
           <h4> <?php if (isset($thongBao)) echo $thongBao; ?></h4>
        </td>
       </tr>
    
    </table>
</form>
</body>
</html>
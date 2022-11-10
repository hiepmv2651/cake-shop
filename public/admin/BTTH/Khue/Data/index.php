<?php
// 1. Ket noi CSDL Kieu thu tuc
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "quanly_ban_sua";
$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$Ma_khach_hang = 'kh009';
$Ten_khach_hang = 'khue';
$Phai =  0;
$Dia_chi = 'Cam Ranh Khanh Hoa';
$Dien_thoai = '0987664220';
$Email = 'khuevotan@gmail.com';


$sql = "INSERT INTO `khach_hang`(`Ma_khach_hang`, `Ten_khach_hang`, `Phai`, `Dia_chi`, `Dien_thoai`, `Email`) 
        VALUES ('$Ma_khach_hang','$Ten_khach_hang','$Phai','$Dia_chi','$Dien_thoai','$Email')";
$result = mysqli_query($conn, $sql);

if(mysqli_num_rows ($result) !=0){
   echo "OK";
}



// 5. Xoa ket qua khoi vung nho va Dong ket noi
mysqli_free_result($result);
mysqli_close($conn);
?>



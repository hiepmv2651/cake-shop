<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<?php
$toan = $ly = $hoa = $diemChuan = $tongDiem = $ketQua = "";
$thongbao = $thongbao1 = $thongbao2 = $thongbao3 = "";

if(!empty($_POST['submit'])){
    if(isset($_POST["toan"])){
        if(!is_numeric($_POST["toan"])){
          if(empty($_POST["toan"])){
            $thongbao = "Vui lòng nhập giá trị";
          }
          else {
            $thongbao = "Giá trị nhập vào phải là số";
          }
        }
        else{
          if($_POST["toan"] < 0){
            $thongbao = "Giá trị phải là số dương";
          }
          else {
              $toan = $_POST["toan"];
          }
        }
    }

    if(isset($_POST["ly"])){
        if(!is_numeric($_POST["ly"])){
          if(empty($_POST["ly"])){
            $thongbao1 = "Vui lòng nhập giá trị";
          }
          else {
            $thongbao1 = "Giá trị nhập vào phải là số";
          }
        }
        else{
          if($_POST["ly"] < 0){
            $thongbao1 = "Giá trị phải là số dương";
          }
          else {
              $ly = $_POST["ly"];
          }
        }
    }

    if(isset($_POST["hoa"])){
        if(!is_numeric($_POST["hoa"])){
          if(empty($_POST["hoa"])){
            $thongbao2 = "Vui lòng nhập giá trị";
          }
          else {
            $thongbao2 = "Giá trị nhập vào phải là số";
          }
        }
        else{
          if($_POST["hoa"] < 0){
            $thongbao2 = "Giá trị phải là số dương";
          }
          else {
              $hoa = $_POST["hoa"];
          }
        }
    }

    if(isset($_POST["diemChuan"])){
        if(!is_numeric($_POST["diemChuan"])){
          if(empty($_POST["diemChuan"])){
            $thongbao3 = "Vui lòng nhập giá trị";
          }
          else {
            $thongbao3 = "Giá trị nhập vào phải là số";
          }
        }
        else{
          if($_POST["diemChuan"] < 0){
            $thongbao3 = "Giá trị phải là số dương";
          }
          else {
              $diemChuan = $_POST["diemChuan"];
          }
        }
    }

    if( !isset($_POST["toan"]) || !isset($_POST["ly"]) || !isset($_POST["hoa"]) ||!is_numeric($_POST["toan"]) || !is_numeric($_POST["ly"])  || !is_numeric($_POST["hoa"]) || $_POST["toan"] < 0 || $_POST["ly"] < 0 || $_POST["hoa"] < 0 || $_POST["diemChuan"] < 0 ) {
        $ketQua = "";
        $tongDiem = "";
    }else{
        $ketQua = $_POST["ketQua"];
        $tongDiem = $_POST["tongDiem"];
        $tongDiem = $toan + $ly + $hoa;
        if($tongDiem >= $diemChuan){
            $ketQua = "Đậu";
        }else{
            $ketQua = "Rớt";
        }
    }

    if(isset($_POST['reset'])){
        $toan = $ly = $hoa = $diemChuan = $tongDiem = $ketQua = "";
        $thongbao = $thongbao1 = $thongbao2 = "";
    }
}


?>
<body>
<form action="" method="POST">
    <table align="center" bgcolor="#FFE8FA">
        <tr>
            <td colspan="2" align="center" bgcolor="#DC4D7F">
                <h1>KẾT QUẢ THI ĐẠI HỌC</h1>
            </td>
        </tr>
        <tr>
            <td>Toán:</td>
            <td>
                <input type="text" name="toan" value="<?php if(isset($toan)) echo $toan; ?>" placeholder="<?php if(isset($thongbao)) echo $thongbao;?>" style="width : 250px">
            </td>
        </tr>
        <tr>
            <td>Lý:</td>
            <td>
                <input type="text" name="ly" value="<?php if(isset($ly)) echo $ly; ?>" placeholder="<?php if(isset($thongbao1)) echo $thongbao1;?>" style="width : 250px">
            </td>
        </tr>
        <tr>
            <td>Hóa:</td>
            <td>
                <input type="text" name="hoa" value="<?php if(isset($hoa)) echo $hoa; ?>" placeholder="<?php if(isset($thongbao2)) echo $thongbao2;?>" style="width : 250px">
            </td>
        </tr>
        <tr>
            <td>Điểm chuẩn:</td>
            <td>
                <input type="text" name="diemChuan" value="<?php if(isset($diemChuan)) echo $diemChuan; ?>" placeholder="<?php if(isset($thongbao3)) echo $thongbao3;?>" style="width : 250px">
            </td>
        </tr>
        <tr>
            <td>Tổng điểm:</td>
            <td>
                <input type="text" name="tongDiem" value="<?php if(isset($tongDiem)) echo $tongDiem; ?>" style="background: yellow; width : 250px" readonly>
            </td>
        </tr>
        <tr>
            <td>Kết quả thi:</td>
            <td>
                <input type="text" name="ketQua" value="<?php if(isset($ketQua)) echo $ketQua; ?>" style="background: yellow;  width: 250px" readonly>
            </td>
        </tr>
        <tr>
            <td align="center" colspan="2">
                <input type="submit" name="submit" value="Xem kết quả">
                <input type="submit" name="reset" value="Reset">
            </td>
        </tr>
    </table>
</form>
</body>
</html>
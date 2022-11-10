<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Diện tích và chu vi hình tròn</title>
</head>
<?php
define('PI',3.14);
$banKinh = $thongBao = $chuVi = $dienTich = "";

if(!empty($_POST['submit'])){
    if(isset($_POST["banKinh"])){
        if(!is_numeric($_POST["banKinh"])){
          if(empty($_POST["banKinh"])){
            $thongBao = "Vui lòng nhập giá trị";
          }
          else {
            $thongBao = "Giá trị nhập vào phải là số";
          }
        }
        else{
          if($_POST["banKinh"] <= 0){
            $thongBao = "Giá trị phải là số nguyên dương";
          }
          else {
              $banKinh = $_POST["banKinh"];
          }
        }
    }

    if(!isset($_POST["banKinh"]) || !is_numeric($_POST["banKinh"]) || $_POST["banKinh"] <= 0 ) {
        $dienTich = $chuVi = "";
    }
    else{
        $dienTich  = $_POST["dienTich"];
        $chuVi  = $_POST["chuVi"];
        $dienTich=round(PI*$banKinh*$banKinh,1);
        $chuVi=round(2*PI*$banKinh,1);
    }

    if(isset($_POST['reset'])){
        $banKinh = $thongBao = $chuVi = $dienTich = "";
    }
}
?>
<body>

<form action="" method="POST">
    <table align="center" bgcolor="#faebd7">
        <tr>
            <td colspan="2" bgcolor="orange"><h1>Diện tích và chu vi hình tròn</h1></td>
        </tr>
        <tr>
            <td>Bán kính: </td>
            <td>
                <input type="text" name="banKinh" value="<?php if(isset($banKinh)) echo $banKinh?>" placeholder="<?php if(isset($thongBao)) echo $thongBao?>" style="width: 300px">
            </td>
        </tr>
        <tr>
            <td>Điện tích: </td>
            <td>
                <input type="text" name="dienTich" value="<?php if(isset($dienTich)) echo $dienTich?>" style="width: 300px; background-color: lightpink;" readonly>
            </td>
        </tr>
        <tr>
            <td>Chu vi: </td>
            <td>
                <input type="text" name="chuVi" value="<?php if(isset($chuVi)) echo $chuVi?>" style="background-color: lightpink; width: 300px" readonly>
            </td>
        </tr>
        <tr>
            <td colspan="2" align="center">
                <input type="submit" name="submit" value="Tính">
                <input type="submit" name="reset" value="reset">
            </td>
        </tr>
    </table>
</form>
</body>
</html>
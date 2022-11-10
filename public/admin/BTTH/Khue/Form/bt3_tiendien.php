<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tiền điện</title>
</head>
<?php
$tenChuHo = $old = $new = $thongBao1 = $thongBao2 = $thongBao3 = $ketQua = "";
$donGia = 20000;

if(!empty($_POST['submit'])){
    if(isset($_POST["tenChuHo"])){
        if(empty($_POST["tenChuHo"])){
            $thongBao1 ="Vui lòng nhập tên";
        }
        else{
          $tenChuHo = $_POST["tenChuHo"];
        }
    }

    if(isset($_POST["old"])){
        if(!is_numeric($_POST["old"])){
          if(empty($_POST["old"])){
            $thongBao2 = "Vui lòng nhập giá trị";
          }
          else {
            $thongBao2 = "Giá trị nhập vào phải là số";
          }
        }
        else{
          if($_POST["old"] <= 0){
            $thongBao2 = "Giá trị phải là số nguyên dương";
          }
          else {
              $old = $_POST["old"];
          }
        }
    }

    if(isset($_POST['new'])){
        if(!is_numeric($_POST['new'])){
            if(empty($_POST["new"])){
                $thongBao3 = "Vui lòng nhập giá trị";
            }
            else{
                $thongBao3 = "Giá trị nhập vào phải là số";
            }
        }
        else{
            if($_POST["new"] <= 0){
              $thongBao3 = "Giá trị phải là số nguyên dương";
            }
            else{   
                if((float)$_POST["new"] < (float)$_POST["old"]) {
                    $thongBao3 = "Số mới phải lớn hơn số cũ";
                }
                else{
                    $new = $_POST["new"];
                }
            }
        }
    }

      if( empty($_POST["tenChuHo"]) || !isset($_POST["new"]) || !isset($_POST["old"]) ||!is_numeric($_POST["new"]) || !is_numeric($_POST["old"]) || $_POST["new"] < 0 || $_POST["old"] < 0 || (float)$_POST["new"] < (float)$_POST["old"]) {
        $ketQua = "";
      }else{
        $ketQua = $_POST["ketQua"];
        $ketQua =  ((float)$new -  (float)$old) * 20000;
      }
  

    if(isset($_POST['reset'])){
        $tenChuHo = $old = $new = $thongBao1 = $thongBao2 = $thongBao3 = $ketQua = "";
    }
}


?>
<body>
<form action="" method="POST">
    <table align="center" bgcolor="#faebd7">
        <tr>
            <td colspan="3" bgcolor="orange" align="center">
                <h1>THANH TOÁN TIỀN ĐIỆN</h1>
            </td>
        </tr>
        <tr>
            <td>Tên chủ hộ:</td>
            <td>
            <input type="text" name="tenChuHo" value="<?php if(isset($tenChuHo)) echo $tenChuHo?>"  placeholder="<?php if(isset($thongBao1)) echo $thongBao1 ?>" style="width: 250px">
            </td>
           
        </tr>
       
        <tr>
            <td>Chỉ số cữ:</td>
            <td>
            <input type="text" name="old" value="<?php if(isset($old)) echo $old?>"  placeholder="<?php if(isset($thongBao2)) echo $thongBao2?>" style="width: 250px">
            </td>
            <td>(KW)</td>
        </tr>
        <tr>
            <td>Chỉ số mới:</td>
            <td>
            <input type="text" name="new" value="<?php if(isset($new)) echo $new?>"  placeholder="<?php if(isset($thongBao3)) echo $thongBao3 ?>" style="width: 250px">
            </td>
            <td>(KW)</td>
        </tr>
        <tr>
            <td>Đơn giá:</td>
            <td>
            <input type="text" name="donGia" value="<?php if(isset($donGia)) echo $donGia?>"  style="width: 250px">
            </td>
            <td>(VND)</td>
        </tr>
        <tr>
            <td>Số tiền thanh toán:</td>
            <td>
            <input type="text" name="ketQua" value="<?php if(isset($ketQua)) echo $ketQua?>"  placeholder="<?php if(isset($ketQua)) echo $ketQua?>" style="background-color: lightpink; width: 250px" readonly>
            </td>
            <td>(VND)</td>
        </tr>
        <tr>
            <td colspan="3" align="center">
                <input type="submit" name="submit" value="Tính">
                <input type="submit" name="reset" value="Reset">
            </td>
        </tr>
    </table>
</form>
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Diện tích hình chữ nhật</title>
</head>
<?php
 
$chieuDai = $chieuRong = $thongBao = $thongBao2 = $dienTich = "";

if(!empty($_POST['submit'])){
    if(isset($_POST["chieuDai"])){
        if(!is_numeric($_POST["chieuDai"])){
          if(empty($_POST["chieuDai"])){
            $thongBao = "Vui lòng nhập giá trị";
          }
          else {
            $thongBao = "Giá trị nhập vào phải là số";
          }
        }
        else{
          if($_POST["chieuDai"] <= 0){
            $thongBao = "Giá trị phải là số nguyên dương";
          }
          else {
              $chieuDai = $_POST["chieuDai"];
          }
        }
    }

    if(isset($_POST['chieuRong'])){
        if(!is_numeric($_POST['chieuRong'])){
            if(empty($_POST["chieuRong"])){
                $thongBao2 = "Vui lòng nhập giá trị";
            }
            else{
                $thongBao2 = "Giá trị nhập vào phải là số";
            }
        }
        else{
            if($_POST["chieuRong"] <= 0){
              $thongBao2 = "Giá trị phải là số nguyên dương";
            }
            else{
                $chieuRong = $_POST["chieuRong"];
            }
        }
    }

    if(!isset($_POST["chieuDai"]) || !isset($_POST["chieuRong"]) || !is_numeric($_POST["chieuDai"]) || !is_numeric($_POST["chieuRong"]) || $_POST["chieuDai"] <= 0 || $_POST["chieuRong"] <= 0 ) {
        $dienTich = "";
    }
    else{
        if($chieuDai < $chieuRong){
            $dienTich = "Chiều dài phải hơn chiều rộng";
        }else
        {
            $dienTich  = $_POST["dienTich"];
            $dienTich  =  $chieuDai * $chieuRong;
        }
    }
    
    if(isset($_POST['reset'])){
        $chieuDai = $chieuRong = $thongBao = $thongBao2 = $dienTich = "";
    }
}
?>
<body>
    <form action="" method="POST">
        <table align="center" bgcolor="#faebd7">
            <tr>
                <td colspan="2"  bgcolor="orange"> <h1> Diện Tích Hình Chữ Nhật</h1> </td>
            </tr>
            <tr>
                <td>Chiều dài:</td>
                <td>
                    <input type="text" name="chieuDai" value="<?php if (isset($chieuDai)) echo $chieuDai;?>" placeholder="<?php if(isset($thongBao)) echo $thongBao;?>" style="width: 250px">
                </td>
            </tr>
            <tr>
                <td>Chiều rộng:</td>
                <td>
                <input type="text" name="chieuRong" value="<?php if (isset($chieuRong)) echo $chieuRong;?>" placeholder="<?php if(isset($thongBao2)) echo $thongBao2;?>" style="width: 250px">
                </td>
            </tr>
            <tr>
                <td>Diện tích:</td>
                <td>
                    <input type="text" name="dienTich" value="<?php if(isset($dienTich)) echo $dienTich;?>" style="background-color: lightpink; width: 250px" readonly>
                </td>
            </tr>
            <tr>
                <td colspan="2" align="center">
                    <input type="submit" name="submit" value="Tính">
                    <input type="submit" name="reset" value="Clear">
                </td>
            </tr>
        </table>
    </form>
</body>
</html>
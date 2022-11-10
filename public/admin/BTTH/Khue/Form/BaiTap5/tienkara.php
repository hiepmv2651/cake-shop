<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TÍNH TIỀN KARAOKE</title>
</head>
<?php 
$ketThucatDau = $ketThuc = $tienThanhToan = "";
$thongBao = $thongBao1 = "";

if(!empty($_POST['submit'])){
    if(isset($_POST["batDau"])){
        if(!is_numeric($_POST["batDau"])){
          if(empty($_POST["batDau"])){
            $thongBao = "Vui lòng nhập giá trị";
          }
          else {
            $thongBao = "Giá trị nhập vào phải là số";
          }
        }
        else{
          if($_POST["batDau"] <= 0){
            $thongBao = "Giá trị phải là số nguyên dương";
          }
          else {
              $ketThucatDau = $_POST["batDau"];
          }
        }
    }

    if(isset($_POST['ketThuc'])){
        if(!is_numeric($_POST['ketThuc'])){
            if(empty($_POST["ketThuc"])){
                $thongBao1 = "Vui lòng nhập giá trị";
            }
            else{
                $thongBao1 = "Giá trị nhập vào phải là số";
            }
        }
        else{
            if($_POST["ketThuc"] <= 0){
              $thongBao1 = "Giá trị phải là số nguyên dương";
            }
            else{   
                if((float)$_POST["ketThuc"] < (float)$_POST["batDau"]) {
                    $thongBao1 = "Số mới phải lớn hơn số cũ";
                }
                else{
                    $ketThuc = $_POST["ketThuc"];
                }
            }
        }
    }

    if( !isset($_POST["batDau"]) || !isset($_POST["ketThuc"]) ||!is_numeric($_POST["batDau"]) || !is_numeric($_POST["ketThuc"]) || $_POST["batDau"] < 0 || $_POST["ketThuc"] < 0 || (float)$_POST["batDau"] > (float)$_POST["ketThuc"]) {
        $tienThanhToan = "";
    }else{
        $tienThanhToan = $_POST["tienThanhToan"];
         
        if ($ketThucatDau < 10 || $ketThuc < 10)
            $tienThanhToan = "Giờ nghỉ";
        elseif ($ketThucatDau > 24 || $ketThuc > 24)
            $tienThanhToan = "Nhập sai giờ";
        elseif ($ketThucatDau >= $ketThuc)
            $tienThanhToan = "Giờ kết thúc phải > giờ bắt đầu";
        else $tienThanhToan = (17 < $ketThuc) ? ((17 - $ketThucatDau) * 20000 + ($ketThuc - 17) * 45000) : ($ketThuc - $ketThucatDau) * 20000;
    }

    if(isset($_POST['reset'])){
        $ketThucatDau = $ketThuc = $tienThanhToan = "";
        $thongBao = $thongBao1 = "";
    }
}


?>
<body>
    <form action="" method="POST">
        <table align="center" bgcolor="#07AEB6">
            <tr>
                <td colspan="3" bgcolor="#308887" align="center">
                    <h1>TÍNH TIỀN KARAOKE</h1>
                </td>
            </tr>
            <tr>
                <td>Giời bắt đầu: </td>
                <td>
                    <input type="text" name="batDau" value="<?php if(isset($ketThucatDau)) echo $ketThucatDau; ?>" placeholder="<?php if(isset($thongBao)) echo $thongBao;?>" style="width: 250px">
                </td>
                <td>
                    (h)
                </td>
            </tr>
            <tr>
                <td>Giời kết thúc: </td>
                <td>
                    <input type="text" name="ketThuc" value="<?php if(isset($ketThuc)) echo $ketThuc; ?>" placeholder="<?php if(isset($thongBao1)) echo $thongBao1;?>" style="width: 250px">
                </td>
                <td>
                    (h)
                </td>
            </tr>
            <tr>
                <td>Tiền thanh toán: </td>
                <td>
                    <input type="text" name="tienThanhToan" value="<?php if(isset($tienThanhToan)) echo $tienThanhToan; ?>" style="background-color: yellow; width: 250px" readonly>
                </td>
                <td>
                    (VND)
                </td>
            </tr>
            <tr >
                <td align="center" colspan="3">
                    <input type="submit" name="submit" value="Tính tiền">
                    <input type="submit" name="reset" value="Xóa">
                </td>
            </tr>
        </table>
    </form>
</body>
</html>
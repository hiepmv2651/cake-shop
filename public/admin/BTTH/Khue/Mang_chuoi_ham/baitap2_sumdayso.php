<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nhập và tính trên dãy số</title>
</head>
<?php 
function sumArray($mangso)
{
    $tong = 0;
    foreach ($mangso as $key => $value) {
            $tong += $value;
    }
    return $tong;
}

$thongBao = $daySo ="";
if (isset($_POST["submit"])) {
    $daySo = $_POST["daySo"];
    if(empty($daySo) == null){
            $mangso = explode(",", $daySo);
            $ketQua = sumArray($mangso);
    }else{
            $thongBao = "Vui lòng nhập dãy số";
    }
}

if (isset($_POST['reset'])){
    $daySo=$ketQua="";
}
?>

<body>
    <form action="" method="POST">
        <table align="center" bgcolor="#CDD9CE">
            <tr>
                <td  colspan="3" align="center" bgcolor="#39968E"><h1>NHẬP VÀ TÍNH TRÊN DÃY SỐ</h1></td>
            </tr>
            <tr>
                <td>Nhập dãy số:</td>
                <td>
                    <input type="text" name="daySo" size="50" value="<?php if(isset($daySo)) echo $daySo;?>" placeholder="<?php if(isset($thongBao)) echo $thongBao;?>">
                </td>
                <td style="color: #ff0a07">(*)</td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <input type="submit" name="submit" value="Tổng dãy số" style="background-color: yellow;" >
                </td>
                <td></td>
            </tr>
            <tr>
                <td>Tổng dãy số:</td>
                <td>
                    <input type="text" name="ketQua" value="<?php if(isset($ketQua)) echo $ketQua; ?>" readonly>
                </td>
                <td></td>
            </tr>
            <tr>
                <td colspan="3" align="center">
                (*) Các số được nhập cách nhau bằng dấu ","
                </td>
            </tr>
        </table>
    </form>
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thay thế</title>
</head>
<?php

function thaythe($mangso,$canthaythe,$thaythe)
{
    foreach ($mangso as $key => &$value) {
        if($canthaythe==$value) {
            $value=$thaythe;
        }
    }
    return $mangso;
}

$thongBao = "";
if(isset($_POST['submit']))
{
    $dayso=$_POST['dayso'];
    $mangso=explode(",",$dayso);
    $canthaythe=$_POST['canthaythe'];
    $thaythe=$_POST['thaythe'];
    if ((strval($canthaythe) === strval(intval($canthaythe))) and (strval($thaythe) === strval(intval($thaythe)))){
        $mangmoi=thaythe($mangso,$canthaythe,$thaythe);
    }else{
        $thongBao = 'Nhập lại';
    }
}
?>

<body>
<form action="" method="POST">
        <table align="center" bgcolor="#FEDDF2">
            <tr>
                <td colspan="2" bgcolor="#A0196F" align="center"><h1>THAY THẾ</h1></td>
            </tr>
            <tr>
                <td>Nhập các phần tử:</td>
                <td>
                    <input type="text" name="dayso" value="<?php if (isset($dayso)) { echo $dayso; } ?>">
                </td>
            </tr>
            <tr>
                <td>Giá trị cần thay thế:</td>
                <td>
                    <input type="text" name="canthaythe" value="<?php if (isset($canthaythe)) { echo $canthaythe;} ?>" placeholder="<?php if(isset($thongBao)) echo $thongBao;?>">
                </td>
            </tr>
            <tr>
                <td>Giá trị thay thế</td>
                <td>
                     <input type="text" name="thaythe" value="<?php if (isset($thaythe)) { echo $thaythe; } ?>" placeholder="<?php if(isset($thongBao)) echo $thongBao;?>">
                </td>
            </tr>
            <tr>
                <td></td>
                <td>
                <input type="submit" name="submit" style="background-color: yellow;" value="Thay thế">
                </td>
            </tr>
            <tr>
                <td>Mảng cũ:</td>
                <td>
                <input type="text" readonly style="background-color:#ea8685; color:white" value="<?php if(isset($mangso)) print implode('  ',$mangso); ?>">
                </td>
            </tr>
            <tr>
                <td>Mảng sau khi thay thế:</td>
                <td>
                <input type="text" readonly style="background-color:#ea8685; color:white" value="<?php if(isset($_POST['submit'])) print implode('  ',$mangmoi); ?>">
                </td>
            </tr>
            <tr>
                <td colspan="2" align="center"> (<b style="color: red">Ghi chú:</b> Các phần tử trong mảng sẽ cách nhau bằng dấu ",")</td>
            </tr>
        </table>
    </form>
</body>
</html>
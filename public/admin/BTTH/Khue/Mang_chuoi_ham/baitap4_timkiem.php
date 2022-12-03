<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tìm kiếm</title>
</head>
<body>
<?php
function timkiem($mangso,$so)
{
    $ketqua="Không tìm thấy ".$so;
    foreach ($mangso as $key => $value) {
        if($so==$value) {
            $ketqua="Tìm thấy ".$so." tại vị trí thứ ".++$key." của mảng";
        }
    }
    return $ketqua;
}

function xuatmang($mang)
{
    if(isset($mang)) {print implode(", ", $mang);}
}

$thongBao = "";
if(isset($_POST["submit"]))
{
    $dayso = $_POST["dayso"];
    $so = $_POST["so"];
    if ((strval($so) === strval(intval($so))) ){
        $mangso = explode(",", $dayso);
        $ketqua = timkiem($mangso,$so);
    }else{
        $thongBao = 'Nhập lại';
    }
   
}

?>

<form action="" method="POST">
        <table align="center" bgcolor="#FEDDF2">
            <tr>
                <td colspan="2" bgcolor="#A0196F" align="center"><h1>TÌM KIẾM</h1></td>
            </tr>
            <tr>
                <td>Nhập mảng:</td>
                <td>
                <input type="text" name="dayso" value="<?php if (isset($_POST["dayso"])) {
                                                                echo $_POST["dayso"];} ?> " >
                </td>
            </tr>
            <tr>
                <td>Nhập số cần tìm:</td>
                <td>
                <input type="text" width="30px" name="so" value="<?php if (isset($_POST["so"])) echo $_POST["so"]?>" placeholder="<?php if(isset($thongBao)) echo $thongBao;?>">
                </td>
            </tr>
            <tr>
                <td></td>
                <td>
                <input type="submit" name="submit" width="30px" value="Tìm kiếm">
                </td>
            </tr>
            <tr>
                <td>Mảng:</td>
                <td>
                <input type=text readonly value="<?php if(isset($mangso)) xuatmang($mangso); ?>" readonly>
                </td>
            </tr>
            <tr>
                <td>Kết quả tìm kiếm:</td>
                <td>
                <input type=text style="background-color: bisque; color: red" value="<?php if(isset($so) && isset($mangso)) echo timkiem($mangso,$so); ?>" readonly>
                </td>
            </tr>
            <tr>
                <td align="center" colspan="2">(Các phần tử trong mảng sẽ cách nhau bằng dấu ",")</td>
            </tr>
        </table>
    </form>
</body>
</html>




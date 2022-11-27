<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lich</title>
</head>
<?php
if (isset($_POST['submit'])) {
    $duonglich = $_POST['duonglich'];
    $mangcann = array("Quý", "Giáp", "Ất", "Bính", "Đinh", "Mậu", "Kỷ", "Canh", "Tân", "Nhâm");
    $mangchii = array("Hợi", "Tý", "Sửu", "Dần", "Mão", "Thìn", "Tỵ", "Ngọ", "Mùi", "Thân", "Dậu", "Tuất");
    $manghinhh = array("hoi.png", "ty.png", "suu.png", "dan.png", "mao.png", "thin.png", "ti.png", "ngo.png", "mui.png", "than.png", "dau.png", "tuat.png");
    $namtinh=$duonglich-3;
    $can = $namtinh%10;
    $chi = $namtinh%12;
    $namal = $mangcann[$can];
    $namal = $namal." ".$mangchii[$chi];
    $hinh = $manghinhh[$chi];
    $hinhanh = "<img src='images/$hinh'>";
}
?>
<body>
    <form action="" method="POST">
        <table align="center" bgcolor="#C0F4FE">
            <tr>
                <td align="center" bgcolor="#1068D5" colspan="3"><h1>TÍNH NĂM ÂM LỊCH</h1></td>
            </tr>
            <tr>
                <td>Năm dương lịch</td>
                <td></td>
                <td>Năm âm lịch</td>
            </tr>
            <tr>
                <td>
                    <input type="text" style="width: 100%;" name="duonglich" value="<?php if(isset($duonglich)) echo $duonglich; ?>">
                </td>
                <td>
                    <input type="submit" style="background-color: #fab1a0; color: red;" name="submit" value="=>">
                </td>
                <td>
                    <input type="text" style="background-color: #fab1a0; color: red;" name="amlich" readonly
                    value="<?php if(isset($namal)) echo $namal;  ?>">
                </td>
            </tr>
            <tr>
                <td colspan="3" align="center"><?php if(isset($hinhanh)) echo $hinhanh; ?></td>
                </td>
            </tr>
        </table>
    </form>
</body>
</html>
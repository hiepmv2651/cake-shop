<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>PHÉP TÍNH TRÊN HAI SỐ</title>
</head>
<style>
    .title{
    color: cornflowerblue;
    text-align: center;
    text-transform: uppercase;
}
.second-left{
    color: #ff0a07 ;
    font-weight: bold;
    text-align: right;
}
.second-right{
    color: #ff0a07 ;
}
.third-four-left{
    color: blue;
    text-align: right;
}
</style>

<body>

<?php
$n1st=$n2nd="";
?>

<form method="post" name="phep_toan" action="pheptoan.php">
<table align="center">
<tr>
    <td colspan="2">
        <h1 class="title">
            PHÉP TÍNH TRÊN HAI SỐ
        </h1>
    </td>
    <tr>
        <td class="second-left">Chọn phép tính: </td>
        <td class="second-right">
            <input type="radio" name="phep_tinh"  value="Cong"
                   <?php if((isset($_POST['phep_tinh']))&&($_POST['phep_tinh']=='Cong')) {echo 'checked="checked"';}?>>Cộng
            <input type="radio" name="phep_tinh" value="Tru"
                   <?php if((isset($_POST['phep_tinh']))&&($_POST['phep_tinh']=='Tru')) {echo 'checked="checked"';}?>> Trừ
            <input type="radio" name="phep_tinh" value="Nhan"
                   <?php if((isset($_POST['phep_tinh']))&&($_POST['phep_tinh']=='Nhan')) {echo 'checked="checked"';}?> checked> Nhân
            <input type="radio" name="phep_tinh" value="Chia"
                    <?php if((isset($_POST['phep_tinh']))&&($_POST['phep_tinh']=='Chia')) {echo 'checked="checked"';}?>> chia
        </td>
    </tr>
    <tr>
        <td class="third-four-left">Số thứ nhất: </td>
        <td>
            <input type="text" name="n1st" value="<?php if(isset($_POST["n1st"])) echo $n1st; else $n1st=""; ?>">
        </td>
    </tr>
    <tr>
        <td class="third-four-left">Số thứ hai: </td>
        <td>
            <input type="text" name="n2nd" value="<?php if(isset($_POST["n2nd"])) echo $n2nd; else $n2nd=""; ?>">
        </td>
    </tr>
    <tr>
        <td></td>
        <td> <input type="submit" name="submit" value="Tính"> </td>
    </tr>
</tr>
</table>
</form>

</body>
</html>
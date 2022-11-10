<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SORT</title>
</head>
<body>
<?php

function swap(&$a, &$b) {
    $temp=$a;
    $a=$b;
    $b=$temp;
}

function sxGiam(&$arr)
{
    for($i=0;$i<count($arr)-1;$i++)
        for($j=$i+1;$j<count($arr);$j++)
            if($arr[$i] < $arr[$j]){
                swap($arr[$i],$arr[$j]);
            } 
    return $arr;
}

function sxTang(&$arr)
{
    for($i=0;$i<count($arr)-1;$i++)
        for($j=$i+1;$j<count($arr);$j++)
            if($arr[$i] > $arr[$j]){
                swap($arr[$i],$arr[$j]);
            }
    return $arr;
}

if(isset($_POST['submit']))
{
    $dayso=$_POST['dayso'];
    $mangso=explode(",",$dayso);
    $mangtang = sxTang($mangso);
    $manggiam = sxGiam($mangso);
}

?>


<form action="" method="POST">
        <table align="center" style="background-color: #63cdda;">
            <tr>
                <td colspan="2" align="center" style="background-color: #3dc1d3;">
                        <h1>SẮP XẾP MẢNG</h1>
                </td>
            </tr>
            <tr>
                <td>Nhập mảng</td>
                <td>
                    <input type="text" name="dayso" value="<?php if (isset($dayso)) { echo $dayso;}?>">
                    <b style="color: red">(*)</b>
                </td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <input type="submit" name="submit" value="Sắp xếp tăng/giảm">
                </td>
            </tr>
            <tr style="background-color: #2bcbba;">
                <td style="color: red;">Sau khi sắp xếp</td><td></td>
            </tr>
            <tr style="background-color: #2bcbba;">
                <td>Tăng dần</td>
                <td>
                    <input type="text" value="<?php if(isset($mangtang)) print implode(', ',$mangtang) ?>">
                </td>
            </tr>
            <tr style="background-color: #2bcbba;">
                <td>Giảm dần</td>
                <td>
                    <input type="text" value="<?php if(isset($manggiam)) print implode(', ',$manggiam) ?>">
                </td>
            </tr>
            <tr>
                 <td colspan="2" style="text-align: center">
                    <b style="color: red">(*)</b> Các số được nhập cách nhau bằng dấu "<b>,</b>"
                </td>
            </tr>
        </table>
    </form>


</body>
</html>
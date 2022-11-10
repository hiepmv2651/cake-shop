<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Phát Sinh Mảng Và Tính Toán</title>
</head>
<?php
    function max_array($arr){
        $max=$arr[0];
        foreach($arr as $value){
            if($value > $max) $max=$value;
        }
        return $max;
    }

    function min_array($arr){
        $min=$arr[0];
        foreach($arr as $value){
            if($value < $min) $min=$value;
        }
        return $min;
    }

    function sum_array($arr){
        $sum=0;
        foreach($arr as $value){
            $sum= $sum + $value;
        }
        return $sum;
    }

    function tao_mang($n){
        if(is_numeric($n)){
            $arr=array();
            for($i=0;$i<=$n;$i++){
                $arr[$i]=rand(0,20);
            }
            $kq=implode(" ",$arr);
            return $arr;
        }
        else $n="phai la so";
    }

    function xuatmang($arr){ 
        if(isset($arr)) {print implode("   ", $arr);}
        // return implode("    ",$arr);
    }

    $mang = array();
    if(isset($_POST['submit'])){
        $n=$_POST['n'];
        $mang = tao_mang($n);
        $maxa=max_array($mang);
        $mina=min_array($mang);
        $suma=sum_array($mang);
    }
?>
<body>
    <form action="" method="POST">
        <table align="center" bgcolor="#FEDDF2">
            <tr>
                <td colspan="2" bgcolor="#A0196F"><h1>PHÁT SINH MẢNG VÀ TÍNH TOÁN</h1></td>
            </tr>
            <tr>
                <td>Nhập số phần tử</td>
                <td>
                <input type="text" name="n" value="<?php if(isset($n)) echo $n; ?>" require>
                </td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <input type="submit" name="submit" value="Phát sinh và tính toán" style="background-color: yellow; width: 150px" >
                </td>
            </tr>
            <tr>
                <td>Mảng:</td>
                <td>
                <textarea cols="30" rows="5" readonly><?php if(isset($mang)) {print implode(", ", $mang); /*print join(',', $mang);*/}  ?></textarea>
                </td>
            </tr>
            <tr>
                <td>GTLN (MAX) trong mảng:</td>
                <td>
                    <input type="text" name="gtln" value="<?php if(isset($maxa)) echo $maxa; ?>" style="background-color: #FFA7A5; width: 150px" readonly>
                </td>
            </tr>
            <tr>
                <td>GTNN (MIN) trong mảng:</td>
                <td>
                <input type="text" name="gtnn" value="<?php if(isset($mina)) echo $mina; ?>" style="background-color: #FFA7A5; width: 150px" readonly>
                </td>
            </tr>
            <tr>
                <td>Tổng mảng:</td>
                <td>
                <input type="text" name="tongmang" value="<?php if(isset($suma)) echo $suma; ?>" style="background-color: #FFA7A5; width: 150px" readonly>
                </td>
            </tr>
            <tr>
                <td colspan="2" align="center">
                    (Ghi chú: Các phần tử trong mảng sẽ có giá trị từ 0 đến 20)
                </td>
            </tr>
        </table>
    </form>
</body>
</html>
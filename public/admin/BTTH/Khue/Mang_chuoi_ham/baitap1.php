<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bài tập 1</title>
</head>
<?php 

$so=0;
$thongBao = "";
$mang=array();
$sochan=0;
$nhohon=0;
$tongsoam =0;
$bangkhong=array();
$mangsx;

function taomang($so)
{
  $mang=array();
  for($i=0;$i<$so;$i++)
  {
            $mang[$i] = rand(-1000,1000);
  }
  return $mang;
}

function xuatmang($mang)
{
    if(isset($mang)) {print implode("   ", $mang);}
}

function demsochan($mang)
{
  $sochan=0;
  foreach ($mang as $key => $value) {
    if($value % 2 ==0)
    {
        $sochan+=1;
    }
 }
  return $sochan;
}

function demhonkhong($mang)
{
  $nhohon=0;
  foreach ($mang as $key => $value) {
    if($value<100)
    {
        $nhohon+=1;
    }
  }
  return $nhohon;
}

function tongsoam($mang)
{
  $tongsoam=0;
  $dem=0;
  foreach ($mang as $key => $value) {
    if($value<0)
    {
        $tongsoam+=$value;
        $dem++;
    }
  }
  if($dem==0) echo "Khong ton tai so am trong mang";
  return $tongsoam;
}

function bangkhong($mang)
{
  $bangkhong=array();
  foreach ($mang as $key => $value) {
    $j=0;
    if($value==0)
    {
        $bangkhong[$j++]=$key;
    }
  }
  return $bangkhong;
}

function sapxep($mang)
{
        $mangsx=$mang;
        for ($i=0; $i < count($mang)-1; $i++) { 
            for ($j=$i+1; $j < count($mang); $j++) { 
                if($mangsx[$i]>$mangsx[$j])
                {
                    $dem=0;
                    $dem=$mangsx[$i];
                    $mangsx[$i]=$mangsx[$j];
                    $mangsx[$j]=$dem;
                }
            }
        }
        #var_dump($mangsx);
        return $mangsx;
}

if(isset($_POST['submit']))
{
    $so = $_POST['soN'];
    $so +=0;
    if($so >0 && is_int($so) && is_numeric($so))
    {
        $mang = taomang($so);
        $ketQua="Mảng được tạo là:\n" .implode(" ",$mang)."\n";
        $sochan = demsochan($mang);
        $ketQua.="Có $sochan số chẵn trong mảng \n";
        $nhohon = demhonkhong($mang);
        $ketQua.="Có $nhohon phần tử trong mảng có giá trị là số nhỏ hơn 100 \n";
        $tongsoam = tongsoam($mang);
        $ketQua.="Tổng của các phần tử trong mảng có giá trị là số âm là: $tongsoam \n";
        $bangkhong = bangkhong($mang);
        $ketQua.="vị trí của các phần tử trong mảng có giá trị bằng 0 la:" .implode(" ",$bangkhong). "\n";
        $mangsx = sapxep($mang);
        $ketQua.="Mang sap xep la: \n" .implode(" ",$mangsx)."\n";
    }
    else{
        $thongBao = "Số nhập vào không phải số nguyên dương!";
    }
}

if(isset($_POST['reset'])){
    $ketQua = $soN = "";
}
?>
<body>
    <form action="" method="POST">
        <table align="center" bgcolor="#faebd7">
            <tr>
                <td colspan="2" bgcolor="orange" align="center"><h1>Bài 1</h1></td>
            </tr>
            <tr>
                <td>Nhập vào số n:</td>
                <td><input type="text" name="soN" value="<?php if(isset($soN)) echo $soN; ?>" placeholder="<?php if(isset($thongBao)) echo $thongBao; ?>"></td>
            </tr>
            <tr>
                <td>Kết quả:</td>
                <td>
                <textarea cols="50" rows="10" name="ketQua"><?php if (isset($_POST['ketQua'])) echo $ketQua?></textarea>
                </td>
            </tr>
            <tr>
                <td colspan="2" align="center">
                    <input type="submit" name="submit" value="Thực hiện">
                    <input type="submit" name="reset" value="Reset">
                </td>
            </tr>
        </table>
    </form>
</body>
</html>
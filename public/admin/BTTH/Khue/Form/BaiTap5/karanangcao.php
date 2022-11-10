<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tinh Tien KaraoKe Nang Cao</title>
</head>
<?php
    if (isset($_POST['submit'])){
        $txtbd = $_POST['a'];
        $txtkq = $_POST['b'];
        $timeA = strtotime($_POST['a']);
        $timeB = strtotime($_POST['b']);
        $a = date('H', $timeA) + date('i', $timeA) / 60;
        $b = date('H', $timeB) + date('i', $timeB) / 60;

        if ($a < 10 || $b < 10)
            $s = "Giờ nghỉ";
        elseif ($a > 24 || $b > 24)
            $s = "Nhập sai giờ";
        elseif ($a >= $b)
            $s = "Giờ kết thúc phải > giờ bắt đầu";
        else $s = round(((17 < $b) ? ((17 - $a) * 20000 + ($b - 17) * 45000) : ($b - $a) * 20000), 2);
    }
?>
<body>
    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST">
        <table align="center" bgcolor="#FEDDF2">
            <tr>
                <td colspan="3" bgcolor="#A0196F" align="center"><h1>TÍNH TIỀN KARAOKE</h1></td>
            </tr>
            <tr>
                <td>Giờ bắt đầu:</td>
                <td>
                    <input class="ip" type="time" value="<?php echo $txtbd ?? '' ?>" name="a" required>
                </td>
                <td>(h)</td>
            </tr>
            <tr>
                <td>Giờ kết thúc:</td>
                <td>
                    <input class="ip" type="time" value="<?php echo $txtkq ?? '' ?>" name="b" required>
                </td>
                <td>(h)</td>
            </tr>
            <tr>
                <td>Tiền thanh toán:</td>
                <td>
                    <input class="ip" type="text" value="<?php echo $s ?? '' ?>" disabled>
                </td>
                <td>(h)</td>
            </tr>
            <tr>
                <td colspan="3" align="center">
                    <input class="btn" type="submit" name="submit" value="Tính tiền">
                </td>
            </tr>
        </table>
    </form>
</body>
</html>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Config</title>
</head>

<body>
    <div>Bạn đã nhập thông tin thành công, dưới đây là những thông tin bạn đã nhập:</div>
    <div>Họ tên: <?php echo filter_input(INPUT_POST, "hoTen", FILTER_SANITIZE_FULL_SPECIAL_CHARS) ?></div>
    <div>Adress: <?php echo filter_input(INPUT_POST, "diaChi", FILTER_SANITIZE_FULL_SPECIAL_CHARS) ?></div>
    <div>Phone: <?php echo filter_input(INPUT_POST, "phone", FILTER_SANITIZE_FULL_SPECIAL_CHARS) ?></div>
    <div>Gender: <?php echo filter_input(INPUT_POST, "gioiTinh", FILTER_SANITIZE_FULL_SPECIAL_CHARS) ?></div>
    <div>Country: <?php echo filter_input(INPUT_POST, "country", FILTER_SANITIZE_FULL_SPECIAL_CHARS) ?></div>
    <div>Note: <?php echo filter_input(INPUT_POST, "noi-dung", FILTER_SANITIZE_FULL_SPECIAL_CHARS) ?></div>
</body>

</html>
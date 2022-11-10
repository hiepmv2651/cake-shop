<?php
$hostname = "localhost";
$username = "root";
$password = "";
$dbname = "quanly_ban_sua";
$conn = new mysqli($hostname, $username, $password, $dbname);
mysqli_set_charset($conn,'UTF8');
if ($conn->connect_error) {
    echo "Loi ket noi db " . $conn->connect_error;
}

$query = "SELECT * FROM hang_sua";
$result = mysqli_query($conn, $query);

if(mysqli_num_rows($result)!=0){
    echo "<p align='center'><font size = '5' color='blue'>THÔNG TIN HÃNG SỮA</font></p>";
    echo "<table align='center' width='100%' border='1' cellpadding='2' style='border-collapse:collapse'> ";
    echo " <tr>
            <th>Mã hãng sữa</th>
            <th>Tên hãng sữa</th>
            <th>Địa chỉ</th>
            <th>SĐT</th>
            <th>Email</th>
        </tr>";
        while($rows=mysqli_fetch_array($result)){
            echo "<tr>";
            for ($i=0; $i<mysqli_num_fields($result); $i++){
                echo "<td>".$rows[$i]."</td>";
            }
            echo "</tr>";
        }
        echo "</table>";
}
?>

<?php
    while ($rows = mysqli_fetch_array($result)) {
        echo "<tr>";
        for ($i = 0; $i < mysqli_num_fields($result); $i++) {
            if ($i == 2) {
                if ($rows[2] == 0)
                    echo "<td><img src='nam.jpg' alt='' style='width: 50px; height:50px'></td>";
                else
                    echo "<td><img src='nu.jpg' alt='' style='width: 50px; height:50px'></td>";
            } else
                echo "<td>" . $rows[$i] . "</td>";
        }
        echo "</tr>";
    }
    
    mysqli_free_result($result);
    mysqli_close($conn);
 ?>


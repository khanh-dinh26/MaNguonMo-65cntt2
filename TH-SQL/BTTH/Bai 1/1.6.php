<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Kết quả truy vấn</title>
    <style>
        table {
            width: 100%;
        }
        th, td {
            border: 1px solid #030303;
            padding: 8px;
        }
        
    </style>
</head>
<body>

<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "quanly_ban_sua";

$conn = mysqli_connect($servername, $username, $password, $dbname);
mysqli_set_charset($conn, 'utf8');

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
echo "<b>Ket noi thanh cong</b><br><br>";

$query_1_6_1  = "SELECT * FROM hang_sua WHERE Ma_Hang_Sua NOT IN (SELECT Ma_Hang_Sua FROM sua WHERE Trong_luong = 900)";
$query_1_6_2  = "SELECT * FROM khach_hang WHERE Ma_Khach_Hang NOT IN (SELECT Ma_khach_hang FROM hoa_don)";
$query_1_6_3  = "SELECT * FROM sua WHERE Ma_Hang_Sua = (SELECT Ma_Hang_Sua FROM sua WHERE Ma_Sua = 'AB0002')";
$query_1_6_4  = "SELECT * FROM hang_sua WHERE Ma_Hang_Sua NOT IN (SELECT Ma_Hang_Sua FROM sua)";
$query_1_6_5  = "SELECT * FROM sua s WHERE Don_gia = (SELECT MAX(Don_gia) FROM sua WHERE Ma_Hang_Sua = s.Ma_Hang_Sua)";
$query_1_6_6  = "SELECT * FROM loai_sua WHERE Ma_Loai_Sua NOT IN (SELECT s.Ma_Loai_Sua FROM sua s JOIN hang_sua h ON s.Ma_Hang_Sua = h.Ma_Hang_Sua WHERE h.Ten_Hang_Sua LIKE '%Abbott%')";
$query_1_6_7  = "SELECT * FROM sua WHERE Ma_Loai_Sua = 'SB' AND Don_gia < (SELECT MIN(s.Don_gia) FROM sua s JOIN hang_sua h ON s.Ma_Hang_Sua = h.Ma_Hang_Sua WHERE h.Ten_Hang_Sua LIKE '%Vinamilk%' AND s.Ma_Loai_Sua = 'SB')";
$query_1_6_8  = "SELECT h.Ten_Hang_Sua, s.Ten_sua, s.Trong_luong FROM sua s JOIN hang_sua h ON s.Ma_Hang_Sua = h.Ma_Hang_Sua WHERE s.Trong_luong = (SELECT MAX(Trong_luong) FROM sua WHERE Ma_Hang_Sua = s.Ma_Hang_Sua)";
$query_1_6_9  = "SELECT h.Ten_Hang_Sua, s.Ten_sua, s.Trong_luong, s.Don_gia FROM sua s JOIN hang_sua h ON s.Ma_Hang_Sua = h.Ma_Hang_Sua WHERE s.Ma_Loai_Sua = 'SB' AND s.Trong_luong >= 400 AND s.Don_gia = (SELECT MAX(Don_gia) FROM sua WHERE Ma_Hang_Sua = s.Ma_Hang_Sua AND Ma_Loai_Sua = 'SB' AND Trong_luong >= 400)";
$query_1_6_10 = "SELECT h.Ten_Hang_Sua, s.Ten_sua, s.Trong_luong FROM sua s JOIN hang_sua h ON s.Ma_Hang_Sua = h.Ma_Hang_Sua WHERE h.Ten_Hang_Sua LIKE '%Dutch Lady%' AND s.Trong_luong = (SELECT MAX(s2.Trong_luong) FROM sua s2 JOIN hang_sua h2 ON s2.Ma_Hang_Sua = h2.Ma_Hang_Sua WHERE h2.Ten_Hang_Sua LIKE '%Dutch Lady%')";
$result = mysqli_query($conn, $query1);

if (!$result) {
    die('<br> <b>Query failed</b>');
}

if (mysqli_num_rows($result) != 0) {
    echo "<table>";

    echo "<tr>";
    $fields = mysqli_fetch_fields($result);
    foreach ($fields as $field) {
        echo "<th>" . $field->name . "</th>";
    }
    echo "</tr>";

    while ($row = mysqli_fetch_array($result)) {
        echo "<tr>";
        for ($i = 0; $i < mysqli_num_fields($result); $i++) {
            echo "<td>" . $row[$i] . "</td>";
        }
        echo "</tr>";
    }

    echo "</table>";
} else {
    echo "Khong co du lieu";
}

mysqli_close($conn);
?>

</body>
</html>
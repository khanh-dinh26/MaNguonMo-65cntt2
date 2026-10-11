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

$query1  = "SELECT Ten_Hang_Sua, Dia_chi, Dien_thoai FROM hang_sua";
$query2  = "SELECT Ten_Khach_Hang, Dia_chi, Dien_thoai FROM khach_hang ORDER BY Ten_Khach_Hang ASC";
$query3  = "SELECT Ten_Khach_Hang, Phai, Dia_chi, Dien_thoai FROM khach_hang ORDER BY Phai ASC";
$query4  = "SELECT Ten_sua, Trong_luong, Don_gia FROM sua ORDER BY Ten_sua ASC, Don_gia DESC";
$query5  = "SELECT Ten_sua, Trong_luong, Don_gia, TP_Dinh_Duong FROM sua WHERE Ten_sua LIKE 'S%'";
$query6  = "SELECT Ma_Hang_Sua, Ten_Hang_Sua, Dia_chi, Dien_thoai FROM hang_sua WHERE Ma_Hang_Sua LIKE '%M'";
$query7  = "SELECT * FROM sua WHERE Ten_sua LIKE '%grow%'";
$query8  = "SELECT Ten_sua, Don_gia, Trong_luong FROM sua WHERE Don_gia > 100000 ORDER BY Ten_sua DESC";
$query9  = "SELECT Ten_sua, TP_Dinh_Duong, Loi_ich FROM sua WHERE Ma_Loai_Sua = 'SC' AND Ma_Hang_Sua = 'VNM' ORDER BY Ten_sua ASC";
$query10 = "SELECT * FROM sua WHERE Trong_luong >= 900 OR Ma_Hang_Sua = 'DS'";
$query11 = "SELECT * FROM sua WHERE Don_gia BETWEEN 100000 AND 150000";
$query12 = "SELECT * FROM sua WHERE Ma_Hang_Sua IN ('DM', 'DL', 'DS') AND Trong_luong >= 800 ORDER BY Trong_luong ASC";
$query13 = "SELECT * FROM sua WHERE Ma_Loai_Sua = 'SD' OR Don_gia <= 12000";
$query14 = "SELECT * FROM khach_hang WHERE Phai = 0 AND Ten_Khach_Hang LIKE 'N%'";
$query15 = "SELECT Ten_Hang_Sua FROM hang_sua WHERE Ma_Hang_Sua NOT LIKE '%M%'";
$query16 = "SELECT Ten_sua, TP_Dinh_Duong FROM sua WHERE TP_Dinh_Duong LIKE '%canxi%' AND TP_Dinh_Duong LIKE '%vitamin%'";
$query17 = "SELECT * FROM sua WHERE Trong_luong IN (180, 200, 900)";
$query18 = "SELECT * FROM sua WHERE Trong_luong NOT IN (400, 800, 900)";
$query19 = "SELECT Ten_sua, Don_gia, TP_Dinh_Duong FROM sua ORDER BY Don_gia DESC LIMIT 10";
$query20 = "SELECT s.Ten_sua, s.Trong_luong FROM sua s JOIN hang_sua h ON s.Ma_Hang_Sua = h.Ma_Hang_Sua WHERE h.Ten_Hang_Sua LIKE '%Vinamilk%' ORDER BY s.Trong_luong DESC LIMIT 3";
$query21 = "SELECT s.Ten_sua, s.Loi_ich, s.Don_gia FROM sua s JOIN hang_sua h ON s.Ma_Hang_Sua = h.Ma_Hang_Sua WHERE h.Ten_Hang_Sua LIKE '%Vinamilk%' ORDER BY s.Don_gia DESC";
$query22 = "SELECT s.Ten_sua, s.Trong_luong, s.Loi_ich FROM sua s JOIN hang_sua h ON s.Ma_Hang_Sua = h.Ma_Hang_Sua WHERE h.Ten_Hang_Sua LIKE '%Abbott%' ORDER BY s.Trong_luong ASC";


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
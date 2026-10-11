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

$query1  = "SELECT ROUND(AVG(Tri_gia), -3) AS Tri_gia_trung_binh FROM hoa_don";
$query2  = "SELECT * FROM hoa_don WHERE MONTH(Ngay_HD) = 7 AND YEAR(Ngay_HD) = 2007";
$query3  = "SELECT So_Hoa_Don, Ngay_HD, DATEDIFF(CURDATE(), Ngay_HD) AS So_ngay FROM hoa_don ORDER BY So_ngay DESC";
$query4  = "SELECT * FROM sua WHERE CHAR_LENGTH(Ten_sua) <= 10";
$query5  = "SELECT UPPER(Ten_Hang_Sua) AS Ten_Hang_Sua_HOA, Dia_chi, Dien_thoai FROM hang_sua";
$query6  = "SELECT So_Hoa_Don, DATE_FORMAT(Ngay_HD, '%W - %d %M %Y') AS Ngay_dinh_dang FROM hoa_don";
$query7  = "SELECT DISTINCT s.Ten_sua, CONCAT(s.Trong_luong, ' gr') AS Trong_luong, CONCAT(FORMAT(ct.Don_gia, 0), ' VNĐ') AS Don_gia FROM hoa_don hd JOIN ct_hoadon ct ON hd.So_Hoa_Don = ct.So_Hoa_Don JOIN sua s ON ct.Ma_Sua = s.Ma_Sua WHERE MONTH(hd.Ngay_HD) = 8 AND YEAR(hd.Ngay_HD) = 2007";
$query8  = "SELECT CONCAT(Ma_Khach_Hang, ' - ', Ten_Khach_Hang) AS ma_ten_KH, IF(Phai = 1, 'Nữ', 'Nam') AS Gioi_tinh, Dia_chi, Dien_thoai, Email FROM khach_hang";
$query9  = "SELECT Ten_sua, Trong_luong, Don_gia, IF(Don_gia < 100000, 'Sữa giá trung bình', 'Sữa giá cao') AS Danh_gia FROM sua WHERE Trong_luong BETWEEN 400 AND 500";
$query10 = "SELECT So_Hoa_Don, CONCAT(CASE DAYOFWEEK(Ngay_HD) WHEN 1 THEN 'Chủ Nhật' WHEN 2 THEN 'Thứ Hai' WHEN 3 THEN 'Thứ Ba' WHEN 4 THEN 'Thứ Tư' WHEN 5 THEN 'Thứ Năm' WHEN 6 THEN 'Thứ Sáu' WHEN 7 THEN 'Thứ Bảy' END, DATE_FORMAT(Ngay_HD, ' ngày %d tháng %m năm %Y')) AS Ngay_dinh_dang_VN FROM hoa_don ORDER BY Ngay_HD ASC";
$query11 = "SELECT SUM(IF(Phai = 0, 1, 0)) AS So_KH_Nam, SUM(IF(Phai = 1, 1, 0)) AS So_KH_Nu, COUNT(*) AS Tong_so_KH FROM khach_hang";



$result = mysqli_query($conn, $query7);

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
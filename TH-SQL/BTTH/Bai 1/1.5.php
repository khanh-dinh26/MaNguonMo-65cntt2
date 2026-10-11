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

$query_1_5_1  = "SELECT h.Ten_Hang_Sua, COUNT(s.Ma_Sua) AS Tong_so_san_pham FROM hang_sua h LEFT JOIN sua s ON h.Ma_Hang_Sua = s.Ma_Hang_Sua GROUP BY h.Ma_Hang_Sua, h.Ten_Hang_Sua ORDER BY Tong_so_san_pham ASC";
$query_1_5_2  = "SELECT h.Ten_Hang_Sua, AVG(s.Don_gia) AS Don_gia_TB FROM hang_sua h JOIN sua s ON h.Ma_Hang_Sua = s.Ma_Hang_Sua WHERE s.Trong_luong IN (800, 900) GROUP BY h.Ma_Hang_Sua, h.Ten_Hang_Sua";
$query_1_5_3  = "SELECT h.Ten_Hang_Sua, MIN(s.Trong_luong) AS Trong_luong_nho_nhat, MAX(s.Trong_luong) AS Trong_luong_lon_nhat FROM hang_sua h JOIN sua s ON h.Ma_Hang_Sua = s.Ma_Hang_Sua GROUP BY h.Ma_Hang_Sua, h.Ten_Hang_Sua";
$query_1_5_4  = "SELECT h.Ten_Hang_Sua, SUM(s.Don_gia) AS Tong_gia_tien, COUNT(s.Ma_Sua) AS So_san_pham FROM hang_sua h JOIN sua s ON h.Ma_Hang_Sua = s.Ma_Hang_Sua WHERE s.Trong_luong BETWEEN 400 AND 500 GROUP BY h.Ma_Hang_Sua, h.Ten_Hang_Sua";
$query_1_5_5  = "SELECT hd.So_Hoa_Don, hd.Ngay_HD, SUM(ct.So_luong) AS Tong_so_luong, SUM(ct.So_luong * ct.Don_gia) AS Tong_thanh_tien FROM hoa_don hd JOIN ct_hoadon ct ON hd.So_Hoa_Don = ct.So_Hoa_Don GROUP BY hd.So_Hoa_Don, hd.Ngay_HD";
$query_1_5_6  = "SELECT hd.So_Hoa_Don, SUM(ct.So_luong * ct.Don_gia) AS Tong_tri_gia FROM hoa_don hd JOIN ct_hoadon ct ON hd.So_Hoa_Don = ct.So_Hoa_Don GROUP BY hd.So_Hoa_Don HAVING Tong_tri_gia > 2000000";
$query_1_5_7  = "SELECT l.Ten_loai, COUNT(s.Ma_Sua) AS Tong_so_san_pham FROM loai_sua l LEFT JOIN sua s ON l.Ma_Loai_Sua = s.Ma_Loai_Sua GROUP BY l.Ma_Loai_Sua, l.Ten_loai";
$query_1_5_8  = "SELECT h.Ten_Hang_Sua, MAX(s.Don_gia) AS Don_gia_cao_nhat FROM hang_sua h JOIN sua s ON h.Ma_Hang_Sua = s.Ma_Hang_Sua GROUP BY h.Ma_Hang_Sua, h.Ten_Hang_Sua";
$query_1_5_9  = "SELECT s.Ma_Sua, s.Ten_sua, SUM(ct.So_luong) AS So_luong_ban FROM sua s JOIN ct_hoadon ct ON s.Ma_Sua = ct.Ma_Sua JOIN hoa_don hd ON ct.So_Hoa_Don = hd.So_Hoa_Don WHERE MONTH(hd.Ngay_HD) = 8 AND YEAR(hd.Ngay_HD) = 2007 GROUP BY s.Ma_Sua, s.Ten_sua";
$query_1_5_10 = "SELECT h.Ten_Hang_Sua, h.Dia_chi, h.Dien_thoai FROM hang_sua h JOIN sua s ON h.Ma_Hang_Sua = s.Ma_Hang_Sua GROUP BY h.Ma_Hang_Sua, h.Ten_Hang_Sua, h.Dia_chi, h.Dien_thoai HAVING MIN(s.Don_gia) >= 50000";
$query_1_5_11 = "SELECT h.Ma_Hang_Sua, h.Ten_Hang_Sua, COUNT(s.Ma_Sua) AS So_san_pham FROM hang_sua h JOIN sua s ON h.Ma_Hang_Sua = s.Ma_Hang_Sua GROUP BY h.Ma_Hang_Sua, h.Ten_Hang_Sua HAVING COUNT(s.Ma_Sua) > 10";
$query_1_5_12 = "SELECT h.Ma_Hang_Sua, h.Ten_Hang_Sua, COUNT(s.Ma_Sua) AS So_san_pham, CASE WHEN COUNT(s.Ma_Sua) < 5 THEN 'Có ít sản phẩm' WHEN COUNT(s.Ma_Sua) BETWEEN 5 AND 10 THEN 'Có khá nhiều sản phẩm' ELSE 'Có rất nhiều sản phẩm' END AS Ghi_chu FROM hang_sua h LEFT JOIN sua s ON h.Ma_Hang_Sua = s.Ma_Hang_Sua GROUP BY h.Ma_Hang_Sua, h.Ten_Hang_Sua";
$query_1_5_13 = "SELECT SUM(ct.So_luong) AS Tong_so_luong_ban FROM ct_hoadon ct JOIN hoa_don hd ON ct.So_Hoa_Don = hd.So_Hoa_Don JOIN sua s ON ct.Ma_Sua = s.Ma_Sua JOIN hang_sua h ON s.Ma_Hang_Sua = h.Ma_Hang_Sua WHERE h.Ten_Hang_Sua LIKE '%Abbott%' AND hd.Ngay_HD BETWEEN '2007-07-01' AND '2007-08-31'";

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
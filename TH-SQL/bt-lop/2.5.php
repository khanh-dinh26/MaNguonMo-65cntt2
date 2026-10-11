<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Thông Tin Các Sản Phẩm - List Đơn Giản</title>
    <style>
        .container {
            width: 600px;
            margin: 20px auto;
            border: 1px solid #d5835c;
        }
        .header {
            background-color: #fee5d9;
            color: #d9531e;
            text-align: center;
            font-size: 20px;
            font-weight: bold;
            padding: 10px 0;
        }
        .product-row {
            display: flex;
            align-items: center;
            padding: 10px 15px;
            border-top: 1px solid #f9d3b4;
        }
        .product-row:nth-child(even) { background-color: #ffffff; }
        .product-row:nth-child(odd) { background-color: #fffaf5; }
        .product-img {
            width: 120px;
            text-align: center;
            margin-right: 15px;
        }
        .product-img img {
            max-width: 100px;
            max-height: 100px;
            object-fit: contain;
        }
        .product-info {
            flex: 1;
            line-height: 1.6;
            font-size: 14px;
        }
        .product-name {
            font-size: 15px;
            font-weight: bold;
            color: #b45f06;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="header">THÔNG TIN CÁC SẢN PHẨM</div>
    <?php
        $conn = mysqli_connect('localhost', 'root', '', 'quanly_ban_sua')
            or die('Không thể kết nối CSDL: ' . mysqli_connect_error());
        mysqli_set_charset($conn, 'utf8');

        $sql = "SELECT s.Ten_sua, h.Ten_hang_sua, l.Ten_loai, s.Trong_luong, s.Don_gia, s.Hinh 
                FROM sua s
                JOIN hang_sua h ON s.Ma_hang_sua = h.Ma_hang_sua
                JOIN loai_sua l ON s.Ma_loai_sua = l.Ma_loai_sua";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $hinh = !empty($row['Hinh']) ? 'Hinh_sua/' . $row['Hinh'] : 'Hinh_sua/default.jpg';
                echo "<div class='product-row'>";
                echo "  <div class='product-img'>";
                echo "      <img src='{$hinh}' alt='{$row['Ten_sua']}' onerror=\"this.src='https://via.placeholder.com/100x100?text=Sua'\">";
                echo "  </div>";
                echo "  <div class='product-info'>";
                echo "      <div class='product-name'>{$row['Ten_sua']}</div>";
                echo "      <div>Nhà sản xuất: {$row['Ten_hang_sua']}</div>";
                echo "      <div>{$row['Ten_loai']} - {$row['Trong_luong']} gr - " . number_format($row['Don_gia'], 0, ',', '.') . " VNĐ</div>";
                echo "  </div>";
                echo "</div>";
            }
        }
        mysqli_free_result($result);
        mysqli_close($conn);
    ?>
</div>

</body>
</html>
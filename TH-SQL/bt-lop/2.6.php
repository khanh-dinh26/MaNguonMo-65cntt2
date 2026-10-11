<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Thông Tin Các Sản Phẩm - Dạng Cột</title>
    <style>
        table.grid {
            width: 85%;
            margin: 20px auto;
            border-collapse: collapse;
            border: 2px solid #d5835c;
        }
        th.title {
            background-color: #fee5d9;
            color: #d9531e;
            text-align: center;
            font-size: 20px;
            padding: 10px;
        }
        td.product-cell {
            width: 20%;
            border: 1px solid #f9d3b4;
            padding: 10px;
            text-align: center;
            vertical-align: top;
            background-color: #ffffff;
        }
        .p-name {
            font-weight: bold;
            color: #b45f06;
            min-height: 40px;
            font-size: 13px;
        }
        .p-desc {
            font-size: 13px;
            color: #555;
            margin: 5px 0;
        }
        .p-img img {
            width: 90px;
            height: 90px;
            object-fit: contain;
        }
    </style>
</head>
<body>

<?php
    $conn = mysqli_connect('localhost', 'root', '', 'quanly_ban_sua')
        or die('Không thể kết nối CSDL: ' . mysqli_connect_error());
    mysqli_set_charset($conn, 'utf8');

    $sql = "SELECT Ten_sua, Trong_luong, Don_gia, Hinh FROM sua";
    $result = mysqli_query($conn, $sql);

    echo "<table class='grid'>";
    echo "<tr><th colspan='5' class='title'>THÔNG TIN CÁC SẢN PHẨM</th></tr>";

    $cols = 5;
    $count = 0;

    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            if ($count % $cols == 0) echo "<tr>";

            $hinh = !empty($row['Hinh']) ? 'Hinh_sua/' . $row['Hinh'] : 'Hinh_sua/default.jpg';
            $gia = number_format($row['Don_gia'], 0, ',', '.') . " VNĐ";

            echo "<td class='product-cell'>";
            echo "  <div class='p-name'>{$row['Ten_sua']}</div>";
            echo "  <div class='p-desc'>{$row['Trong_luong']} gr - {$gia}</div>";
            echo "  <div class='p-img'><img src='{$hinh}' alt='{$row['Ten_sua']}' onerror=\"this.src='https://via.placeholder.com/90x90?text=Sua'\"></div>";
            echo "</td>";

            $count++;
            if ($count % $cols == 0) echo "</tr>";
        }

        if ($count % $cols != 0) {
            $missing = $cols - ($count % $cols);
            for ($i = 0; $i < $missing; $i++) echo "<td class='product-cell'></td>";
            echo "</tr>";
        }
    }
    echo "</table>";

    mysqli_free_result($result);
    mysqli_close($conn);
?>

</body>
</html>
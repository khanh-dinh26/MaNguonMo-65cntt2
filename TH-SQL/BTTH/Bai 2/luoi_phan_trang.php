<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Thông Tin Sữa Phân Trang</title>
    <style>
        table {
            border-collapse: collapse;
            width: 80%;
            margin: 20px auto 10px auto;
            border: 1px solid #d5835c;
        }
        th, td {
            padding: 8px 12px;
            border: 1px solid #f9d3b4;
        }
        th {
            background-color: #fee5d9;
            color: #d9531e;
            text-align: center;
        }
        tr:nth-child(even) { 
            background-color: #fff2e6; 
        }
        tr:nth-child(odd) { 
            background-color: #ffffff; 
        }
        .center { 
            text-align: center; 
        }
        .right { 
            text-align: right; 
        }
        h2 { 
            text-align: center; color: #d9531e; 
        }
        .pagination {
            text-align: center;
            margin: 15px auto;
        }
        .pagination a, .pagination span {
            display: inline-block;
            padding: 2px 4px;
            margin: 0 2px;

        }
       
        
    </style>
</head>
<body>

    <h2>THÔNG TIN SỮA</h2>

    <div style="overflow-x: auto;">
        <?php
            $conn = mysqli_connect('localhost', 'root', '', 'quanly_ban_sua')
                or die('Không thể kết nối CSDL: ' . mysqli_connect_error());
            mysqli_set_charset($conn, 'utf8');

            $rowsPerPage = 5; 
            $page = isset($_GET['page']) && is_numeric($_GET['page']) ? (int)$_GET['page'] : 1;
            if ($page < 1) $page = 1;
            $offset = ($page - 1) * $rowsPerPage;

            $totalSql = "SELECT COUNT(*) AS total FROM sua";
            $totalResult = mysqli_query($conn, $totalSql);
            $totalRow = mysqli_fetch_assoc($totalResult);
            $maxPages = ceil($totalRow['total'] / $rowsPerPage);

            $sql = "SELECT s.Ten_sua, h.Ten_hang_sua, l.Ten_loai, s.Trong_luong, s.Don_gia 
                    FROM sua s
                    JOIN hang_sua h ON s.Ma_hang_sua = h.Ma_hang_sua
                    JOIN loai_sua l ON s.Ma_loai_sua = l.Ma_loai_sua
                    LIMIT $offset, $rowsPerPage";
            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) > 0) {
                echo "<table>";
                echo "<tr>";
                echo "<th>Số TT</th>";
                echo "<th>Tên sữa</th>";
                echo "<th>Hãng sữa</th>";
                echo "<th>Loại sữa</th>";
                echo "<th>Trọng lượng</th>";
                echo "<th>Đơn giá</th>";
                echo "</tr>";

                $stt = $offset + 1;
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td class='center'>" . $stt++ . "</td>";
                    echo "<td>" . $row['Ten_sua'] . "</td>";
                    echo "<td>" . $row['Ten_hang_sua'] . "</td>";
                    echo "<td>" . $row['Ten_loai'] . "</td>";
                    echo "<td class='center'>" . $row['Trong_luong'] . " gram</td>";
                    echo "<td class='right'>" . number_format($row['Don_gia'], 0, ',', '.') . " VNĐ</td>";
                    echo "</tr>";
                }

                echo "</table>";

                echo "<div class='pagination'>";
                if ($page > 1) {
                    echo "<a href='?page=1'>&lt;&lt;</a>";
                    echo "<a href='?page=" . ($page - 1) . "'>&lt;</a>";
                }

                for ($i = 1; $i <= $maxPages; $i++) {
                    if ($i == $page) {
                        echo "<span class='current'>$i</span>";
                    } else {
                        echo "<a href='?page=$i'>$i</a>";
                    }
                }

                if ($page < $maxPages) {
                    echo "<a href='?page=" . ($page + 1) . "'>&gt;</a>";
                    echo "<a href='?page=$maxPages'>&gt;&gt;</a>";
                }
                echo "</div>";

            } else {
                echo "<p style='text-align:center;'>Không có dữ liệu.</p>";
            }

            mysqli_free_result($result);
            mysqli_close($conn);
        ?>
    </div>

</body>
</html>
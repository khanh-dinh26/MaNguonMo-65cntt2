<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bán sữa</title>
    <style>
        table {
            border-collapse: collapse;
            border-spacing: 0;
            width: 100%;
            border: 1px solid #ddd;
        }

        th, td {
            text-align: left;
            padding: 8px;
            border: 1px solid #ddd;
        }

        th {
            background-color: #91f5f5;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>

    <h2>Danh Sách Khách Hàng</h2>

    <div style="overflow-x: auto;">
        <?php
            $conn = mysqli_connect('localhost', 'root', '', 'quanly_ban_sua')
                or die('Không thể kết nối tới database: ' . mysqli_connect_error());
            mysqli_set_charset($conn, 'utf8');

            $sql = "SELECT * FROM Khach_hang WHERE RIGHT(Dien_thoai, 1) IN ('0', '2', '4', '6', '8')";
            $result = mysqli_query($conn, $sql);
            if (mysqli_num_rows($result) != 0) {
                
                echo "<table>";
                echo "<tr>";
                echo "<th>Mã khách hàng</th>";
                echo "<th>Tên khách hàng</th>";
                echo "<th>Phái</th>";
                echo "<th>Địa chỉ</th>";
                echo "<th>Điện thoại</th>";
                echo "<th>Email</th>";
                echo "</tr>";

                while ($row = mysqli_fetch_array($result)) {
                    echo "<tr>";
                    for ($i = 0; $i < mysqli_num_fields($result); $i++) {
                        if ($i == 2) {
                            $gioiTinh = ($row[$i] == 1) ? "Nữ" : "Nam";
                            echo "<td>" . $gioiTinh . "</td>";
                        } else {
                            echo "<td>" . $row[$i] . "</td>";
                        }
                    }
                    echo "</tr>";
                }

                echo "</table>";
            } else {
                echo "Không có dữ liệu.";
            }
            mysqli_free_result($result);
            mysqli_close($conn);
        ?>
    </div>

</body>
</html>
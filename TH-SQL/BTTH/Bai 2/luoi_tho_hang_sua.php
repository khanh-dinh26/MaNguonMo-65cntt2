<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Thông Tin Hãng Sữa</title>
    <style>
        table {
            width: 80%;
            margin: 20px auto;
        }
        th, td {
            border: 1px solid #999;
            padding: 8px;
        }
        
        h2 {
            text-align: center;
            color: #69c3cd;
        }
    </style>
</head>
<body>

    <h2>THÔNG TIN HÃNG SỮA</h2>

    <div style="overflow-x: auto;">
        <?php
            $conn = mysqli_connect('localhost', 'root', '', 'quanly_ban_sua')
                or die('Không thể kết nối CSDL: ' . mysqli_connect_error());
            mysqli_set_charset($conn, 'utf8');

            $sql = "SELECT  *FROM hang_sua";
            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) > 0) {
                echo "<table>";
                echo "<tr>";
                echo "<th>Mã HS</th>";
                echo "<th>Tên hãng sữa</th>";
                echo "<th>Địa chỉ</th>";
                echo "<th>Điện thoại</th>";
                echo "<th>Email</th>";
                echo "</tr>";

                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>" . $row['Ma_hang_sua'] . "</td>";
                    echo "<td>" . $row['Ten_hang_sua'] . "</td>";
                    echo "<td>" . $row['Dia_chi'] . "</td>";
                    echo "<td>" . $row['Dien_thoai'] . "</td>";
                    echo "<td>" . $row['Email'] . "</td>";
                    echo "</tr>";
                }

                echo "</table>";
            } else {
                echo "<p style='text-align:center;'>Không có dữ liệu.</p>";
            }

            mysqli_free_result($result);
            mysqli_close($conn);
        ?>
    </div>

</body>
</html>
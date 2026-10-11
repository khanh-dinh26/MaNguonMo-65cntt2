<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Thông Tin Khách Hàng</title>
    <style>
        table {
            border-collapse: collapse;
            width: 80%;
            margin: 20px auto;
            border: 1px solid #d5835c;
        }
        th, td {
            padding: 8px 12px;
            border: 1px solid #f9d3b4;
        }
        th {
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
        h2 {
            text-align: center;
            color: #d9531e;
        }
    </style>
</head>
<body>

    <h2>THÔNG TIN KHÁCH HÀNG</h2>

    <div style="overflow-x: auto;">
        <?php
            $conn = mysqli_connect('localhost', 'root', '', 'quanly_ban_sua')
                or die('Không thể kết nối CSDL: ' . mysqli_connect_error());
            mysqli_set_charset($conn, 'utf8');

            $sql = "SELECT * FROM khach_hang";
            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) > 0) {
                echo "<table>";
                echo "<tr>";
                echo "<th>Mã KH</th>";
                echo "<th>Tên khách hàng</th>";
                echo "<th>Giới tính</th>";
                echo "<th>Địa chỉ</th>";
                echo "<th>Số điện thoại</th>";
                echo "</tr>";

                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>" . $row['Ma_khach_hang'] . "</td>";
                    echo "<td>" . $row['Ten_khach_hang'] . "</td>";
                    echo "<td class='center'>" . $row['Phai'] . "</td>";
                    echo "<td>" . $row['Dia_chi'] . "</td>";
                    echo "<td>" . $row['Dien_thoai'] . "</td>";
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
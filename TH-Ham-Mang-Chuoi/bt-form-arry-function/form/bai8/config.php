<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Config</title>        
</head>
<body>

    <div class="container">
        <h2>THÔNG TIN ĐÃ NHẬP</h2>
        <?php

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            echo "<p>Bạn đã nhập thành công, dưới đây là những thông tin bạn đã nhập:</p>";

            $fullname = isset($_POST['fullname']) ? htmlspecialchars(trim($_POST['fullname'])) : "";
            $address = isset($_POST['address']) ? htmlspecialchars(trim($_POST['address'])) : "";
            $phone = isset($_POST['phone']) ? htmlspecialchars(trim($_POST['phone'])) : "";
            $gender = isset($_POST['gender']) ? htmlspecialchars($_POST['gender']) : "";
            $country = isset($_POST['country']) ? htmlspecialchars($_POST['country']) : "";
            $note = isset($_POST['note']) ? htmlspecialchars(trim($_POST['note'])) : "";

            $study = "";
            if (isset($_POST['study'])) {
                $study = htmlspecialchars(implode(", ", $_POST['study']));
            }
            
            echo "<b>Họ tên:</b> " . $fullname . "<br>";
            echo "<b>Address:</b> " . $address . "<br>";
            echo "<b>Phone:</b> " . $phone . "<br>";
            echo "<b>Gender:</b> " . $gender . "<br>";
            echo "<b>Country:</b> " . $country . "<br>";
            echo "<b>Study:</b> " . $study . "<br>";
            echo "<b>Note:</b> " . nl2br($note) . "<br>";
        } else {
            echo "<p style='color: red;'>Không có dữ liệu!</p>";
        }
        ?>

       
    </div>
     <a href="javascript:window.history.back();" class="back-link">Quay về trang trước</a>

</body>
</html>
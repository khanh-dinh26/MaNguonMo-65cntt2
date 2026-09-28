<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kết quả đăng nhập</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <div class="result-box">
            <?php
                if (isset($_POST['user']) && isset($_POST['pass'])) {
                    $user = $_POST['user'];
                    $pass = $_POST['pass'];

                    if ($user == 'admin' && $pass == '12345') {
                        echo "<h3 style='font-family: Tahoma; color: red;'>welcome, admin</h3>";
                    } else {
                        echo "<h3>Username hoặc password sai. Vui lòng nhập lại</h3>";
                    }
                    
                    echo "<br><br><a href='login.php'>Quay lại trang đăng nhập</a>";
                }
            ?>
        </div>
    </div>
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kết quả đăng ký</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <?php
        if (isset($_POST['register'])) {
            $fullname = $_POST['fullname'];
            $email    = $_POST['email'];
            $pass     = $_POST['pass'];
            $confirm  = $_POST['confirm'];

            echo "<div class='msg-box'>";
            
            if ($pass != $confirm) {
                echo "Incorrect confirm password!";
            } else {
                echo "Thank $fullname !, please confirm registration in your email: $email";
            }

            echo "</div>";

          echo "<a href='register.php' class='back-link'>Quay lại trang đăng ký</a>";
        }
    ?>

</body>
</html>
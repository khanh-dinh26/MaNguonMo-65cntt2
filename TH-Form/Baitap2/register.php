<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Đăng Ký</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h2>Registration</h2>

        <form method="POST" action="xuly.php">
            <div class="form-grid">
                <div><label>Full Name</label><input type="text" name="fullname" required></div>
                <div><label>Username</label><input type="text" name="username" required></div>
                <div><label>Email</label><input type="text" name="email" required></div>
                <div><label>Phone Number</label><input type="text" name="phone" required></div>
                <div><label>Password</label><input type="password" name="pass" required></div>
                <div><label>Confirm Password</label><input type="password" name="confirm" required></div>
            </div>

            <label>Gender</label><br>
            <input type="radio" name="gender" value="Male" checked> Male &nbsp;
            <input type="radio" name="gender" value="Female"> Female &nbsp;
            <input type="radio" name="gender" value="Prefer not to say"> Prefer not to say

            <input type="submit" name="register" value="Register" class="btn">
        </form>
    </div>
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Diện Tích và Chu Vi Hình Tròn</title>
    <style>
       body { 
            font-family: sans-serif; 
            text-align: center; 
            margin-top: 50px; }
        
        form { 
            display: inline-block; 
            background-color: #fce4d6; 
            padding: 20px; 
            border: 1px solid #ccc; 
            text-align: left; 
        }
        
         h2 { 
            text-align: center; 
            background-color: #c21826; 
            color: white;
            margin: -20px -20px 20px -20px; 
            padding: 15px 0;
         }
        
        label { 
            display: inline-block; 
            width: 130px; 
            font-weight: bold; 
        }
        
        input { 
            margin-bottom: 10px; 
        }

        input[readonly] { 
            background-color: #eee; 
            color: red; 
        }
        
        button { 
            display: block; 
            margin: 10px auto 0; 
        }
    </style>
</head>
<body>

    <?php
    define("PI", 3.14);
    $bankinh = "";
    $dientich = "";
    $chuvi = "";

    if (isset($_POST['tinh'])) {
        $bankinh_raw = trim($_POST['bankinh']);
        $bankinh = $bankinh_raw;

        if (!is_numeric($bankinh_raw)) {
            $dientich = "Lỗi: Vui lòng chỉ nhập số!";
            $chuvi = "Lỗi: Vui lòng chỉ nhập số!";
        } elseif ((float)$bankinh_raw <= 0) {
            $dientich = "Lỗi: Bán kính phải > 0";
            $chuvi = "Lỗi: Bán kính phải > 0";
        } else {
            $bankinh = (float)$bankinh_raw;
            $dientich = PI * ($bankinh * $bankinh);
            $chuvi = 2 * PI * $bankinh;
        }
    }
    ?>

    <form method="post" action="">
        <h2>DIỆN TÍCH VÀ CHU VI<br>HÌNH TRÒN</h2>
        
        <label>Bán kính:</label>
        <input type="text" name="bankinh" value="<?php echo htmlspecialchars($bankinh); ?>" required> <br>
        
        <label>Diện tích:</label>
        <input type="text" name="dientich" value="<?php echo htmlspecialchars($dientich); ?>" readonly> <br>
        
        <label>Chu vi:</label>
        <input type="text" name="chuvi" value="<?php echo htmlspecialchars($chuvi); ?>" readonly> <br>
        
        <button type="submit" name="tinh">Tính</button>
    </form>

</body>
</html>
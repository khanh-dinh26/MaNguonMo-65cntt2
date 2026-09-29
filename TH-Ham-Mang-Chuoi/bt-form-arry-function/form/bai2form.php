<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Diện Tích và Chu Vi Hình Tròn</title>
    <style>
        body { 
            font-family: Arial, sans-serif; 
            text-align: center; 
            margin-top: 50px; 
        }
        
        form { 
            display: inline-block; 
            border: 2px solid #2e7d32; 
            padding: 20px 30px; 
            border-radius: 8px; 
            background-color: #e8f5e9;
            text-align: left; 
        }
        
        h2 { 
            text-align: center; 
            margin-top: 0; 
            background-color: #006105;
            padding: 12px;
            border-radius: 4px;
            color: white; 
        }
        
        label { 
            display: inline-block; 
            width: 90px; 
            font-weight: bold; 
        }
        
        input { 
            padding: 5px; 
            width: 150px; 
            margin-bottom: 10px; 
        }

        input[readonly] { 
            background-color: #c8e6c9; 
            color: red; 
            font-weight: bold; 
            outline: none; 
        }
        
        button { 
            padding: 8px 20px; 
            background-color: #2e7d32; 
            color: white; 
            border: none; 
            cursor: pointer; 
            display: block; 
            margin: 10px auto 0; 
            border-radius: 4px;
            font-weight: bold;
        }
        
        button:hover {
            background-color: #1b5e20;
        }
    </style>
</head>
<body>

    <?php
    define("PI", 3.14);

    $bankinh = "";
    $dientich = "";
    $chuvi = "";

    if (isset($_POST['bankinh'])) {
        $bankinh = $_POST['bankinh'];
        
        $dientich = PI * ($bankinh * $bankinh);
        $chuvi = 2 * PI * $bankinh;
    }
    ?>

    <form method="post" action="">
        <h2>DIỆN TÍCH VÀ CHU VI<br>HÌNH TRÒN</h2>
        
        <label>Bán kính:</label>
        <input type="number" step="any" name="bankinh" value="<?php echo $bankinh; ?>" required> <br>
        
        <label>Diện tích:</label>
        <input type="text" name="dientich" value="<?php echo $dientich; ?>" readonly> <br>
        
        <label>Chu vi:</label>
        <input type="text" name="chuvi" value="<?php echo $chuvi; ?>" readonly> <br>
        
        <button type="submit" name="tinh">Tính</button>
    </form>

</body>
</html>
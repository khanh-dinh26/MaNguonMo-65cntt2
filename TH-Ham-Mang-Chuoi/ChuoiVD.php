<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tính tích dãy số</title>
</head>
<body>
    <style>
        body { 
        font-family: Arial, sans-serif; 
        text-align: center; 
        margin-top: 50px; 
        }
        form { 
        display: inline-block; 
        background: #f0f2f5; 
        padding: 20px 30px; 
        border-radius: 8px; 
        border: 1px solid #ccc; 
        text-align: left; 
        }
        
        label { 
        display: inline-block; 
        width: 120px; 
        font-weight: bold; 
        }
        input[type="text"] { 
        padding: 5px; width: 200px; 
        margin-bottom: 10px; 
        }
        input[readonly] { 
        background-color: #e9ecef; 
        color: red; 
        font-weight: bold; 
        outline: none;
        }
        .btn { 
        display: block; 
        margin: 10px auto 0; 
        padding: 8px 20px; 
        cursor: pointer; 
        }
    </style>
</head>
<body>

    <?php
    $chuoi_so = "";
    $ket_qua_tich = "";

    if (isset($_POST['tinh'])) {
        $chuoi_so = $_POST['chuoi_so'];
        $mang_so = explode(",", $chuoi_so);
        $ket_qua_tich = 1;
        
        foreach ($mang_so as $so) {
            if (is_numeric(trim($so))) {
                $ket_qua_tich *= trim($so);
            }
        }
    }
    ?>

    <form method="POST" action="">
        <h2>TÍNH TÍCH DÃY SỐ</h2>
        
        <label>Nhập dãy số:</label>
        <input type="text" name="chuoi_so" value="<?php echo $chuoi_so; ?>"><br>
        
        <label>Tích dãy số:</label>
        <input type="text" name="ket_qua" value="<?php echo $ket_qua_tich; ?>" readonly><br>
        
        <input type="submit" name="tinh" value="Tích dãy số" class="btn">
    </form>
</body>
</html>
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
        h2 { 
            text-align: center; 
            background-color: #c21826;
            color: white; 
            margin: -20px -30px 20px -30px; 
            padding: 15px 0;
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
        $chuoi_so = trim($_POST['chuoi_so']);
        $mang_so = explode(",", $chuoi_so);
        $ket_qua_tich = 1;
        $co_loi = false;

        foreach ($mang_so as $so) {
            $gia_tri = trim($so);
            if ($gia_tri === "" || !is_numeric($gia_tri)) {
                $co_loi = true;
                break;
            }
            $ket_qua_tich *= (float)$gia_tri;
        }
        if ($co_loi) {
            $ket_qua_tich = "Lỗi: Dãy số chỉ được chứa số, cách nhau bằng dấu phẩy!";
        }
    }
    ?>

    <form method="POST" action="">
        <h2>TÍNH TÍCH DÃY SỐ</h2>
        
        <label>Nhập dãy số:</label>
        <input type="text" name="chuoi_so" value="<?php echo htmlspecialchars($chuoi_so); ?>" required><br>
        
        <label>Tích dãy số:</label>
        <input type="text" name="ket_qua" value="<?php echo htmlspecialchars($ket_qua_tich); ?>" readonly><br>
        
        <input type="submit" name="tinh" value="Tích dãy số" class="btn">
    </form>
</body>
</html>
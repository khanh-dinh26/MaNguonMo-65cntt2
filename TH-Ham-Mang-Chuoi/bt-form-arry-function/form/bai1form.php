<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dien tich HCN</title>
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
</style>
</head>
<body>

    <?php
    $dai = "";
    $rong = "";
    $dientich = "";

    if (isset($_POST['dai']) && isset($_POST['rong'])) {
        $dai_raw = trim($_POST['dai']);
        $rong_raw = trim($_POST['rong']);
        $dai = $dai_raw;
        $rong = $rong_raw;

        if (!is_numeric($dai_raw) || !is_numeric($rong_raw)) {
            $dientich = "Lỗi: Vui lòng chỉ nhập số!";
        } elseif ((float)$dai_raw <= 0 || (float)$rong_raw <= 0) {
            $dientich = "Lỗi: Cạnh phải > 0";
        } elseif ((float)$rong_raw > (float)$dai_raw) {
            $dientich = "Lỗi: Rộng không được lớn hơn Dài";
        } else {
            $dientich = (float)$dai_raw * (float)$rong_raw;
        }
    }
    ?>

    <form method="post">
        <h2>Tính Diện Tích</h2>
        
        <label>Chiều dài:</label>
        <input type="text" name="dai" value="<?php echo htmlspecialchars($dai); ?>" required> cm <br>
        
        <label>Chiều rộng:</label>
        <input type="text" name="rong" value="<?php echo htmlspecialchars($rong); ?>" required> cm <br>
        
        <label>Diện tích:</label>
        <input type="text" name="dientich" value="<?php echo htmlspecialchars($dientich); ?>" readonly> cm² <br>
        
        <button type="submit">Tính Toán</button>
    </form>

</body>
</html>
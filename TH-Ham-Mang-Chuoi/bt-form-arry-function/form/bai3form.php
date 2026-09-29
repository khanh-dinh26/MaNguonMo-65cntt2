<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thanh Toán Tiền Điện</title>
    <style>
        body { 
            font-family: Arial, sans-serif; 
            text-align: center; 
            margin-top: 50px; 
        }
        
        form { 
            display: inline-block; 
            border: 2px solid #f57f17; 
            padding: 20px 30px; 
            border-radius: 8px; 
            background-color: #fffde7; 
            text-align: left; 
        }
        
        h2 { 
            text-align: center; 
            background-color: #d36607;
            padding: 12px;
            border-radius: 4px;
            color: white;
            margin-top: 0; 
        }
        
        label { 
            display: inline-block; 
            width: 140px; 
            font-weight: bold; 
        }
        
        input { 
            padding: 5px; 
            width: 150px; 
            margin-bottom: 10px; 
        }

        input[readonly] { 
            background-color: #ffe082; 
            color: red; 
            font-weight: bold; 
            outline: none; 
        }
        
        button { 
            padding: 8px 20px; 
            background-color: #f57f17; 
            color: white; 
            border: none; 
            cursor: pointer; 
            display: block; 
            margin: 15px auto 0; 
            border-radius: 4px;
            font-weight: bold;
        }
        
        button:hover {
            background-color: #e65100;
        }
    </style>
</head>
<body>

    <?php
    $tenchuho = "";
    $chisocu = "";
    $chisomoi = "";
    $dongia = 20000; 
    $sotien = "";

    if (isset($_POST['tinh'])) {
        $tenchuho = $_POST['tenchuho'];
        $chisocu = $_POST['chisocu'];
        $chisomoi = $_POST['chisomoi'];
        $dongia = $_POST['dongia'];
        
        if ($chisomoi >= $chisocu) {
            $sotien = ($chisomoi - $chisocu) * $dongia;
        } else {
            $sotien = "Lỗi chỉ số!";
        }
    }
    ?>

    <form method="post" action="">
        <h2>THANH TOÁN TIỀN ĐIỆN</h2>
        
        <label>Tên chủ hộ:</label>
        <input type="text" name="tenchuho" value="<?php echo $tenchuho; ?>" required> <br>
        
        <label>Chỉ số cũ:</label>
        <input type="number" step="any" name="chisocu" value="<?php echo $chisocu; ?>" required> (Kw) <br>
        
        <label>Chỉ số mới:</label>
        <input type="number" step="any" name="chisomoi" value="<?php echo $chisomoi; ?>" required> (Kw) <br>
        
        <label>Đơn giá:</label>
        <input type="number" step="any" name="dongia" value="<?php echo $dongia; ?>" required> (VNĐ) <br>
        
        <label>Số tiền thanh toán:</label>
        <input type="text" name="sotien" value="<?php echo $sotien; ?>" readonly> (VNĐ) <br>
        
        <button type="submit" name="tinh">Tính</button>
    </form>

</body>
</html>
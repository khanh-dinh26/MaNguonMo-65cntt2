<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thanh Toán Tiền Điện</title>
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
    $tenchuho = "";
    $chisocu = "";
    $chisomoi = "";
    $dongia = 20000; 
    $sotien = "";

    if (isset($_POST['tinh'])) {
        // Ô văn bản: cho phép nhập chữ bình thường, bỏ qua kiểm tra số
        $tenchuho = trim($_POST['tenchuho']);

        $chisocu_raw = trim($_POST['chisocu']);
        $chisomoi_raw = trim($_POST['chisomoi']);
        $dongia_raw = trim($_POST['dongia']);
        $chisocu = $chisocu_raw;
        $chisomoi = $chisomoi_raw;
        $dongia = is_numeric($dongia_raw) ? $dongia_raw : 20000;

        if (!is_numeric($chisocu_raw) || !is_numeric($chisomoi_raw) || !is_numeric($dongia_raw)) {
            $sotien = "Lỗi: Chỉ số và đơn giá phải là số!";
        } elseif ((float)$chisocu_raw < 0 || (float)$chisomoi_raw < 0 || (float)$dongia_raw < 0) {
            $sotien = "Lỗi: Số không được âm!";
        } elseif ((float)$chisomoi_raw >= (float)$chisocu_raw) {
            $sotien = ((float)$chisomoi_raw - (float)$chisocu_raw) * (float)$dongia_raw;
        } else {
            $sotien = "Lỗi: Chỉ số mới phải >= chỉ số cũ!";
        }
    }
    ?>

    <form method="post" action="">
        <h2>THANH TOÁN TIỀN ĐIỆN</h2>
        
        <label>Tên chủ hộ:</label>
        <input type="text" name="tenchuho" value="<?php echo htmlspecialchars($tenchuho); ?>" required> <br>
        
        <label>Chỉ số cũ:</label>
        <input type="text" name="chisocu" value="<?php echo htmlspecialchars($chisocu); ?>" required> (Kw) <br>
        
        <label>Chỉ số mới:</label>
        <input type="text" name="chisomoi" value="<?php echo htmlspecialchars($chisomoi); ?>" required> (Kw) <br>
        
        <label>Đơn giá:</label>
        <input type="text" name="dongia" value="<?php echo htmlspecialchars($dongia); ?>" required> (VNĐ) <br>
        
        <label>Số tiền thanh toán:</label>
        <input type="text" name="sotien" value="<?php echo htmlspecialchars($sotien); ?>" readonly> (VNĐ) <br>
        
        <button type="submit" name="tinh">Tính</button>
    </form>

</body>
</html>
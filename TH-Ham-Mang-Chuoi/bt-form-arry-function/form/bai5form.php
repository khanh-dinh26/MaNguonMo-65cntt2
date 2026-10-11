<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tính Tiền Karaoke</title>
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
            width: 240px;
            padding: 5px;   
        }

        input[readonly] { 
            background-color: #eee; 
            color: red; 
        }
        
        button { 
            display: block; 
            margin: 10px auto 0; 
        }
        .note-text {
            text-align: center;
            font-style: italic;
            font-size: 14px;
            margin-top: 15px;
            color: #b40c0c;
        }
    </style>
</head>
<body>

   <?php
    $giobatdau = "";
    $gioketthuc = "";
    $tienthanhtoan = "";

    if (isset($_POST['tinh'])) {
        $giobatdau_raw = trim($_POST['giobatdau']);
        $gioketthuc_raw = trim($_POST['gioketthuc']);
        $giobatdau = $giobatdau_raw;
        $gioketthuc = $gioketthuc_raw;

        if (!is_numeric($giobatdau_raw) || !is_numeric($gioketthuc_raw)) {
            $tienthanhtoan = "Lỗi: Giờ phải là số!";
        } elseif ((float)$gioketthuc_raw <= (float)$giobatdau_raw) {
            $tienthanhtoan = "Lỗi: Giờ kết thúc phải > Giờ bắt đầu";
        } 
        elseif ((float)$giobatdau_raw < 10 || (float)$gioketthuc_raw > 24) {
            $tienthanhtoan = "Lỗi: Giờ không hợp lệ (10h-24h)";
        } 
        else {
            $giobatdau = (float)$giobatdau_raw;
            $gioketthuc = (float)$gioketthuc_raw;
            $tien = 0;
            if ($gioketthuc <= 17) {
                $tien = ($gioketthuc - $giobatdau) * 20000;
            } 
            elseif ($giobatdau >= 17) {
                $tien = ($gioketthuc - $giobatdau) * 45000;
            } 
            else {
                $tien_truoc_17h = (17 - $giobatdau) * 20000;
                $tien_sau_17h = ($gioketthuc - 17) * 45000;
                $tien = $tien_truoc_17h + $tien_sau_17h;
            }
            $tienthanhtoan = $tien;
        }
    }
    ?>

    <form method="post" action="">
        <h2>TÍNH TIỀN KARAOKE</h2>
        
        <label>Giờ bắt đầu:</label>
        <input type="text" name="giobatdau" value="<?php echo htmlspecialchars($giobatdau); ?>" required> (h) <br>
        
        <label>Giờ kết thúc:</label>
        <input type="text" name="gioketthuc" value="<?php echo htmlspecialchars($gioketthuc); ?>" required> (h) <br>
        
        <label>Tiền thanh toán:</label>
        <input type="text" name="tienthanhtoan" value="<?php echo htmlspecialchars($tienthanhtoan); ?>" readonly> (VNĐ) <br>

        <div class="note-text">Lưu ý: Giờ bắt đầu từ 10 giờ và kết thúc vào 24 giờ</div>
        
        <button type="submit" name="tinh">Tính tiền</button>
    </form>

</body>
</html>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tính Tiền Karaoke</title>
    <style>
        body { 
            font-family: Arial, sans-serif; 
            text-align: center; 
            margin-top: 50px; 
        }
        
        form { 
            display: inline-block; 
            border: 2px solid #00796b; 
            padding: 20px 30px; 
            border-radius: 8px; 
            background-color: #009688;
            text-align: left; 
            color: white;
        }
        
        h2 { 
            text-align: center; 
            margin-top: 0; 
            margin-bottom: 20px;
            color: white; 
            font-style: italic;
            border-bottom: 2px solid white; 
            padding-bottom: 10px;
        }
        
        label { 
            display: inline-block; 
            width: 130px; 
            font-weight: bold; 
        }
        
        input { 
            padding: 5px; 
            width: 240px; 
            margin-bottom: 10px; 
        }

        input[readonly] { 
            background-color: #fff9c4; 
            color: red; 
            font-weight: bold; 
            outline: none; 
        }
        
        button { 
            padding: 8px 20px; 
            background-color: white; 
            color: #00796b; 
            border: none; 
            cursor: pointer; 
            display: block; 
            margin: 15px auto 0; 
            border-radius: 4px;
            font-weight: bold;
        }
        
        button:hover {
            background-color: #e0f2f1;
        }
    </style>
</head>
<body>

    <?php
    $giobatdau = "";
    $gioketthuc = "";
    $tienthanhtoan = "";

    if (isset($_POST['tinh'])) {
        $giobatdau = $_POST['giobatdau'];
        $gioketthuc = $_POST['gioketthuc'];
        
        // Kiểm tra điều kiện bắt buộc: Giờ kết thúc phải > Giờ bắt đầu
        if ($gioketthuc <= $giobatdau) {
            $tienthanhtoan = "Giờ kết thúc phải > Giờ bắt đầu";
        } else {
            // Khởi tạo tiền bằng 0
            $tien = 0;
            
            // TH1: Khách hát hoàn toàn trong khung giờ 10h - 17h (Giá 20.000đ/h)
            if ($gioketthuc <= 17) {
                $tien = ($gioketthuc - $giobatdau) * 20000;
            } 
            // TH2: Khách hát hoàn toàn trong khung giờ 17h - 24h (Giá 45.000đ/h)
            elseif ($giobatdau >= 17) {
                $tien = ($gioketthuc - $giobatdau) * 45000;
            } 
            // TH3: Khách hát xuyên qua mốc 17h (Ví dụ hát từ 15h đến 19h)
            else {
                // Tính tiền phần từ lúc bắt đầu đến 17h (giá 20k)
                $tien_truoc_17h = (17 - $giobatdau) * 20000;
                // Tính tiền phần từ 17h đến lúc kết thúc (giá 45k)
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
        <input type="number" step="any" name="giobatdau" value="<?php echo $giobatdau; ?>" required> (h) <br>
        
        <label>Giờ kết thúc:</label>
        <input type="number" step="any" name="gioketthuc" value="<?php echo $gioketthuc; ?>" required> (h) <br>
        
        <label>Tiền thanh toán:</label>
        <input type="text" name="tienthanhtoan" value="<?php echo $tienthanhtoan; ?>" readonly> (VNĐ) <br>
        
        <button type="submit" name="tinh">Tính tiền</button>
    </form>

</body>
</html>
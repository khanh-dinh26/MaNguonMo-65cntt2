<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kết Quả Thi Đại Học</title>
    <style>
        body { 
            font-family: Arial, sans-serif; 
            text-align: center; 
            margin-top: 50px; 
        }
        
        form { 
            display: inline-block; 
            border: 2px solid #c2185b; 
            padding: 20px 30px; 
            border-radius: 8px; 
            background-color: #fce4ec; 
            text-align: left; 
        }
        
        h2 { 
            text-align: center; 
            background-color: #c2185b;
            padding: 12px;
            border-radius: 4px;
            color: white;
            margin-top: 0; 
             
        }
        
        label { 
            display: inline-block; 
            width: 120px; 
            font-weight: bold; 
        }
        
        input { 
            padding: 5px; 
            width: 150px; 
            margin-bottom: 10px; 
        }

        input[readonly] { 
            background-color: #f7edc4; 
            font-weight: bold; 
            outline: none; 
        }
        
        button { 
            padding: 8px 20px; 
            background-color: #c2185b; 
            color: white; 
            border: none; 
            cursor: pointer; 
            display: block; 
            margin: 15px auto 0; 
            border-radius: 4px;
            font-weight: bold;
        }
        
        button:hover {
            background-color: #880e4f;
        }
    </style>
</head>
<body>

    <?php
    $toan = "";
    $ly = "";
    $hoa = "";
    $diemchuan = 20; 
    $tongdiem = "";
    $ketqua = "";

    if (isset($_POST['tinh'])) {
        $toan = $_POST['toan'];
        $ly = $_POST['ly'];
        $hoa = $_POST['hoa'];
        $diemchuan = $_POST['diemchuan'];
        
        // Tính tổng điểm 3 môn
        $tongdiem = $toan + $ly + $hoa;
        
        // Điều kiện: Không có môn nào 0 điểm VÀ tổng điểm >= Điểm chuẩn
        if ($toan > 0 && $ly > 0 && $hoa > 0 && $tongdiem >= $diemchuan) {
            $ketqua = "Đậu";
        } else {
            $ketqua = "Rớt";
        }
    }
    ?>

    <form method="post" action="">
        <h2>KẾT QUẢ THI ĐẠI HỌC</h2>
        
        <label>Toán:</label>
        <input type="number" step="any" name="toan" value="<?php echo $toan; ?>" required> <br>
        
        <label>Lý:</label>
        <input type="number" step="any" name="ly" value="<?php echo $ly; ?>" required> <br>
        
        <label>Hoá:</label>
        <input type="number" step="any" name="hoa" value="<?php echo $hoa; ?>" required> <br>
        
        <label>Điểm chuẩn:</label>
        <input type="number" step="any" name="diemchuan" value="<?php echo $diemchuan; ?>" required style="color: red; font-weight: bold;"> <br>
        
        <label>Tổng điểm:</label>
        <input type="text" name="tongdiem" value="<?php echo $tongdiem; ?>" readonly> <br>
        
        <label>Kết quả thi:</label>
        <input type="text" name="ketqua" value="<?php echo $ketqua; ?>" readonly> <br>
        
        <button type="submit" name="tinh">Xem kết quả</button>
    </form>

</body>
</html>
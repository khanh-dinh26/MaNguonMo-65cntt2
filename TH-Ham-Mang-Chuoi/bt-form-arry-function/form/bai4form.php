<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kết Quả Thi Đại Học</title>
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
            width: 140px; 
            font-weight: bold; 
        }
        
        input { 
            margin-bottom: 10px; 
        }
        input[type="text"] { 
            width: 220px; 
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
        $toan_raw = trim($_POST['toan']);
        $ly_raw = trim($_POST['ly']);
        $hoa_raw = trim($_POST['hoa']);
        $diemchuan_raw = trim($_POST['diemchuan']);
        $toan = $toan_raw;
        $ly = $ly_raw;
        $hoa = $hoa_raw;
        $diemchuan = $diemchuan_raw;

        if (!is_numeric($toan_raw) || !is_numeric($ly_raw) || !is_numeric($hoa_raw) || !is_numeric($diemchuan_raw)) {
            $tongdiem = "Lỗi: Vui lòng chỉ nhập số!";
            $ketqua = "Dữ liệu sai";
        } elseif ((float)$toan_raw < 0 || (float)$toan_raw > 10 || (float)$ly_raw < 0 || (float)$ly_raw > 10 || (float)$hoa_raw < 0 || (float)$hoa_raw > 10) {
            $tongdiem = "Lỗi: Điểm môn phải từ 0-10";
            $ketqua = "Dữ liệu sai";
        } 
        elseif ((float)$diemchuan_raw < 0 || (float)$diemchuan_raw > 30) {
            $tongdiem = "Lỗi: Điểm chuẩn phải từ 0-30";
            $ketqua = "Dữ liệu sai";
        } 
        else {
            $tongdiem = (float)$toan_raw + (float)$ly_raw + (float)$hoa_raw;
            if ((float)$toan_raw > 0 && (float)$ly_raw > 0 && (float)$hoa_raw > 0 && $tongdiem >= (float)$diemchuan_raw) {
                $ketqua = "Đậu";
            } else {
                $ketqua = "Rớt";
            }
        }
    }
    ?>

    <form method="post" action="">
        <h2>KẾT QUẢ THI ĐẠI HỌC</h2>
        
        <label>Toán:</label>
        <input type="text" name="toan" value="<?php echo htmlspecialchars($toan); ?>" required> <br>
        
        <label>Lý:</label>
        <input type="text" name="ly" value="<?php echo htmlspecialchars($ly); ?>" required> <br>
        
        <label>Hoá:</label>
        <input type="text" name="hoa" value="<?php echo htmlspecialchars($hoa); ?>" required> <br>
        
        <label>Điểm chuẩn:</label>
        <input type="text" name="diemchuan" value="<?php echo htmlspecialchars($diemchuan); ?>" required style="color: red; font-weight: bold;"> <br>
        
        <label>Tổng điểm:</label>
        <input type="text" name="tongdiem" value="<?php echo htmlspecialchars($tongdiem); ?>" readonly> <br>
        
        <label>Kết quả thi:</label>
        <input type="text" name="ketqua" value="<?php echo htmlspecialchars($ketqua); ?>" readonly> <br>
        
        <button type="submit" name="tinh">Xem kết quả</button>
    </form>

</body>
</html>
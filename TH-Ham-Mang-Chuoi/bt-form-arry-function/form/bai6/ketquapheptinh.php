<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kết quả phép tính</title>
   <style>
        body { 
            font-family: sans-serif; 
            text-align: center; 
            margin-top: 50px; 
        }
        .container { 
            display: inline-block; 
            width: 400px; 
            padding: 20px; 
            border: 1px solid #ccc; 
            background: #c8e161; 
            text-align: left; 
        }
         h2 { 
            text-align: center; 
            background-color: #3fb04b; 
            color: white;
            margin: -20px -20px 20px -20px; 
            padding: 15px 0;
         }
         
        .row { 
            display: flex; 
            align-items: center; 
            margin-bottom: 12px; 
        }
        .label-text { 
            width: 130px; 
            font-weight: bold; 
        }
        input[type="text"] { 
            width: 200px; 
            padding: 5px; }
        input[readonly] {
            background-color: #eee; 
            color: red; outline: none; 
        }
        .back-link { 
            display: block; 
            text-align: center; 
            margin-top: 20px; 
            font-style: italic; 
            text-decoration: none; 
            color: blue; 
        }
        .back-link:hover { 
            text-decoration: underline; 
        }
    </style>
</head>
<body>

    <?php
    function cong($a, $b) {
        return $a + $b;
    }

    function tru($a, $b) {
        return $a - $b;
    }

    function nhan($a, $b) {
        return $a * $b;
    }

    function chia($a, $b) {
        if ($b == 0) {
            return "Lỗi chia cho 0";
        }
        return $a / $b;
    }

    $pheptinh = "";
    $so1 = "";
    $so2 = "";
    $ketqua = "";

    if (isset($_POST['so1']) && isset($_POST['so2'])) {
        $pheptinh = $_POST['pheptinh'];
        $so1 = trim($_POST['so1']);
        $so2 = trim($_POST['so2']);

        if (!is_numeric($so1) || !is_numeric($so2)) {
            $ketqua = "Lỗi: Vui lòng chỉ nhập số!";
        } else {
            $a = (float)$so1;
            $b = (float)$so2;
            switch ($pheptinh) {
                case 'Cộng':
                    $ketqua = cong($a, $b);
                    break;
                case 'Trừ':
                    $ketqua = tru($a, $b);
                    break;
                case 'Nhân':
                    $ketqua = nhan($a, $b);
                    break;
                case 'Chia':
                    $ketqua = chia($a, $b);
                    break;
            }
        }
    }
    ?>

    <div class="container">
        <h2>PHÉP TÍNH TRÊN HAI SỐ</h2>
        
        <div class="row">
            <span class="label-text">Chọn phép tính:</span>
            <span style="color: red; font-weight: bold;"><?php echo htmlspecialchars($pheptinh); ?></span>
        </div>
        
        <div class="row">
            <span class="label-text">Số 1:</span>
            <input type="text" value="<?php echo htmlspecialchars($so1); ?>" readonly>
        </div>
        
        <div class="row">
            <span class="label-text">Số 2:</span>
            <input type="text" value="<?php echo htmlspecialchars($so2); ?>" readonly>
        </div>
        
        <div class="row">
            <span class="label-text">Kết quả:</span>
            <input type="text" value="<?php echo htmlspecialchars($ketqua); ?>" readonly>
        </div>
        
        <a href="javascript:window.history.back(-1);" class="back-link">Quay lại trang trước</a>
    </div>

</body>
</html>
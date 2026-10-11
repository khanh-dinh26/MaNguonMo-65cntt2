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
    if (isset($_POST['so1']) && isset($_POST['so2'])) {
        $pheptinh = $_POST['pheptinh'];
        $so1 = trim($_POST['so1']);
        $so2 = trim($_POST['so2']);

        if (!is_numeric($so1) || !is_numeric($so2)) {
            echo "<script>
                    alert('Lỗi: Vui lòng chỉ nhập số hợp lệ (có thể nhập số thực)!');
                    window.history.back();
                  </script>";
            exit; 
        }
        
        if ($pheptinh == 'Chia' && $so2 == 0) {
            echo "<script>
                    alert('Lỗi: Số chia (Số thứ 2) không được phép bằng 0!');
                    window.history.back();
                  </script>";
            exit;
        }
        function cong($a, $b) { return $a + $b; }
        function tru($a, $b) { return $a - $b; }
        function nhan($a, $b) { return $a * $b; }
        function chia($a, $b) { return $a / $b; }

        switch ($pheptinh) {
            case 'Cộng': $ketqua = cong($so1, $so2); break;
            case 'Trừ':  $ketqua = tru($so1, $so2); break;
            case 'Nhân': $ketqua = nhan($so1, $so2); break;
            case 'Chia': $ketqua = chia($so1, $so2); break;
        }
    } else {
        echo "<script>window.history.back();</script>";
        exit;
    }
    ?>

    <div class="container">
        <h2>PHÉP TÍNH TRÊN HAI SỐ</h2>
        
        <div class="row">
            <span class="label-text">Chọn phép tính:</span>
            <span style="color: red; font-weight: bold;"><?php echo $pheptinh; ?></span>
        </div>
        
        <div class="row">
            <span class="label-text">Số 1:</span>
            <input type="text" value="<?php echo $so1; ?>" readonly>
        </div>
        
        <div class="row">
            <span class="label-text">Số 2:</span>
            <input type="text" value="<?php echo $so2; ?>" readonly>
        </div>
        
        <div class="row">
            <span class="label-text">Kết quả:</span>
            <input type="text" value="<?php echo round($ketqua, 4); ?>" readonly>
        </div>
        
        <a href="javascript:window.history.back(-1);" class="back-link">Quay lại trang trước</a>
    </div>

</body>
</html>
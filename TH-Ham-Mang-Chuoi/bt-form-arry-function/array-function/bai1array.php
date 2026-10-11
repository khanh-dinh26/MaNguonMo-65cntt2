<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Phát sinh mảng và tính toán</title>
    <style>
        body { font-family: 
            sans-serif; text-align: 
            center; margin-top: 50px; 
        }
        .container { 
            display: inline-block;
            width: 500px; 
            padding: 20px; 
            border: 2px solid #5f5d5d; 
            text-align: left; 
            background: #a7cbe7;
        }
        h2 { 
            text-align: center; 
            background-color: #3b5aa4;
            color: white; 
            margin: -20px -20px 20px -20px; 
            padding: 15px 0;
        }
        .row { 
            margin-bottom: 12px; 
        }
        .btn-submit { 
            padding: 5px 15px; 
            cursor: pointer; 
            margin-bottom: 10px;
        }
        .result-box { 
            margin-top: 20px; 
            padding: 10px; 
            background-color: #faf88d92;
            border: 1px solid #ccc; 
            line-height: 1.8; 
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>XỬ LÝ MẢNG NGẪU NHIÊN</h2>
        
        <form action="" method="POST" style="text-align: center;">
            <div class="row">
                <b>Nhập số n:</b> 
                <input type="text" name="n" value="<?php echo isset($_POST['n']) ? htmlspecialchars($_POST['n']) : ''; ?>" required>
            </div>
            <button type="submit" name="thuchien" class="btn-submit">Thực hiện</button>
        </form>

      <?php
        if (isset($_POST['thuchien'])) {
            $n = trim($_POST['n']);
            
            if (is_numeric($n) && $n > 0 && floor($n) == $n) {
                
                $mang = [];
                $so_chan = 0;
                $nho_hon_100 = 0;
                $tong_am = 0;
                $vitri_0 = [];

                for ($i = 0; $i < $n; $i++) {
                    $so_ngau_nhien = rand(-50, 150);
                    $mang[] = $so_ngau_nhien;
                    
                    if ($so_ngau_nhien % 2 == 0) $so_chan++;
                    if ($so_ngau_nhien < 100) $nho_hon_100++;
                    if ($so_ngau_nhien < 0) $tong_am += $so_ngau_nhien;
                    if ($so_ngau_nhien == 0) $vitri_0[] = $i;
                }

                $mang_sapxep = $mang; 
                sort($mang_sapxep);

                echo "<div class='result-box'>";
                echo "b. <b>Mảng ngẫu nhiên:</b> " . implode(", ", $mang) . "<br>";
                echo "c. <b>Số phần tử chẵn:</b> " . $so_chan . "<br>";
                echo "d. <b>Số phần tử < 100:</b> " . $nho_hon_100 . "<br>";
                echo "e. <b>Tổng các số âm:</b> " . $tong_am . "<br>";
                
                if (count($vitri_0) > 0) {
                    echo "f. <b>Vị trí các số 0:</b> vị trí số " . implode(", ", $vitri_0) . "<br>";
                } else {
                    echo "f. <b>Vị trí các số 0:</b> Không có số 0 nào trong mảng.<br>";
                }
                
                echo "g. <b>Mảng sắp xếp tăng dần:</b> " . implode(", ", $mang_sapxep);
                echo "</div>";

            } else {
                echo "<div class='result-box'><b>Lỗi:</b> Vui lòng nhập n là số nguyên dương!</div>";
            }
        }
        ?>
    </div>

</body>
</html>
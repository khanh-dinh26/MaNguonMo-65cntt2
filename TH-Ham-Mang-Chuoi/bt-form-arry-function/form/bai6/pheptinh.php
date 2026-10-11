<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Phép tính trên hai số</title>
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
            padding: 5px; 
        }
        .btn-submit { 
            margin-left: 130px; 
            padding: 6px 15px; 
            cursor: pointer; 
        }
    </style>
</head>
<body>

    <div class="container">
        <h2>PHÉP TÍNH TRÊN HAI SỐ</h2>
        
        <form action="ketquapheptinh.php" method="POST">
            <div class="row">
                <span class="label-text">Chọn phép tính:</span>
                <div class="radio-group">
                    <input type="radio" name="pheptinh" value="Cộng" checked> Cộng
                    <input type="radio" name="pheptinh" value="Trừ"> Trừ
                    <input type="radio" name="pheptinh" value="Nhân"> Nhân
                    <input type="radio" name="pheptinh" value="Chia"> Chia
                </div>
            </div>
            
            <div class="row">
                <span class="label-text">Số thứ 1:</span>
                <input type="text" name="so1" required>
            </div>
            
            <div class="row">
                <span class="label-text">Số thứ 2:</span>
                <input type="text" name="so2" required>
            </div>
            
            <div class="row">
                <input type="submit" value="Tính" class="btn-submit">
            </div>
        </form>
    </div>

</body>
</html>
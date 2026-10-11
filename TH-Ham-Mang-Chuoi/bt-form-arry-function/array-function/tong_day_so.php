<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nhập và tính trên dãy số</title>
    <style>
        body { 
            font-family: Arial, sans-serif; 
            text-align: center; 
            margin-top: 50px; 
        }

        .container { 
            display: inline-block; 
            width: 450px; 
            background: #6ec3c5;
            border: 1px solid #cccccc; 
            text-align: left; 
        }

        h2 { 
            text-align: center; 
            background-color: #6caaad;
            color: white; 
            margin: 0; 
            padding: 12px 0;
            font-size: 22px;
            text-transform: uppercase;
        }

        
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }

        td {
            padding: 5px 10px;
            vertical-align: middle;
        }

        .label-col {
            width: 120px;
            font-weight: normal;
        }

        input[type="text"] {
            border: 1px solid #555;
            padding: 4px;
        }

       
        input[name="day_so"] {
            width: 200px;
        }

        input[name="tong_day_so"] {
            width: 100px; 
            background-color: #cdff91; 
            color: #d12222; 
            font-weight: bold;
            outline: none;
        }

        .btn-submit { 
            background-color: #ffffcc; 
            border: 1px solid #777; 
            padding: 4px 15px; 
            cursor: pointer; 
            color: black;
        }

        .sao-do {
            color: red;
            font-weight: bold;
            font-size: 16px;
        }

        .note {
            text-align: center;
            font-size: 14px;
            padding: 10px 0 15px 0;
            color: black;
        }
    </style>
</head>
<body>

    <?php
    $day_so = "";
    $tong = "";

    if (isset($_POST['tinh'])) {
        $day_so = trim($_POST['day_so']);

        $mang = explode(",", $day_so);
        $so_phan_tu = count($mang);
        
        $tong = 0;
        $co_loi = false; 

        for ($i = 0; $i < $so_phan_tu; $i++) {
            $gia_tri = trim($mang[$i]);
            
            if ($gia_tri === "" || !is_numeric($gia_tri)) {
                $co_loi = true; 
                break; 
            }
            $tong += (float)$gia_tri;
        }
        
        if ($co_loi) {
            $tong = "Lỗi!";
        }
    }
    ?>

    <div class="container">
        <h2>NHẬP VÀ TÍNH TRÊN DÃY SỐ</h2>
        
        <form action="" method="POST">
            <table>
                <tr>
                    <td class="label-col">Nhập dãy số:</td>
                    <td>
                        <input type="text" name="day_so" value="<?php echo htmlspecialchars($day_so); ?>" required>
                        <span class="sao-do">(*)</span>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type="submit" name="tinh" value="Tổng dãy số" class="btn-submit"></td>
                </tr>
                <tr>
                    <td>Tổng dãy số:</td>
                    <td><input type="text" name="tong_day_so" value="<?php echo htmlspecialchars($tong); ?>" readonly></td>
                </tr>
                <tr>
                    <td colspan="2" class="note">
                        <span class="sao-do">(*)</span> Các số được nhập cách nhau bằng dấu ","
                    </td>
                </tr>
            </table>
        </form>
    </div>

</body>
</html>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tìm kiếm</title>
    <style>
        body { 
            font-family: Arial, Tahoma, sans-serif; 
            margin-top: 50px; 
            font-size: 14px;
        }

        .container { 
            margin: 0 auto;
            width: 480px; 
            background-color: #d2e4e4; 
            border: 1px solid #7ea6a6;
            box-shadow: 1px 1px 3px rgba(0,0,0,0.1);
        }

        h2 { 
            text-align: center; 
            background-color: #3b8e8c; 
            color: #ffffff; 
            margin: 0; 
            padding: 9px 0;
            font-size: 20px;
            font-weight: bold;
            font-style: italic;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            padding: 10px 15px;
            box-sizing: border-box;
            display: block;
        }

        table tbody {
            display: table;
            width: 100%;
        }

        td {
            padding: 4px 6px;
            vertical-align: middle;
            color: #000000;
        }

        .label-col {
            width: 125px;
            white-space: nowrap;
        }

        input[type="text"] {
            border: 1px solid #7f9db9;
            height: 22px;
            line-height: 22px;
            padding: 0 4px;
            font-size: 13px;
            background-color: #ffffff;
            box-sizing: border-box;
        }

        input[name="nhap_mang"],
        input[name="mang"] {
            width: 100%;
        }

        input[name="so_can_tim"] {
            width: 80px;
        }

        input[name="ketqua"] {
            width: 100%;
            background-color: #fff4f4;
            color: #d60000;
            font-weight: bold;
        }

        .btn-submit { 
            background-color: #9ac2e6;
            border: 1px solid #5d8cb5; 
            padding: 2px 14px; 
            cursor: pointer; 
            font-size: 13px;
            color: #000000;
        }

        .btn-submit:hover {
            background-color: #8bb5dc;
        }

        /* Dải nền cho dòng ghi chú ở đáy khung */
        .note {
            background-color: #70c4c4;
            text-align: center;
            font-size: 13px;
            padding: 6px 0;
            color: #000000;
            border-top: 1px solid #63b1b1;
        }
    </style>
</head>
<body>

    <?php
    function tim_kiem($mang, $gia_tri) {
        for ($i = 0; $i < count($mang); $i++) {
            if (trim($mang[$i]) == $gia_tri) {
                return $i;
            }
        }
        return -1;
    }

    $nhap_mang = "";
    $so_can_tim = "";
    $mang = "";
    $ketqua = "";

    if (isset($_POST['timkiem'])) {
        $nhap_mang = trim($_POST['nhap_mang']);
        $so_can_tim = trim($_POST['so_can_tim']);

        if ($nhap_mang === "" || $so_can_tim === "") {
            $ketqua = "Lỗi: Vui lòng nhập đầy đủ dữ liệu!";
        } elseif (!is_numeric($so_can_tim)) {
            $mang = $nhap_mang;
            $ketqua = "Lỗi: Số cần tìm phải là số!";
        } else {
            $mang_arr = explode(",", $nhap_mang);
            $hop_le = true;
            foreach ($mang_arr as $pt) {
                if (trim($pt) === "" || !is_numeric(trim($pt))) {
                    $hop_le = false;
                    break;
                }
            }

            if (!$hop_le) {
                $mang = $nhap_mang;
                $ketqua = "Lỗi: Mảng chỉ chứa số, cách nhau bằng dấu \",\"!";
            } else {
                $mang_arr = array_map('trim', $mang_arr);
                $mang = implode(", ", $mang_arr);

                $vitri = tim_kiem($mang_arr, $so_can_tim);

                if ($vitri != -1) {
                    $ketqua = "Tìm thấy $so_can_tim tại vị trí thứ " . ($vitri + 1) . " của mảng";
                } else {
                    $ketqua = "Không tìm thấy $so_can_tim trong mảng";
                }
            }
        }
    }
    ?>

    <div class="container">
        <h2>TÌM KIẾM</h2>
        
        <form action="" method="POST" name="form_timkiem">
            <table>
                <tr>
                    <td class="label-col">Nhập mảng:</td>
                    <td>
                        <input type="text" name="nhap_mang" value="<?php echo htmlspecialchars($nhap_mang); ?>" required>
                    </td>
                </tr>
                <tr>
                    <td class="label-col">Nhập số cần tìm:</td>
                    <td>
                        <input type="text" name="so_can_tim" value="<?php echo htmlspecialchars($so_can_tim); ?>" required>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type="submit" name="timkiem" value="Tìm kiếm" class="btn-submit"></td>
                </tr>
                <tr>
                    <td class="label-col">Mảng:</td>
                    <td><input type="text" name="mang" value="<?php echo htmlspecialchars($mang); ?>" readonly></td>
                </tr>
                <tr>
                    <td class="label-col">Kết quả tìm kiếm:</td>
                    <td><input type="text" name="ketqua" value="<?php echo htmlspecialchars($ketqua); ?>" readonly></td>
                </tr>
            </table>

            <div class="note">
                (Các phần tử trong mảng sẽ cách nhau bằng dấu ",")
            </div>
        </form>
    </div>

</body>
</html>
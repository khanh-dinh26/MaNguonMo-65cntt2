<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thay thế</title>
    <style>
        body { 
            font-family: Arial, Tahoma, sans-serif; 
            margin-top: 50px; 
            font-size: 13px;
        }

        .container { 
            margin: 0 auto;
            width: 480px; 
            background-color: #fff9fc; /* Nền nửa dưới */
            border: 1px solid #a0005a;
            box-shadow: 1px 1px 4px rgba(0,0,0,0.15);
        }

        h2 { 
            text-align: center; 
            background-color: #9b0058; 
            color: #ffffff; 
            margin: 0; 
            padding: 7px 0;
            font-size: 23px;
            font-weight: bold;
            font-style: italic;
            font-family: "Brush Script MT", "Segoe Script", "Monotype Corsiva", cursive, Georgia, serif;
            letter-spacing: 1px;
        }

        /* Nửa trên của bảng có màu nền hồng phấn */
        .top-section {
            background-color: #feddf0;
        }

        /* Đường kẻ trắng ngăn cách giữa các dòng ở nửa trên */
        .top-section tr {
            border-bottom: 1px solid #ffffff;
        }

        /* Nửa dưới của bảng có nền trắng ngà */
        .bottom-section {
            background-color: #fff9fc;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        td {
            padding: 5px 12px;
            vertical-align: middle;
            color: #222222;
        }

        .label-col {
            width: 155px;
            white-space: nowrap;
        }

        input[type="text"] {
            border: 1px solid #7f9db9;
            height: 21px;
            line-height: 21px;
            padding: 0 4px;
            font-size: 13px;
            box-sizing: border-box;
            background-color: #ffffff;
        }

        input[name="nhap_mang"] {
            width: 100%;
        }

        input[name="gia_tri_cu"],
        input[name="gia_tri_moi"] {
            width: 120px;
        }

        /* Hai ô kết quả mảng cũ và mảng mới màu cam hồng */
        input[name="mang_cu"],
        input[name="mang_moi"] {
            width: 100%;
            background-color: #f69389;
            border: 1px solid #888888;
            color: #000000;
            outline: none;
        }

        .btn-submit { 
            background-color: #ffff99;
            border: 1px solid #777777; 
            padding: 2px 14px; 
            cursor: pointer; 
            font-size: 13px;
            color: #000000;
        }

        .btn-submit:hover {
            background-color: #ffff66;
        }

        /* Dòng ghi chú dưới đáy form */
        .note {
            text-align: center;
            font-size: 12.5px;
            padding: 8px 10px 10px 10px;
            color: #333333;
            background-color: #fff9fc;
        }

        .note .highlight {
            color: #d80000;
            font-weight: bold;
        }
    </style>
</head>
<body>

    <?php
    function xuat_mang($mang) {
        return implode(" ", $mang);
    }

    function thay_the($mang, $cu, $moi) {
        for ($i = 0; $i < count($mang); $i++) {
            if (trim($mang[$i]) == $cu) {
                $mang[$i] = $moi;
            }
        }
        return $mang;
    }

    $nhap_mang = "";
    $gia_tri_cu = "";
    $gia_tri_moi = "";
    $mang_cu = "";
    $mang_moi = "";

    if (isset($_POST['thaythe'])) {
        $nhap_mang = trim($_POST['nhap_mang']);
        $gia_tri_cu = trim($_POST['gia_tri_cu']);
        $gia_tri_moi = trim($_POST['gia_tri_moi']);

        if ($nhap_mang === "" || $gia_tri_cu === "" || $gia_tri_moi === "") {
            $mang_cu = "Lỗi: Vui lòng nhập đầy đủ dữ liệu!";
        } elseif (!is_numeric($gia_tri_cu) || !is_numeric($gia_tri_moi)) {
            $mang_cu = $nhap_mang;
            $mang_moi = "Lỗi: Giá trị thay thế phải là số!";
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
                $mang_cu = "Lỗi: Mảng chỉ chứa số, cách nhau bằng dấu \",\"!";
            } else {
                $mang_arr = array_map('trim', $mang_arr);
                $mang_cu = xuat_mang($mang_arr);
                $mang_moi_arr = thay_the($mang_arr, $gia_tri_cu, $gia_tri_moi);
                $mang_moi = xuat_mang($mang_moi_arr);
            }
        }
    }
    ?>

    <div class="container">
        <h2>THAY THẾ</h2>
        
        <form action="" method="POST" name="form_thaythe">
            <table>
                <!-- Nửa trên có nền hồng và vạch kẻ trắng -->
                <tbody class="top-section">
                    <tr>
                        <td class="label-col">Nhập các phần tử:</td>
                        <td>
                            <input type="text" name="nhap_mang" value="<?php echo htmlspecialchars($nhap_mang); ?>" required>
                        </td>
                    </tr>
                    <tr>
                        <td class="label-col">Giá trị cần thay thế:</td>
                        <td>
                            <input type="text" name="gia_tri_cu" value="<?php echo htmlspecialchars($gia_tri_cu); ?>" required>
                        </td>
                    </tr>
                    <tr>
                        <td class="label-col">Giá trị thay thế:</td>
                        <td>
                            <input type="text" name="gia_tri_moi" value="<?php echo htmlspecialchars($gia_tri_moi); ?>" required>
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td><input type="submit" name="thaythe" value="Thay thế" class="btn-submit"></td>
                    </tr>
                </tbody>

                <!-- Nửa dưới chứa kết quả -->
                <tbody class="bottom-section">
                    <tr>
                        <td class="label-col">Mảng cũ:</td>
                        <td><input type="text" name="mang_cu" value="<?php echo htmlspecialchars($mang_cu); ?>" readonly></td>
                    </tr>
                    <tr>
                        <td class="label-col">Mảng sau khi thay thế:</td>
                        <td><input type="text" name="mang_moi" value="<?php echo htmlspecialchars($mang_moi); ?>" readonly></td>
                    </tr>
                </tbody>
            </table>

            <div class="note">
                (<span class="highlight">Ghi chú:</span> Các phần tử trong mảng sẽ cách nhau bằng dấu ",")
            </div>
        </form>
    </div>

</body>
</html>
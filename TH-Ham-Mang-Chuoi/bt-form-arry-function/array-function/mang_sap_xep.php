<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sắp xếp mảng</title>
    <style>
        body { 
            font-family: Arial, sans-serif; 
            margin-top: 50px; 
            font-size: 13.5px;
        }

        .container { 
            margin: 0 auto;
            width: 480px; 
            background-color: #d6e5df; /* Màu nền gốc của form */
            border: 1px solid #7ea698;
            box-shadow: 1px 1px 4px rgba(0,0,0,0.15);
        }

        h2 { 
            text-align: center; 
            background-color: #298585; /* Tiêu đề xanh ngọc đậm */
            color: #ffffff; 
            margin: 0; 
            padding: 7px 0;
            font-size: 24px;
            font-weight: bold;
            font-style: italic;
            
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        /* Nửa trên: dùng màu nền gốc */
        .top-section {
            background-color: #d6e5df;
            padding: 10px 14px 6px 14px;
        }

        /* Nửa kết quả: có dải nền riêng biệt */
        .bottom-section {
            background-color: #c4e5dc; /* Nền xanh pastel riêng */
            padding: 4px 14px 10px 14px;
        }

        td {
            padding: 4px 5px;
            vertical-align: middle;
            color: #111111;
        }

        .label-col {
            width: 105px;
            white-space: nowrap;
        }

        .star-col {
            width: 25px;
            text-align: center;
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

        input[name="nhap_mang"] {
            width: 100%;
        }

        /* Hai ô input kết quả tăng/giảm */
        input[name="tang_dan"],
        input[name="giam_dan"] {
            width: 100%;
            background-color: #e2fbfc;
            border: 1px solid #7b9cb5;
            outline: none;
        }

        .btn-submit { 
            background-color: #ffffff;
            border: 1px solid #777777; 
            box-shadow: 1px 1px 2px rgba(0,0,0,0.15);
            padding: 3px 14px; 
            cursor: pointer; 
            font-size: 13px;
            color: #000000;
        }

        .btn-submit:hover {
            background-color: #f0f0f0;
        }

        .section-title {
            color: #c90000;
            font-weight: bold;
            padding-top: 6px;
            padding-bottom: 3px;
        }

        .sao-do {
            color: #d60000;
            font-weight: bold;
        }

        /* Dòng ghi chú quay về màu nền gốc của form */
        .note {
            text-align: center;
            font-size: 12.5px;
            padding: 8px 0 10px 0;
            color: #000000;
            background-color: #d6e5df; /* Trùng với màu nền gốc ở trên */
        }
    </style>
</head>
<body>

    <?php
    function hoan_vi(&$a, &$b) {
        $tam = $a;
        $a = $b;
        $b = $tam;
    }

    function sap_tang($mang) {
        for ($i = 0; $i < count($mang) - 1; $i++) {
            for ($j = $i + 1; $j < count($mang); $j++) {
                if ($mang[$i] > $mang[$j]) {
                    hoan_vi($mang[$i], $mang[$j]);
                }
            }
        }
        return $mang;
    }

    function sap_giam($mang) {
        for ($i = 0; $i < count($mang) - 1; $i++) {
            for ($j = $i + 1; $j < count($mang); $j++) {
                if ($mang[$i] < $mang[$j]) {
                    hoan_vi($mang[$i], $mang[$j]);
                }
            }
        }
        return $mang;
    }

    $nhap_mang = "";
    $tang_dan = "";
    $giam_dan = "";

    if (isset($_POST['sapxep'])) {
        $nhap_mang = trim($_POST['nhap_mang']);

        if ($nhap_mang === "") {
            $tang_dan = "Lỗi: Vui lòng nhập mảng!";
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
                $tang_dan = "Lỗi: Mảng chỉ chứa số, cách nhau bằng dấu \",\"!";
                $giam_dan = "Lỗi: Mảng chỉ chứa số, cách nhau bằng dấu \",\"!";
            } else {
                $mang_arr = array_map('trim', $mang_arr);
                $tang_dan = implode(", ", sap_tang($mang_arr));
                $giam_dan = implode(", ", sap_giam($mang_arr));
            }
        }
    }
    ?>

    <div class="container">
        <h2>SẮP XẾP MẢNG</h2>
        
        <form action="" method="POST" name="form_sapxep">
            <table>
                <!-- Khối nửa trên (màu gốc) -->
                <tbody class="top-section">
                    <tr>
                        <td class="label-col">Nhập mảng:</td>
                        <td>
                            <input type="text" name="nhap_mang" value="<?php echo htmlspecialchars($nhap_mang); ?>" required>
                        </td>
                        <td class="star-col"><span class="sao-do">(*)</span></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td><input type="submit" name="sapxep" value="Sắp xếp tăng/giảm" class="btn-submit"></td>
                        <td></td>
                    </tr>
                </tbody>

                <!-- Khối kết quả (màu nền riêng) -->
                <tbody class="bottom-section">
                    <tr>
                        <td colspan="3" class="section-title">Sau khi sắp xếp:</td>
                    </tr>
                    <tr>
                        <td class="label-col">Tăng dần:</td>
                        <td><input type="text" name="tang_dan" value="<?php echo htmlspecialchars($tang_dan); ?>" readonly></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td class="label-col">Giảm dần:</td>
                        <td><input type="text" name="giam_dan" value="<?php echo htmlspecialchars($giam_dan); ?>" readonly></td>
                        <td></td>
                    </tr>
                </tbody>
            </table>

            <!-- Dòng ghi chú (màu nền gốc) -->
            <div class="note">
                <span class="sao-do">(*)</span> Các số được nhập cách nhau bằng dấu ","
            </div>
        </form>
    </div>

</body>
</html>
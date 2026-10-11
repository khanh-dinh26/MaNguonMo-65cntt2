<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tính năm âm lịch</title>
    <style>
        body {
            font-family: Arial, Tahoma, sans-serif;
            margin-top: 50px;
            font-size: 14px;
        }

        .container {
            margin: 0 auto;
            width: 480px;
            background-color: #bde4fb;
            border: 1px solid #5b8fc0;
            box-shadow: 1px 1px 4px rgba(0,0,0,0.15);
        }

        h2 {
            text-align: center;
            background-color: #2f5aa6;
            color: #ffffff;
            margin: 0;
            padding: 7px 0;
            font-size: 22px;
            font-weight: bold;
            font-style: italic;
            text-transform: uppercase;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        td {
            padding: 4px 8px;
            vertical-align: middle;
            color: #111111;
        }

        .label-col {
            width: 33%;
            text-align: center;
            color: #2f5aa6;
        }

        input[type="text"] {
            border: 1px solid #7f9db9;
            height: 24px;
            line-height: 24px;
            padding: 0 4px;
            font-size: 14px;
            background-color: #ffffff;
            box-sizing: border-box;
        }

        input[name="nam_duong"] {
            width: 130px;
        }

        input[name="nam_am"] {
            width: 160px;
            background-color: #ffffcc;
            color: #c90000;
            outline: none;
        }

        .btn-submit {
            background-color: #ffffcc;
            border: 1px solid #999;
            box-shadow: 1px 1px 2px rgba(0,0,0,0.15);
            padding: 2px 10px;
            cursor: pointer;
            font-size: 13px;
            color: #000000;
        }

        .btn-submit:hover {
            background-color: #ffff99;
        }

        .hinh-box {
            text-align: center;
            padding: 8px 0 16px 0;
            min-height: 40px;
        }

        .hinh-box img {
            max-width: 240px;
            border: 1px solid #fff;
            background: #fff;
        }

        .emoji-fallback {
            font-size: 90px;
            line-height: 1;
        }

        .loi {
            text-align: center;
            color: #c90000;
            font-weight: bold;
            padding-bottom: 10px;
        }
    </style>
</head>
<body>

    <?php
    $mang_can = array("Quý", "Giáp", "Ất", "Bính", "Đinh", "Mậu", "Kỷ", "Canh", "Tân", "Nhâm");
    $mang_chi = array("Hợi", "Tý", "Sửu", "Dần", "Mão", "Thìn", "Tỵ", "Ngọ", "Mùi", "Thân", "Dậu", "Tuất");
    $mang_hinh = array("hoi.jpg", "ty.jpg", "suu.jpg", "dan.jpg", "mao.jpg", "thin.jpg", "ran.jpg", "ngo.jpg", "mui.jpg", "than.jpg", "dau.jpg", "tuat.jpg");


    $nam_duong = "";
    $nam_am = "";
    $hinh_anh = "";
    $loi = "";

    if (isset($_POST['xem'])) {
        $nam_duong = trim($_POST['nam_duong']);

        if ($nam_duong === "" || !is_numeric($nam_duong) || floor((float)$nam_duong) != (float)$nam_duong) {
            $loi = "Lỗi: Vui lòng nhập năm là số nguyên!";
        } elseif ((int)$nam_duong <= 0) {
            $loi = "Lỗi: Năm phải lớn hơn 0!";
        } else {
            $nam = (int)$nam_duong - 3;
            $can = (($nam % 10) + 10) % 10;
            $chi = (($nam % 12) + 12) % 12;
            $nam_al = $mang_can[$can] . " " . $mang_chi[$chi];
            $nam_am = $nam_al;
            $hinh = $mang_hinh[$chi];

            $duong_dan = "hinh/" . $hinh;
            if (file_exists($duong_dan)) {
                $hinh_anh = "<img src=\"" . htmlspecialchars($duong_dan) . "\" alt=\"" . htmlspecialchars($nam_al) . "\">";
            } else {

                $hinh_anh = "<div style=\"font-size:12px;color:#555;\">(" . htmlspecialchars($hinh) . " chưa có trong thư mục hinh)</div>";
            }
        }
    }
    ?>

    <div class="container">
        <h2>Tính năm âm lịch</h2>

        <form action="" method="POST" name="form_amlich">
            <table>
                <tr>
                    <td class="label-col">Năm dương lịch</td>
                    <td style="width:60px;text-align:center;"></td>
                    <td class="label-col">Năm âm lịch</td>
                </tr>
                <tr>
                    <td style="text-align:center;">
                        <input type="text" name="nam_duong" value="<?php echo htmlspecialchars($nam_duong); ?>" required>
                    </td>
                    <td style="text-align:center;">
                        <input type="submit" name="xem" value="=&gt;" class="btn-submit">
                    </td>
                    <td style="text-align:center;">
                        <input type="text" name="nam_am" value="<?php echo htmlspecialchars($nam_am); ?>" readonly>
                    </td>
                </tr>
            </table>

            <?php if ($loi !== "") { ?>
                <div class="loi"><?php echo htmlspecialchars($loi); ?></div>
            <?php } ?>

            <div class="hinh-box">
                <?php echo $hinh_anh; ?>
            </div>
        </form>
    </div>

</body>
</html>

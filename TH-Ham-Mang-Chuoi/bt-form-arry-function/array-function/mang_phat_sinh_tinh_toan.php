<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Phát Sinh Mảng Và Tính Toán</title>
    <style>
        body { 
            font-family: Arial, sans-serif; 
            margin-top: 50px; 
        }
        
        .container { 
            width: 650px; 
            margin: auto; 
            border: 1px solid #a80f75; 
        }
        
        h2 { 
            text-align: center; 
            background-color: #a80f75; 
            color: white; 
            margin: 0; 
            padding: 12px 0;
            font-size: 22px;
            text-transform: uppercase;
        }
        
        table {
            width: 100%;
            border-collapse: collapse;
        }

        td {
            padding: 8px 10px;
            vertical-align: middle;
        }

        .pink-row {
            background-color: #fdf0f6; 
        }

        .label-col {
            width: 220px;
        }

        input[type="text"] {
            border: 1px solid #aaa;
            padding: 4px;
        }

        input[name="n"] {
            width: 250px;
        }

        input[name="mang_kq"] {
            width: 95%; 
            background-color: #ffa3a3; 
            color: black;
            outline: none;
        }

        input[name="gtln"], input[name="gtnn"], input[name="tong"] {
            width: 150px; /* Các ô này ngắn hơn */
            background-color: #ffa3a3;
            color: black;
            outline: none;
        }

        .btn-submit { 
            background-color: #ffffcc; /* Nút bấm màu vàng nhạt */
            border: 1px solid #777; 
            padding: 4px 15px; 
            cursor: pointer; 
            color: black;
        }
        
        .note {
            text-align: center;
            font-size: 14px;
            padding-bottom: 15px;
        }
    </style>
</head>
<body>

    <?php
    // --- CÁC HÀM XỬ LÝ ---
    function tao_mang($n) {
        $mang = [];
        for ($i = 0; $i < $n; $i++) {
            $mang[] = rand(0, 20);
        }
        return $mang;
    }

    function xuat_mang($mang) {
        return implode(" ", $mang);
    }

    function tinh_tong($mang) {
        $tong = 0;
        foreach ($mang as $so) {
            $tong += $so;
        }
        return $tong;
    }

    function tim_max($mang) {
        return max($mang);
    }

    function tim_min($mang) {
        return min($mang);
    }

    // --- BIẾN VÀ LOGIC ---
    $n = "";
    $mang_kq = "";
    $gtln = "";
    $gtnn = "";
    $tong = "";

    if (isset($_POST['thuchien'])) {
        $n_raw = trim($_POST['n']);
        $n = $n_raw;

        // Bắt lỗi nếu nhập chữ thay vì số
        if (!is_numeric($n_raw)) {
            $mang_kq = "Lỗi: Vui lòng nhập số!";
        } 
        // Bắt lỗi nếu không phải số nguyên dương
        elseif ((float)$n_raw <= 0 || floor((float)$n_raw) != (float)$n_raw) {
            $mang_kq = "Lỗi: Nhập số nguyên dương";
        } 
        else {
            $mang = tao_mang((int)$n_raw);
            $mang_kq = xuat_mang($mang);
            $tong = tinh_tong($mang);
            $gtln = tim_max($mang);
            $gtnn = tim_min($mang);
        }
    }
    ?>

    <div class="container">
        <h2>Phát Sinh Mảng Và Tính Toán</h2>
        
        <form action="" method="POST" name="form_phatsinh">
            <table>
                <tr class="pink-row">
                    <td class="label-col">Nhập số phần tử:</td>
                    <td><input type="text" name="n" value="<?php echo htmlspecialchars($n); ?>" required></td>
                </tr>
                <tr class="pink-row">
                    <td></td>
                    <td><input type="submit" name="thuchien" value="Phát sinh và tính toán" class="btn-submit"></td>
                </tr>
                <tr>
                    <td>Mảng:</td>
                    <td><input type="text" name="mang_kq" value="<?php echo htmlspecialchars($mang_kq); ?>" readonly></td>
                </tr>
                <tr>
                    <td>GTLN (MAX) trong mảng:</td>
                    <td><input type="text" name="gtln" value="<?php echo htmlspecialchars($gtln); ?>" readonly></td>
                </tr>
                <tr>
                    <td>TTNN (MIN) trong mảng:</td>
                    <td><input type="text" name="gtnn" value="<?php echo htmlspecialchars($gtnn); ?>" readonly></td>
                </tr>
                <tr>
                    <td>Tổng mảng:</td>
                    <td><input type="text" name="tong" value="<?php echo htmlspecialchars($tong); ?>" readonly></td>
                </tr>
                <tr>
                    <td colspan="2" class="note">
                        (<span style="color: red; font-weight: bold;">Ghi chú:</span> Các phần tử trong mảng sẽ có giá trị từ 0 đến 20)
                    </td>
                </tr>
            </table>
        </form>
    </div>

</body>
</html>
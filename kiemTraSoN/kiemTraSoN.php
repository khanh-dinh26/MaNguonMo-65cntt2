<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kiểm Tra số N</title>
</head>
<body>
    <?php
    // 1. Hàm kiểm tra số nguyên tố
    function laSoNguyenTo($n) {
        if ($n < 2) {
            return false;
        }
        for ($i = 2; $i <= sqrt($n); $i++) {
            if ($n % $i == 0) {
                return false;
            }
        }
        return true;
    }

    // 2. Hàm kiểm tra số chính phương
    function laSoChinhPhuong($n) {
        $can = (int)sqrt($n);
        return ($can * $can == $n);
    }

    // 3. Sinh số ngẫu nhiên N trong [-100, 100]
    $n = rand(-100, 100);
    echo "<h2>Số ngẫu nhiên được chọn là: N = $n</h2>";

    // 4. Kiểm tra N có phải là số dương không (N > 0)
    if ($n > 0) {
        echo "<p><b>1. Các ước số của $n là:</b> ";
        for ($i = 1; $i <= $n; $i++) {
            if ($n % $i == 0) {
                echo $i . " ";
            }
        }
        echo "</p>";

        // Kiểm tra N có là số nguyên tố
        if (laSoNguyenTo($n)) {
            echo "<p><b>2.</b> $n <b>là</b> số nguyên tố.</p>";
        } else {
            echo "<p><b>2.</b> $n <b>không phải là</b> số nguyên tố.</p>";
        }

        // Tính tổng các số nguyên tố nhỏ hơn N
        $tongSNT = 0;
        for ($i = 2; $i < $n; $i++) {
            if (laSoNguyenTo($i)) {
                $tongSNT += $i;
            }
        }
        echo "<p><b>3. Tổng các số nguyên tố < $n là:</b> $tongSNT</p>";

        // Kiểm tra số chính phương
        if (laSoChinhPhuong($n)) {
            echo "<p><b>4.</b> $n <b>là</b> số chính phương.</p>";
        } else {
            echo "<p><b>4.</b> $n <b>không phải là</b> số chính phương.</p>";
        }

    } else {
        echo "$n không phải là số dương (N <= 0) nên không thực hiện tính toán.</p>";
    }
?>
</body>
</html>
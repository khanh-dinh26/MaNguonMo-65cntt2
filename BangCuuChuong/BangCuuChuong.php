<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bảng Cửu Chương</title>
</head>
<body>
    <?php
        echo "Bảng cửu chương";
            for ($i = 1; $i <= 10; $i++) {
                    echo "<br><b>Bảng $i</b><br>";

                    for ($j = 1; $j <= 10; $j++) {
                        $ket_qua = $i * $j;
                        echo "$i x $j = $ket_qua <br>";
                    }
                    echo "</td>";
                }
        ?>
</body>
</html>
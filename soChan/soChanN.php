<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tìm số chẵn</title>
</head>
<body>
    <?php
        $n = rand(1,100);
        echo "Số được chọn: $n</p>";    
        echo "Dãy từ 1 đến $n là:</p>";

        for ( $i = 1; $i < $n ; $i++){
            if ($i % 2 == 0){
                echo "$i". " ";
            }    
        }
    ?>
</body>
</html>
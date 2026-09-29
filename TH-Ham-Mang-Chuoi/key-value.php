<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>In Key&Value</title>
</head>
<body>
    <?php
        // Khởi tạo mảng hai chiều
        $superheroes = array(
            "spider-man" => array(
                "name" => "Peter Parker",
                "email" => "peterparker@mail.com"
            ),
            "super-man" => array(
                "name" => "Clark Kent",
                "email" => "clarkkent@mail.com"
            ),
            "iron-man" => array(
                "name" => "Tony Stark",
                "email" => "tonystark@mail.com"
            )
        );

        foreach ($superheroes as $biet_danh => $thong_tin_chi_tiet) {

            echo $biet_danh . ":<br>";
            
            foreach ($thong_tin_chi_tiet as $ten_truong => $du_lieu) {
                
            echo "<span style='margin-left: 40px;'>" . $ten_truong . ": " . $du_lieu . "</span><br>";
            }
        }
        
    ?>
</body>
</html>
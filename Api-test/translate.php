<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dịch Văn Bản</title>
</head>
<body>


    <form action="" method="GET">
        <label for="q">Nhập văn bản (English):</label>
        <input type="text" id="q" name="q" value="<?php echo isset($_GET['q']) ? htmlspecialchars($_GET['q']) : ''; ?>" placeholder="Nhập từ cần dịch...">
        <button type="submit">Dịch</button>
    </form>

    <br>

<?php
if (isset($_GET['q']) && trim($_GET['q']) !== '') {
    $text_to_translate = trim($_GET['q']);

    $curl = curl_init();

    curl_setopt_array($curl, [
        CURLOPT_URL => "https://google-translator9.p.rapidapi.com/v2",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "POST",
        CURLOPT_POSTFIELDS => json_encode([
            'format' => 'text',
            'q' => $text_to_translate,
            'source' => 'en',
            'target' => 'vi'
        ]),
        CURLOPT_HTTPHEADER => [
            "Content-Type: application/json",
            "X-RapidAPI-Host: google-translator9.p.rapidapi.com",
            "X-RapidAPI-Key: "
        ],
    ]);

    $response = curl_exec($curl);
    $err = curl_error($curl);
    curl_close($curl);

    if ($err) {
        echo "cURL Error #: " . $err;
    } else {
        $array = json_decode($response, true);
        if (isset($array["data"]["translations"][0]["translatedText"])) {
            echo "<strong>Kết quả (Tiếng Việt):</strong> " . $array["data"]["translations"][0]["translatedText"];
        }
    }
}
?>

</body>
</html>
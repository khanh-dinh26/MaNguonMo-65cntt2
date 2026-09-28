<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Tính Diện Tích</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            margin-top: 50px;
        }
        form {
            display: inline-block;
            border: 1px solid #ccc;
            padding: 20px;
            border-radius: 8px;
            background-color: #f9f9f9;
        }
        input {
            padding: 5px;
            width: 100px;
        }
        button {
            padding: 6px 12px;
            background-color: #007bff;
            color: white;
            border: none;
            cursor: pointer;
        }
    </style>
</head>
<body>

    <h2>Tính Diện Tích</h2>

    <form method="post">
        Chiều dài: <input type="number" step="any" name="dai" required> cm <br><br>
        Chiều rộng: <input type="number" step="any" name="rong" required> cm <br><br>
        <button type="submit">Tính Toán</button>
    </form>

    <br><br>

    <?php
    if (isset($_POST['dai']) && isset($_POST['rong'])) {
        $dientich = $_POST['dai'] * $_POST['rong'];
        echo "<h3 style='color: red;'>Diện tích: " . $dientich . " cm²</h3>";
    }
    ?>

</body>
</html>
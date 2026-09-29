<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dien tich HCN</title>
    <style>
    body { 
        font-family: Arial, sans-serif; 
        text-align: center; 
        margin-top: 50px; 
    }
    
    form { 
        display: inline-block; 
        border: 2px solid #d35400; 
        padding: 20px; 
        border-radius: 8px; 
        background-color: #fce4d6; 
        text-align: left; 
    }
    
    h2 { 
        text-align: center; 
        margin-top: 0; 
        background-color: #c21826;
        padding: 12px;
        border-radius: 4px;
        color: white;
    }
    
    label { 
        display: inline-block; 
        width: 100px; 
        font-weight: bold; 
    }
    
    input { 
        padding: 5px; 
        width: 150px; 
        margin-bottom: 10px; 
    }

    input[readonly] { 
        background-color: #fde9d9; 
        color: red; 
        font-weight: bold; 
        outline: none; 
    }
    
    button { 
        padding: 6px 12px; 
        background-color: #007bff; 
        color: white; 
        border: none; 
        cursor: pointer; 
        display: block; 
        margin: 10px auto 0; 
        border-radius: 4px; 
    }
</style>
</head>
<body>

    <?php
    $dai = "";
    $rong = "";
    $dientich = "";

    if (isset($_POST['dai']) && isset($_POST['rong'])) {
        $dai = $_POST['dai'];
        $rong = $_POST['rong'];
        $dientich = $dai * $rong;
    }
    ?>

    <form method="post">
        <h2>Tính Diện Tích</h2>
        
        <label>Chiều dài:</label>
        <input type="number" step="any" name="dai" value="<?php echo $dai; ?>" required> cm <br>
        
        <label>Chiều rộng:</label>
        <input type="number" step="any" name="rong" value="<?php echo $rong; ?>" required> cm <br>
        
        <label>Diện tích:</label>
        <input type="text" name="dientich" value="<?php echo $dientich; ?>" readonly> cm² <br>
        
        <button type="submit">Tính Toán</button>
    </form>

</body>
</html>
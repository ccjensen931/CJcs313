<?php
    session_start();

    $items = $_SESSION["Cart"];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <?php
        include 'header.php';
    ?>
    
    <title>Cart</title>
</head>
<body>
    
<div class="container">
    <?php
        $sum = 0;

        foreach($items as $item => $data)
        {
            echo '<div class="row"><div class="col">' . $data[0] . '</div><div class="col">Name: ' . $item . '</div><div class="col">Quantity: ' . $data[2] . '</div><div class="col">Price: ' . $data[1]. '</div></div>';
            $sum += $data[1] * $data[2];
        }

        echo '<div class="row"><div class="col-9"> </div><div class="col-3">Total: $' . $sum . '</div></div>'; 
    ?>
</div>
</body>
</html>

b4-
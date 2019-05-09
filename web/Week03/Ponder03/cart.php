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
    
<ul class="list-group">
    <?php
        $i = 0;

        foreach($items as $item => $data)
        {
            echo '<li class="list-group-item">' . $data[0] . ' Name: ' . $item . '<br> Price: ' . $data[1] . '<br> Quantity: ' . $data[2] . '</li>';
        }
        echo '</ul>';
    ?>
</div>
</body>
</html>
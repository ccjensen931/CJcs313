<?php
    session_start();

    $items = $_SESSION["Cart"];

    session_destroy();
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

    <title>Confirmation</title>
</head>
<body>
<div class="container">
    <div class="row align-items-center">
        <div class="col">
            <h1> Order Confirmation </h1>
        </div>
    </div>
    <div class="row align-items-center">
        <div class="col-4">
            Billing Address
            <ul class="list-group">
                <li class="list-group-item">
                <?php
                    echo $_POST["First Name"] . ' ' . $_POST["Last Name"] . '<br>' . $_POST["Address 1"] . ' ' . $_POST["Address 2"]
                    . '<br>' . $_POST["City"] . ', ' . $_POST["State"] . ' ' . $_POST["Country"];
                ?>
                </li>
            </ul>
        </div>
        <div class="col-8">
            <ul class="list-group">
                <?php
                    foreach($items as $item => $itemData)
                    {
                        echo '<li class="list-group-item"><div class="container"><div class="row"><div class="col-4">' . $itemData[0]
                        . '</div><div class="col-8">' . $item . '<br>Quantity: ' . $itemData[2] . '<br>Price Per Unit: $' . $itemData[1]
                        . '.00</div></div></div></li>';
                    }
                ?>
            </ul>
        </div>
    </div>    
</div>
</body>
</html>
<?php
    session_start();

    if (isset($_POST["Item"]) && isset($_POST["Quantity"]))
    {
        $updateItemQuantity = $_POST["Item"];
        $itemQuantity = $_POST["Quantity"];

        echo $updateItemQuantity;
        echo $itemQuantity;

        $_SESSION["Cart"][$updateItemQuantity][2] = $itemQuantity;
    }

    $items = $_SESSION["Cart"];

    if (isset($_POST["Cart"]))
    {
        $deleteCartItem = $_POST["Cart"];
        
        if(!isset($_SESSION["Cart"]))
        {
            $_SESSION["Cart"] = array();
        }
        else
        {
            unset($_SESSION["Cart"][$deleteCartItem]);
            header("Refresh:0");
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="cart.css">

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
            echo '<div class="row align-items-center cart-item"><div class="col">' . $data[0] . '</div><div class="col">Name: ' . $item . '</div><div class="col"><form class="form-inline" action="cart.php" method="post">
            <div class="form-group"><label for="Quantity">Quantity: </label><input type="hidden" name="Item" id="' . $item . '" value="' . $item . '" placeholder="">
            <input type="text" name="Quantity" id="' . $item . '" class="form-control w-2" value="' . $data[2] . '" placeholder="' . $data[2] . '" aria-describedby="helpId"></div><button type="submit" class="btn btn-danger">
            Save</button></form></div><div class="col">Price: $' . $data[1]. '</div><div class="col"><form action="cart.php" method="post"><input type="hidden" name="Cart" id="' . $item . '" value="' . $item . '" placeholder="">
            <button type="submit" class="btn btn-danger">Remove From Cart</button></form></div></div>';
            $sum += $data[1] * $data[2];
        }

        echo '<div class="row align-items-center cart-item"><div class="col-9"> </div><div class="col-3">Total: $' . $sum . '</div></div>'; 
    ?>
</div>
</body>
</html>
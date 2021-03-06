<?php
    session_start();

    if (isset($_POST["Item"]) && isset($_POST["Quantity"]))
    {
        $updateItemQuantity = $_POST["Item"];
        $itemQuantity = $_POST["Quantity"];

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
            echo '<div class="row align-items-center cart-item"><div class="col"><img src="' . $data[0] . '" class="img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}" alt="" style="width:100px;height:100px;">
            </div><div class="col">Name: ' . $item . '</div><div class="col">Quantity: <form class="form-inline" action="cart.php" method="post"><div class="form-group"><input type="hidden" name="Item" id="' . $item . '" value="' . $item . '" placeholder="">
            <input type="text" name="Quantity" id="' . $item . '" class="form-control ml-1" value="' . $data[2] . '" placeholder="' . $data[2] . '" aria-describedby="helpId"></div><button type="submit" class="btn btn-danger">
            Save</button></form></div><div class="col">Price: $' . $data[1] . '.00</div><div class="col"><form action="cart.php" method="post"><input type="hidden" name="Cart" id="' . $item . '" value="' . $item . '" placeholder="">
            <button type="submit" class="btn btn-danger">Remove From Cart</button></form></div></div>';
            $sum += $data[1] * $data[2];
        }

        echo '<div class="row align-items-center total"><div class="col-10"></div><div class="col-2">Total: $' . $sum . '</div></div>';
    
        if (count($items) > 0)
        {
            echo '<div class="row align-items-center checkout"><div class="col-10"></div><div class="col-2"><a href="checkout.php">
                <button type="button" class="btn btn-primary">Checkout</button></a></div></div>';
        }
    ?>
</div>
</body>
</html>
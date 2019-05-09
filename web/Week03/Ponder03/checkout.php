<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <?php
        include 'header.php';
    ?>

    <title>Checkout</title>
</head>
<body>
<form action="confirmation.php" method="post">
    <a href="cart.php">
        <button type="button" class="btn btn-danger">Back to Cart</button>
    </a>
    <div class="container"><div class="row align-items-center">Billing Information</div></div>
    <?php
        include 'address.php';
    ?>
    <div class="container"><div class="row align-items-center"><button type="submit" class="btn btn-primary">Submit</button></div></div>
</form>
</body>
</html
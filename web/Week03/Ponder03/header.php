<?php
    session_start();

    $count = 0; // = count($cart);

    if (isset($_SESSION["Cart"]))
    {
        $cart = $_SESSION["Cart"];
        foreach($cart as $item => $data)
        {
            $count += $data[2];
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

    <title>Fun Stuff Store</title>
</head>
<body>
    <nav class="navbar navbar-expand-md navbar-light bg-light">
        <a class="navbar-brand" href="#">FunStuff.com</a>
        <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#collapsibleNavId" aria-controls="collapsibleNavId"
            aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="collapsibleNavId">
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                <li class="nav-item active">
                    <a class="nav-link" href="browse.php">Browse Inventory<span class="sr-only">(current)</span></a>
                </li>
            </ul>
            <form action="browse.php" method="post" class="form-inline ml-3 my-2 my-lg-0">
                <input class="form-control mr-sm-2" type="text" name="Search" placeholder="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form>
            <div class="navbar-nav mt-2 mt-lg-0">
                <a class="nav-link" href="cart.php">
                    <img src="Images/shopping_cart.png" class="img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}" alt="" style="width:50px;height:50px;">
                    <?php
                        echo $count;
                    ?>
                    Items
                </a>
            </div>
        </div>
    </nav>
</body>
</html>
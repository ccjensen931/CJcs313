<?php
    session_start();

    $items["Acoustic Guitar"] = array('<img src="../../Week02/Ponder02/Images/Acoustic Guitar.jpg" class="img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}" alt="" style="width:200px;height:200px;">', "300.00");
    $items["Electric Guitar"] = array('<img src="Images/Electric Guitar.jpg" class="img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}" alt="" style="width:200px;height:200px;">', "350.00");
    $items["Xbox One"] = array('<img src="Images/Xbox One.jpg" class="img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}" alt="" style="width:200px;height:200px;">', "299.00");
    $items["PlayStation 4"] = array('<img src="Images/PS4.jpg" class="img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}" alt="" style="width:200px;height:200px;">', "299.00");
    $items["Nintendo Switch"] = array('<img src="Images/Nintendo Switch.jpg" class="img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}" alt="" style="width:200px;height:200px;">', "299.00");
    $items["Gaming PC"] = array('<img src="Images/Gaming PC.jpg" class="img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}" alt="" style="width:200px;height:200px;">', "1,300.00");
    $items["CZ Scorpion"] = array('<img src="Images/CZ Scorpion.jpg" class="img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}" alt="" style="width:200px;height:200px;">', "1,500.00");
    $items["AR-15"] = array('<img src="Images/AR15.jpg" class="img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}" alt="" style="width:200px;height:200px;">', "900.00");
    $items["P226"] = array('<img src="Images/P226.jpg" class="img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}" alt="" style="width:200px;height:200px;">', "750.00");

    $itemsSize = count($items);

    $search = false;
    if(isset($_POST["Search"]))
    {
        $searchedTerm = $_POST["Search"];
        $search = true;
    }

    if (isset($_POST["Cart"]))
    {
        $newCartItem = $_POST["Cart"];
        
        $quantity = $_POST["Quantity"];
        if ($quantity < 1)
        {
            $quantity = 1;   
        }

        if(!isset($_SESSION["Cart"]))
        {
            $_SESSION["Cart"] = array();
        }
        $_SESSION["Cart"][$newCartItem] = $items[$newCartItem];
        array_push($_SESSION["Cart"][$newCartItem], $quantity);
    }
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

    <title>Fun Stuff Store</title>
</head>
<body>
<div class="container">
    <?php
        $i = 0;

        echo '<div class="row">';
        foreach($items as $item => $data)
        {
            if ($i == 3)
            {
                echo '</div><div class="row">';
                $i = 0;
            }

            if ($search && strpos($item, $searchedTerm) !== false)
            {
                displayItem($item, $data);
            }
            else if (!$search)
            {

                displayItem($item, $data);
            }
        }
        echo '</div>';

        function displayItem($item, $data)
        {
            echo '<div class="col-4">' . $data[0] . '<p>' . $item . '<br>$' . $data[1] . '</p>';
            echo '<form action="browse.php" method="post">
                <div class="form-group">
                    <label for="quantity">Quantity</label>
                    <input type="hidden" name="Cart" id="' . $item . '" value="' . $item . '" placeholder="">
                    <input type="text"
                        class="form-control" name="Quantity" id="' . $item . ' Quantity" aria-describedby="helpId" placeholder="">
                    <button type="submit" class="btn btn-primary">Add to Cart</button>
                </div>
            </form></div>';
            $i++;
        }
    ?>
</div>
</body>
</html>
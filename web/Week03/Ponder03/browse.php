<?php
    session_start();

    $items["Acoustic Guitar"] = array('<img src="../../Week02/Ponder02/Images/Acoustic Guitar.jpg" class="img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}" alt="" style="width:200px;height:200px;">', "$300.00");
    $items["Electric Guitar"] = array('<img src="Images/Electric Guitar.jpg" class="img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}" alt="" style="width:200px;height:200px;">', "$350.00");
    $items["Xbox One"] = array('<img src="Images/Xbox One.jpg" class="img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}" alt="" style="width:200px;height:200px;">', "$299.00");
    $items["PlayStation 4"] = array('<img src="Images/PS4.jpg" class="img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}" alt="" style="width:200px;height:200px;">', "$299.00");
    $items["Nintendo Switch"] = array('<img src="Images/Nintendo Switch.jpg" class="img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}" alt="" style="width:200px;height:200px;">', "$299.00");

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

        if(!isset($_SESSION["Cart"]))
        {
            $_SESSION["Cart"] = array();
        }
        $_SESSION["Cart"][$newCartItem] = $items[$newCartItem];    
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

<?php
    include 'displayItems.php';
?>

</body>
</html>
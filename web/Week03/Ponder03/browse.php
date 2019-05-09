<?php
    session_start();
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
    $items["Acoustic Guitar"] = array('<img src="../../Week02/Ponder02/Images/Acoustic Guitar.jpg" class="img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}" alt="" style="width:200px;height:200px;">', "$300.00");
    $items["Electric Guitar"] = array('<img src="Images/Electric Guitar.jpg" class="img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}" alt="" style="width:200px;height:200px;">', "$350.00");
    $items["Xbox One"] = array('<img src="Images/Xbox One.jpg" class="img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}" alt="" style="width:200px;height:200px;">', "$299.00");
    $items["PlayStation 4"] = array('<img src="Images/PS4.jpg" class="img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}" alt="" style="width:200px;height:200px;">', "$299.00");
    $items["Nintendo Switch"] = array('<img src="Images/Nintendo Switch.jpg" class="img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}" alt="" style="width:200px;height:200px;">', "$299.00");

    $itemsSize = count($items);

    //$searchedTerm = $_POST["Search"];
    //$cart = $_POST["Cart"];

    //$_SESSION["Items"] = $items;
?>

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

            echo '<div class="col-4">' . $data[0] . '<p>' . $item . '<br>' . $data[1] . '</p>';
            echo '<form action="browse.php" method="post">
                <div class="form-group">
                    <label for="quantity">Quantity</label>
                    <input type="text"
                        class="form-control" name="Cart" id="' . $item . '" aria-describedby="helpId" placeholder="">
                    <button type="submit" class="btn btn-primary">Add to Cart</button>
                </div>
            </form></div>';

            $i++;
        }
        echo '</div>';
    ?>
</div>

<!-- <div class="container">
    <div class="row">
        <div class="col-4">
            <img src="../../Week02/Ponder02/Images/Acoustic Guitar.jpg" class="img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}" alt="" style="width:200px;height:200px;">
            <p>
                Acoustic Guitar <br>
                $300.00
            </p>
            <form action="browse.php" method="post">
                <div class="form-group">
                    <label for="quantity">Quantity</label>
                    <input type="text"
                        class="form-control" name="Cart" id="acousticGuitar" aria-describedby="helpId" placeholder="">
                    <button type="submit" class="btn btn-primary">Add to Cart</button>
                </div>
            </form>
        </div>
    </div>
</div> -->

</body>
</html>
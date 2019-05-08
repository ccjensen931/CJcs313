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
    $_SESSION["Test"] = "This is a test.";
    $items[0] = array('<img src="../../Week02/Ponder02/Images/Acoustic Guitar.jpg" class="img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}" alt="" style="width:200px;height:200px;">', "Acoustic Guitar", "$300.00");

    $itemsSize = count($items);

    echo $items[0][0];
    echo $items[0][1];
    echo $items[0][2];

    //$_SESSION["Items"] = $items;
?>

<!-- <div class="container">
    <?php
        /* for ($i = 0; $i < $itemsSize; $i++)
        {
            if ($i % 3 == 0 && $i != 0)
            {
                echo '</div>';
                echo '<div class="row">';
            }
            elseif ($i == 0)
            {
                echo '<div class="row">';
            }

            echo '<div class="col-4"><p>';
            foreach ($item[$i] as $part)
            {
                echo $part . '<br>';
            }
            echo '</p></div>';
        }
        echo '</div>'; */
    ?>
</div> -->

<div class="container">
    <div class="row">
        <div class="col-4">
            <p> 
                <img src="../../Week02/Ponder02/Images/Acoustic Guitar.jpg" class="img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}" alt="" style="width:200px;height:200px;"><br> 
                Acoustic Guitar <br>
                $300.00
            </p>
        </div>
    </div>
</div>

</body>
</html>
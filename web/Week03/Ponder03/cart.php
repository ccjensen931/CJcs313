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
        }
        echo '</div>';
    ?>
</div>
</body>
</html>
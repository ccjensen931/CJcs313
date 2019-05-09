<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    
    <title>Document</title>
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
    ?>
</div>
</body>
</html>
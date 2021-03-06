<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="time.css">

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="index.php">CS 313 Jensen</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li <?php 
                    if(basename($_SERVER['PHP_SELF']) == 'index.php'){
                       echo "class=\"nav-link active\"";
                    } else {
                        echo "class=\"nav-link\"";
                    }
                    ?>>
                    <a class="nav-link" href="index.php">Home</a>
                </li>
                <li <?php 
                    if(basename($_SERVER['PHP_SELF']) == 'assignments.php'){
                       echo "class=\"nav-link active\"";
                    } else {
                        echo "class=\"nav-link\"";
                    }
                    ?>>
                    <a class="nav-link" href="assignments.php">Assignments</a>
                </li>
            </ul>
        </div>
        <div id="Time">
            <?php
                date_default_timezone_set('America/Boise'); // MDT
                $current_time = date("H:i:s");
                echo $current_time;
            ?>
        </div>
    </nav>
    </head>
</html>

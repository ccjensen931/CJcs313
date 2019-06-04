<!DOCTYPE html>
<html lang="en">
<head>
    <?php
        session_start();
        include 'dbConnect.php';
        
        ini_set('display_errors', 'On');
        error_reporting(E_ALL | E_STRICT);

        $username = "";
        $userID = 0;

        if (isset($_SESSION["Username"]) && isset($_SESSION["ID"]))
        {
            $username = $_SESSION["Username"];
            $userID = $_SESSION["ID"];
        }
        else
        {
            header('Location: signIn.php');
            die();
        }
    ?>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <p>
        Welcome <?php echo $username; ?>
    </p>
</body>
</html>
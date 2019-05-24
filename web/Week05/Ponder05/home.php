<!DOCTYPE html>
<html lang="en">
<head>
    <?php
        session_start();
        include 'dbConnect.php';
        include 'navbar.php';

        $loginURL = 'login.php';
        $username;
        $userId;
        $inbox = true;

        if (isset($_SESSION["Username"]))
        {
            $username = $_SESSION["Username"];
            $userID = $_SESSION["ID"];
        }
        else
        {
            header('Location: ' . $loginURL);
            die();
        }
    ?>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home</title>
</head>
<body>
    <div class="mt-25 d-flex">
        <div class="ml-25 p-3">
            <ul class="list-group">
                <?php
                    if (isset($db)
                    {
                        $statement = $db->prepare('SELECT user_id, user_password FROM users WHERE username=:username');
                        $statement->execute(array(':username' => $_POST["username"]));
                        $result = $statement->fetch(PDO::FETCH_ASSOC);
                    }
                ?>
                <li class="list-group-item">Item 1</li>
                <li class="list-group-item">Item 2</li>
                <li class="list-group-item">Item 3</li>
            </ul>
        </div>
        <div class="mt-25 ml-10 p-25">
            <div class="card">
                <div class="card-body">
                    This is some text within a card body.
                </div>
            </div>
        </div>
    </div>
</body>
</html>
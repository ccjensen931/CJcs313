<!DOCTYPE html>
<html lang="en">
<head>
    <?php
        session_start();
        include 'dbConnect.php';

        if (isset($db) && isset($_POST["username"]) && isset($_POST["password"]))
        {
            $homeURL = 'home.php';

            $statement = $db->prepare('SELECT user_password FROM users WHERE username=:username');
            $statement->execute(array(':username' => $_POST["username"]));
            $result = $statement->fetch(PDO::FETCH_ASSOC);

            if (isset($result) && $result['user_password'] == $_POST["password"])
            {
                $_SESSION["Username"] = $_POST["username"];
                header('Location: ' . $homeURL);
                die();
            }
        }
        else
        {
            
        }
    ?>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
</head>
<body>
    <div class="d-flex justify-content-center align-items-center">
        <form action="login.php" method="post">
            <div class="form-group">
                <label for="">Login</label>
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text"
                        class="form-control" name="username" id="username" aria-describedby="helpId" placeholder="">
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" name="password" id="password" placeholder="">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
</body>
</html>
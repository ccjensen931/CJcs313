<!DOCTYPE html>
<html lang="en">
<head>
    <?php
        session_start();
        include 'dbConnect.php';

        ini_set('display_errors', 'On');
        error_reporting(E_ALL | E_STRICT);        

        $loginError = 'Username/Password combination incorrect. Try signing in again.';
    ?>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="signIn.php" method="post">
        <div class="form-group">
            <?php
                if (isset($db) && isset($_POST["Username"]) && isset($_POST["Password"]))
                {
                    echo 'making db query';
                    $checkLoginStatement = $db->prepare("SELECT user_id, username, user_password FROM team07_users WHERE username=:username;");
                    $checkLoginStatement->execute(array(':username' => $_POST["Username"]));
                    $result = $checkLoginStatement->fetch(PDO::FETCH_ASSOC);
                    echo ' executed ';

                    if (isset($result) && password_verify($_POST["Password"], $result["user_password"]))
                    {
                        $_SESSION["Username"] = $result["username"];
                        $_SESSION["ID"] = $result['user_id'];
                        echo 'Success!';
                        header('Location: welcomePage.php');
                        die();
                    }
                    else
                    {
                        echo '<p style="color:red">' . $loginError . '</p>';
                    }
                }
            ?>
            <label for="Username">Username</label>
            <input type="text"
                class="form-control" name="Username" id="Username" aria-describedby="helpId" placeholder="" required>
            <label for="Password">Password</label>
            <input type="password"
                class="form-control" name="Password" id="Password" aria-describedby="helpId" placeholder="" required>
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
    <a href="signUp.php"><button type="btn" class="btn btn-primary">Sign Up</button></a>
</body>
</html>
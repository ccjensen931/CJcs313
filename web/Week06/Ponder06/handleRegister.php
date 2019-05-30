<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<?php
    include 'dbConnect.php';

    $loginURL = 'login.php';

    if (isset($_POST["Username"]) && isset($_POST["Password"]) && isset($_POST["Email"]) && isset($_POST["First_Name"]) && isset($_POST["Last_Name"]))
    {
        $statement = $db->prepare("INSERT INTO users VALUES (nextval('users_s1'), :username, :pass, :email, :first_name, :last_name);");
        $statement->execute(array(':username' => $_POST['Username'], ':pass' => $_POST['Password'], ':email' => $_POST['Email'], ':first_name' => $_POST['First_Name'], ':last_name' => $_POST['Last_Name']));
        $newID = $db->lastInsertId('users_s1');

        echo '<p>' . $newID . '</p>';
    }
    else{
        echo '<p>Something was missing!</p>';
    }

    //header('Location: ' . $loginURL);
?>
</body>
</html>
<?php
    include 'dbConnect.php';

    $loginURL = 'login.php';

    if (isset($_POST['Username']) && isset($_POST['Password']) && isset($_POST['Email']) && isset($_POST['First_Name']) && isset($_POST['Last_Name']))
    {
        $statement = $db->prepare("INSERT INTO users VALUES (nextval('users_s1'), :username, :pass, :email, :first_name, :last_name");
        $statement->execute(array(':username' => $_POST['Username'], ':pass' = > $_POST['Password'], ':email' => $_POST['Email'], ':first_name' => $_POST['First_Name'], ':last_name' => $_POST['Last_Name']));
    }

    header('Location: ' . $loginURL);
?>
<?php
    session_start();
    include 'dbConnect.php';

    if (isset($_POST["Delete"]) && !empty($_POST["Delete"]))
    {
        $statementDeleteMessages = $db->prepare("DELETE FROM messages WHERE recipient_id=:id OR sender_id=:id");
        $statementDeleteMessages->execute(array(':id' => $_SESSION["ID"]));

        $statementDeleteContacts = $db->prepare("DELETE FROM contacts WHERE owner_id=:id OR owner_contact_id=:id");
        $statementDeleteContacts->execute(array(':id' => $_SESSION["ID"]));

        $statementDeleteUser = $db->prepare("DELETE FROM users WHERE user_id=:id");
        $statementDeleteUser->execute(array(':id' => $_SESSION["ID"]));
    }

    header('Location: redirect.php');
    die();
?>
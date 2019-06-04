<?php
    session_start();
    include 'dbConnect.php';

    $statementDeleteMessages = $db->prepare("DELETE FROM messages WHERE recipient_id=:id OR sender_id=:id");
    $statementDeleteMessages->execute(array(':id' => $userID));

    $statementDeleteContacts = $db->prepare("DELETE FROM contacts WHERE owner_id=:id OR owner_contact_id=:id");
    $statementDeleteContacts->execute(array(':id' => $userID));

    $statementDeleteUser = $db->prepare("DELETE FROM users WHERE user_id=:id");
    $statementDeleteUser->execute(array(':id' => $userID));

    header('Location: redirect.php');
?>
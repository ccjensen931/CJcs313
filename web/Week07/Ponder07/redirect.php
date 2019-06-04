<?php
    session_start();

    $redirectURL = 'homeInbox.php';

    session_destroy();
    header('Location: ' . $redirectURL);
    die();
?>
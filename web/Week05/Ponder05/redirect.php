<?php
    session_start();

    $redirectURL = 'home.php';

    session_destroy();
    header('Location: ' . $redirectURL);
?>
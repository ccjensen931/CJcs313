<?php
    $redirectURL = 'home.php';

    session_destroy();
    header('Location: ' . $redirectURL);
?>
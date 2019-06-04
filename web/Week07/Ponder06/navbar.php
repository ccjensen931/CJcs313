<!DOCTYPE html>
<html lang="en">
<head>
    <?php
        session_start();

        ini_set('display_errors', 'On');
        error_reporting(E_ALL | E_STRICT);

        $username;
        $userId;
        $first_name;
        $last_name;

        if (isset($_SESSION))
        {
            $username = $_SESSION["Username"];
            $userID = $_SESSION["ID"];
            $first_name = $_SESSION["First_Name"];
            $last_name = $_SESSION["Last_Name"];
        }
    ?>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
            <li class="nav-item active">
                <p class="navbar-brand">
                    <?php
                        echo $username;
                    ?>
                </p>
            </li>
            <li class="nav-item active">
                <p class="nav-link">
                    <?php
                        if (basename($_SERVER['PHP_SELF']) == 'homeInbox.php')
                        {
                            echo 'Inbox';
                        }
                        else if (basename($_SERVER['PHP_SELF']) == 'homeSent.php')
                        {
                            echo 'Sent';
                        }
                        else if (basename($_SERVER['PHP_SELF']) == 'contactManagement.php')
                        {
                            echo 'Contacts';
                        }
                        else if (basename($_SERVER['PHP_SELF']) == 'accountSettings.php')
                        {
                            echo 'Settings';
                        }
                    ?>
                </p>
            </li>
        </ul>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="navbar-toggler-icon"></span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <p class="dropdown-item"><?php echo $first_name . " " . $last_name; ?></p>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="homeInbox.php">Inbox</a>
                        <a class="dropdown-item" href="homeSent.php">Outbox</a>
                        <a class="dropdown-item" href="contactManagement.php">Contacts</a>
                        <a class="dropdown-item" href="accountSettings.php">Settings</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="redirect.php">Logout</a>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
</body>
</html>
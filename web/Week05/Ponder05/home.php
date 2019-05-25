<!DOCTYPE html>
<html lang="en">
<head>
    <?php
        session_start();
        include 'dbConnect.php';
        include 'navbar.php';

        $loginURL = 'login.php';
        $username;
        $userId;
        $inbox = true;

        if (isset($_SESSION["Username"]))
        {
            $username = $_SESSION["Username"];
            $userID = $_SESSION["ID"];
        }
        else
        {
            header('Location: ' . $loginURL);
            die();
        }
    ?>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home</title>
</head>
<body>
    <div class="mt-5 d-flex">
        <div class="ml-5 p-3">
            <ul class="list-group">
                <?php
                    if (isset($db))
                    {
                        $statement = $db->prepare('SELECT u.username as username, m.message_read as read
                                                    FROM messages m LEFT JOIN users u
                                                        ON m.sender_id = u.user_id
                                                    WHERE m.recipient_id = :user_id;');
                        $statement->execute(array(':user_id' => $userID));
                        $resultSet = $statement->fetchALL(PDO::FETCH_ASSOC);

                        foreach($resultSet as $row)
                        {
                            echo '<li class="list-group-item">';

                            if (!$row['read'])
                                echo '<p style="color:red"> NEW </p>';

                            echo $row['username'] . '</li>';
                        }
                    }
                ?>
            </ul>
        </div>
        <div class="mt-5 ml-5 p-25">
            <div class="card">
                <div class="card-body">
                    This is some text within a card body.
                </div>
            </div>
        </div>
    </div>
</body>
</html>
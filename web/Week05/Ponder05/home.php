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
                        $statement = $db->prepare('SELECT m.message_id as message_id, u.username as username, m.message_read as read, m.subject_text as subject_text
                                                    FROM messages m LEFT JOIN users u
                                                        ON m.sender_id = u.user_id
                                                    WHERE m.recipient_id = :user_id;');
                        $statement->execute(array(':user_id' => $userID));
                        $resultSet = $statement->fetchALL(PDO::FETCH_ASSOC);

                        foreach($resultSet as $row)
                        {
                            echo '<li class="list-group-item">
                                        <a href="home.php?id=' . $row['message_id'] . '">
                                            <p style="display:inline;">' . $row['username'] . '</p>';

                            if (!$row['read'])
                                echo '<p style="color:red;display:inline;margin-left:15px">NEW</p><p style="display:inline;margin-left:85px">' . $row['subject_text'] . '</p></a></li>';
                            else
                                echo '<p style="display:inline;margin-left:135px">' . $row['subject_text'] . '</p></a></li>';
                        }
                    }
                ?>
            </ul>
        </div>
        <?php
            if (isset($db) && isset($_GET["id"]))
            {
                $id = $_GET["id"];
                echo 'message id found! ' . $id . ' ' . count($id);
                $statment = $db->prepare('SELECT message_text FROM messages WHERE message_id = :id;');
                echo ' statement prepared! ';
                $statement->execute(array(':id' => $id));
                echo ' statement exectuted! ';
                $result = $statement->fetch(PDO::FETCH_ASSOC);
                echo ' message text retrieved! ';
                if (isset($result))
                    echo ' message is: ' . $result['message_text'];

                echo '<div class="mt-5 ml-5 p-5">
                        <div class="card">
                            <div class="card-body">
                                <p>' . $result['message_text'] . '</p>
                            </div>
                        </div>
                    </div>';
            }
        ?>
    </div>
</body>
</html>
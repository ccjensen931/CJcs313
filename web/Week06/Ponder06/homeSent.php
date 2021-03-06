<!DOCTYPE html>
<html lang="en">
<head>
    <?php
        session_start();
        include 'dbConnect.php';
        include 'navbar.php';

        $loginURL = 'login.php';

        if (!isset($_SESSION["Username"]))
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
                        $statement = $db->prepare('SELECT m.message_id as message_id, u.username as username, m.subject_text as subject_text
                                                    FROM messages m LEFT JOIN users u
                                                        ON m.recipient_id = u.user_id
                                                    WHERE m.sender_id = :user_id;');
                        $statement->execute(array(':user_id' => $userID));
                        $resultSet = $statement->fetchALL(PDO::FETCH_ASSOC);

                        foreach ($resultSet as $row)
                        {
                            echo '<li class="list-group-item">
                                        <a href="homeSent.php?id=' . $row['message_id'] . '">
                                            <p style="display:inline;">' . $row['username'] . '</p>';

                            echo '<p style="display:inline;margin-left:135px">' . $row['subject_text'] . '</p></a></li>';
                        }
                    }
                ?>
            </ul>
        </div>
        <?php
            $id = -1;
            if (isset($_GET["id"]))
            {
                $id = $_GET["id"];
            }
            if (isset($db) && $id > 0)
            {
                $statement = $db->prepare('SELECT message_text FROM messages WHERE message_id = :id;');
                $statement->execute(array(':id' => $id));
                $result = $statement->fetch(PDO::FETCH_ASSOC);

                echo '<div class="mt-5 ml-5">
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
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
                            echo '<form action="home.php" method="post">
                                    <input type="hidden" name="Message" id="' . $row['message_id'] . '" value="' . $row['message_id'] . '" placeholder="">
                                    <li class="list-group-item">
                                        <button type="submit" class="bt">
                                            <p style="display:inline;">' . $row['username'] . '</p>';

                            if (!$row['read'])
                                echo '<p style="color:red;display:inline;margin-left:15px">NEW</p><p style="display:inline;margin-left:85px">' . $row['subject_text'] . '</p></li>';
                            else
                                echo '<p style="display:inline;margin-left:135px">' . $row['subject_text'] . '</p></li>';

                            echo '</form>';
                        }
                    }
                ?>
            </ul>
        </div>
        <div class="mt-5 ml-5 p-5">
            <div class="card">
                <div class="card-body">
                    <?php
                        if (isset($db) && isset($_POST["Message"]))
                        {
                            $statment = $db->prepare('SELECT message_text FROM messages WHERE message_id = :id');
                            $statement->execute(array(':id' => $_POST["Message"]));
                            $result = $statement->fetch(PDO::FETCH_ASSOC);

                            echo '<p>' . $result['message_text'] . '</p>';
                        }
                    ?>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
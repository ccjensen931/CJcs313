<!DOCTYPE html>
<html lang="en">
<head>
    <?php
        session_start();
        include 'dbConnect.php';
        include 'navbar.php'
        include 'sendMessage.php';

        if (isset($_POST["Receiver"]) && isset($_POST["Subject"]) && isset($_POST["Content"]))
        {
            insertMessage($userID, $db);
        }
    ?>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <div class="container justify-content-center align-items-center">
        <div class="col-8">
            <div class="form-group">
                <form action="composeMessage.php" method="post">
                    <label for="Receiver">To:</label>
                    <select class="form-control" name="Receiver" id="Receiver" required>
                        <?php
                            $getContactsStatement = $db->prepare('SELECT u.username as username
                                                                FROM users u RIGHT JOIN contacts c
                                                                ON c.owner_contact_id = u.user_id
                                                                WHERE owner_id = :id;');
                            $getContactsStatement->execute(array(':id' => $userID));
                            $resultSet = $getContactsStatement->fetchALL(PDO::FETCH_ASSOC);

                            foreach($resultSet as $row)
                            {
                                echo '<option>' . $row["username"] . '</option>';
                            }
                        ?>
                    </select>
                    <label for="Subject">Subject:</label>
                    <input type="text"
                        class="form-control" name="Subject" id="Subject" aria-describedby="helpId" placeholder="Subject" required>
                    <textarea class="form-control" name="Content" id="Content" rows="5" required></textarea>
                    <button type="submit" class="btn btn-primary">Send</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
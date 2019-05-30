<!DOCTYPE html>
<html lang="en">
<head>
    <?php
        session_start();
        include 'dbConnect.php';
        include 'navbar.php';

        $username;
        $userId;

        if (isset($_SESSION["Username"]))
        {
            $username = $_SESSION["Username"];
            $userID = $_SESSION["ID"];
        }
    ?>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Contacts</title>
</head>
<body>
    <div class="container align-center">
        <ul class="list-group mt-5 ml-5">
            <?php
                if (isset($db))
                {
                    $statement = $db->prepare('SELECT u.username as username, u.first_name as first_name, u.last_name as last_name
                                                FROM users u RIGHT JOIN contacts c
                                                    ON c.owner_contact_id = u.user_id
                                                WHERE owner_id = :id;');
                    $statement->execute(array(':id' => $userID));
                    $resultSet = $statement->fetchALL(PDO::FETCH_ASSOC);

                    foreach ($resultSet as $row)
                    {
                        echo '<li class="list-group-item">
                                <p style="display:inline">' . $row['username'] . '</p>
                                <p style="display:inline;margin-left:50px;">' . $row['first_name'] . ' ' . $row['last_name'] . '</p>
                                <button type="button" style="display:inline;margin-left:150px;">Remove</button>
                            </li>';
                    }
                }
            ?>
        </ul>
    </div>
</body>
</html>
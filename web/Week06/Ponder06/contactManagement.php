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
    <div class="mt-5 d-flex">
        <div class="container align-center">
            <div class="form-group">
                <form action="contactManagement.php" method="post">
                    <label for="Contact">Add Contact</label>
                    <input type="text"
                        class="form-control" name="Contact" id="Contact" aria-describedby="helpId" placeholder="Username">
                    <button type="submit" class="btn btn-primary">Add</button>
                    <?php
                        if (isset($_POST["Contact"]))
                        {
                            $selectStatement = $db->prepare('SELECT user_id FROM users WHERE username=:username');
                            $selectStatement->execute(array(':username' => $_POST["Contact"]));
                            $result = $selectStatement->fetch(PDO::FETCH_ASSOC);
                 
                            if (isset($result))
                            {
                                $insertStatement = $db->prepare("INSERT INTO contacts VALUES (nextval('contacts_s1'), :owner_id, :owner_contact_id);");
                                $insertStatement->execute(array(':owner_id' => $userID, ':owner_contact_id' => $result['user_id']));
                            }
                            else
                            {
                                echo '<p style="color:red">There is no user by that name</p>';
                            }
                         }
                    ?>
                </form>
            </div>
        </div>
        <div class="container align-center">
            <ul class="list-group ml-5">
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
                                    <p style="display:inline;margin-left:50px;">' . $row['username'] . '</p>
                                    <p style="display:inline;margin-left:150px;">' . $row['first_name'] . ' ' . $row['last_name'] . '</p>
                                    <button type="button" style="display:inline;margin-left:150px;">Remove</button>
                                </li>';
                        }
                    }
                ?>
            </ul>
        </div>
    </div>
</body>
</html>
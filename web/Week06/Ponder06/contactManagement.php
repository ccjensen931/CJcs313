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
        
        if (isset($_POST["Remove"]))
        {
            $deleteStatement = $db->prepare('DELETE FROM contacts WHERE owner_id=:userId AND owner_contact_id=:id');
            $deleteStatement->execute(array(':userId' => $userID, ':id' => $_POST["Remove"]));
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
        <div class="container align-center col-4">
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
                 
                            if (isset($result) && !empty($result))
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
        <div class="container align-center col-8">
            <ul class="list-group ml-5">
                <?php
                    if (isset($db))
                    {
                        $statement = $db->prepare('SELECT u.user_id as id, u.username as username, u.first_name as first_name, u.last_name as last_name
                                                    FROM users u RIGHT JOIN contacts c
                                                        ON c.owner_contact_id = u.user_id
                                                    WHERE owner_id = :id;');
                        $statement->execute(array(':id' => $userID));
                        $resultSet = $statement->fetchALL(PDO::FETCH_ASSOC);

                        foreach ($resultSet as $row)
                        {
                            echo '<li class="list-group-item">
                                    <div class="row">
                                        <div class="col-4 align-center"><p style="display:inline;">' . $row['username'] . '</p></div>
                                        <div class="col-4 align-center"><p style="display:inline;">' . $row['first_name'] . ' ' . $row['last_name'] . '</p></div>
                                        <form action="contactManagement.php" method="post">
                                            <input type="hidden" name="Remove" id="' . $row['id'] . '" value="'  . $row['id'] . '">
                                            <div class="col-4 align-center"><button type="submit" class="btn btn-danger" style="display:inline;">Remove</button></div>
                                        </form>
                                    </div>
                                </li>';
                        }
                    }
                ?>
            </ul>
        </div>
    </div>
</body>
</html>
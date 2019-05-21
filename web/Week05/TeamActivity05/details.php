<!DOCTYPE html>
<html lang="en">
<head>
    <?php
        include 'dbConnect.php';

        $id = -1;
        if(isset($_GET["id"]))
        {
            $id = $_GET["id"];
        }
        if (isset($db) && $id > 0)
        {
            $statement = $db->prepare('SELECT * FROM scriptures WHERE id=:id');
            $statement->execute(array(':id' => $id));
            $result = $statement->fetch(PDO::FETCH_ASSOC);
        }
    ?>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Details</title>
</head>
<body>
    <?php
        echo '<p><b>' . $result['book'] . ' ' . $result['chapter'] . ':' . $result['verse'] . '</b> - "' . $result['content'] . '"</p>';
    ?>
</body>
</html>
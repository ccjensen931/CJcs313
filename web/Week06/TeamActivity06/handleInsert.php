<!DOCTYPE html>
<html lang="en">
<head>
    <?php
        include '../../Week05/TeamActivity05/dbConnect.php';

        $viewURL = 'retrieveScriptures.php';

        if(isset($db))
        {
            $statement  = $db->prepare("INSERT INTO scriptures VALUES (nextval('scriptures_s1'), :book, :chapter, :verse, :content);");
            $statement->execute(array(':book' => $_POST["Book"], ':chapter' => $_POST["Chapter"], ':verse' => $_POST["Verse"], ':content' => $_POST["Content"]));
            $newID = $db->lastInsertId('scriptures_s1');

            if(isset($_POST['Topics']) && !empty($_POST['Topics']))
            {
                $statementInsertScriptureTopic = $db->prepare("INSERT INTO scripture_topics VALUES (nextval('scripture_topics_s1'), :scripture_id, (SELECT id FROM topics WHERE topic = :topic))");
                foreach ($_POST['Topics'] as $topic)
                {
                    $statementInsertScriptureTopic->execute(array(':scripture_id' => $newID, ':topic' => $topic));
                }
            }
        }

        header('Location: ' . $viewURL);
    ?>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Insert Scripture</title>
</head>
</html>
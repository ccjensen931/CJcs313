<!DOCTYPE html>
<html lang="en">
<head>
    <?php
        include 'dbConnect.php';

        $search = false;
        if(isset($_POST["Search"]))
        {
            $book = $_POST["Search"];
            $search = true;
        }

        if (isset($db) && $search)
        {
            echo 'Making query';
            $statement = $db->prepare('SELECT * FROM scriptures WHERE book=:book');
            $statement->execute(array(':book' => $book));
            $resultSet = $statement->fetchAll(PDO::FETCH_ASSOC);
            echo 'Results: ' . count($resultSet);
        }
        else if (isset($db))
        {
            $statement = $db->query('SELECT * FROM scriptures');
            $resultSet = $statement->fetchAll(PDO::FETCH_ASSOC);
        }
    ?>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Team Activity 05</title>
</head>
<body>
    <form action="retrieve.php" method="post" class="form-inline ml-3 my-2 my-lg-0">
        <input class="form-control mr-sm-2" type="text" name="Search" placeholder="Search">
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
    <h1> Scripture Resources </h1>
    <div class="container">
        <form action="details.php" method="get" class="form-inline ml-3 my-2 my-lg-0">
            <?php
            if (isset($resultSet))
            {
                if ($search)
                {
                    foreach ($resultSet as $row)
                    {
                        echo '<div class="row"><input type="hidden" name="id" id="' . $row['id'] . '" value="' . $row['id'] . '" placeholder="">
                        <button type="submit" class="btn btn-primary">' . $row['book'] . ' ' . $row['chapter'] . ':' . $row['verse'] . '</button></div>';
                    }
                }
                else
                {
                    foreach ($resultSet as $row)
                    {
                        echo '<p><b>' . $row['book'] . ' ' . $row['chapter'] . ':' . $row['verse'] . '</b> - "' . $row['content'] . '"</p>';
                    }
                }
            }
            ?>
        </form>     
    </div>
</body>
</html>
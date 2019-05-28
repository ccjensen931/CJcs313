<!DOCTYPE html>
<html lang="en">
<head>
    <?php
        include '../../Week05/TeamActivity05/dbConnect.php';

        if(isset($db))
        {
            $statement = $db->prepare('SELECT topic FROM topics;');
            $statement->execute();
            $resultSet = $statement->fetchAll(PDO::FETCH_ASSOC);
        }
    ?>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Insert Scripture</title>
</head>
<body>
    <form class="ml-5 mt-5 mr-5" action="handleInsert.php" method="post">
        <div class="form-group">
            <label for="Book">Book</label>
            <input type="text" class="form-control" name="Book" id="Book" aria-describedby="helpId" placeholder="Matthew" required>
            <label for="Chapter">Chapter</label>
            <input type="text" class="form-control" name="Chapter" id="Chapter" aria-describedby="helpId" placeholder="1" required>
            <label for="Verse">Verse</label>
            <input type="text" class="form-control" name="Verse" id="Verse" aria-describedby="helpId" placeholder="1" required>
            <label for="Content">Content</label>
            <textarea class="form-control" name="Content" id="Content" rows="10" required></textarea>
            <?php
                if(isset($resultSet))
                {
                    foreach ($resultSet as $row)
                    {
                        echo '<label class="form-check-label ml-5">
                                  <input type="checkbox" class="form-check-input" name="Topics[]" id="' . $row['topic']. '" value="' . $row['topic'] . '"> ' .
                                  $row['topic'] .
                              '</label><br>';
                    }
                }
            ?>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</body>
</html>
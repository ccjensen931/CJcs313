<!DOCTYPE html>
<html lang="en">
<head>
    <?php
        try
        {
          $dbUrl = getenv('DATABASE_URL');
        
          $dbOpts = parse_url($dbUrl);
        
          $dbHost = $dbOpts["host"];
          $dbPort = $dbOpts["port"];
          $dbUser = $dbOpts["user"];
          $dbPassword = $dbOpts["pass"];
          $dbName = ltrim($dbOpts["path"],'/');
        
          $db = new PDO("pgsql:host=$dbHost;port=$dbPort;dbname=$dbName", $dbUser, $dbPassword);
        
          $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        catch (PDOException $ex)
        {
          echo 'Error!: ' . $ex->getMessage();
          die();
        }
        
        if (isset($db))
        {
            $statement = $db->query('SELECT * FROM scriptures');
            $resultSet = $statement->fetchAll(PDO::FETCH_ASSOC)
        }
    ?>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Team Activity 05</title>
</head>
<body>
    <?php
        if (isset($resultSet))
        {
            foreach ($resultSet as $row)
            {
                echo $row['book'] . ' ' . $row['chapter'] . ':' . $row['verse'];
            }
        }
    ?>
</body>
</html>
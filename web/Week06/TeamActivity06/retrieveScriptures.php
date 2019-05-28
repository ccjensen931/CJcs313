<!DOCTYPE html>
<html lang="en">
<head>
    <?php
        include '../../Week05/TeamActivity05/dbConnect.php';

        if (isset($db))
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
    </form>
    <div class="container">
        
        <?php
        if (isset($resultSet))
        {
            foreach ($resultSet as $row)
            {
                echo '<div class="row"><a href="details.php?id=' . $row['id'] . '">' . $row['book'] . ' ' . $row['chapter'] . ':' . $row['verse'] . '</a>';
                
                $statement = $db->prepare('SELECT topic
                                        FROM topics t RIGHT JOIN scripture_topics st
                                            ON t.id = st.topic_id
                                        WHERE st.scripture_id = :id;');
                $statement->execute(array(':id' => $row['id']));
                $topics = $statement->fetchAll(PDO::FETCH_ASSOC);

                foreach ($topics as $topic)
                {
                    echo "\t" . $topic['topic'];
                }

                echo '</div>';
            }
        }
        ?>
    </div>
</body>
</html>
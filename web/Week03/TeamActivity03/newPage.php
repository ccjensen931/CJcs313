<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>New Page</title>
</head>
<body>
    Welcome <?php echo $_POST["name"];?><br>
    <?php $email = $_POST["email"];?><br>
    Your email address is: <a href="mailto:<?php echo $email;?>"><?php echo $email;?></a>
    Your major is: <?php $major = $_POST["major"];
                        if (strcmp($major, 'cs') == 0)
                            echo 'Computer Science';
                        else if (strcmp($major, 'wdd') == 0)
                            echo 'Web Design and Development';
                        else if (strcmp($major, 'cit') == 0)
                            echo 'Computer Information Technology';
                        else if (strcmp($major, 'ce') == 0)
                            echo 'Computer Engineering';?><br>
    <?php $continents = $_POST["continents"];
        if (empty($continents))
            echo 'You have not visited planet Earth';
        else
        {
            $count = count($continents);

            echo 'You have visited: \n';
            for ($i = 0; $i < $count; $i++)
                echo ("\t" . $continents[$i] . "\n");
        }?>
    Comments: <?php echo $_POST["comments"];?><br>
</body>
</html>
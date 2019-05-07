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
    <?php $email = $_POST["email"];?>
    Your email address is: <a href="mailto:<?php echo $email;?>"><?php echo $email;?></a>
    Your major is: <?php $major = $_POST["major"];
                        if (strcmp($major, 'cs') == 0)
                            echo 'Computer Science';
                        else if (strcmp($major, 'wdd') == 0)
                            echo 'Web Design and Development';
                        else if (strcmp($major, 'cit') == 0)
                            echo 'Computer Information Technology';
                        else if (strcmp($major, 'ce') == 0)
                            echo 'Computer Engineering';?>
    Comments: <?php echo $_POST["comments"];?>
</body>
</html>
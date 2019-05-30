<!DOCTYPE html>
<html lang="en">
<head>
    <?php
        include 'dbConnect.php';
    ?>
    <script>
        function getUser(str) {
            if (str == "") {
                return;
            } else {
                if (window.XMLHttpRequet) {
                    xmlhttp = new XMLHttpRequest();
                } else {
                    xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                }
                xmlhttp.open("Post", "register.php", true);
                xmlhttp.send("Username=str");
            }
        }

        function checkPasswords(password, confirm) {
            if (password == confirm) {
                document.getElementById("PasswordCheck").innerHTML = "";
                return;
            } else {
                document.getElementById("PasswordCheck").innerHTML = "Passwords do not match!";
            }
        }
    </script>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register</title>
</head>
<body>
    <div class="mt-5 d-flex justify-content-center align-items-center">
        <div class="form-group">
            <form action="handleRegister.php" method="post">
                <label for="Username">Username</label>
                <input type="text"
                    class="form-control" name="Username" id="Username" aria-describedby="helpId" placeholder="Username" onkeyup="getUser(this.value)">
                <?php
                    if (isset($_POST['Username']) && isset($db))
                    {
                        $statement = $db->prepare('SELECT user_id FROM users WHERE username=:username');
                        $statement->execute(array(':username' => $_POST['Username']));
                        $result = $statement->fetch(PDO::FETCH_ASSOC);
                    
                        if (isset($result))
                        {
                            echo '<h5 style="color:red">Username Not Available</h5>';
                        }
                        else
                        {
                            echo '<h5 style="color:green">Username Available</h5>';
                        }
                    }
                ?>
                <label for="Password">Password</label>
                <input type="password" class="form-control" name="Password" id="Password" placeholder="">
                <label for="Confirm_Password">Confirm Password</label>
                <input type="password" class="form-control" name="Confirm_Password" id="Confirm_Password" placeholder="" onkeyup="checkPasswords(document.getElementById('Password').value, this.value)">
                <p><span id="PasswordCheck"></span><p>
                <label for="Email">Email</label>
                <input type="text"
                    class="form-control" name="Email" id="Email" aria-describedby="helpId" placeholder="">
                <label for="First_Name">First Name</label>
                <input type="text"
                    class="form-control" name="First_Name" id="First_Name" aria-describedby="helpId" placeholder="">
                <label for="Last_Name">Last Name</label>
                <input type="text"
                    class="form-control" name="Last_Name" id="Last_Name" aria-describedby="helpId" placeholder="">
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</body>
</html>
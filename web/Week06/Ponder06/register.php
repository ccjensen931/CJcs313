<!DOCTYPE html>
<html lang="en">
<head>
    <?php
        include 'dbConnect.php';

        if (isset($_POST["Username"]) && isset($_POST["Password"]) && isset($_POST["Email"]) && isset($_POST["First_Name"]) && isset($_POST["Last_Name"]))
        {
            $statement = $db->prepare("INSERT INTO users VALUES (nextval('users_s1'), :username, :pass, :email, :first_name, :last_name);");
            $statement->execute(array(':username' => $_POST['Username'], ':pass' => $_POST['Password'], ':email' => $_POST['Email'], ':first_name' => $_POST['First_Name'], ':last_name' => $_POST['Last_Name']));
            header('Location: ' . $loginURL);
        }
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
                xmlhttp.send("UsernameCheck=str");
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
        <form action="register.php" method="post">
            <div class="form-group">
                <label for="Username">Username</label>
                <input type="text"
                    class="form-control" name="Username" id="Username" aria-describedby="helpId" placeholder="Username" onkeyup="getUser(this.value)" required>
                <?php
                    if (isset($_POST["UsernameCheck"]) && isset($db))
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
                <input type="password" class="form-control" name="Password" id="Password" placeholder="" required>
                <label for="Confirm_Password">Confirm Password</label>
                <input type="password" class="form-control" name="Confirm_Password" id="Confirm_Password" placeholder="" onkeyup="checkPasswords(document.getElementById('Password').value, this.value)" required>
                <p style="color:red"><span id="PasswordCheck"></span><p>
                <label for="Email">Email</label>
                <input type="text"
                    class="form-control" name="Email" id="Email" aria-describedby="helpId" placeholder="" required>
                <label for="First_Name">First Name</label>
                <input type="text"
                    class="form-control" name="First_Name" id="First_Name" aria-describedby="helpId" placeholder="" required>
                <label for="Last_Name">Last Name</label>
                <input type="text"
                    class="form-control" name="Last_Name" id="Last_Name" aria-describedby="helpId" placeholder="" required>
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
</body>
</html>
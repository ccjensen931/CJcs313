<!DOCTYPE html>
<html lang="en">
<head>
    <?php
        include 'dbConnect.php';

        $usernameError = "";
        $emailError = "";

        if (isset($_POST["Username"]) && checkUsername($_POST["Username"]) && isset($_POST["Password"]) && isset($_POST["Email"]) && checkEmail($_POST["Email"]) && isset($_POST["First_Name"]) && isset($_POST["Last_Name"]))
        {
            $statement = $db->prepare("INSERT INTO users VALUES (nextval('users_s1'), :username, :pass, :email, :first_name, :last_name);");
            $statement->execute(array(':username' => $_POST['Username'], ':pass' => $_POST['Password'], ':email' => $_POST['Email'], ':first_name' => $_POST['First_Name'], ':last_name' => $_POST['Last_Name']));
            header('Location: ' . $loginURL);
        }

        function checkUsername($username)
        {
            $usernameStatement = $db->prepare('SELECT user_id FROM users WHERE username=:username');
            $usernameStatement->execute(array(':username' => $username));
            $result = $usernameStatement->fetch(PDO::FETCH_ASSOC);
            
            echo '<p>Please work</p>';
            if (isset($result) && isset($result["user_id"]))
            {
                echo '<p>No result - Username</p>';
                $usernameError = "Username Not Available";
                return false;
            }
            return true;
        }

        function checkEmail($email)
        {
            $emailStatement = $db->prepare('SELECT user_id FROM users WHERE email=:email');
            $emailStatement->execute(array(':email' => $email));
            $result = $emailStatement->fetch(PDO::FETCH_ASSOC);
            
            if (isset($result) && isset($result["user_id"]))
            {
                echo '<p>No result - Email</p>';
                $emailError = "Email Already In Use";
                return false;
            }
            return true;
        }   
    ?>

    <script>
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
        <form>
            <div class="form-group">
                <label for="Username">Username</label>
                <input type="text"
                    class="form-control" name="Username" id="Username" aria-describedby="helpId" placeholder="Username" required>
                <p style="color:red"><?php echo $usernameError ?></p>
                <label for="Password">Password</label>
                <input type="password" class="form-control" name="Password" id="Password" placeholder="" required>
                <label for="Confirm_Password">Confirm Password</label>
                <input type="password" class="form-control" name="Confirm_Password" id="Confirm_Password" placeholder="" onkeyup="checkPasswords(document.getElementById('Password').value, this.value)" required>
                <p style="color:red"><span id="PasswordCheck"></span></p>
                <label for="Email">Email</label>
                <input type="text"
                    class="form-control" name="Email" id="Email" aria-describedby="helpId" placeholder="" required>
                <P style="color:red"><?php echo $emailError ?></p>
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
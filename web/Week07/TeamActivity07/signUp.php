<!DOCTYPE html>
<html lang="en">
<head>
    <?php
        include 'dbConnect.php';
        
        ini_set('display_errors', 'On');
        error_reporting(E_ALL | E_STRICT);

        if (isset($_POST["Username"]) && !checkUsername($_POST["Username"]) && isset($_POST["Password"]) && isset($_POST["ConfirmPassword"]))
        {
            if ($_POST["Password"] == $_POST["ConfirmPassword"])
            {
                $hashedPassword = password_hash($_POST["Password"], PASSWORD_DEFAULT);
                $insertUserStatement = $db->prepare("INSERT INTO team07_users VALUES (nextval('team07_users_s1'), :username, :password");
                $insertUserStatement->execute(array(':username' => $_POST["Username"], ':password' => $hashedPassword));
                header('Location: welcomePage.php');
                die();
            }
        }

        function checkUsername($username)
        {
            $checkUsernameStatement = $db->prepare('SELECT username FROM team07_users WHERE username=:username');
            $checkUsernameStatement->execute(array(':username' => $_POST["Username"]));
            $result = $checkUsernameStatement->fetch(PDO::FETCH_ASSOC);
            if (isset($result) && isset($result["username"]))
            {
                return false;
            }
            return true;
        }
    ?>
    <script>
        function validate()
        {
            if (passwordContains(document.getElementById('Password').value) && checkPasswords(document.getElementById('Password').value, document.getElementById('ConfirmPassword').value)) {
                return true;
            } else {
                return false;
            }
        }

        function checkPasswords(password, confirm) {
            if (password == confirm) {
                document.getElementById("PasswordCheck").innerHTML = "";
                document.getElementById("PasswordCheckAst").innerHTML = "";
                return true;
            } else {
                document.getElementById("PasswordCheck").innerHTML = "Passwords do not match!";
                document.getElementById("PasswordCheckAst").innerHTML = " *";
                return false;
            }
        }

        function passwordContains(password) {
            if (/\d/.test(password) && password.length > 6) {
                document.getElementById("PasswordContains").innerHTML = "";
                document.getElementById("PasswordContainsAst").innerHTML = "";
                return true;
            } else {
                document.getElementById("PasswordContains").innerHTML = "Password be at least 7 characters and contain a number";
                document.getElementById("PasswordContainsAst").innerHTML = " *";
                return false;
            }
        }
    </script>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="signUp.php" method="post" onsubmit="validate()">
        <div class="form-group">
            <p style="color:red"><span id="PasswordIncorrect"></span></p>
            <label for="Username">Username<span id="PasswordContainsAst"></span></label>
            <input type="text"
                class="form-control" name="Username" id="Username" aria-describedby="helpId" placeholder="" required>
            <label for="Password">Password</label>
            <input type="password"
                class="form-control" name="Password" id="Password" aria-describedby="helpId" placeholder="" onkeyup="passwordContains(this.value)" required>
            <p style="color:red"><span id="PasswordContains"></span></p>
            <label for="ConfirmPassword">ConfirmPassword<span id="PasswordCheckAst"></span></label>
            <input type="password"
                class="form-control" name="ConfirmPassword" id="ConfirmPassword" aria-describedby="helpId" placeholder="" onkeyup="checkPasswords(document.getElementById('Password').value, this.value)" required>
            <p style="color:red"><span id="PasswordCheck"></span></p>
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
</body>
</html>
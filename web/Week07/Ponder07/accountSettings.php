<!DOCTYPE html>
<html lang="en">
<head>
    <?php
        session_start();
        include 'dbConnect.php';
        include 'navbar.php';
        include 'updateSettings.php';
        
        $loginURL = 'login.php';
        $passwordError = "";
        $emailError = "";
        $currentEmail = "";
        $passwordCorrect = false;
        $emailValid = false;
        
        if (!isset($_SESSION["Username"]))
        {
            header('Location: ' . $loginURL);
            die();
        }
        else
        {
            $currentEmailStatement = $db->prepare("SELECT email FROM users WHERE user_id=:id");
            $currentEmailStatement->execute(array(':id' => $userID));
            $result = $currentEmailStatement->fetch(PDO::FETCH_ASSOC);
            $currentEmail = $result["email"];
        }

        if (isset($_POST["OldPassword"]) && !empty($_POST["OldPassword"]) && isset($_POST["NewPassword"]) && !empty($_POST["NewPassword"]) && isset($_POST["ConfirmNewPassword"]) && !empty($_POST["ConfirmNewPassword"]))
        {
            $passwordStatement = $db->prepare("SELECT user_password FROM users WHERE user_id=:id");
            $passwordStatement->execute(array(':id' => $userID));
            $result = $passwordStatement->fetch(PDO::FETCH_ASSOC);

            if (!password_verify($_POST["OldPassword"], $result["user_password"]))
            {
                $passwordError = "Password Incorrect";
                $passwordCorrect = false;
            }
            else
                $passwordCorrect = true;
        }
        else
            $passwordCorrect = true;
        if (isset($_POST["NewEmail"]) && !empty($_POST["NewEmail"]))
        {
            $emailStatement = $db->prepare("SELECT user_id FROM users WHERE email=:email");
            $emailStatement->execute(array(':email' => $_POST["NewEmail"]));
            $result = $emailStatement->fetch(PDO::FETCH_ASSOC);
            
            if (isset($result) && isset($result["user_id"]))
            {
                $emailError = "Email Already In Use";
                $emailValid = false;
            }
            else
                $emailValid = true;
        }
        else
            $emailValid = true;

        if ($passwordCorrect && $emailValid)
            updateSettings($userID, $db);
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
    <title>Account Settings</title>
</head>
<body>
    <div class="d-flex justify-content-center align-items-center">
        <h4>Account Settings</h4>
    </div>
    <div class="mt-5 ml-5 d-flex justify-content-center align-items-center">
        <form action="accountSettings.php" method="post">
            <div class="accordion" id="accordionSettings">
                <div class="card">
                    <div class="card-header" id="headingPassword">
                        <h2 class="mb-0">
                            <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#password" aria-expanded="false" aria-controls="password">
                                Password
                            </button>
                        </h2>
                    </div>
                <div id="password" class="collapse <?php if (!$passwordCorrect) echo 'show'; ?>" aria-labelledby="headingPassword">
                        <div class="card-body">
                            <label for="OldPassword">Old Password</label>
                            <p style="color:red"><?php echo $passwordError; ?></p>
                            <input type="password" class="form-control" name="OldPassword" id="OldPassword" placeholder="">
                            <label for="NewPassword">New Password</label>
                            <input type="password" class="form-control" name="NewPassword" id="NewPassword" placeholder="">
                            <label for="ConfirmNewPassword">Confirm New Password</label>
                            <input type="password" class="form-control" name="ConfirmNewPassword" id="ConfirmNewPassword" placeholder="" onkeyup="checkPasswords(document.getElementById('NewPassword').value, this.value)">
                            <p style="color:red"><span id="PasswordCheck"></span></p>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header" id="headingEmail">
                        <h2 class="mb-0">
                            <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#email" aria-expanded="false" aria-controls="email">
                                Email
                            </button>
                        </h2>
                    </div>
                    <div id="email" class="collapse <?php if (!$emailValid) echo 'show'; ?>" aria-labelledby="headingEmail">
                        <div class="card-body">
                            <label for="OldEmail">Current Email</label>
                            <p name="OldEmail" id="OldEmail" style="padding-left:5em"><?php echo $currentEmail ?></p>
                            <label for="NewEmail">New Email</label>
                            <input type="text"
                                class="form-control" name="NewEmail" id="NewEmail" aria-describedby="helpId" placeholder="">
                            <p style="color:red"><?php echo $emailError; ?></p>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header" id="headingName">
                        <h2 class="mb-0">
                            <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#name" aria-expanded="false" aria-controls="name">
                                Name
                            </button>
                        </h2>
                    </div>
                    <div id="name" class="collapse" aria-labelledby="headingName">
                        <div class="card-body">
                            <label for="First_Name">First Name</label>
                            <input type="text"
                                class="form-control" name="First_Name" id="First_Name" aria-describedby="helpId" placeholder="<?php echo $_SESSION["First_Name"] ?>">
                            <label for="Last_Name">Last Name</label>
                            <input type="text"
                                class="form-control" name="Last_Name" id="Last_Name" aria-describedby="helpId" placeholder="<?php echo $_SESSION["Last_Name"] ?>">
                        </div>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Save</button>
        </form>
    </div>
    <div class="d-flex justify-content-center align-items-center">
        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteAccountModal">
            Delete Account
        </button>
        <div class="modal fade" id="deleteAccountModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Permanently Delete Account</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <p>You are about to delete your account. You will lose all your messages and contacts. This cannot be undone, are you sure you wish to proceed?</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                            <form action="deleteAccount.php" method="post">
                                <input type="hidden" name="Delete" id="<?php echo $userID ?>" value="<?php echo $userID ?>">
                                <button type="submit" class="btn btn-primary">Confirm</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php
        session_start();
        include 'dbConnect.php';
        include 'navbar.php';
        
        $loginURL = 'login.php';
        
        if (!isset($_SESSION["Username"]))
        {
            header('Location: ' . $loginURL);
            die();
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
    <title>Account Settings</title>
</head>
<body>
    <div class="d-flex justify-content-center align-items-center">
        <h4>Account Settings</h4>
    </div>
    <div class="mt-5 ml-5 d-flex justify-content-center align-items-center">
        <form action="profileSettings.php" method="post">
            <div class="accordion" id="accordionSettings">
                <div class="card">
                    <div class="card-header" id="headingPassword">
                        <h2 class="mb-0">
                            <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#password" aria-expanded="true" aria-controls="password">
                                Password
                            </button>
                        </h2>
                    </div>
                <div id="password" class="collapse show" aria-labelledby="headingPassword" data-parent="#accordionSettings">
                        <div class="card-body">
                            <label for="OldPassword">Old Password</label>
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
                            <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#email" aria-expanded="true" aria-controls="email">
                                Email
                            </button>
                        </h2>
                    </div>
                    <div id="email" class="collapse show" aria-labelledby="headingEmail" data-parent="#accordionSettings">
                        <div class="card-body">
                            <label for="OldEmail">Old Email</label>
                            <input type="text"
                                class="form-control" name="OldEmail" id="OldEmail" aria-describedby="helpId" placeholder="">
                            <label for="NewEmail">New Email</label>
                            <input type="text"
                                class="form-control" name="NewEmail" id="NewEmail" aria-describedby="helpId" placeholder="">
                            <P style="color:red"><?php echo $emailError; ?></p>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header" id="headingName">
                        <h2 class="mb-0">
                            <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#name" aria-expanded="true" aria-controls="name">
                                Name
                            </button>
                        </h2>
                    </div>
                    <div id="name" class="collapse show" aria-labelledby="headingName" data-parent="#accordionSettings">
                        <div class="card-body">
                            <label for="First_Name">First Name</label>
                            <input type="text"
                                class="form-control" name="First_Name" id="First_Name" aria-describedby="helpId" placeholder="">
                            <label for="Last_Name">Last Name</label>
                            <input type="text"
                                class="form-control" name="Last_Name" id="Last_Name" aria-describedby="helpId" placeholder="">
                        </div>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Save</button>
        </form>
    </div>
</body>
</html>
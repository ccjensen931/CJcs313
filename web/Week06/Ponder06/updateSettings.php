<?php
    function updateSettings(array $postData, $userID, $db)
    {
        if (!isset($postData) && !isset($userID))
        {
            return;
        }

        $updateDB = false;
        $updatePassword = false;
        $updateEmail = false;
        $updateFirstName = false;
        $updateLastName = false;

        $statementPrepare = "";
        $updateValueArray = array();

        if (isset($_POST["OldPassword"]) && isset($_POST["NewPassword"]) && isset($_POST["ConfirmNewPassword"]) && !empty($_POST["NewPassword"]))
        {
            $passwordStatement = $db->prepare("SELECT user_password FROM users WHERE user_id=:id");
            $passwordStatement->execute(array(':id' => $userID));
            $result = $passwordStatement->fetch(PDO::FETCH_ASSOC);

            if ($_POST["OldPassword"] != $result["user_password"])
            {
                $passwordError = "Password Incorrect";
            }
            else
            {
                $updateDB = true;
                $updatePassword = true;
            }
        }
        if (isset($_POST["NewEmail"]) && !empty($_POST["NewEmail"]))
        {
            $emailStatement = $db->prepare("SELECT user_id FROM users WHERE email=:email");
            $emailStatement->execute(array(':email' => $_POST["NewEmail"]));
            $result = $emailStatement->fetch(PDO::FETCH_ASSOC);
            
            if (isset($result) && isset($result["user_id"]))
            {
                $emailError = "Email Already In Use";
            }
            else
            {
                $updateDB = true;
                $updateEmail = true;
            }
        }
        if (isset($_POST["First_Name"]) && !empty($_POST["First_Name"]))
        {
            $updateDB = true;
            $updateFirstName = true;
        }
        if (isset($_POST["Last_Name"]) && !empty($_POST["Last_Name"]))
        {
            $updateDB = true;
            $updateLastName = true;
        }

        if ($updateDB)
        {
            $statementPrepare = getUpdateStatement($postData, $updatePassword, $updateEmail, $updateFirstName, $updateLastName, $updateValueArray, $userID);
            $updateStatement = $db->prepare($statementPrepare);
            $updateStatement->execute($updateValueArray);
        }
    }

    function getUpdateStatement(array $postData, $updatePassword, $updateEmail, $updateFirstName, $updateLastName, &$updateValueArray, $userID)
    {
        $statement = "UPDATE users SET";
        
        if ($updatePassword)
        {
            if ($updateEmail || $updateFirstName || $updateLastName)
                $statement = $statement . " user_password=:password,";
            else 
                $statement = $statement . " user_password=:password";

            $updateValueArray[':password'] = $_POST["NewPassword"];            
        }
        if ($updateEmail)
        {
            if ($updateFirstName || $updateLastName)
                $statement = $statement . " email=:email,";
            else
                $statement = $statement . " email=:email";
                
            $updateValueArray[':email'] = $_POST["NewEmail"];
        }
        if ($updateFirstName)
        {
            if ($updateLastName)
                $statement = $statement . " first_name=:first_name,";
            else
                $statement = $statement . " first_name=:first_name";

            $updateValueArray[':first_name'] = $_POST["First_Name"];
        }
        if($updateLastName)
        {
            $statement = $statement . " last_name=:last_name";

            $updateValueArray[':last_name'] = $_POST["Last_Name"];
        }

        $statement = $statement . " WHERE user_id=:id;";
        $updateValueArray[':id'] = $userID;
        return $statement;
    }
?>
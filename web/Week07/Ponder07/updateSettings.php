<?php
    function updateSettings($userID, $db)
    {
        $updateDB = false;
        $updatePassword = false;
        $updateEmail = false;
        $updateFirstName = false;
        $updateLastName = false;
        
        if (isset($_POST["NewPassword"]) && !empty($_POST["NewPassword"]))
        {
            $_POST["NewPassword"] = password_hash($_POST["NewPassword"], PASSWORD_DEFAULT);
            $updateDB = true;
            $updatePassword = true;
        }
        if (isset($_POST["NewEmail"]) && !empty($_POST["NewEmail"]))
        {
            $updateDB = true;
            $updateEmail = true;
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
            $updateValueArray = array();
            $statementPrepare = getUpdateStatement($updatePassword, $updateEmail, $updateFirstName, $updateLastName, $updateValueArray, $userID);
            $updateStatement = $db->prepare($statementPrepare);
            $updateStatement->execute($updateValueArray);
        }
    }

    function getUpdateStatement($updatePassword, $updateEmail, $updateFirstName, $updateLastName, &$updateValueArray, $userID)
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
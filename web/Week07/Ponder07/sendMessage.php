<?php
    function insertMessage($userID, $db)
    {
        $getRecipientId = $db->prepare('SELECT user_id FROM users WHERE username=:username');
        $getRecipientId->execute(array(':username' => $_POST["Receiver"]));
        $recipientResult = $getRecipientId->fetch(PDO::FETCH_ASSOC);
        
        if (isset($recipientResult) && !empty($recipientResult))
        {
            $insertMessage = $db->prepare("INSERT INTO messages VALUES (nextval('message_s1'), :recipient_id, :sender_id, :subject_text, :message_text, :message_read);");
            $insertMessage->execute(array(':recipient_id' => $recipientResult["user_id"], ':sender_id' => $userID, ':subject_text' => $_POST["Subject"], ':message_text' => $_POST["Content"], ':message_read' => 'false'));
        }
    }
?>
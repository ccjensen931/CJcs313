<?php
    include 'dbConnect.php';

    function deleteMessage($messageId)
    {
        $deleteMessage = $db->prepare("DELETE FROM messages WHERE message_id=:id");
        $deleteMessage->execute(array(':id' => $messageId));
    }
?>
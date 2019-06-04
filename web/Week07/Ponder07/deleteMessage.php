<?php
    function deleteMessage($messageId, $db)
    {
        $deleteMessage = $db->prepare("DELETE FROM messages WHERE message_id=:id");
        $deleteMessage->execute(array(':id' => $messageId));
    }
?>
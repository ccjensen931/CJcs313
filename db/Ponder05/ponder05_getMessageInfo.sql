SELECT m.message_id, u.username, m.message_read
FROM messages m LEFT JOIN users u
    ON m.sender_id = u.user_id
WHERE m.recipient_id = 1;

--------------------

SELECT message_text
FROM messages
WHERE message_id = 1;
SELECT m.message_id, u.username
FROM messages m LEFT JOIN users u
    ON m.sender_id = u.user_id
WHERE m.recipient_id = 1;
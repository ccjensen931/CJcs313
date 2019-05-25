SELECT u.username, m.message_read
FROM messages m LEFT JOIN users u
    ON m.sender_id = u.user_id
WHERE m.recipient_id = 1;
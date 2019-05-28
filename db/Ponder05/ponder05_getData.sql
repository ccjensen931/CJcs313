SELECT m.message_id, u.username, m.message_read
FROM messages m LEFT JOIN users u
    ON m.sender_id = u.user_id
WHERE m.recipient_id = 1;

----------------------------------------

SELECT message_text
FROM messages
WHERE message_id = 1;

----------------------------------------

SELECT u.username as username, u.first_name as first_name, u.last_name as last_name
FROM users u RIGHT JOIN contacts c
    ON c.owner_contact_id = u.user_id
WHERE owner_id = :id;
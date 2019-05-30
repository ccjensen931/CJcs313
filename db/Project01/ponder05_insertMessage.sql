INSERT INTO contacts VALUES (nextval('contacts_s1'), 2, 1);

INSERT INTO messages VALUES (nextval('message_s1'), 1, 2, 'Unread Test', 'This is a test unread message to Admin', FALSE);
INSERT INTO messages VALUES (nextval('message_s1'), 1, 2, 'Read Test', 'This is a test read message to Admin', TRUE);
INSERT INTO messages VALUES (nextval('message_s1'), 2, 1, 'Test', 'This is a test message from Admin', TRUE);
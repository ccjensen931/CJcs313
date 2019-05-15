INSERT INTO users VALUES (nextval('users_s1'), 'Tester');
INSERT INTO users VALUES (nextval('users_s1'), 'Tester 2');

INSERT INTO speakers VALUES (nextval('speakers_s1'), 'Jeffery R. Holland');
INSERT INTO speakers VALUES (nextval('speakers_s1'), 'Dieter F. Uchtdorf');

INSERT INTO conferences VALUES (nextval('conference_s1'), 'APR', '2018');
INSERT INTO conferences VALUES (nextval('conference_s1'), 'OCT', '2018');

INSERT INTO conference_session VALUES (nextval('conference_session_s1'), 'SA', 'AM');
INSERT INTO conference_session VALUES (nextval('conference_session_s1'), 'SA', 'PM');
INSERT INTO conference_session VALUES (nextval('conference_session_s1'), 'SU', 'AM');
INSERT INTO conference_session VALUES (nextval('conference_session_s1'), 'SU', 'PM');

INSERT INTO talks VALUES (nextval('talks_s1'), 1, 1, 3);
INSERT INTO talks VALUES (nextval('talks_s1'), 2, 2, 1);
INSERT INTO talks VALUES (nextval('talks_s1'), 2, 1, 2);

INSERT INTO notes VALUES (nextval('notes_s1'), 1, 1, 'This is a note about talk 1');
INSERT INTO notes VALUES (nextval('notes_s1'), 2, 1, 'This is a note about talk 1 - Tester 2');
INSERT INTO notes VALUES (nextval('notes_s1'), 1, 2, 'This is a note about talk 2');
INSERT INTO notes VALUES (nextval('notes_s1'), 2, 2, 'This is a note about talk 2 - Tester 2');
INSERT INTO notes VALUES (nextval('notes_s1'), 1, 3, 'This is a note about talk 3');
INSERT INTO notes VALUES (nextval('notes_s1'), 2, 3, 'This is a note about talk 3 - Tester 2');
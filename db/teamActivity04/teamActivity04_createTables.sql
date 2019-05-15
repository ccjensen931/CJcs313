CREATE TABLE users
(
    user_id             INTEGER,
    user_name           VARCHAR(50)        CONSTRAINT nn_users_1 NOT NULL,
    CONSTRAINT pk_users PRIMARY KEY(user_id)
);

CREATE SEQUENCE users_s1 START WITH 1;

------------------------------------------

CREATE TABLE notes
(
    note_id             INTEGER,
    user_id             INTEGER             CONSTRAINT nn_notes_1 NOT NULL,
    talk_id             INTEGER             CONSTRAINT nn_notes_2 NOT NULL,
    note_text           VARCHAR(2000)       CONSTRAINT nn_notes_3 NOT NULL,
    CONSTRAINT pk_notes PRIMARY KEY(note_id),
    CONSTRAINT fk_notes_users FOREIGN KEY(user_id) REFERENCES users(user_id)
);

CREATE SEQUENCE notes_s1 START WITH 1;

------------------------------------------

CREATE TABLE speakers
(
    speaker_id          INTEGER,
    speaker_name        VARCHAR(50)        CONSTRAINT nn_speakers_3 NOT NULL,
    CONSTRAINT pk_speakers PRIMARY KEY(speaker_id)
);

CREATE SEQUENCE speakers_s1 START WITH 1;

------------------------------------------

CREATE TABLE conferences
(
    conference_id       INTEGER,
    month               CHAR(3)             CONSTRAINT nn_conferences_1 NOT NULL,
    year                INTEGER              CONSTRAINT nn_conferences_1 NOT NULL,
    CONSTRAINT pk_conferences PRIMARY KEY(conference_id)
);

CREATE SEQUENCE conferences_s1 START WITH 1;

------------------------------------------

CREATE TABLE conference_session
(
    session_id          INTEGER,
    day                 CHAR(2)             CONSTRAINT nn_conference_session_1 NOT NULL,
    session_time        CHAR(2)             CONSTRAINT nn_conference_session_1 NOT NULL,
    CONSTRAINT pk_conference_session PRIMARY KEY(session_id)
);

CREATE SEQUENCE conference_session_s1 START WITH 1;

------------------------------------------

CREATE TABLE talks
(
    talk_id             INTEGER,
    speaker_id          INTEGER              CONSTRAINT nn_talks_1 NOT NULL,
    conference_id       INTEGER              CONSTRAINT nn_talks_2 NOT NULL,
    session_id          INTEGER              CONSTRAINT nn_talks_3 NOT NULL,
    CONSTRAINT pk_talks PRIMARY KEY(talk_id),
    CONSTRAINT fk_talks_speakers FOREIGN KEY(speaker_id) REFERENCES speakers(speaker_id),
    CONSTRAINT fk_talks_conferences FOREIGN KEY(conference_id) REFERENCES conferences(conference_id),
    CONSTRAINT fk_talks_conference_session FOREIGN KEY(session_id) REFERENCES conference_session(session_id)
);

CREATE SEQUENCE talks_s1 START WITH 1;
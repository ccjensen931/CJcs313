CREATE TABLE topics
{
    id                  INTEGER,
    topic               VARCHAR(50)         CONSTRAINT nn_topics_1 NOT NULL,
    CONSTRAINT pk_topics PRIMARY KEY(id)
}

CREATE SEQUENCE topics_s1 START WITH 1;
CREATE UNIQUE INDEX topics_idx1 ON topics(topic);

INSERT INTO topics VALUES (nextval('topics_s1'), 'Faith');
INSERT INTO topics VALUES (nextval('topics_s1'), 'Sacrifice');
INSERT INTO topics VALUES (nextval('topics_s1'), 'Charity');

CREATE TABLE scripture_topics
{
    id                  INTEGER,
    scripture_id        INTEGER             CONSTRAINT nn_scripture-topics_1 NOT NULL,
    topic_id            INTEGER             CONSTRAINT nn_scripture-topics_2 NOT NULL,
    CONSTRAINT pk_scripture-topics PRIMARY KEY(id),
    CONSTRAINT fk_scripture-topics_sid FOREIGN KEY(scripture_id) REFERENCES scriptures(id),
    CONSTRAINT fk_scripture-topics_tid FOREIGN KEY(topic_id) REFERENCES topics(id)
}

CREATE SEQUENCE scripture-topics_s1 START WITH 1;
CREATE UNIQUE INDEX scripture-topics_idx1 ON scripture_topics(scripture_id, topic_id);
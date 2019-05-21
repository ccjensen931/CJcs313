CREATE TABLE scriptures
(
    id                  INTEGER,
    book                VARCHAR(50)         CONSTRAINT nn_scriptures_1 NOT NULL,
    chapter             INTEGER             CONSTRAINT nn_scriptures_2 NOT NULL,
    verse               INTEGER             CONSTRAINT nn_scriptures_3 NOT NULL,
    content             VARCHAR(500)        CONSTRAINT nn_scriptures_4 NOT NULL,
    CONSTRAINT pk_scriptures PRIMARY KEY(id)
);

CREATE SEQUENCE scriptures_s1 START WITH 1;
CREATE UNIQUE INDEX scriptures_idx1 ON scriptures(book, chapter, verse);

INSERT INTO scriptures VALUES (nextval('scriptures_s1'), 'John', 1, 5, 'And the light shineth in darkness; and the darkness comprehended it not.');
INSERT INTO scriptures VALUES (nextval('scriptures_s1'), 'Doctrine and Covenants', 88, 49, 'The light shineth in darkness, and the darkness comprehendeth it not; nevertheless, the day shall come when you shall comprehend even God, being quickened in him and by him.');
INSERT INTO scriptures VALUES (nextval('scriptures_s1'), 'Mosiah', 16, 9, 'He is the light and the life of the world; yea, a light that is endless, that can never be darkened; yea, and also a life which is endless, that there can be no more death.');
INSERT INTO scriptures VALUES (nextval('scriptures_s1'), 'Doctrine and Covenants', 93, 28, 'He that keepeth his commandments receiveth truth and light, until he is glorified in truth and knoweth all things.');
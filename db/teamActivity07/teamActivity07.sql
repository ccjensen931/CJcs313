CREATE TABLE team07_users
(
    user_id                     INTEGER,
    username                    VARCHAR(50)         CONSTRAINT nn_users_1 NOT NULL,
    user_password               VARCHAR(255)        CONSTRAINT nn_users_2 NOT NULL,
    CONSTRAINT pk_users PRIMARY KEY(user_id)
);

CREATE SEQUENCE team07_users_s1 START WITH 1;
CREATE UNIQUE INDEX users_idx1 ON users(username);
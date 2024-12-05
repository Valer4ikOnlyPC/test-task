CREATE TABLE desadv
(
    NUMBER                   INT          NOT NULL PRIMARY KEY,
    DATE                     DATETIME     NOT NULL,
    SENDER                   VARCHAR(256) NOT NULL,
    RECIPIENT                VARCHAR(256) NOT NULL,
    BODY                     TEXT         NOT NULL
);

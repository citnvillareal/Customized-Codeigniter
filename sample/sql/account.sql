CREATE TABLE accounts(
    account_id int(11) NOT NULL AUTO_INCREMENT,
    first_name varchar(20) NOT NULL,
    last_name varchar(20) NOT NULL,
    username varchar(20) NOT NULL,
    password varchar(20) NOT NULL,
    created int(10) UNSIGNED NOT NULL DEFAULT 0, 
    updated int(10) UNSIGNED NOT NULL DEFAULT 0,
    deleted int(10) UNSIGNED NOT NULL DEFAULT 0,
    PRIMARY KEY(account_id)
); 
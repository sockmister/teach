CREATE TABLE users(
email VARCHAR(255) PRIMARY KEY ,
password VARCHAR(255) NOT NULL ,
name VARCHAR(255) NOT NULL ,
birthday DATE,
gender VARCHAR(6),
contact_number VARCHAR(20),
photo VARCHAR(255)
);

CREATE TABLE skill(
name VARCHAR(255) PRIMARY KEY, 
description VARCHAR(255) NOT NULL, 
created_on UNSIGNED INTEGER NOT NULL
);

CREATE TABLE belong_to(
user VARCHAR(255),
skill VARCHAR(255), 
FOREIGN KEY(user) REFERENCES users(email) ON DELETE CASCADE
FOREIGN KEY(skill) REFERENCES skill(name) ON DELETE CASCADE
PRIMARY KEY (user, skill) 
);

CREATE TABLE friend (
email_first VARCHAR(255),
email_second  VARCHAR(255),
status VARCHAR NOT NULL, 
PRIMARY KEY (email_first, email_second) 
);

CREATE TABLE comment(
comment_for VARCHAR(255),
comment_by VARCHAR(255),
comment VARCHAR(255) NOT NULL, 
created_on unsigned integer,
FOREIGN KEY(comment_for) REFERENCES users(email) ON DELETE CASCADE
FOREIGN KEY(comment_by) REFERENCES users(email) ON DELETE CASCADE
PRIMARY KEY(comment_for, comment_by, created_on)
);



CREATE TABLE skill_comment(
skill varchar,
comment_by VARCHAR(255),
comment VARCHAR(255) NOT NULL,
created_on UNSIGNED INTEGER,
FOREIGN KEY(skill) REFERENCES skill(name) ON DELETE CASCADE
FOREIGN KEY(comment_by) REFERENCES users(email) ON DELETE CASCADE
PRIMARY KEY(skill, comment_by, created_on)
);


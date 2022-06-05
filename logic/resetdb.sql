
SET foreign_key_checks = 0;
DROP TABLE IF EXISTS POST ;
drop TABLE  IF EXISTS IMG;
drop TABLE IF EXISTS USERA;
drop table IF EXISTS BLOG;
SET foreign_key_checks = 1;
CREATE TABLE POST (
    post_id int NOT NULL AUTO_INCREMENT,
    title varchar(225) NOT NULL,
    content LONGTEXT NOT NULL,
    PRIMARY KEY (post_id) 
);

CREATE TABLE IMG (  
    img_id int NOT NULL AUTO_INCREMENT,
    fname varchar(225) NOT NULL,
    fpath varchar (225) NOT NULL,
    pkey int,
    PRIMARY KEY (img_id),
    FOREIGN KEY (pkey) REFERENCES POST(post_id) ON DELETE CASCADE
);
CREATE TABLE USERA (
    usr_id int NOT NULL AUTO_INCREMENT,
    username VARCHAR(225) NOT NULL,
    pass varchar(225) NOT NULL,
    email varchar(225) NOT NULL,
    PRIMARY KEY (usr_id)
);
CREATE TABLE BLOG (
    blog_id int NOT NULL AUTO_INCREMENT,
    title varchar(225) NOT NULL,
    postDate DATETIME NOT NULL,
    img int,
    PRIMARY KEY (blog_id)
);
/*insert into usera (username,pass,email)  Values('vali','123456','valentinrusoiu@gmail.com');*/


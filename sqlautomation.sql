use admindb;

/* DROP TABLE ktvrooms;
DROP TABLE martinas;*/

/* CREATE TABLE tbl_ktvrooms(
    id INT NOT NULL AUTO_INCREMENT,
    title VARCHAR(255) NOT NULL ,
    image VARCHAR(255) NOT NULL ,
    PRIMARY KEY (id)
);
CREATE TABLE tbl_martinas(
    id INT NOT NULL AUTO_INCREMENT,
    title VARCHAR(255) NOT NULL,
    image VARCHAR(255) NOT NULL,
    PRIMARY KEY (id)
);
 */

-- CREATE TABLE tbl_ktvdescription(
--     id INT NOT NULL AUTO_INCREMENT ,
--     terms VARCHAR(255) NOT NULL ,
--     reservation VARCHAR(255) NOT NULL,
--     PRIMARY KEY(id)
-- );
-- CREATE TABLE tbl_martinasdescription(
--     id INT NOT NULL AUTO_INCREMENT ,
--     terms VARCHAR(255) NOT NULL ,
--     reservation VARCHAR(255) NOT NULL,
--     PRIMARY KEY(id)
-- );
/* DROP TABLE tbl_ktvrooms;
DROP TABLE tbl_martinas;
 */


INSERT INTO tbl_martinas(title , image) VALUES("Martinas image 1" , "img/services/martinas/martinas1.JPG");
INSERT INTO tbl_martinas(title , image) VALUES("Martinas image 2" , "img/services/martinas/martinas2.JPG");



-- UPDATE tbl_ktvrooms SET title = "Room 1" WHERE id = 1;
-- UPDATE tbl_ktvrooms SET title = "Room 2" WHERE id = 2;
-- UPDATE tbl_ktvrooms SET title = "Room 3" WHERE id = 3;
USE admindb;


CREATE TABLE tbl_menu_starter
(
    id INT NOT NULL
    AUTO_INCREMENT,
    title VARCHAR
    (255) NOT NULL,
    image VARCHAR
    (500) NOT NULL,
    caption VARCHAR
    (500) NOT NULL,
    price FLOAT
    (50,2) NOT NULL,
    path VARCHAR
    (1000) NOT NULL,
    PRIMARY KEY
    (id)
);
CREATE TABLE tbl_menu_platter
(
    id INT NOT NULL
    AUTO_INCREMENT,
    title VARCHAR
    (255) NOT NULL,
    image VARCHAR
    (500) NOT NULL,
    caption VARCHAR
    (500) NOT NULL,
    price FLOAT
    (50,2) NOT NULL,
    path VARCHAR
    (1000) NOT NULL,
    PRIMARY KEY
    (id)
);
CREATE TABLE tbl_menu_soup
(
    id INT NOT NULL
    AUTO_INCREMENT,
    title VARCHAR
    (255) NOT NULL,
    image VARCHAR
    (500) NOT NULL,
    caption VARCHAR
    (500) NOT NULL,
    price FLOAT
    (50,2) NOT NULL,
    path VARCHAR
    (1000) NOT NULL,
    PRIMARY KEY
    (id)
);
CREATE TABLE tbl_menu_pasta
(
    id INT NOT NULL
    AUTO_INCREMENT,
    title VARCHAR
    (255) NOT NULL,
    image VARCHAR
    (500) NOT NULL,
    caption VARCHAR
    (500) NOT NULL,
    price FLOAT
    (50,2) NOT NULL,
    path VARCHAR
    (1000) NOT NULL,
    PRIMARY KEY
    (id)
);
CREATE TABLE tbl_menu_burgerandsandwiches
(
    id INT NOT NULL
    AUTO_INCREMENT,
    title VARCHAR
    (255) NOT NULL,
    image VARCHAR
    (500) NOT NULL,
    caption VARCHAR
    (500) NOT NULL,
    price FLOAT
    (50,2) NOT NULL,
    path VARCHAR
    (1000) NOT NULL,
    PRIMARY KEY
    (id)
);
CREATE TABLE tbl_menu_pizza
(
    id INT NOT NULL
    AUTO_INCREMENT,
    title VARCHAR
    (255) NOT NULL,
    image VARCHAR
    (500) NOT NULL,
    caption VARCHAR
    (500) NOT NULL,
    price FLOAT
    (50,2) NOT NULL,
    path VARCHAR
    (1000) NOT NULL,
    PRIMARY KEY
    (id)
);
CREATE TABLE tbl_menu_groupmeals
(
    id INT NOT NULL
    AUTO_INCREMENT,
    title VARCHAR
    (255) NOT NULL,
    image VARCHAR
    (500) NOT NULL,
    caption VARCHAR
    (500) NOT NULL,
    price FLOAT
    (50,2) NOT NULL,
    path VARCHAR
    (1000) NOT NULL,
    PRIMARY KEY
    (id)
);

CREATE TABLE tbl_menu_maincourse
(
    id INT NOT NULL
    AUTO_INCREMENT,
    title VARCHAR
    (255) NOT NULL,
    image VARCHAR
    (500) NOT NULL,
    caption VARCHAR
    (500) NOT NULL,
    price FLOAT
    (50,2) NOT NULL,
    path VARCHAR
    (1000) NOT NULL,
    PRIMARY KEY
    (id)
);
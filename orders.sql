CREATE TABLE reservations(
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    table_no INT NOT NULL,
    user_id INT NOT NULL,
    people INT NOT NULL,
    date VARCHAR(20) NOT NULL,
    username VARCHAR(20) NOT NULL,
    phone VARCHAR(20) NOT NULL
);
CREATE TABLE food_menu(
    id int NOT NULL AUTO_INCREMENT,
    name VARCHAR(20) NOT NULL,
    price INT NOT NULL,
    description VARCHAR(100) NOT NULL,
    image_location VARCHAR(100) NOT NULL,
    PRIMARY KEY (id)
);
CREATE TABLE orders(
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    food_id INT NOT NULL,
    user_id INT NOT NULL,
    total INT NOT NULL
);
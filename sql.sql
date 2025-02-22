-- Crate database food

-- Creating users table
CREATE TABLE Users (
    user_id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    address VARCHAR(255),
    phone VARCHAR(20),
    email VARCHAR(100) UNIQUE NOT NULL,
    password VARCHAR(100) NOT NULL
);

-- Creating foods table
CREATE TABLE Foods (
    food_id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    description VARCHAR(255) NOT NULL,
    image_name VARCHAR(255) NOT NULL,
    price DECIMAL(10, 2) NOT NULL,
    details TEXT NOT NULL
);

-- Inserting initial data for the food ordering system
INSERT INTO Foods (name, description, image_name, price, details) 
VALUES 
    ('Supreme Pizza', 'Loaded with many toppings', 'pizzamenu.jpg', 700.00, 'add details'),
    ('Basic Burger', 'A simple patty cheese burger', 'burgermenu.jpg', 400.00, 'add details'),
    ('Cheese Pasta', 'With heavy loaded cheese', 'pastamenu.jpg', 550.00, 'add details'),
    ('Basic Magaritta Pizza', 'Made with different type of cheese', 'pizzamenu2.jpg', 750.00, 'add details'),
    ('Double Cheese Burger', 'A double patty cheesy with toasted bun', 'burgermenu2.jpg', 500.00, 'add details'),
    ('Double Cheese Pasta', 'Made with two types of cheese', 'pasta2.jpg', 500.00, 'add details');



-- Creating Orders table
CREATE TABLE Orders (
    order_id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    food_id INT,
    quantity INT NOT NULL,
    cost DECIMAL(10, 2) NOT NULL,
    status VARCHAR(10) NOT NULL,
    Payment INT DEFAULT 0, 
    FOREIGN KEY (user_id) REFERENCES Users(user_id),
    FOREIGN KEY (food_id) REFERENCES Foods(food_id)
);
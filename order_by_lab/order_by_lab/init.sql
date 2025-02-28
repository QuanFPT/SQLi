-- init.sql
CREATE TABLE products (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255),
    description TEXT,
    price DECIMAL(10,2),
    quantity INT,
    image_url VARCHAR(500)
);

CREATE TABLE users(


)

INSERT INTO products (name, description, price, quantity, image_url) VALUES
('iPhone 13 Pro', 'Latest Apple smartphone with advanced camera system', 999.99, 50, 'https://cdn.pixabay.com/photo/2020/11/18/13/51/iphone-12-5755365_1280.jpg'),
('Samsung Galaxy S21', 'Powerful Android flagship with 5G capability', 799.99, 45, 'https://cdn.tgdd.vn/Products/Images/42/220833/samsung-galaxy-s21-tim-600x600.jpg'),
('MacBook Pro M1', '13-inch MacBook Pro with Apple M1 chip', 1299.99, 30, 'https://ttcenter.com.vn/uploads/photos/1703240540_745_f2a8fc7c43492908effd1ee451f1a3f9.png'),
('Dell XPS 15', 'Premium Windows laptop with 4K display', 1499.99, 25, 'https://thegioiso365.vn/wp-content/uploads/2023/04/Dell-xps-9530-3.png'),
('Sony WH-1000XM4', 'Wireless noise-cancelling headphones', 349.99, 60, 'https://cdn2.cellphones.com.vn/x/media/catalog/product/g/r/group_17333.png'),
('iPad Air', '10.9-inch iPad with A14 Bionic chip', 599.99, 40, 'https://onewaymobile.vn/images/products/2024/05/08/original/thiet-ke-chua-co-ten-23_1715155660.png');
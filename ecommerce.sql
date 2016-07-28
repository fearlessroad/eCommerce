-- get all products
SELECT * FROM products;
-- add products
INSERT INTO products (name, description, price, img, quantity, category_id, updated_at, created_at)
VALUES (?, ?, ?, ?, ?, ?, NOW(), NOW());
-- update products quantity
UPDATE products
SET quantity = 200, updated_at = NOW()
WHERE id = 1;
-- edit product
UPDATE products
SET name = 'Baby things', description = 'Things for babies', price = 1.11, img = 'located here', quantity = 100, category_id = 1, updated_at = NOW()
WHERE id = 1;

-- get all categories
SELECT * FROM categories;
-- add category
INSERT INTO categories (id, name, updated_at, created_at)
VALUES (?, ?, NOW(), NOW());

-- get all users
SELECT * FROM users;
-- add user
INSERT INTO users (first_name, last_name, email, password, updated_at, created_at)
VALUES ('Chris', 'B', 'c@gmail.com', 'c', NOW(), NOW());

-- get all addresses
SELECT * FROM addresses;
-- add address
INSERT INTO addresses (address1, address2, city, state, zip, updated_at, created_at, user_id)
VALUES (123, 'Apt 1', 'Burbank', 'CA', 91234, NOW(), NOW(), 1);

-- get all admins
SELECT * FROM admins;
-- add admin
INSERT INTO admins (email, password, updated_at, created_at)
VALUES ('poop@gmail.com', md5('1'), NOW(), NOW());

-- quantity sold
SELECT products.img, products.id, products.name, products.quantity, COUNT(orders.id) as quantitySold 
FROM products
LEFT JOIN order_details ON order_details.product_id = products.id
LEFT JOIN orders ON orders.id = order_details.order_id
WHERE products.id = 4;

-- get orders
SELECT * FROM orders;
SELECT * FROM order_details;

-- place an order
INSERT INTO orders (status, stripe_id, user_id, updated_at, created_at)
VALUE ('Shipped', 1, 1, NOW(), NOW());
INSERT INTO order_details (order_id, product_id, updated_at, created_at)
VALUE (1, 4, NOW(), NOW());

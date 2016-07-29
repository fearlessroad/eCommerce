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
INSERT INTO users (first_name, last_name, email, password, updated_at, created_at)
VALUES ('Tom', 'B', 'b@gmail.com', 'b', NOW(), NOW());
INSERT INTO addresses (address1, address2, city, state, zip, updated_at, created_at, user_id)
VALUES (123, 'Apt 1', 'Burbank', 'CA', 91234, NOW(), NOW(), 2);
INSERT INTO addresses (address1, address2, city, state, zip, updated_at, created_at, user_id)
VALUES (1, '', 'Pasadena', 'CA', 91111, NOW(), NOW(), 2);


INSERT INTO orders (status, stripe_id, user_id, updated_at, created_at)
VALUE ('Order in process', 00000, 2, NOW(), NOW());

INSERT INTO billing_addresses (address_id, order_id)
VALUE (3,1);

INSERT INTO shipping_addresses (address_id, order_id)
VALUE (4,1);

INSERT INTO order_details (order_id, product_id, updated_at, created_at)
VALUE (1, 1, NOW(), NOW());

-- main dashboard
SELECT order_details.order_id 'Order ID', users.first_name Name, order_details.created_at Date, 
CONCAT_WS(' ',addresses.address1,addresses.address2, addresses.city, addresses.state, addresses.zip) 'Billing Address', 
orders.status Status,  products.price -- SUM(products.price) Total -- addresses.address_type Type
FROM users
JOIN addresses ON addresses.user_id = users.id
JOIN billing_addresses ON addresses.id = billing_addresses.address_id
JOIN orders ON orders.user_id =  users.id
JOIN order_details ON order_details.order_id = orders.id
JOIN products ON products.id = order_details.product_id
WHERE users.id = 2;

-- individual order
SELECT orders.id, 
-- customer shipping info
CONCAT_WS(users.first_name, users.last_name) shippingName, addresses.address1 shippingAddress1, -- change to shipping.blahblah now
addresses.address2 shippingAddress2, addresses.city shippingCity, addresses.state shippingState, addresses.zip shippingZip, 
-- customer billing info
CONCAT_WS(users.first_name, users.last_name) billingName, addresses.address1 billingAddress1, 
addresses.address2 billingAddress2, addresses.city billingCity, addresses.state billingState, addresses.zip billingZip, 
-- product details
products.id, products.name, products.price, orders.status -- quantity of each products / total of each product*quantity
FROM orders
JOIN users ON users.id = orders.user_id
JOIN addresses shipping ON addresses.user_id = users.id


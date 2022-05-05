create table product (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255),
    price float
) engine=innodb;

create table invoice (
    id INT AUTO_INCREMENT PRIMARY KEY
) engine=innodb;

create table invoice_line (
    id INT AUTO_INCREMENT PRIMARY KEY,
    product_id INT,
    invoice_id INT,
    product_name VARCHAR(255),
    product_price DOUBLE,
    quantity INT,
    CONSTRAINT FK_invoice_line_invoice FOREIGN KEY (invoice_id) REFERENCES invoice(id),
    CONSTRAINT FK_invoice_line_product FOREIGN KEY (product_id) REFERENCES product(id)
) engine=innodb;

INSERT INTO product (name, price) VALUES
('Mouse', 10.00),
('Keyboard', 11.00),
('Microsoft Mouse', 15.00),
('Apple Mouse', 1000.00);

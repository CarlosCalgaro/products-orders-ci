/*
*
*   Você deve dropar a tabela antes de re-criar
*   
*   DROP TABLE order_products IF EXISTS;
*/

CREATE TABLE order_products (
        -- id int(11) NOT NULL AUTO_INCREMENT,
        order_id int NOT NULL,
        product_id int NOT NULL,
        quantity int NOT NULL,
        PRIMARY KEY (order_id, product_id),
        FOREIGN KEY (order_id) REFERENCES orders(id),
        FOREIGN KEY (product_id) REFERENCES products(id)
);

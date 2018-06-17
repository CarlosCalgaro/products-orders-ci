/*
*
*   Você deve dropar a tabela antes de re-criar
*   
*   DROP TABLE orders IF EXISTS;
*/

CREATE TABLE orders (
        id int(11) NOT NULL AUTO_INCREMENT,
        code varchar(20) NOT NULL,
        description varchar(200),
        order_date DATE,
        PRIMARY KEY (id),
        KEY name (name)
);



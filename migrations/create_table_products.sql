/*
*
*   Você deve dropar a tabela antes de re-criar
*   
*   DROP TABLE products IF EXISTS;
*/

CREATE TABLE products (
        id int(11) NOT NULL AUTO_INCREMENT,
        name varchar(200) NOT NULL,
        description TEXT NOT NULL,
        price DECIMAL(13,2) NOT NULL,
        PRIMARY KEY (id),
        KEY name (name)
);



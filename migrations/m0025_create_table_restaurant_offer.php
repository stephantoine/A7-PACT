<?php

use app\core\Application;

class m0025_create_table_restaurant_offer
{
    public function up()
    {
        $db = Application::$app->db;
        $sql = "CREATE TABLE restaurant_offer (
            offer_id INT NOT NULL PRIMARY KEY,
            
            url_image_carte VARCHAR(255) NOT NULL,
            minimum_price NUMERIC NOT NULL,
            maximum_price NUMERIC NOT NULL,
            
            FOREIGN KEY (offer_id) REFERENCES offer(id)
        );";
        $db->pdo->exec($sql);
    }

    public function down()
    {
        $sql = "DROP TABLE restaurant_offer;";
        Application::$app->db->pdo->exec($sql);
    }
}
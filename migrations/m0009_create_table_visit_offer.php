<?php

use app\core\Application;

// TODO : add language to offer

class m0009_create_table_visit_offer
{
    public function up()
    {
        $db = Application::$app->db;
        $sql = "CREATE TABLE visit_offer (
            offer_id INT NOT NULL PRIMARY KEY,

            duration NUMERIC NOT NULL,
            guide BOOLEAN NOT NULL,
            schedule_id INT NOT NULL,
            
            FOREIGN KEY (offer_id) REFERENCES offer(id),
            FOREIGN KEY (schedule_id) REFERENCES offer_schedule(id)
        );";
        $db->pdo->exec($sql);
    }

    public function down()
    {
        $sql = "DROP TABLE visit_offer;";
        Application::$app->db->pdo->exec($sql);
    }
}
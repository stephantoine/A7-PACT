<?php

use app\core\Application;

class m0001_create_table_notification
{
    public function up() {
        $db = Application::$app->db;
        $sql = "CREATE TABLE notification (
            id_notif SERIAL PRIMARY KEY,
            reception_day DATE NOT NULL,
            read BOOLEAN NOT NULL,
            content VARCHAR(255) NOT NULL,
        );";
        $db->pdo->exec($sql);
    }

    public function down()
    {
        $db = Application::$app->db;
        $sql = "DROP TABLE notification;";
        $db->pdo->exec($sql);
    }
}
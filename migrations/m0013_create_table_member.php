<?php

use app\core\Application;

class m0013_create_table_member
{
    public function up() {
        $db = Application::$app->db;
        $sql = "CREATE TABLE member (
            id INT PRIMARY KEY,
            lastname VARCHAR(50) NOT NULL,
            firstname VARCHAR(50) NOT NULL,
            phone VARCHAR(50) UNIQUE NOT NULL,
            pseudo VARCHAR(50) PRIMARY KEY NOT NULL,
            allows_notifications bool DEFAULT '0' NOT NULL,
            mail VARCHAR(100) UNIQUE NOT NULL,
            password VARCHAR(100) NOT NULL,
            avatarUrl VARCHAR(255) NOT NULL,
            CONSTRAINT member_fk1 FOREIGN KEY (id) REFERENCES account(id),
            CONSTRAINT member_fk2 FOREIGN KEY (mail) REFERENCES user(mail),
            CONSTRAINT member_fk3 FOREIGN KEY (password) REFERENCES user(password),
            CONSTRAINT member_fk4 FOREIGN KEY (avatarUrl) REFERENCES user(avatarUrl)
        );";
        $db->pdo->exec($sql);
    }

    public function down()
    {
        $db = Application::$app->db;
        $sql = "DROP TABLE member;";
        $db->pdo->exec($sql);
    }
}
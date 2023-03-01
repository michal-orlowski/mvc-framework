<?php

/**
 * Summary of add_password_column
 * @author Michal Orlowski
 * @copyright (c) 2023
 */
class m0002_add_password_column
{
    public function up()
    {
        $db = \morlowsk\corephp\Application::$app->db;
        $db->pdo->exec("ALTER TABLE users ADD COLUMN password VARCHAR(255) NOT NULL;");

    }

    public function down()
    {
        $db = \morlowsk\corephp\Application::$app->db;
        $db->pdo->exec("ALTER TABLE users DROP COLUMN password;");
    }
}
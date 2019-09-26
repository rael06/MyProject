<?php
namespace App\Core;

use PDO;

abstract class Model
{
    private static $db;

    protected function executeQuery($query, $params = null)
    {
        if ($params == null) {
            $result = self::getDb()->query($query);
        }
        else {
            $result = self::getDb()->prepare($query);
            $result->execute($params);
        }
        return $result;
    }

    private static function getDb()
    {
        if (self::$db === null) {
            $dsn = Configuration::get("dsn");
            $login = Configuration::get("login");
            $mdp = Configuration::get("mdp");

            self::$db = new PDO($dsn, $login, $mdp,
                    array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        }
        return self::$db;
    }

}

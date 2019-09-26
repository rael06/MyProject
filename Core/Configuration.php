<?php
namespace App\Core;

use Exception;

class Configuration
{
    private static $parameters;

    public static function get($name, $defaultValue = null)
    {
        $parameters = self::getParameters();
        if (isset($parameters[$name])) {
            $value = $parameters[$name];
        }
        else {
            $value = $defaultValue;
        }
        return $value;
    }

    private static function getParameters()
    {
        if (self::$parameters == null) {
            $filePath = "Config/dev.ini";
            if (!file_exists($filePath)) {
                $filePath = "Config/prod.ini";
            }
            if (!file_exists($filePath)) {
                throw new Exception("Aucun fichier de configuration trouvé");
            }
            else {
                self::$parameters = parse_ini_file($filePath);
            }
        }
        return self::$parameters;
    }

}




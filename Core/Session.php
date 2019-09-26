<?php
namespace App\Core;

use Exception;

class Session
{
	private static $instance = null;
    private function __construct()
    {
        session_start();
    }

    public static function getInstance() {
	    return self::$instance === null ? new Session() : self::$instance;
    }

    public function destroy()
    {
    	self::$instance = null;
	    $_SESSION = array();
	    if (ini_get("session.use_cookies")) {
		    $params = session_get_cookie_params();
		    setcookie(session_name(), '', time() - 42000,
			    $params["path"], $params["domain"],
			    $params["secure"], $params["httponly"]
		    );
	    }
	    session_destroy();
    }

    public function setAttribute($name, $value)
    {
        $_SESSION[$name] = $value;
    }

    public function existsAttribute($name)
    {
        return (isset($_SESSION[$name]) && $_SESSION[$name] != "");
    }

    public function getAttribute($nom)
    {
        if ($this->existsAttribute($nom)) {
            return $_SESSION[$nom];
        }
        else {
            throw new Exception("Attribut '$nom' absent de la session");
        }
    }

}

<?php
namespace App\Core;

use Exception;

class AppRequest
{
    private $parameters;

    private $session;

    public function __construct($parameters)
    {
        $this->parameters = $parameters;
        $this->session = Session::getInstance();
    }

    public function getSession()
    {
        return $this->session;
    }

    public function existsParameter($name)
    {
        return (isset($this->parameters[$name]) && $this->parameters[$name] != "");
    }

    public function getParameter($name)
    {
        if ($this->existsParameter($name)) {
            return $this->parameters[$name];
        }
        else {
            throw new Exception("Paramètre '$name' absent de la requête");
        }
    }

}


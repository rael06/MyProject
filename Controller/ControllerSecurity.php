<?php


use App\Core\Controller;

abstract class ControllerSecurity extends Controller
{

    public function executeAction($action)
    {
        if ($this->request->getSession()->existsAttribute("idUser")) {
            parent::executeAction($action);
        }
        else {
            $this->redirect("connection");
        }
    }

}


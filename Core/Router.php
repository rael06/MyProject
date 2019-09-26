<?php
namespace App\Core;



use Exception;

class Router
{
    public function routerRequest()
    {
        try {
            $request = new AppRequest(array_merge($_GET, $_POST));

            $controller = $this->createController($request);
            $action = $this->createAction($request);

            $controller->executeAction($action);
        }
        catch (Exception $e) {
            $this->errorManager($e);
        }
    }

    private function createController(AppRequest $request)
    {
        $controller = "Home";
        if ($request->existsParameter('controller')) {
            $controller = $request->getParameter('controller');
            $controller = ucfirst(strtolower($controller));
        }

        $controllerName = "Controller" . $controller;
	    $controllerClass = "App\Controller\\$controllerName";
        $controllerFile = "Controller/" . $controllerName . ".php";
        if (file_exists($controllerFile)) {
            require($controllerFile);
            $controller = new $controllerClass();
            $controller->setRequest($request);
            return $controller;
        }
        else {
            throw new Exception("Fichier '$controllerFile' introuvable");
        }
    }

    private function createAction(AppRequest $request)
    {
        $action = "index";
        if ($request->existsParameter('action')) {
            $action = $request->getParameter('action');
        }
        return $action;
    }

    private function errorManager(Exception $exception)
    {
        $view = new View('error');
        $view->generate(array('errorMsg' => $exception->getMessage()));
    }

}

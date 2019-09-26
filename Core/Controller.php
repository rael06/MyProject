<?php

namespace App\Core;

use Exception;

abstract class Controller
{
	protected $request;
	private $action;
	protected $headerTitle;

	public function setRequest(AppRequest $request)
	{
		$this->request = $request;
	}

	public function executeAction($action)
	{
		if (method_exists($this, $action)) {
			$this->action = $action;
			$this->{$this->action}();
		} else {
			$controllerClass = get_class($this);
			throw new Exception("Action '$action' non définie dans la classe $controllerClass");
		}
	}

	protected abstract function setControllerData();

	public abstract function index();

	protected function generateView($viewData = array(), $action = null)
	{
		$viewHeaderTitle = $this->headerTitle;
		$viewAction = $this->action;
		if ($action != null) {
			$viewAction = $action;
		}

		$controllerClass = get_called_class();
		$controllerView = str_replace("App\\Controller\\Controller", "", $controllerClass);

		$view = new View($viewAction, $controllerView, $viewHeaderTitle);
		$view->generate($viewData);
	}

	protected function redirect($controller, $action = null)
	{
		$root = Configuration::get("root", "/");
		header("Location:" . $root . $controller . "/" . $action);
	}

}

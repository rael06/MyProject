<?php

namespace App\Core;

use Exception;

class View
{
	private $file;
	private $style;
	private $title;
	private $headerTitle;

	public function __construct($action, $controller = "", $headerTitle = "")
	{
		$this->headerTitle = $headerTitle;
		$file = "View/";
		$style = "Content/CSS/";
		if ($controller != "") {
			$file .= $controller . "/";
			$style .= $controller . "/";
		}
		$this->file = $file . $action . ".php";
		$this->style = $style . $action . ".css";
	}

	public function generate($data)
	{
		$content = $this->generateFile($this->file, $data);
		$root = Configuration::get("root", "/");
		$view = $this->generateFile('View/template.php',
			[
				'style' => $this->style,
				'title' => $this->title,
				'content' => $content,
				'root' => $root,
				'headerTitle' => $this->headerTitle
			]);
		echo $view;
	}

	private function generateFile($file, $data)
	{
		if (file_exists($file)) {
			extract($data);
			ob_start();
			require $file;
			return ob_get_clean();
		} else {
			throw new Exception("Fichier '$file' introuvable");
		}
	}

	private function sanitize($value)
	{
		return strip_tags($value);
	}

}

<?php


namespace App\Controller;


use App\Core\Controller;
use App\Model\Repositories\CantonRepository;

class ControllerHome extends Controller
{

	private $cantonRepository;

	public function __construct()
	{
	}

	public function index()
	{
		$this->setControllerData();

		if ($this->request->existsParameter('confirm') && $this->request->getParameter('confirm')) {
			$this->request->getSession()->setAttribute('selectedCantonId', $this->request->getParameter('selectedCantonId'));
			$this->redirect("result");
		} else {
			$cantons = $this->cantonRepository->getAll();

			if ($this->request->existsParameter('exportCSV') &&
				$this->request->getParameter('exportCSV')
			) {
				$this->exportResults();
			}

			$this->generateView([
				'cantons' => $cantons,
				'session' => $this->request->getSession()
			], "home");
		}
	}

	protected function setControllerData()
	{
		$this->cantonRepository = new CantonRepository();
		$this->headerTitle = "Page accueil élections cantonales Nice";
	}

	private function exportResults()
	{
		$cantonsInfos = $this->cantonRepository->getInfos();

		$id_file = fopen("ExportCSV/resultats.csv", "w");

		fwrite($id_file, "\xEF\xBB\xBF");
		$i = 0;
		foreach ($cantonsInfos as $line => $values) {
			if ($i === 0) fwrite($id_file, "Code,Nom,Inscrits,Votants,Parti 1,Parti 2,Parti 3,Parti 4,Parti 5 \n");
			fwrite($id_file, $values->cantonInfo);
			fwrite($id_file, "\n");
			$i++;
		}
	}
}

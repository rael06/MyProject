<?php


namespace App\Controller;


use App\Core\Controller;
use App\Model\Repositories\CantonRepository;
use App\Model\Repositories\ResultatRepository;

class ControllerResult extends Controller
{
	private $resultatRepository;
	private $cantonRepository;
	private $cantonId;
	private $canton;
	private $result;

	public function __construct() { }

	protected function setControllerData()
	{
		$this->resultatRepository = new ResultatRepository();
		$this->cantonRepository = new CantonRepository();
		$this->cantonId = $this->request->getSession()->getAttribute('selectedCantonId');
		$this->canton = $this->cantonRepository->getById($this->cantonId);
		$this->result = $this->resultatRepository->getbyCantonId($this->cantonId);
		$this->headerTitle = "Visualisation des résultats du canton 
		{$this->canton->getCode()} ({$this->canton->getNom()})";
	}

	public function index()
	{
		$this->setControllerData();

		if ($this->request->existsParameter('back') && $this->request->getParameter('back'))
			$this->redirect("home");

		$votes = $this->resultatRepository->getVotes($this->cantonId);
		$nbVote = $this->resultatRepository->getNbVotes($this->cantonId);

		$this->generateView([
			'votes' => $votes,
			'nbVote' => $nbVote,
			'result' => $this->result,
			'canton' => $this->canton,
			'cantonId' => $this->cantonId
		], "result");
	}
}

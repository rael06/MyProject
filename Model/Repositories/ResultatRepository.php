<?php


namespace App\Model\Repositories;


use App\Core\Model;
use App\Model\Entities\Resultat;
use PDO;

class ResultatRepository extends Model
{
	public function getbyCantonId($cantonId)
	{
		$query = "SELECT resultats.id, id_parti, id_canton, votes FROM resultats
					WHERE id_canton = ? ";
		$result = $this->executeQuery($query, [intval($cantonId)]);
		$result->setFetchMode(PDO::FETCH_CLASS, Resultat::class);
		return $result->fetch();
	}

	public function getNbVotes($cantonId) {
		$query = "SELECT votes FROM resultats
					WHERE id_canton = ? ";
		$result = $this->executeQuery($query, [intval($cantonId)]);
		$votes = $result->fetchAll(PDO::FETCH_OBJ);
		$nbVote = 0;
		foreach ($votes as $vote => $value) {
			$nbVote += intval($value->votes);
		}
		return $nbVote;
	}

	public function getVotes($cantonId) {
		$query = "SELECT id_parti, votes, nom FROM resultats
					INNER JOIN partis
					ON id_parti = partis.id
					WHERE id_canton = ? 
					ORDER BY votes DESC ";
		$result = $this->executeQuery($query, [intval($cantonId)]);
		return $result->fetchAll(PDO::FETCH_OBJ);
	}
}

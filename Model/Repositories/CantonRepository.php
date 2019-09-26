<?php


namespace App\Model\Repositories;


use App\Core\Model;
use App\Model\Entities\Canton;
use PDO;

class CantonRepository extends Model
{
	public function getAll()
	{
		$result = $this->executeQuery("SELECT id, nom, code, inscrits, locked FROM cantons");
		return $result->fetchAll(PDO::FETCH_CLASS, Canton::class);
	}

	public function getbyId($cantonId)
	{
		$query = "SELECT id, nom, code, inscrits, locked FROM cantons
					WHERE id = ?";
		$result = $this->executeQuery($query, [intval($cantonId)]);
		$result->setFetchMode(PDO::FETCH_CLASS, Canton::class);
		return $result->fetch();
	}

	public function getInfos() {
		$query = "SELECT 
       				CONCAT_WS(',', CODE, nom, inscrits, SUM(votes), GROUP_CONCAT(resultats.votes)) 
    				AS cantonInfo FROM cantons
					INNER JOIN resultats
					ON id_canton = cantons.id
					GROUP BY cantons.id";
		$result = $this->executeQuery($query);
		return $result->fetchAll(PDO::FETCH_OBJ);
	}
}

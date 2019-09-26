<?php


namespace App\Model\Entities;


class Resultat
{
	private $id;
	private $id_parti;
	private $id_canton;
	private $votes;

	/**
	 * @return mixed
	 */
	public function getId()
	{
		return $this->id;
	}

	/**
	 * @return mixed
	 */
	public function getIdParti()
	{
		return $this->id_parti;
	}

	/**
	 * @return mixed
	 */
	public function getIdCanton()
	{
		return $this->id_canton;
	}

	/**
	 * @return mixed
	 */
	public function getVotes()
	{
		return $this->votes;
	}
}

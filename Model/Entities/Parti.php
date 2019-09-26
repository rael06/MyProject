<?php


namespace App\Model\Entities;


class Parti
{
	private $id;
	private $nom;

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
	public function getNom()
	{
		return $this->nom;
	}

}

<?php


namespace App\Model\Entities;


class Canton
{
	private $id;
	private $nom;
	private $code;
	private $inscrits;
	private $locked;

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

	/**
	 * @return mixed
	 */
	public function getCode()
	{
		return $this->code;
	}

	/**
	 * @return mixed
	 */
	public function getInscrits()
	{
		return $this->inscrits;
	}

	/**
	 * @return mixed
	 */
	public function getLocked()
	{
		return $this->locked;
	}
}

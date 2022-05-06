<?php
class User
{
	private $iduser = null;
	private $nom = null;
	private $prenom = null;
	private $email = null;
	private $password = null;
	function __construct($iduser, $nom, $prenom,  $email, $password)
	{
		$this->iduser = $iduser;
		$this->nom = $nom;
		$this->prenom = $prenom;
		$this->email = $email;
		$this->password = $password;
	}
	function getiduser()
	{
		return $this->iduser;
	}
	function getNom()
	{
		return $this->nom;
	}
	function getPrenom()
	{
		return $this->prenom;
	}
	function getEmail()
	{
		return $this->email;
	}
	function getpassword()
	{
		return $this->password;
	}
	function setNom(string $nom)
	{
		$this->nom = $nom;
	}
	function setPrenom(string $prenom)
	{
		$this->prenom = $prenom;
	}
	function setEmail(string $email)
	{
		$this->email = $email;
	}
	function setpassword(string $password)
	{
		$this->password = $password;
	}
}

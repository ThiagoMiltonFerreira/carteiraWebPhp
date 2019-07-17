<?php

class getSetUsuario
{


	private $usuario;
	private $senha;	

	public function GetUsuario()
	{
		return $this->usuario;
	}
	public function SetUsuario($usuario)
	{
		$this->usuario = $usuario;
		
	}	

	
	public function GetSenha()
	{
		return $this->senha;
	}
	public function SetSenha($senha)
	{
		$this->senha = $senha;
	}	




}









?>
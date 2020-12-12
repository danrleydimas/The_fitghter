<?php

class Conexao {
		private $servidor;
		private $usuario;
		private $senha;
		private $nome_banco;
		private $banco;



 	 
 	 function __construct($servidor = "localhost",$usuario = "root",$senha = "",$nome_banco = "thefighter"){
 	 	$this->SetServidor($servidor);
 	 	$this->SetUsuario($usuario);
 	 	$this->SetSenha($senha);
 	 	$this->SetNomeBanco($nome_banco);
 	 	$this->Conectar();

 	 }
 	 

	public function SetServidor($valor){
		$this->servidor = $valor;

	}

	public function GetServidor(){
		return $this->servidor;
	}
	public function SetUsuario($valor){
		$this->usuario = $valor;
	}

	public function GetUsuario(){
			return $this->usuario;

	}
	public function SetSenha($valor){
		$this->senha = $valor;
	}
	public function GetSenha(){
		return $this->senha;
	}
	public function SetSalao($valor){
		$this->Salao = $valor;
	}
	public function GetSalao(){
		return $this->salao;
	}
	
	public function SetNomeBanco($valor){
		$this->nome_banco = $valor;

	}

	public function GetNomeBanco(){
		return $this->nome_banco;
	}


 	 public function Conectar(){
 	 		$this->banco = new mysqli(
 	 			$this->GetServidor(),
 	 			$this->GetUsuario(),
 	 			$this->GetSenha(),
 	 			$this->GetNomeBanco()

 	 			);
 	 
 	 if ($this->banco->connect_error) {
 	 	die('Erro de conexão (' . $this->banco->connect_errno . '): '
 	 		. $this->$banco->connect_error);
 	 }
 	}
 	 
 	 public function GetBanco(){
 	 	return $this->banco;
 	 }
 	 public function Desconectar(){
 	 	$this->banco->close();
 	 }
 	}
 	 ?>
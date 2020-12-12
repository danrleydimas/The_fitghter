<?php
 class Lutador {
	private $codigo ;
    private $nome;
	private $email;
	private $sobrenome;
	private $senha;
	private $nick;
	private $peso;

function __construct($codigo = 0,$nome = "",$email ="",$sobrenome = "",$senha = "",$nick = "",$peso=""){
	$this->SetCodigo($codigo);
	$this->SetNome($nome);
	$this->SetEmail($email);
	$this->SetSobrenome($sobrenome);
	$this->SetSenha($senha);
	$this->SetNick($nick);
	$this->SetPeso($peso);

	
}

public function SetCodigo($valor){
	$this->codigo = $valor;
}
public function GetCodigo(){
	return $this-> codigo;
}

public function SetNome($valor){
	$this->nome = $valor;
}
public function GetNome(){
	return $this-> nome;
}

public function SetEmail($valor){
	$this->email = $valor;
}
public function GetEmail(){
	return $this-> email;
}
public function SetSobrenome($valor){
	$this->sobrenome = $valor;
}
public function GetSobrenome(){
	return $this-> sobrenome;
}
public function SetSenha($valor){
	$this->senha = $valor;
}
public function GetSenha(){
	return $this-> senha;
}
public function SetNick($valor){
	$this->nick = $valor;
}
public function GetNick(){
	return $this-> nick;
}

public function SetPeso($valor){
	$this->peso = $valor;
}
public function GetPeso(){
	return $this-> peso;
}


}

?>
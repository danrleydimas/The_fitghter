<?php
 class  Exercicio{
	private $cd_exercicio;
    private $ds_exercicio;


function __construct($cd_exercicio = 0,$ds_exercicio = ""){
	$this->SetCd_exercicio($cd_exercicio);
	$this->SetDs_exercicio($ds_exercicio);
	
	
}

public function SetCd_exercicio($valor){
	$this->cd_exercicio = $valor;
}
public function GetCd_exercicio(){
	return $this-> cd_exercicio;
}

public function SetDs_exercicio($valor){
	$this->ds_exercicio = $valor;
}
public function GetDs_exercicio(){
	return $this-> ds_exercicio;
}



}

?>
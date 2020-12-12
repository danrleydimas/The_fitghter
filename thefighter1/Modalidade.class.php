<?php
 class  Modalidade{
	private $cd_modalidade;
    private $ds_modalidade;


function __construct($cd_modalidade = 0,$ds_modalidade = ""){
	$this->SetCd_modalidade($cd_modalidade);
	$this->SetDs_modalidade($ds_modalidade);
	
	
}

public function SetCd_modalidade($valor){
	$this->cd_modalidade = $valor;
}
public function GetCd_modalidade(){
	return $this-> cd_modalidade;
}

public function SetDs_modalidade($valor){
	$this->ds_modalidade = $valor;
}
public function GetDs_modalidade(){
	return $this-> ds_modalidade;
}



}

?>
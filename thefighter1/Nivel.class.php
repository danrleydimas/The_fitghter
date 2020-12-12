<?php
 class  Nivel{
	private $cd_nivel;
    private $ds_nivel;


function __construct($cd_nivel = 0,$ds_nivel = ""){
	$this->SetCd_nivel($cd_nivel);
	$this->SetDs_nivel($ds_nivel);
	
	
}

public function SetCd_nivel($valor){
	$this->cd_nivel = $valor;
}
public function GetCd_nivel(){
	return $this-> cd_nivel;
}

public function SetDs_nivel($valor){
	$this->ds_nivel = $valor;
}
public function GetDs_nivel(){
	return $this-> ds_nivel;
}



}

?>
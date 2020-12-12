<?php
 class  CapacidadeFisica{
 	private $cd_capacidade;
	private $qt_duracao;
    private $nr_repeticao;
    private $qt_carga;
   /* private $cd_usu;*/


function __construct($cd_capacidade = 0,$qt_duracao = 0,$nr_repeticao = 0 ,$qt_carga = 0/*$cd_usu*/){
	$this->SetCd_capacidade($cd_capacidade);
	$this->SetQt_duracao($qt_duracao);
	$this->SetNr_repeticao($nr_repeticao);
	$this->SetQt_carga($qt_carga);
	/*$this->SetCd_usu($cd_usu);*/
	
	
}

public function SetCd_capacidade($valor){
	$this->cd_capacidade = $valor;
}
public function GetCd_capacidade(){
	return $this-> cd_capacidade;
}

public function SetQt_duracao($valor){
	$this->qt_duracao = $valor;
}
public function GetQt_duracao(){
	return $this-> qt_duracao;
}
public function SetNr_repeticao($valor){
	$this->nr_repeticao = $valor;
}
public function GetNr_repeticao(){
	return $this-> nr_repeticao;
}
public function SetQt_carga($valor){
	$this->qt_carga = $valor;
}
public function GetQt_carga(){
	return $this-> qt_carga;
}
/*
public function SetCd_usu($valor){
	$this->cd_usu = $valor;
}
public function GetCd_usu(){
	return $this-> cd_usu;
}*/
public function SetCd_agilidade($valor){
	$this->cd_agilidade = $valor;
}
public function GetCd_agilidade(){
	return $this-> cd_agilidade;
}
public function SetCd_forca($valor){
	$this->cd_forca = $valor;
}




}

?>
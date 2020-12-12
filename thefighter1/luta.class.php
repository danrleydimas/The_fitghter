<?php
/**
* 
*/
class Luta
{
	private $cd_luta;
	private $dt_luta;
	private $hr_minimo;
	private $hr_maxima;

	
	function __construct($cd_luta,$dt_luta,$hr_minimo,$hr_maxima){
	$this->SetCd_luta($cd_luta);
	$this->SetDt_luta($dt_luta);
	$this->SetHr_minimo($hr_minimo);
	$this->SetHr_maxima($hr_maxima);

}

public function SetCd_luta($valor){
	$this->cd_luta = $valor;
}
public function GetCd_luta(){
	return $this-> cd_luta;
}

public function SetDt_luta($valor){
	$this->dt_luta = $valor;
}
public function GetDt_luta(){
	return $this-> dt_luta;
}

public function SetHr_minimo($valor){
	$this->hr_minimo = $valor;
}
public function GetHr_minimo(){
	return $this-> hr_minimo;
}
public function SetHr_maxima($valor){
	$this->hr_maxima = $valor;
}
public function GetHr_maxima(){
	return $this-> hr_maxima;
}

}

?>
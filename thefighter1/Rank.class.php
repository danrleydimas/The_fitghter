<?php
 class  Rank{
	private $pt_total;
    
function __construct($pt_total = 0){
	$this->SetPt_total($pt_total);
		
}

public function SetPt_total($valor){
	$this->pt_total = $valor;
}
public function GetPt_total(){
	return $this-> pt_total;
}


}

?>
<?php 

 class NivelDao{
 		private $conexao;

 	Function __construct($conexao){
 		$this->conexao = $conexao;
 	
	 	}
public function SelecionaNivel(){
	$sql = "SELECT * FROM nivel" ;
   // echo $sql;
    $this->conexao->Conectar();
    $banco = $this->conexao->GetBanco();
    $retorno = $banco->query($sql);
    $this->conexao->Desconectar();
    return $retorno;   	
}
	 
 }
 ?>
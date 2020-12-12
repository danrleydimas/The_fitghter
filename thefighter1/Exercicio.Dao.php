<?php 

 class ExercicioDao{
 		private $conexao;

 	Function __construct($conexao){
 		$this->conexao = $conexao;
 	
	 	}
public function SelecionaExercicio($tipo){
	$sql = "SELECT * FROM exercicio where ds_tipo ='$tipo' " ;
   // echo $sql;
    $this->conexao->Conectar();
    $banco = $this->conexao->GetBanco();
    $retorno = $banco->query($sql);
    $this->conexao->Desconectar();
    return $retorno;   	
}

	 
 }
 ?>
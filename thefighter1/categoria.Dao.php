<?php
include_once("conexao.php");

class CategoriaDao
{
	
	Function __construct($conexao){
 		$this->conexao = $conexao;
 	
	 	}

 	public function selecionaCategoria()
 	{
 		$sql='select * from categoria_peso';

 		$banco = $this->conexao->GetBanco();
 		$retorno=$banco->query($sql);
 		$this->conexao->Desconectar();
 		return $retorno;
 	}

}



?>
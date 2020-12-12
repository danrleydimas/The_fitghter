<?php 

 class RankDao{
 		private $conexao;

 	Function __construct($conexao){
 		$this->conexao = $conexao;
 	
	 	}
public function SelecionaRank(){
	$sql = "select nick,pt_total from rank inner join lutador on rank.codigo = lutador.codigo order by pt_total DESC" ;
    //echo $sql;
    $this->conexao->Conectar();
    $banco = $this->conexao->GetBanco();
    $retorno = $banco->query($sql);
    $this->conexao->Desconectar();
    return $retorno;   	
}

	 
 }
 ?>
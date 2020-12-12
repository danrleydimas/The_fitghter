<?php
include_once("Modalidade.class.php");
include_once("Lutador.class.php");
include_once("Nivel.class.php");

/**
* 
*/
class ModalidadeDao{
 		private $conexao;

 	Function __construct($conexao){
 		$this->conexao = $conexao;
 	
	 	}
public function SelecionaModalidade(){
	$sql = "SELECT * FROM modalidade" ; 
   // echo $sql;
    $this->conexao->Conectar();
    $banco = $this->conexao->GetBanco();
    $retorno = $banco->query($sql);
    $this->conexao->Desconectar();
    return $retorno;   	
}
public function InserirModalidade($usuario,$modalidade,$nivel){
 		$conexao = new Conexao();
    $sql = "INSERT INTO lutadorxmodalidade(codigo,cd_modalidade,cd_nivel) values('";
 		$sql = $sql . $usuario->GetCodigo() . "','";
    $sql = $sql . $modalidade->GetCd_modalidade() . "','";
 		$sql = $sql . $nivel->GetCd_nivel(). "')";
       
 		//echo $sql;
    
 		$banco = $this->conexao->GetBanco();
 		$a=$banco->query($sql);
    if($a){
      echo "<script> alert('inserido com sucesso')</script>";
    }
   else{
    $usu=$usuario->GetCodigo();
    $m=$modalidade->GetCd_modalidade();
    $n=$nivel->GetCd_nivel();
    $sql1 =" UPDATE lutadorxmodalidade SET 
                  cd_nivel = '$n' 
                  where cd_modalidade = '$m' and codigo ='$usu'"; 
      
    $banco = $this->conexao->GetBanco();
    $b=$banco->query($sql1);
    if($b){
       echo "<script> alert('alterado com sucesso')</script>";
      
    }
   }

 		$this->conexao->Desconectar();

 	}

	 
 }



?>
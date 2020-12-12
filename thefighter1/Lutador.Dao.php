<?php include_once ("Lutador.class.php");?>
<?php include_once ("conexao.php");?>
<?php 

 class LutadorDao{
 		private $conexao;

 	Function __construct($conexao){
 		$this->conexao = $conexao;
 	
	 	}


	 	public function Inserir($lutador){
 		$conexao = new Conexao();
	    $sql = "INSERT INTO lutador (codigo ,nome,email,sobrenome,senha,nick) values('";
 		$sql = $sql . $lutador->GetCodigo() . "','";
 		$sql = $sql . $lutador->GetNome() . "','";
    $sql = $sql . $lutador->GetEmail() . "','";
    $sql = $sql . $lutador->GetSobrenome() . "','";
     $sql = $sql . $lutador->GetSenha() . "','";
 		$sql = $sql . $lutador->GetNick(). "')";
       
 		echo $sql;
 		$banco = $this->conexao->GetBanco();
 		$retorno=$banco->query($sql);

if ($retorno) {
  # code...
}
 		$this->conexao->Desconectar();

 	}
 	public function selecionaUsuario(){
 		$conexao = new Conexao();
 		$sql ="SELECT Lutador.codigo FROM LUTADOR";
 	}

 	public function validaemail($e){
	//verifica se e-mail esta no formato correto de escrita
	$exp = "/^[a-z\'0-9]+([._-][a-z\'0-9]+)*@([a-z0-9]+([._-][a-z0-9]+))+$/";

   if(preg_match($exp,$e)){
        $a=explode("@",$e);
        $b=array_pop($a);
      if(checkdnsrr($b,"MX")){
        return true;
      }else{
        return false;
      }

   }else{

      return false;

   }    
}
public function Validaemaill($email){
      $sql = "select email from lutador where email like '%".$email."%' ";
      
       $this->conexao->Conectar();
    $banco = $this->conexao->GetBanco();
    $retorno = $banco->query($sql);

    $this->conexao->Desconectar();
    return $retorno;
     

     }
     public function Validausuario($email,$senha){

      $sql = "SELECT * FROM lutador where email = '$email' and senha ='$senha'";
    //echo $sql;
    $this->conexao->Conectar();
    $banco = $this->conexao->GetBanco();
    $retorno = $banco->query($sql);
    $this->conexao->Desconectar();
    return $retorno;
    
     }


      public function Validausuarioadm($nome,$senha){

      $sql = "SELECT * FROM admm where nome = '$nome' and senha ='$senha'";
    //echo $sql;
    $this->conexao->Conectar();
    $banco = $this->conexao->GetBanco();
    $retorno = $banco->query($sql);
    $this->conexao->Desconectar();
    return $retorno;
    
     }
     public function ValidaCategoriaPeso($peso){
     
        $categoria=null;
         if($peso <= 55.999) {

           return $categoria = 1;
         }
         elseif($peso >=55.8 && $peso <=60.999) {
           return $categoria = 2;
         }
           elseif($peso >=60.3 && $peso <=65.999) {
           return $categoria = 3;
         }
           elseif($peso >=65.8 && $peso <=70.999) {
           return $categoria = 4;
         }
           elseif($peso >=70.2 && $peso <=75.999) {
           return $categoria = 5;
         }
           elseif($peso >=75.2 && $peso <=80.999) {
           return $categoria = 6;
         }
           elseif($peso >=80.2 && $peso <=95.999) {
           return $categoria = 7;
         }
           elseif($peso >=95.2 && $peso <=120.999) {
           return $categoria = 8;
         }
         elseif($peso > 120.2) {
           return $categoria = 9;
         }
      
     }
/*
peso mosca (até 55.7 kg) ou menos
Peso Galo (de 55.8 kg até 60.2 kg)
Peso Pena (de 60.3 kg até 65.7 kg)
Peso Leve (de 65.8 kg até 70.2 k)
Peso Meio-médio (de 70.2 kg até 75.1 kg)
Peso Médio (de 75.2 kg até 80.1 kg)
Peso Meio-Pesado (de 80.2 kg até 95.1 kg)
Peso Pesado (de 95.2 kg até 120.1 kg)
Peso Superpesado (mais de 120.2 kg)
    
*/

 } 
  $cx = new  Conexao();
     $sa = new LutadorDao($cx);
     $q=$sa->ValidaCategoriaPeso(120.19);
     //echo $q;

 ?>
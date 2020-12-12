<?php  include_once ("Lutador.class.php");
       include_once ("conexao.php");
       include_once ("Capacidadefisica.class.php");
       include_once("Exercicio.class.php");

?>
<?php 

 class CapacidadeDao{
 		private $conexao;

 	Function __construct($conexao){
 		$this->conexao = $conexao;
 	
	 	}


public function SelecionaCapacidadeAgilidade($usu,$exercicio){
  $sql = "select ds_exercicio  , nr_repeticao,qt_carga,time_format(qt_duracao,'%H:%i:%s') as qt_duracao from capacidade_fisica inner join exercicio on exercicio.cd_exercicio=capacidade_fisica.cd_exercicio where codigo='$usu' and ds_tipo ='$exercicio' order by nr_repeticao and qt_carga  DESC " ;
  // echo $sql;
    $this->conexao->Conectar();
    $banco = $this->conexao->GetBanco();
    $retorno = $banco->query($sql);
    $this->conexao->Desconectar();

    return $retorno;    
}

public function SelecionaCapacidadeExercicio($exer){
  $sql = "SELECT cd_capacidade FROM capacidade_fisica WHERE cd_exercicio = '$exer' " ;
   echo $sql;
    $this->conexao->Conectar();
    $banco = $this->conexao->GetBanco();
    $retorno = $banco->query($sql);
    $this->conexao->Desconectar();

    return $retorno;    
}
public function AlterarCapacidade($capacidade){
          $sql = "update capacidade_fisica set
                  qt_carga = '" . $capacidade->GetQt_carga() . "',     
                  qt_duracao= '" . $capacidade->GetQt_duracao() . "',
                  nr_repeticao = '" . $capacidade->GetNr_repeticao() . "'
                  where cd_capacidade = '" . $capacidade->GetCd_capacidade() . "' ";
                 // echo $sql;
               if ($sql ) {
                 echo ("<script> {alert(\"Alterado com sucesso\");} </script>");
                    # code...
               }
               else {
                    die("erro" . mysql_error());
  }
        $banco = $this->conexao->GetBanco();
        $banco->query($sql);
        $this->conexao->Desconectar();
        
}

  public function InserirCapacidade($capacidade,$exercicio,$usuario){
  
   			$conexao = new Conexao();

		    $sql = "Insert Into capacidade_fisica(cd_capacidade,codigo,cd_exercicio,qt_carga,qt_duracao,nr_repeticao) values('";
			$sql = $sql . $capacidade->GetCd_capacidade() . "','";
		    $sql = $sql . $usuario->GetCodigo() . "','";
		    $sql = $sql . $exercicio->GetCd_exercicio() . "','";
		    $sql = $sql . $capacidade->GetQt_carga() . "','";
		    $sql = $sql . $capacidade->GetQt_duracao() . "','";
		    $sql = $sql . $capacidade->GetNr_repeticao() . "')";
   			$banco = $this->conexao->GetBanco();
    		$a=$banco->query($sql);
if ($a){
        // echo ("<script> {alert(\"Cadastrado com sucesso\");} </script>");
                    # code...
               }
               else {
                    /* echo ("<script> {alert(\"erro\");} </script>");*/
                    /*alterando caso ja exista exercicio igual*/
                    $usu=$exercicio->GetCd_exercicio();
                    $carga=$capacidade->GetQt_carga();
                    $sql3 = "select cd_capacidade from capacidade_fisica where cd_exercicio = '$usu'and qt_carga= '$carga'";
                    $this->conexao->Conectar();
				    $banco = $this->conexao->GetBanco();
				    $retorno = $banco->query($sql3);
				    $cd_registro = $retorno->fetch_array();
				    $hello=$cd_registro["cd_capacidade"];        
                     
                  	$sql2 = "update capacidade_fisica set
                  	qt_carga = '" . $capacidade->GetQt_carga() . "',     
                  	qt_duracao= '" . $capacidade->GetQt_duracao() . "',
                  	nr_repeticao = '" . $capacidade->GetNr_repeticao() . "'
                  	where cd_capacidade = '$hello' ";
                  	$banco = $this->conexao->GetBanco();
                  	$banco->query($sql2); 
               		if ($sql2 ) {
                 	//echo ("<script> {alert(\"Alterado com sucesso\");} </script>");
                 	
                    
               }
  }
     
    $this->conexao->Desconectar();
     

  }


 }
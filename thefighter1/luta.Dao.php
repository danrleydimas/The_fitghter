<?php  
 include_once ("conexao.php");
 include_once ("Lutador.class.php");
 include_once ("luta.class.php");
class LutaDao
{
	private $conexao;
	
		Function __construct($conexao){
 		$this->conexao = $conexao;
 	
	 	}


public function SelecionaLutador($catego,$hora,$cd_lut){

	$sql3="select count(lutadorxluta.codigo) from lutadorxluta inner join lutador on lutador.codigo=lutadorxluta.codigo  where cd_categoria = '$catego' and 
    lutadorxluta.cd_luta = '$cd_lut'  ";
	$this->conexao->Conectar();
    $banco = $this->conexao->GetBanco();
    $retorno = $banco->query($sql3);
    $a=$retorno->fetch_array();
	if($a['count(lutadorxluta.codigo)'] == 2 ) {
		
	
	$sql="select lutador.cd_categoria ,rank.pt_total,lutadorxluta.cd_luta,lutadorxluta.codigo,lutador.peso,lutadorxluta.cd_luta FROM lutadorxluta inner join rank on rank.codigo = lutadorxluta.codigo inner join lutador on lutador.codigo=lutadorxluta.codigo where cd_categoria = '$catego'and 
    lutadorxluta.cd_luta = '$cd_lut' limit 2 ";
	 $this->conexao->Conectar();
    $banco = $this->conexao->GetBanco();
    $retorno = $banco->query($sql);
    /*echo $as;*/
    while ($registro=$retorno->fetch_array()){
    $regi=$registro['codigo'];
    $cd_luta=$registro['cd_luta'];
    $sql1="insert into resultado_luta(cd_result,cd_luta,cd_hr_luta,codigo) values(0,'$cd_luta','$hora',
     $regi);";
     //echo $sql1;
     
     $this->conexao->Conectar();
    $banco = $this->conexao->GetBanco();
    $banco->query($sql1);
    

    }
}else{
	echo "<script>alert('lutadores insuficientes')</script>";
}

    $this->conexao->Desconectar();

     

}

public function selecionaEvento($cd_event){

    $sql="select cd_hr_luta ,hr_luta from luta inner join tb_hr_luta on luta.cd_luta = tb_hr_luta.cd_luta 
    where luta.cd_luta = '$cd_event' and tl_lutador < 2 ";
   //echo $sql;

     $this->conexao->Conectar();
    $banco = $this->conexao->GetBanco();
    $retorno=$banco->query($sql);
    $this->conexao->Desconectar();
     return $retorno;
}
public function  verificaAlerta($cd_lutador){
    $sql="select count(lutadorxluta.codigo) from luta inner join lutadorxluta on luta.cd_luta = lutadorxluta.cd_luta
    where codigo = '$cd_lutador'";
    //echo $sql;

     $this->conexao->Conectar();
    $banco = $this->conexao->GetBanco();
    $retorno=$banco->query($sql);
    $a=$retorno->fetch_array();
    $a=$a['count(lutadorxluta.codigo)'];
    $this->conexao->Desconectar();
    return $a;
}
public function mandaAlerta($lutador){
    $sql ="SELECT tb_hr_luta.cd_luta FROM `luta` inner join tb_hr_luta on luta.cd_luta = tb_hr_luta.cd_luta where tb_hr_luta.tl_lutador < 2 ";
    $this->conexao->Conectar();
    //echo $sql;
    $banco = $this->conexao->GetBanco();
    $retorno=$banco->query($sql);
    while($r=$retorno->fetch_array()) {
          $r=$r['cd_luta'];
        if(isset($r)){
            $sql1 ="select count(cd_luta) from resultado_luta where cd_luta = '$r' and codigo = '$lutador'";
            $this->conexao->Conectar();
            //echo $sql1;
            $banco = $this->conexao->GetBanco();
            $retorno2=$banco->query($sql1);
            $r2=$retorno2->fetch_array();
            $r2=$r2['count(cd_luta)'];
            if($r2 == 0){
                $sql3 = "select * from luta where cd_luta = '$r' ";
                $this->conexao->Conectar();
                //echo $sql3;
                $banco = $this->conexao->GetBanco();
                $retorno1=$banco->query($sql3);
                 $this->conexao->Desconectar();
                return $retorno1;

            }
         # code...
          }
      } 
       
    }


public function verificalutadorLuta($catego){
  $sql ="select luta.* from luta inner join lutadorxluta on luta.cd_luta = lutadorxluta.cd_luta inner join lutador on lutador.codigo = lutadorxluta.codigo where cd_categoria = '$catego' limit 1";
    $this->conexao->Conectar();
    //echo $sql;
    $banco = $this->conexao->GetBanco();
    $retorno=$banco->query($sql);
    return $retorno;
}

public function deletaLuta($cd_luta){
   $sql = "delete lutadorxluta.* from tb_hr_luta inner join lutadorxluta on tb_hr_luta.cd_luta = lutadorxluta.cd_luta where tl_lutador = 2 and  lutadorxluta.cd_luta = '$cd_luta' ";
     $this->conexao->Conectar();
     //echo $sql;
    $banco = $this->conexao->GetBanco();
    $retorno=$banco->query($sql);
    return $retorno;

}
    public function inserirLutadorLuta($cd_lutador,$cd_luta){
      $sql = "insert into lutadorxluta(codigo,cd_luta) values('$cd_lutador','$cd_luta')";
      $this->conexao->Conectar();
    //echo $sql;
      $banco = $this->conexao->GetBanco();
      $retorno=$banco->query($sql);
      //echo $retorno;
    $this->conexao->Desconectar();
  
      
    }
public function inserirLuta($luta){

    $sql = "insert into luta (cd_luta,dt_luta,hr_minimo,hr_maxima) values('";
        $sql = $sql . $luta->GetCd_luta() . "','";
        $sql = $sql . $luta->GetDt_luta() . "','";
        $sql = $sql . $luta->GetHr_minimo() . "','";
        $sql = $sql . $luta->GetHr_maxima() . "')";
        //echo $sql;
        $data_luta=$luta->GetDt_luta();

    $banco = $this->conexao->GetBanco();
    $sql2 = "select count(dt_luta) from luta where dt_luta = '$data_luta' ";
    //echo $sql2;
    $retorno1 = $banco->query($sql2);
    $verificado=$retorno1->fetch_array();
    if($verificado['count(dt_luta)'] == 0){
    $retorno=$banco->query($sql);
  

    $this->conexao->Desconectar();
    if($retorno == 1 ){
                 echo "<script> alert('Evento cadastrado com sucesso');</script>"; 
    }

    }
    else{
          echo "<script> alert('Nao foi possível mandar alerta, a data já está sendo utilizada');</script>";
      
    }
    
}
public function selecionaLuta($cd_luta){
    $sql="select * from lutadorxluta inner join tb_hr_luta on lutadorxluta.cd_luta = tb_hr_luta.cd_luta where lutadorxluta.cd_luta = '$cd_luta'";
      $banco = $this->conexao->GetBanco();
      $retorno=$banco->query($sql);
      //echo $retorno;
    $this->conexao->Desconectar();


}

public function cadastrarLuta($cd_luta,$lutador){
  $sql ="select * from tb_hr_luta where cd_luta = '$cd_luta' and tl_lutador < 2 limit 1";
  $banco = $this->conexao->GetBanco();
  $retorno=$banco->query($sql);
  $registro=$retorno->fetch_array();
  $cd_hr_luta=$registro["cd_hr_luta"];
   //echo $sql;

   //echo $hr_luta;
   if ($cd_hr_luta > 0) {
     # code...
   
  $cx = new Conexao();
$dao = new LutaDao($cx);
  $dao->inserirLutadorLuta($lutador,$cd_luta);

  $sql1="insert into resultado_luta(cd_result,cd_luta,cd_hr_luta,codigo,cd_ds_result_luta)
         values(0,'$cd_luta','$cd_hr_luta','$lutador',0)";
  $banco = $this->conexao->GetBanco();
  $retorno1=$banco->query($sql1);
      //echo $retorno;
  //echo $sql1;
  $this->conexao->Desconectar();
  if($retorno1 == 1 ){
        echo "<script> alert('Okay solicitação enviada,iremos mandar o horário da sua luta');</script>";
  }
}
}

public function lutasPendentes(){
$sql="SELECT DISTINCT resultado_luta.cd_luta,tb_hr_luta.hr_luta,dt_luta,tb_hr_luta.cd_hr_luta FROM resultado_luta inner join tb_hr_luta on resultado_luta.cd_luta = tb_hr_luta.cd_luta inner join luta on luta.cd_luta = resultado_luta.cd_luta where tb_hr_luta.tl_lutador = 2 and resultado_luta.cd_ds_result_luta = 0";

  $banco = $this->conexao->GetBanco();
  $retorno=$banco->query($sql);
  $this->conexao->Desconectar();
  return $retorno;

}

public function pesquisaLutador($cd_hora){
  $sql="SELECT DISTINCT resultado_luta.codigo,lutador.nome,resultado_luta.cd_result,tb_ds_result_luta.ds_result_luta,resultado_luta.cd_ds_result_luta FROM resultado_luta inner join tb_hr_luta on resultado_luta.cd_luta = tb_hr_luta.cd_luta inner join luta on luta.cd_luta = resultado_luta.cd_luta inner join lutador on lutador.codigo = resultado_luta.codigo inner join tb_ds_result_luta on resultado_luta.cd_ds_result_luta = tb_ds_result_luta.cd_ds_result_luta where tb_hr_luta.cd_hr_luta = '$cd_hora' order by codigo DESC limit 1";

    $banco = $this->conexao->GetBanco();
    $retorno=$banco->query($sql);
    $this->conexao->Desconectar();
    return $retorno;

}
public function pesquisaLutador2($cd_hora){
  $sql="SELECT DISTINCT resultado_luta.codigo,lutador.nome,resultado_luta.cd_result,tb_ds_result_luta.ds_result_luta,resultado_luta.cd_ds_result_luta FROM resultado_luta inner join tb_hr_luta on resultado_luta.cd_luta = tb_hr_luta.cd_luta inner join luta on luta.cd_luta = resultado_luta.cd_luta inner join lutador on lutador.codigo = resultado_luta.codigo inner join tb_ds_result_luta on resultado_luta.cd_ds_result_luta = tb_ds_result_luta.cd_ds_result_luta where tb_hr_luta.cd_hr_luta = '$cd_hora' order by codigo ASC limit 1";
  

    $banco = $this->conexao->GetBanco();
    $retorno=$banco->query($sql);
    $this->conexao->Desconectar();
    return $retorno;

}

public function definirVitoria($resultado){
  $sql="update  resultado_luta set cd_ds_result_luta = 2 where cd_result = '$resultado'";
    $banco = $this->conexao->GetBanco();
    $banco->query($sql);
    $this->conexao->Desconectar();

}
public function definirDerrota($hora,$resultado){
  $sql="update  resultado_luta set cd_ds_result_luta = 1 where cd_hr_luta = '$hora' and cd_result != '$resultado'";
  //echo $sql;
    $banco = $this->conexao->GetBanco();
    $banco->query($sql);
    $this->conexao->Desconectar();

}
public function definirEmpate($hora){
  $sql="update resultado_luta set cd_ds_result_luta = 3 where cd_hr_luta = '$hora'";
  //echo $sql;
    $banco = $this->conexao->GetBanco();
    $banco->query($sql);
 
    $this->conexao->Desconectar();

}
public function exibirResultado(){
  $sql="SELECT DISTINCT luta.dt_luta,tb_hr_luta.hr_luta,resultado_luta.cd_hr_luta FROM resultado_luta inner join lutador on lutador.codigo = resultado_luta.codigo inner join tb_hr_luta on resultado_luta.cd_hr_luta = tb_hr_luta.cd_hr_luta inner join luta on resultado_luta.cd_luta = luta.cd_luta";
  //echo $sql;
  $banco = $this->conexao->GetBanco();
  $retorno=$banco->query($sql);
  $this->conexao->Desconectar();
  return $retorno;

}
public function pesquisarResultado($codigo){

}

}
 
 ?>
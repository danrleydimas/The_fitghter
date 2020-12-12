<!DOCTYPE html>
<html>
<head>
	<title>Administração</title>
  <style type="text/css">
    
    #contact-sidebar{
  position: relative;
  width: 200px; /* 220 - 20 padding */
  float: left;
  padding: 20px 10px 20px 10px;
  -webkit-box-shadow: 2px 2px 0px rgba(0,0,0,.2);
  -moz-box-shadow: 2px 2px 0px rgba(0,0,0,.2);
  -o-box-shadow: 2px 2px 0px rgba(0,0,0,.2);
  box-shadow: 2px 2px 0px rgba(0,0,0,.2);
}

  </style>
   

</head>
<body>

<?php 
include_once("cabecalho.php");
include_once("..\conexao.php");
include_once("..\luta.Dao.php");
include_once("..\luta.class.php");

if (isset($_POST['enter'])) {
 $data2 = $_POST['data'];
 $hora_min = $_POST['hora_min'];
 $hora_max = $_POST['hora_max'];

$cx = new Conexao();
$dao = new LutaDao($cx);
$luta = new Luta(0,$data2,$hora_min,$hora_max);
$dao->inserirLuta($luta);
}

$cx = new Conexao();

?>
  <?php date_default_timezone_set('America/sao_paulo');
  

 $data_atual = date("Y-m-d");
  $data=date("Y-m-d", strtotime("+1 days",strtotime($data_atual)));  

                                  
                                  


?>
<div class="container" style="float: left;">
     <div class="row">
       <div class="col-lg-8">

      <h1 class="h1">Bem-vindo Administrador.</h1>
      </div>
      </div>
<br>
<br>

 

      <form method="POST">
      <div class="row">
      <div class="col-lg-8">
        <h2 class="h2">Mandar alerta</h2>
        </div>
      </div>
      <br>
      <div class="row">
     <span class="col-md-3">
       <label for="data" >
       Data:
      </label>
      <?php
      

         echo"<input type='date' required maxlength='10' value='$data' pattern='[0-9]{2}\/[0-9]{2}\/[0-9]{4}$' min='$data' name='data' id='data' class='form-control'>"    ?>                
     </span>
     <span class="col-md-2">
     <label for="hora">
       Hora Mínima:
     </label>
       <select name="hora_min" class="form-control">
         <option>10:00</option>
         <option>11:00</option>
         <option>12:00</option>
         <option>13:00</option>
         <option>14:00</option>
         <option>15:00</option>
         <option>16:00</option>
         <option>17:00</option>
         <option>18:00</option>
         <option>19:00</option>
         <option>20:00</option>
         <option>21:00</option>
         <option>22:00</option>
         
       </select>

     </span>
      <span class="col-md-2">
     <label for="hora">
       Hora Máxima:
     </label>
       <select name="hora_max" class="form-control">
         
         <option>11:00</option>
         <option>12:00</option>
         <option>13:00</option>
         <option>14:00</option>
         <option>15:00</option>
         <option>16:00</option>
         <option>17:00</option>
         <option>18:00</option>
         <option>19:00</option>
         <option>20:00</option>
         <option>21:00</option>
         <option>23:00</option>

       </select>

     </span>
     <div class="col-sm-2">
       <button type="submit" class='btn-info  form-control'  name="enter">Enviar</button>

     </div>

     </div>
 
     <br>
     <br>
    
   
<hr class="bg-info">
     
<?php
if(isset($_GET['codigo'])) {
  $hora=$_GET['codigo'];
  $cx = new Conexao();
  $dao = new LutaDao($cx);
  $retorno=$dao->pesquisaLutador($hora);
  $registro=$retorno->fetch_array();
   $cx2 = new Conexao();
  $dao2 = new LutaDao($cx2);
  $retorno2=$dao2->pesquisaLutador2($hora);
  $registro2=$retorno2->fetch_array();


?>
 <div class="row">
       <div class="col-lg-8">

      <h1 class="h2">Definir resultados</h1>
      <br>
      </div>
      </div>
      <form method="POST">

      <div class="row">
       
     
     <button class="btn-dark form-control col-sm-2" style="background-color: #343a40;" value="<?php echo $registro["cd_result"]; ?>" name="resultado" ><big><b style="color: white;"><?php echo $registro["nome"]?></b></big></button>
       &nbsp;&nbsp;
     <button class="btn-danger form-control col-sm-1" name="resultado3"><center><big><i>VS</i></big></center></button>
    &nbsp;&nbsp;
   <button class="btn-primary form-control col-sm-2" value="<?php echo $registro2["cd_result"]; ?>" name="resultado2"><big><b><?php echo $registro2["nome"]?></b></big></button>


  

</div>

</form>
<form id="contactForm" style="float: right;">
<div class="row">
<aside  id="contact-sidebar" style="background-color: #dedbdb;">
                <div class="block">
                  <h4 style="color: #dc3545;">Atenção</h4>
  
                  <ul class="address-block">
                    <li class="address"><i>Para definir o lutador que ganhou basta clicar nele</i></li>
                    <li class="phone"><i>Para definir empate basta clicar no "VS"</i></li>
                  </ul>
                  
                </div>            
              </aside>
              </div>
              </form>
</div>
</div>
<?php
if(isset($_POST['resultado'])){
    $resultado=$_POST['resultado'];
    $cx = new Conexao();
    $dao = new LutaDao($cx);
    $dao->definirVitoria($resultado);
    $cx2 = new Conexao();
    $dao2 = new LutaDao($cx2);
    $dao2->definirDerrota($hora,$resultado);
}
elseif(isset($_POST['resultado2'])){
    $resultado2=$_POST['resultado2'];
    $resultado2=$_POST['resultado2'];
    $cx = new Conexao();
    $dao = new LutaDao($cx);
    $dao->definirVitoria($resultado2);
    $cx2 = new Conexao();
    $dao2 = new LutaDao($cx2);
    $dao2->definirDerrota($hora,$resultado2);
  
}
elseif(isset($_POST['resultado3'])){
   $cx = new Conexao();
   $dao = new LutaDao($cx);
   $dao->definirEmpate($hora);

}

}
else{

 ?>
</form>
<br>
 <div class="row">
       <div class="col-lg-8">

      <h1 class="h2">LUTAS PENDENTES</h1>
      </div>
      </div>
      <form method="POST">

      <div class="row">
       <span class="col-md-6">
     <label for="lutas">
       
     </label>
      
       <?php 
         $cx = new Conexao();
        $dao = new LutaDao($cx); 
        $retorno=$dao->lutasPendentes();
        if(isset($retorno)){ ?>
        
        
        <table class="table table-dark" id="table">
    <thead>
        <tr>
          <th scope="col">Data da luta</th>
          <th scope="col">Horario da luta</th>
          <th scope="col">Ação</th>
        </tr>
    </thead>
    <tbody>
<?php
         while($registro=$retorno->fetch_array()){

                 $cd_hr_luta=$registro["cd_hr_luta"];
                 $hr_luta=$registro["hr_luta"];
                 $dt_luta=$registro["dt_luta"];

         

        ?>
        
           <tr>
             
           <td> <?php echo $dt_luta; ?> </td>
          <td> <?php echo $hr_luta; ?> </td>
          <td class="actions"><a class="btn btn-info btn-xs"  href="<?php echo "index.php?codigo=$cd_hr_luta";?>">Verificar</a>
                   </td>

        </tr>
              <?php  }} ?>

    
       
    </tbody>
</table>
       
     </span>
      </div>
      </form> <?php } ?>
  
      </div>
      </div>
      </div>

</body>
</html>
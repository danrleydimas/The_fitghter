<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="utf-8">
  <title></title>
</head>
<body>
<?php
include_once("conexao.php");
include_once("Lutador.class.php");
include_once("Modalidade.class.php");
include_once("Exercicio.class.php");
include_once("Exercicio.Dao.php");
include_once("Capacidadefisica.class.php");
include_once("Capacidade.Dao.php");
include_once("Modalidade.Dao.php");
include_once("Nivel.class.php");
include_once("Nivel.Dao.php");
$codigo=$_GET['codigo'];
echo $codigo;

?>

<link href="assets/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/jquery-1.11.1.min.js"></script>
<?php 


if(isset($_POST['btinserir'])){
    
           
             $cd_usu=$codigo;
             $qt_duracao=$_POST["duracao"];
             $nr_repeticao=$_POST["repeticao"];
             $cd_exercicio = $_POST["cd_exercicio"];
             $qt_carga=$_POST["carga"];

             $sc = new Conexao();
             $dao = new CapacidadeDao($sc);
             $usuario = new Lutador($cd_usu,'','','','','');
             $exercicio = new Exercicio($cd_exercicio);
             $capacidade = new CapacidadeFisica(0,$qt_duracao,$nr_repeticao,$qt_carga );
             $dao->InserirCapacidade($capacidade,$exercicio,$usuario);
            
      

}
?>
<form method="POST" action="#exercicio">
 <label  >Tipos de exercicios</label>

  
<br>
<button name="f" class="btn btn-primary" >Forca</button>
<button name="a" class="btn btn-primary" >Agilidade</button>
<button name="r" class="btn btn-primary" >Resistencia</button>
    <br>
    </form>
<div class="col-md-4">
    <form method="POST">

    <?php
    $cx = new Conexao();
    $exe = new ExercicioDao($cx);
    if(isset($_POST["f"])){    
    $f = 1;

    ?>
      <label for="usr">Exercicios</label>
      <select  name="cd_exercicio"  class="form-control form-control-lg">
      
    <?php
        $resultado = $exe->SelecionaExercicio('forca');

    while ($registro = $resultado->fetch_array()) {
 
    ?>

    <option value="<?php  echo $registro["cd_exercicio"];?>"><?php echo $registro["ds_exercicio"];?>
      
    </option>
     
    <?php }

    ?>
<br>
    <label for="usr">Carga:</label>
  <input type="number" name="carga"  required class="form-control" id="usr">
  <div class="form-group">
  <label for="pwd">Repetição</label>
  <input type="number" name="repeticao" required  class="form-control" id="pwd">
</div>
    <div class="col-auto my-1">
    <input type="hidden" name="duracao">
      <button type="submit"  name="btinserir" class="btn btn-primary">Inserir</button>
    </div>
   <?php 
  }elseif (isset($_POST["a"])){
    
      
      ?>
        <label for="usr">Exercicios</label>
      <select  name="cd_exercicio"  class="form-control form-control-lg">

      <?php
        $resultado = $exe->SelecionaExercicio('agilidade');

      while ($registro = $resultado->fetch_array()) {
 
      ?>
      <option value="<?php  echo $registro["cd_exercicio"];?>"><?php echo $registro["ds_exercicio"];?>
        
      </option>


       <?php }
       ?>
       <div class="col-md-4">
       <div class="form-group">
  <label for="pwd">Repetição</label>
  <input type="number" name="repeticao" required  class="form-control" id="pwd">
</div>
<div class="form-group">
  <label for="pwd">Duração</label>
  <input type="time" name="duracao" required  class="form-control" step="10" id="pwd">
</div>
    <div class="col-auto my-1">
      <button type="submit"  name="btinserir" class="btn btn-primary">Inserir</button>
    </div>
    <input type="hidden" name="carga"  required class="form-control" id="usr">
</div>
     <?php } 
    
  elseif (isset($_POST["r"])){
     

      ?>
        <label for="usr">Exercicios</label>
      <select  name="cd_exercicio"  class="form-control form-control-lg">     
      
      <?php   $resultado = $exe->SelecionaExercicio('resistencia');

      while ($registro = $resultado->fetch_array()) {
 
      ?>

      <option value="<?php  echo $registro["cd_exercicio"];?>"><?php echo $registro["ds_exercicio"];?>
        
      </option>
      <?php }?>

<div class="form-group">
  <label for="pwd">Repetição</label>
  <input type="number" name="repeticao" required  class="form-control" id="pwd">
</div>
<div class="form-group">
  <label for="pwd">Duração</label>
  <input type="time" name="duracao" required  class="form-control" step="10" id="pwd">
</div>
<input type="hidden" name="carga"  required class="form-control" id="usr">
    <div class="col-auto my-1">
      <button type="submit"  name="btinserir" class="btn btn-primary">Alterar</button>
    </div>


      <?php } ?>

</form>
</div>

</body>
</html>


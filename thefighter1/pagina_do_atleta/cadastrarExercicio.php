<!DOCTYPE html>
<html>
<head>
  <title></title>
</head>
<body>
<?php 


if(isset($_POST['btinserir'])){
    
           
             $cd_usu=$_SESSION['id_usuario'];
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
             echo "<script>alert('Exercicio cadastrado com sucesso')</script>";
      
}
}
?>
</select>
      <div class="form-group">
  <?php if(isset($_POST['f'])) {

    # code...
   ?>  

  <label for="usr">Carga:</label>
  <input type="number" name="carga"  required class="form-control" id="usr">
  <div class="form-group">
  <label for="pwd">Repetição</label>
  <input type="number" name="repeticao" required  class="form-control" id="pwd">
</div>
    <div class="col-auto my-1">
      <button type="submit"  name="btinserir" class="btn btn-primary">Inserir</button>
    </div>

<?php
}
elseif (isset($_POST['a'])) {

?>

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
<?php } 
elseif (isset($_POST['r'])) {

?>

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
      <button type="submit"  name="btinserir" class="btn btn-primary">Inserir</button>
    </div>
<?php
}
?>
</div>
  </div>
</form>

</body>
</html>
<form>

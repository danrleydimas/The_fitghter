
<!DOCTYPE html>
<html>
<head>
	<title>Cadastrar lutas</title>
<!--<script>
var ola = 1;
var vetor = [];
i=0;  

 function Limite(a){
  if(vetor[1]){
     vetor[0]=0;     
    }
    if(a){
      vetor.push(a);
     
    }
    if(vetor[0] == vetor[1]){
      i=0;
      return alert("ops");
    }
    i = i + 1;
   
    return  document.getElementById('acao').value = i;
   
  }
  function Mostra_qt_radio( input ){
var qt_radio = input.value;
qt_radio*10;
input.value = qt_radio;
  }

</script>
-->


<script type="text/javascript">


</script>
 


</head>
<body>
<?php 
include_once('cabecalho.php');
include_once('../conexao.php');
include_once('../categoria.Dao.php');
include_once('../luta.Dao.php');

date_default_timezone_set('America/sao_paulo');
   $hora_atual = date ('H:i:s');
   $data_atual = date ("Y-m-d");
?>


<div class="container" style="float: left;">
     <div class="row">
       <div class="col-lg-8">
       <h1 class="h1">Cadastrar lutas</h1>

      </div>
      </div>

      <br>
      <br>
      <form  method="POST" name="forma" id="forma2" action="cadastrarlutas.php?foo=oi">
      <div class="row">
      <div class="col-lg-8">
        <h2 class="h2"></h2>
        </div>
      </div>
      <br>
      <div class="row">
     
     <span class="col-md-2">
     <label for="categoria">
       Data:
     </label>


       <select name="data" id="data" class="form-control" onchange="peganumber()">
       <?php 
          $cx1 = new Conexao();
          $dao1 = new LutaDao($cx1);

          $retorno1=$dao1->mandaAlerta();
            
               

        
          while($registro1=$retorno1->fetch_array()){  

       ?>
         <option   value="<?php echo $registro1['cd_luta'] ?>"> <?php echo $registro1['dt_luta']; ?></option>
         <?php  } ?>
       </select>





     </span>
     <span class="col-md-2">
     <label for="categoria">
       Hora:
     </label>

       <select name="categoria" class="form-control">
       <?php 


if (isset($_POST['data'])){
  $cd_evento = $_POST['data'];
            
          $cx = new Conexao();
          $dao = new LutaDao($cx);

          

          $retorno=$dao->selecionaEvento($cd_evento);
           

          while($registro=$retorno->fetch_array()){  

       ?>
   
         <option value="<?php echo $registro['cd_hr_luta'] ?>"><?php echo $registro['hr_luta']; ?></option>
         <?php  }}?>
       </select>

     </span>
     <span class="col-md-2">
      
     <label for="categoria">
       Categoria de peso:
     </label>

       <select name="categoria" class="form-control">
       <?php 
          $cx = new Conexao();
          $dao = new CategoriaDao($cx);

          $retorno=$dao->selecionaCategoria();
          
          while($registro=$retorno->fetch_array()) {  

       ?>
         <option value="<?php echo $registro['cd_categoria'] ?>"><?php echo $registro['ds_categoria'] ; ?></option>
         <?php  }?>
       </select>

     </span>
     
     <div class="col-sm-2">
       <button type="submit" class='btn-info  form-control'  name="enter">Cadastrar</button>

     </div>

     </div>
 
     <br>
     <br>
    
   
<hr class="bg-info">
     

</form>
     
      </div>
      <script>
       var e = document.getElementById("data");
var itemSelecionado = e.options[e.selectedIndex].value;
if(itemSelecionado > 1) {
  
  
  
}

function peganumber(){
   document.getElementById("forma2").submit();
 
 
}
 
  </script>

      
 
    

</body>
</html>
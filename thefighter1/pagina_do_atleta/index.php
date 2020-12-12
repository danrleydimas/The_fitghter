
<?php
     

include_once("..\conexao.php");
include_once("..\Lutador.class.php");
include_once("..\Modalidade.class.php");
include_once("..\Exercicio.class.php");
include_once("..\Exercicio.Dao.php");
include_once("..\Capacidadefisica.class.php");
include_once("..\Capacidade.Dao.php");
include_once("..\Modalidade.Dao.php");
include_once("..\Nivel.class.php");
include_once("..\Nivel.Dao.php");
include_once("..\Rank.class.php");
include_once("..\Rank.Dao.php");
include_once("..\luta.Dao.php");

session_start();
if (!isset($_SESSION['logado'])) {
        header('Location:..\index.php');
          # code...
        } 

$id_usu = $_SESSION['id_usuario'];
$catego = $_SESSION['cd_categoria'];

      // var_export($id_usu);



$cx = new Conexao();
$dao = new LutaDao($cx);
$verificado=$dao->verificaAlerta($id_usu);

if($verificado == 0){
  
$cx = new Conexao();
$dao = new LutaDao($cx);
$retorno2=$dao->verificalutadorLuta($catego);
    

    while($registro2=$retorno2->fetch_array()){
      $cd_luta=$registro2["cd_luta"];
      $data=$registro2["dt_luta"];
      $horario_min=$registro2["hr_minimo"];
      $horaio_max=$registro2["hr_maxima"];
    }
     

      if(isset($cd_luta)){
          $b=1;
          $_SESSION['cd_luta']=$cd_luta;
      }
     
     else{  
      
  
        $cx2 = new Conexao();
        $dao2 = new LutaDao($cx2);
        $retorno=$dao2->mandaAlerta($id_usu);
        if (isset($retorno)){
          # code...
        
          while($registro=$retorno->fetch_array()){
            $cd_luta=$registro["cd_luta"];
            $data=$registro["dt_luta"];
            $horario_min=$registro["hr_minimo"];
            $horaio_max=$registro["hr_maxima"];
          }
          if(isset($cd_luta)){
            $b=1;
          $_SESSION['cd_luta']=$cd_luta;
            
          }
        }
      }
}


 
?>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>pro</title>

    <!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" href="bootstrap.min.css" >
    <!-- Our Custom CSS -->
    <link rel="stylesheet" href="style.css">

    <!-- Font Awesome JS -->
    <script defer src="js/solid.js" ></script>
    <script defer src="js/fontawesome.js"></script>
    
</head>

<body>
    <div class="wrapper">
        <!-- Sidebar  -->

        <nav id="sidebar">
            <!-- aqui vai a foto do perfil-->
            <div class="sidebar-header">        
                <figure class="figure">
                  <img src=".../400x300" class="figure-img img-fluid rounded" alt="kk">
                  <figcaption class="figure-caption"><?php echo $_SESSION["nome_usuario"]; ?></figcaption>
                </figure>
                <br>
                <button type="submit" class="btn btn-primary my-5 bg-dark">Alterar</button>
            </div>
            <!-- aqui acaba a foto do perfil-->
            <ul class="list-unstyled components"> 
                <li class="active">
                    <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Perfil</a>
                    <ul class="collapse list-unstyled" id="homeSubmenu">
                        <li>
                            <a href="#">Equipe</a>
                        </li>
                        <li>
                            <a href="#">Treinador</a>
                        </li>
                        <li>
                            <a href="#">Academia</a>
                        </li>
                    </ul>
                </li>
                <!--
                <li>
                    <a href="#">About</a>
                </li>
                -->
                <!--
                <li>
                    <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Pages</a>
                    <ul class="collapse list-unstyled" id="pageSubmenu">
                        <li>
                            <a href="#">Page 1</a>
                        </li>
                        <li>
                            <a href="#">Page 2</a>
                        </li>
                        <li>
                            <a href="#">Page 3</a>
                        </li>
                    </ul>
                </li>
                --> 
                <li>
                    <a href="#">Lutas</a>
                </li>
              

            <ul class="list-unstyled CTAs">
                <!--
                <li>
                    <a href="#" class="download">Apostar</a>
                </li>
                -->
                <button type="submit" class="btn btn-primary my-5 bg-dark ">Sair</button>
            </ul>
        </nav>

        <!-- Page Content  -->

        <div id="content">


            <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                <div class="container-fluid">

                    <button type="button" id="sidebarCollapse" class="btn btn-info">
                        <i class="fas fa-align-left"></i>
                        <span>Menu</span>
                    </button>

                    <form class="form-inline my-2 my-lg-0">
                          <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                          <button class="btn btn-info " type="submit">Pesquisar</button>
                    </form>

                </div>
            </nav>


                <!-- Rank Geral -->
<div class="container">
   <div class="row">
      <div   class="col-lg-8 col-lg-offset-2">
<!-- ALERTA -->                                                      <!-- ALERTA -->
<form name="formularioalert"  method="POST" action="teste-termo.php">
<input type="txt" id="demo" hidden name="oi" value="header('location:pagina_do_atleta/teste-termo');">


</form>
<script>

var title = "<?php print $b; ?>";
var horario_min =  "<?php print $horario_min; ?>";
var horaio_max = "<?php print $horaio_max ?>"
var data =  "<?php print $data; ?>";
var msg = 'VOCÊ DESEJA LUTAR NESSA DATA: ';
var msg1 = ' E NESSE HORÁRIO: ';
var ate = 'ate';

function myFunction() {
    if (confirm(msg+data+msg1+horario_min+ate+horaio_max)) {
        
         document.formularioalert.submit(); 
  
    } else {
        txt = 0;
    }
}
if(title == 1){
  myFunction();
}
</script>

                                    <h1 class="h1">O Hall da glória é para poucos e  só existe um primeiro lugar.
                                        </h1>
                                        <header>
                                            <h2 class="h2" style="opacity: 0.4;">Ranking Geral</h2>
                                        </header> 
                                        </div>
                                <div style="overflow: auto; height: 240px;" class="col-lg-8 col-lg-offset-2">
                                 
                                          
                                       
                                        <br>
                                        <table class="table table-hover table-dark" id="home">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">NICK</th>
                  <th scope="col">PONTUAÇÃO</th>
                 
                </tr>
              </thead>
              <tbody>
                <?php 
  $usu = $_SESSION["id_usuario"];
  $cx = new Conexao();
  $sa = new RankDao($cx);
  $resultado=$sa->SelecionaRank();

 
$i=1;
while ($registro = $resultado->fetch_array() ) {
  
  ?>
     
   <tr>
      <th scope="row"><?php echo ($i); ?></th>
      <td><?php echo $registro["nick"];?></td>
      <td><?php echo $registro["pt_total"];?></td>
      

     
    </tr>
   <?php $i++;}?>
              </tbody>
            </table>
                                        
          <br>
                                        <hr>
                  
                                </div>
                            </div>
                  <!-- Status Lutador -->
                         <div class="row">
                                <div id="" style="overflow: auto; height: 140px;" class="col-lg-8 col-lg-offset-2">
                                <h2 class="h2" style="opacity: 0.5">Seus status</h2>
                            </div>
                            </div>   
                             <div class="row">
                              <div class="col-lg-8 col-lg-offset-2">
                 <h2 class="h2" style="opacity: 0.2;">Agilidade</h2>
               
             </div>
                                <div id="" class="col-lg-8 col-lg-offset-2">
                            
                                      
                                 <table class="table table-hover table-dark">
                                 
                                        
                                      <thead>
                                        <tr>
                                          <th scope="col">#</th>
                                          <th scope="col">Exercicio</th>
                                          <th scope="col">Duração</th>
          
                                        </tr>
                                      </thead>
                                       <?php 
  $usu = $_SESSION["id_usuario"];
  $cx = new Conexao();
  $sa = new CapacidadeDao($cx);
  $resultado=$sa->SelecionaCapacidadeAgilidade($usu,'agilidade');


$i=1;
while ($registro = $resultado->fetch_array() ) {
  
  ?>
     
   <tr>
      <th scope="row"><?php echo ($i); ?></th>
      <td><?php echo $registro["ds_exercicio"];?></td>
      <td><?php echo $registro["qt_duracao"];?></td>
     
     
    </tr>
   <?php $i++;}?>
                                </table>
                                </div>
                                </div>

              

                            <div class="row">
                            <div class="col-lg-8 col-lg-offset-2" > 
                             <h2 class="h2" style="opacity: 0.2; ">força</h2>
 
                            </div>

                                <div id="" style="overflow: auto; height: 140px;" class="col-lg-8 col-lg-offset-2">
                            
                                      
                                 <table  class="table table-hover table-dark">
                                  
                                        
                                  <thead>
                                    <tr>
                                      <th scope="col">#</th>
                                      <th scope="col">Exercicio</th>
                                      <th scope="col">Carga</th>
                                      <th scope="col">Repetições</th>
                                    </tr>
                                    </thead>

                                     <?php 
  $usu = $_SESSION["id_usuario"];
  $cx = new Conexao();
  $sa = new CapacidadeDao($cx);
  $resultado=$sa->SelecionaCapacidadeAgilidade($usu,'forca');


$i=1;
while ($registro = $resultado->fetch_array() ) {
  
  ?>
     
   <tr>
      <th scope="row"><?php echo ($i); ?></th>
      <td><?php echo $registro["ds_exercicio"];?></td>
       <td><?php echo $registro["qt_carga"];?></td>  
     
      <td><?php echo $registro["nr_repeticao"];?></td>
     
    </tr>
   <?php $i++;}?>
                                  
                                </table>
                                </div>
                                </div>



             <div class="row">
             <div class="col-lg-8 col-lg-offset-2" " >
                 <h2 class="h2" style="opacity: 0.2;">resistência</h2>
               
             </div>

                            <div id=""  style="overflow: auto; height: 240px;" class="col-lg-8 col-lg-offset-2">
                    
                              
                             <table class="table table-hover table-dark">    
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Exercicio</th>
                                            <th scope="col">Duração</th>
                                            <th scope="col">Repetições</th>
                                        </tr>

                                    </thead>
                                    <?php 
  $usu = $_SESSION["id_usuario"];
  $cx = new Conexao();
  $sa = new CapacidadeDao($cx);
  $resultado=$sa->SelecionaCapacidadeAgilidade($usu,'resistencia');


$i=1;
while ($registro = $resultado->fetch_array() ) {
  
  ?>
     
   <tr>
      <th scope="row"><?php echo ($i); ?></th>
      <td><?php echo $registro["ds_exercicio"];?></td>
      <td><?php echo $registro["qt_duracao"];?></td>
      <td><?php echo $registro["nr_repeticao"];?></td>
      
     
    </tr>
   <?php $i++;}?>
    
                            </table>


                <br>
                <br>
                <br>
                <br>
                </div>
                </div>
            <div class="row">

                    <div id="exercicio" class="col-lg-8 col-lg-offset-1">
                    <h2 class="h2" style="opacity: 0.5">Parametros</h2>
                </div>
                </div>


                <div class="row">

                    <div id="" class="col-md-4 col-md-offset-2">
                    <br>
                     <div class="form-row align-items-center">




  <form method="POST" action="index.php#exercicio">
 <label  >Tipos de exercicios</label>

  
<br>
<button name="f" class="btn btn-primary" >Forca</button>
<button name="a" class="btn btn-primary" >Agilidade</button>
<button name="r" class="btn btn-primary" >Resistencia</button>

    
    </form>

</div>
</div>

<div id="" class="col-md-4 col-md-offset-2">
     <div class="form-row align-items-center">
      <form method="POST" action="#exercicio">
  <div class="form-row align-items-center">
  <label for="usr">Modalidades</label>
    <select name="modalidade" class="form-control form-control-lg">
    <?php
       $sq = new Conexao();
       $Dao = new ModalidadeDao($sq);

       $resultado = $Dao->SelecionaModalidade();

      while ($registro = $resultado->fetch_array()) {
 
      ?>
      <option value="<?php  echo $registro["cd_modalidade"];?>"><?php echo $registro["ds_modalidade"];?> 
      </option>
     <?php } ?>
  
</select>
    
    <br>
    <?php
    $cxx = new Conexao();
    $daoo = new NivelDao($cxx);
    $resultado = $daoo->SelecionaNivel();

    while ($registro = $resultado->fetch_array()) {
    ?>
        <div class="col-sm-3">    
       <label class="radio-inline">
         <input type="radio" name="optradio" required value="<?php  echo $registro["cd_nivel"];?>" ><?php echo $registro["ds_nivel"];?>
         </label>
         </div>
    <?php } ?>
     <br>
        <div class="col-md-12">
         <button type="submit" name="enter" class="btn btn-primary">Inserir</button>
        </div>
 </div>
</form>
 </div>
 </div>
 <?php
    if(isset($_POST['enter'])) {
      $cd_nivel = $_POST["optradio"];
      $cd_modalidade = $_POST["modalidade"];
      $cd_usua = $_SESSION["id_usuario"];
      $cx = new Conexao();
      $usua = new Lutador($cd_usua,"","","","","");
      $nivel = new Nivel($cd_nivel,"");
      $modalidade = new Modalidade($cd_modalidade,"");
      $dao = new ModalidadeDao($cx);
      $dao->InserirModalidade($usua,$modalidade,$nivel);

echo "<meta HTTP-EQUIV='refresh' CONTENT='0;URL=index.php'>";

     
    }
    

     ?>  
</div>



 <div class="row">
 <div id="" class="col-md-4 col-md-offset-2">
<div class="form-row align-items-center">
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
    </select>
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
      <option value="<?php echo $registro["cd_exercicio"];?>"><?php echo $registro["ds_exercicio"];?>
      </option>
       <?php }
       ?>
       </select>
        
        
        <label for="pwd">Duração</label>
        <input type="time" name="duracao" required  class="form-control" step="10" id="pwd">
        <input type="hidden" name="repeticao" required  class="form-control" id="pwd">
        <div class="col-auto my-1">
        <input type="hidden" name="carga">
        <button type="submit"  name="btinserir" class="btn btn-primary">Inserir</button>
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
      <?php } 
      ?>
      </select>
      <div class="form-group">
          <label for="pwd">Repetição</label>
          <input type="number" name="repeticao" required  class="form-control" id="pwd">
      </div>
      <div class="form-group">
          <label for="pwd">Duração</label>
          <input type="time" name="duracao" required  class="form-control" step="10" id="pwd">
      </div>
    <div class="col-auto my-1">
        <input type="hidden" name="carga"  required class="form-control" id="usr">
        <button type="submit"  name="btinserir" class="btn btn-primary">Inserir</button>
    </div>
      <?php } ?>
</form>

</div>




</div>

</div>
</div>
</div>
</div>
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
             echo "<meta HTTP-EQUIV='refresh' CONTENT='0;URL=index.php'>";
          
      
}

?>
      
  
    

    <!-- jQuery CDN - Slim version (=without AJAX) -->
    <script src="jquery-3.3.1.slim.min.js"></script>
    <!-- Popper.JS -->
    <script src="popper.min.js"></script>
    <!-- Bootstrap JS -->
    <script src="bootstrap.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function () {
            $('#sidebarCollapse').on('click', function () {
                $('#sidebar').toggleClass('active');
            });
        });
    </script>
</body>

</html>
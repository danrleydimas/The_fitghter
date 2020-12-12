<!DOCTYPE HTML>

<html>
	<head>
		<title>The Fighter</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="assets/css/main.css"/>
		

	</head>

<body class="is-preload">
	



<!-- Header -->
			<section class="main">
			<div class="container" >
			<center><h1><i>lutas</i></h1></center>
			<hr>
			<span class="col-md-2">
<input style="width: 33%;" placeholder="Pesquisa" type="text" name="valor">
			</span>
			<br>
	        <hr>
			<div class="row">
<?php 
include_once ("conexao.php");
include_once ("Luta.Dao.php");
  
if(isset($_GET['codigo'])){

	 $hr=$_GET['codigo'];
	 $cx = new Conexao();
	 $dao = new LutaDao($cx);
	 $retorno=$dao->pesquisaLutador2($hr);
     $registro=$retorno->fetch_array();

     $cx2 = new Conexao();
	 $dao2 = new LutaDao($cx2);
	 $retorno2=$dao2->pesquisaLutador($hr);
     $registro2=$retorno2->fetch_array();

     

if ($registro2['cd_ds_result_luta'] == 3){
	$resultado = null;
}
else{
	$resultado = $registro2['cd_ds_result_luta'];
}

?>


<?php  if($registro['cd_ds_result_luta'] == 3){?>
<label style="text-transform: uppercase;"> <?php echo $registro['nome']; ?></label>
<span>
<label style="text-transform: uppercase;"><?php echo $registro['ds_result_luta'];?></label>
</span>
<?php }
else{
?>
<br>

<span style="float:left;  text-transform: uppercase;">
<label style="text-transform: uppercase;"> <?php echo $registro['nome']; ?></label>
<label><?php echo $registro['ds_result_luta'];?></label>
</span>
<?php }?>
<span style="float: right;">
<label style="text-transform: uppercase;"><?php echo $registro2['nome']; ?> </label>
<label><sub><?php echo $resultado ?></sub></label>
</span>
<?php 
}
else{
?>					

<table class="table table-dark" id="table" >
  <thead>
    <tr>
      

      <th scope="col">Data</th>
      <th scope="col">Horario</th>
       <th scope="col">ação</th>
     

 
    </tr>
  </thead>
  <tbody>
  <?php 
  

  $cx = new Conexao();
  $dao = new LutaDao($cx);
  $retorno=$dao->exibirResultado();
  while ($registro=$retorno->fetch_array()) 
  {
  /*	$dt_luta=$registro['dt_luta'];
  	$hr_luta=$registro['hr_luta'];
    $nome=$registro['nome']; 
    $nome2=$registro['nome'];
  */
 $hr_luta=$registro['cd_hr_luta'];
 
   ?>
    <tr>
     
      <td class=""><?php printf ("%s", $registro['dt_luta']);?></td>
      
      <td><?php printf ("%s", $registro['hr_luta']);?></td>
      
        <td class="actions"><a class="btn btn-info btn-xs" style="text-decoration: none;"  href="<?php echo "lutas.php?codigo=$hr_luta";?>">Exibir</a>
    </tr>
    <?php }
 ?>
   
  </tbody>
</table>
<?php }?> 
</div>
				</div>
				
				
			</section>

			

		<!-- Footer -->
			<section id="footer">
				<!--
				<div class="container">
					<header class="major">
						<h2>Get in touch</h2>
					</header>
					<form method="post" action="#">
						<div class="row gtr-uniform">
							<div class="col-6 col-12-xsmall"><input type="text" name="name" id="name" placeholder="Name" /></div>
							<div class="col-6 col-12-xsmall"><input type="email" name="email" id="email" placeholder="Email" /></div>
							<div class="col-12"><textarea name="message" id="message" placeholder="Message" rows="4"></textarea></div>
							<div class="col-12">
								<ul class="actions special">
									<li><input type="submit" value="Send Message" class="primary" /></li>
								</ul>
							</div>
						</div>
					</form>
				</div>
			-->
				<footer>
					<ul class="icons">
						<li><a href="#" class="icon alt fa-twitter"><span class="label">Twitter</span></a></li>
						<li><a href="#" class="icon alt fa-facebook"><span class="label">Facebook</span></a></li>
						<li><a href="#" class="icon alt fa-instagram"><span class="label">Instagram</span></a></li>
						<li><a href="#" class="icon alt fa-dribbble"><span class="label">Dribbble</span></a></li>
						<li><a href="#" class="icon alt fa-envelope"><span class="label">Email</span></a></li>
					</ul>
					<ul class="copyright">
						<li>&copy; Untitled</li><li>Design: <a href="#">kakakak</a></li><li>Demo Images: <a href="#">Unsplash</a></li>
					</ul>
				</footer>
			</section>

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/jquery.scrollex.min.js"></script>
			<script src="assets/js/jquery.scrolly.min.js"></script>
			<script src="assets/js/browser.min.js"></script>
			<script src="assets/js/breakpoints.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>

	</body>
</html>
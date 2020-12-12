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
			<section class="main special">
			<div class="container col-md-6 col-12-xsmall" style="opacity: 2;">

					<ul class="actions special">
						<li><a href="#one" class="button primary scrolly">estou pronto</a></li>
					</ul>
					<br>
					

					<ul class="actions special">
						<li><a href="lutas.php" class="button primary scrolly">lutas</a></li>
					</ul>
				</div>
				
				
			</section>

			<section  class="main special">
			
				
				<div class="container" style="height: 80%; padding: 5.5em;">
				<div class="col-md-6 col-12-xsmall">
				<?php

				session_start();
				
				
				if(isset($_POST['entrar'])) {
					
					$erros = array();
					$login =addslashes($_POST['login']);
					$senha =addslashes($_POST['senha']);

					if (empty($login)or empty($senha)) {
						$erros[] = "<alert> O campo login/senha precisam ser preenchidos</alert>";

						
					}
					else{
						include_once ("conexao.php");
				        include_once ("Lutador.Dao.php");
						$con = new Conexao();
						 $validalutador = new LutadorDao($con);
						  $validalutador2 = new LutadorDao($con);
						 $reto=$validalutador->Validausuario($login,$senha);
						 $admm=$validalutador2->Validausuarioadm($login,$senha);
						 if(mysqli_num_rows($reto) == 1){
						 	$dados = mysqli_fetch_array($reto);
						 	$_SESSION['logado'] =true;
						 	$_SESSION['nome_usuario'] = $dados['nome'];
						 	$_SESSION['id_usuario'] = $dados['codigo'];
						 	$_SESSION['cd_categoria'] = $dados['cd_categoria'];
						 	header('location:pagina_do_atleta/index.php');


						 }
						  elseif(mysqli_num_rows($admm) == 1){
						  	$dados = mysqli_fetch_array($admm);
						 	$_SESSION['logado'] =true;
						 	$_SESSION['nome_usuario'] = $dados['nome'];
						 	$_SESSION['id_usuario'] = $dados['codigo'];
						 	header('location:pagina_do_admm/index.php');


						 	
						 }
						 	
						 
						 else{
						 	$erros[] = "<li> Senha ou email incorreto</li>";
						 }


					}

				}


				  ?>

				  <?php
				  if(!empty($erros)){
				  	foreach ($erros as $erro){
				  		echo $erro;
				  		
				  	
				  	}
				  }

				   ?>

	<form method="POST" action="">
	<div class="">
<label>Login:</label><input type="text" name="login" id="login"><br>
<label>Senha:</label><input type="password" name="senha" id="senha">
<br>
<br>
<br>
<input type="submit" value="ENTRAR" id="cadastrar" name="entrar">
</div>
</form>
</div>
				</div>
			</section>




		<!-- One -->
			<section id="one" class="main special">
				<div class="container">
					<span class="image fit primary"><img src="images/pic01.jpg" alt="" /></span>
					<div class="content">
						<header class="major">
							<h2>Quem Somos</h2>
						</header>
						<p>Um novo conceito em competições de Artes Marcias jamais idealizado antes.</p>
						
					</div>
					<a href="#four" class="goto-next scrolly">Next</a>
				</div>
			</section>




			<section id="four" class="main special">
				<div class="container">

		<?php

			include_once ("Lutador.class.php");
			include_once ("conexao.php");
			include_once ("Lutador.Dao.php");
		 	if (isset($_POST["btinserir"])){
          /*$codigo = $_POST["codigo"];*/
          $nome= $_POST["nome"];
          $email= $_POST["email"];
          $sobrenome = $_POST["sobrenome"];
          $senha = $_POST["senha"];
          $nick = $_POST["nick"];
           
             
          $conexao = new Conexao();
          $lutadorDao = new LutadorDao($conexao);
          $retorn=$lutadorDao->Validaemaill($email);
           if( mysqli_num_rows($retorn ) > 0){  echo ("<script>{alert(\" Usuário ja existente \")}</script>");
}
else{           	
          $r=$lutadorDao->Validaemail($email);
          
         
           if($r){
          
          $conexao = new Conexao(); 
          $lutadorDao = new LutadorDao($conexao); 
          $lutador = new Lutador(0,$nome,$email,$sobrenome,$senha,$nick);
          $lutadorDao->Inserir($lutador);
          echo ("<script>{alert(\" Usuário cadastrado com sucesso!! \")}</script>");

      
}
else{
	echo ('<script>alert("Email inválido")</script>');
}}}
        

        ?>

       
		<section id="four" class="main special">
		<div class="container">        


							<h4 style="margin-top: -20%;">Cadastre-se aqui<h4>
							<br>
							<br>
							<br>
							<br>
							<br>
							<br>
							<form method="post" action="#">
								<div class="row gtr-uniform">
									<div class="col-6 col-12-xsmall">
										<input type="text" name="nome" id="demo-name" value="" placeholder="Name" />
									</div>
									<div class="col-6 col-12-xsmall">
										<input type="text" name="sobrenome" id="demo-email" value="" placeholder="Sobre Nome" />
									</div>
										<div class="col-6 col-12-xsmall">
										<input type="text" name="nick" id="demo-email" value="" placeholder="Nick" />
									</div>
									<div class="col-6 col-12-xsmall">
										<input type="number" name="peso" id="demo-number" value="" placeholder="Peso" />
									</div>
										<div class="col-12 col-12-xsmall">
										<input type="email" name="email" id="demo-email" value="" placeholder="Email" />
									</div>
									</div>
									<br>
										<div class="col-12 col-12-xsmall">
										<input type="password" name="senha" id="demo-email" value="" placeholder="Senha" />
									</div>
									                                         <br>
										<br>
										<br>
									<div class="col-12">
										<ul class="actions">
										

											<li><input style="margin-left: 100%; margin-top: 80%;" type="submit" name="btinserir" value="Cadastrar" class="primary" /></li>
											<!--<li><input type="reset" value="Reset" /></li>-->
										</ul>
									</div>
								</div>
							</form>
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
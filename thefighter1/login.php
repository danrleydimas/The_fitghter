<!DOCTYPE HTML>

<html>
	<head>
		<title>The Fighter</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="assets/css/main.css" />
	</head>
	<body class="is-preload">

		<!-- Header -->
			<!--<section id="header">
				<header class="major">
					<h1></h1>
					<p> <a href="http://html5up.net"></a></p>
				</header>
				<div class="container">

					<ul class="actions special">
						<li><a href="#one" class="button primary scrolly">Estou Pronto</a></li>
					</ul>
				</div>
			</section>

		<!-- One -->
			<!--<section id="one" class="main special">
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



		<!-- Two -->

		<!--
			<section id="two" class="main special">
				<div class="container">
					<span class="image fit primary"><img src="images/pic02.jpg" alt="" /></span>
					<div class="content">
						<header class="major">
							<h2>Stuff I do</h2>
						</header>
						<p>Consequat sed ultricies rutrum. Sed adipiscing eu amet interdum lorem blandit vis ac commodo aliquet vulputate.</p>
						<ul class="icons-grid">
							<li>
								<span class="icon major fa-camera-retro"></span>
								<h3>Magna Etiam</h3>
							</li>
							<li>
								<span class="icon major fa-pencil"></span>
								<h3>Lorem Ipsum</h3>
							</li>
							<li>
								<span class="icon major fa-code"></span>
								<h3>Nulla Tempus</h3>
							</li>
							<li>
								<span class="icon major fa-coffee"></span>
								<h3>Sed Feugiat</h3>
							</li>
						</ul>
					</div>
					<a href="#three" class="goto-next scrolly">Next</a>
				</div>
			</section>

		<!-- Three -->
		<!--
			<section id="three" class="main special">
				<div class="container">
					<span class="image fit primary"><img src="images/pic03.jpg" alt="" /></span>
					<div class="content">
						<header class="major">
							<h2>One more thing</h2>
						</header>
						<p>Aliquam ante ac id. Adipiscing interdum lorem praesent fusce pellentesque arcu feugiat. Consequat sed ultricies rutrum. Sed adipiscing eu amet interdum lorem blandit vis ac commodo aliquet integer vulputate phasellus lorem ipsum dolor lorem magna consequat sed etiam adipiscing interdum.</p>
					</div>
					<a href="#footer" class="goto-next scrolly">Next</a>
				</div>
			</section>

			<!-- Four -->

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


							<h4 style="margin-top: -20%;">Cadastre aqui<h4>
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
										<input type="email" name="email" id="demo-email" value="" placeholder="Email" />
									</div>
									</div>
									<br>
										<div class="col-12 col-12-xsmall">
										<input type="password" name="senha" id="demo-email" value="" placeholder="Senha" />
									</div>
									<!--<div class="col-12">
										<select name="demo-category" id="demo-category">
											<option value="">- Categor -</option>
											<option value="1">Manufacturing</option>
											<option value="1">Shipping</option>
											<option value="1">Administration</option>
											<option value="1">Human Resources</option>
											<option value="1">Human Resources</option>
											<option value="1">Human Resources</option>

										</select>
									</div>-->
									<!--<div class="col-4 col-12-small">
										<input type="radio" id="demo-priority-low" name="demo-priority" checked>
										<label for="demo-priority-low">Low</label>
									</div>
									<div class="col-4 col-12-small">
										<input type="radio" id="demo-priority-normal" name="demo-priority">
										<label for="demo-priority-normal">Normal</label>
									</div>
									<div class="col-4 col-12-small">
										<input type="radio" id="demo-priority-high" name="demo-priority">
										<label for="demo-priority-high">High</label>
									</div>
									<div class="col-6 col-12-small">
										<input type="checkbox" id="demo-copy" name="demo-copy">
										<label for="demo-copy">Email me a copy</label>
									</div>
									<div class="col-6 col-12-small">
										<input type="checkbox" id="demo-human" name="demo-human" checked>
										<label for="demo-human">Not a robot</label>
									</div>
									<!--<div class="col-12">
										<textarea name="demo-message" id="demo-message" placeholder="Enter your message" rows="6"></textarea>
									</div>-->
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

		<!-- Four -->
		<!--
			<section id="four" class="main">
				<div class="container">
					<div class="content">
						<header class="major">
							<h2>Elements</h2>
						</header>
						<section>
							<h4>Text</h4>
							<p>This is <b>bold</b> and this is <strong>strong</strong>. This is <i>italic</i> and this is <em>emphasized</em>.
							This is <sup>superscript</sup> text and this is <sub>subscript</sub> text.
							This is <u>underlined</u> and this is code: <code>for (;;) { ... }</code>. Finally, <a href="#">this is a link</a>.</p>
							<hr />
							<header>
								<h4>Heading with a Subtitle</h4>
								<p>Lorem ipsum dolor sit amet nullam id egestas urna aliquam</p>
							</header>
							<p>Nunc lacinia ante nunc ac lobortis. Interdum adipiscing gravida odio porttitor sem non mi integer non faucibus ornare mi ut ante amet placerat aliquet. Volutpat eu sed ante lacinia sapien lorem accumsan varius montes viverra nibh in adipiscing blandit tempus accumsan.</p>
							<header>
								<h5>Heading with a Subtitle</h5>
								<p>Lorem ipsum dolor sit amet nullam id egestas urna aliquam</p>
							</header>
							<p>Nunc lacinia ante nunc ac lobortis. Interdum adipiscing gravida odio porttitor sem non mi integer non faucibus ornare mi ut ante amet placerat aliquet. Volutpat eu sed ante lacinia sapien lorem accumsan varius montes viverra nibh in adipiscing blandit tempus accumsan.</p>
							<hr />
							<h2>Heading Level 2</h2>
							<h3>Heading Level 3</h3>
							<h4>Heading Level 4</h4>
							<h5>Heading Level 5</h5>
							<h6>Heading Level 6</h6>
							<hr />
							<h5>Blockquote</h5>
							<blockquote>Fringilla nisl. Donec accumsan interdum nisi, quis tincidunt felis sagittis eget tempus euismod. Vestibulum ante ipsum primis in faucibus vestibulum. Blandit adipiscing eu felis iaculis volutpat ac adipiscing accumsan faucibus. Vestibulum ante ipsum primis in faucibus lorem ipsum dolor sit amet nullam adipiscing eu felis.</blockquote>
							<h5>Preformatted</h5>
							<pre><code>i = 0;

while (!deck.isInOrder()) {
  print 'Iteration ' + i;
  deck.shuffle();
  i++;
}

print 'It took ' + i + ' iterations to sort the deck.';</code></pre>
						</section>

						<section>
							<h4>Lists</h4>
							<div class="row">
								<div class="col-6 col-12-medium">
									<h5>Unordered</h5>
									<ul>
										<li>Dolor pulvinar etiam.</li>
										<li>Sagittis adipiscing.</li>
										<li>Felis enim feugiat.</li>
									</ul>
									<h5>Alternate</h5>
									<ul class="alt">
										<li>Dolor pulvinar etiam.</li>
										<li>Sagittis adipiscing.</li>
										<li>Felis enim feugiat.</li>
									</ul>
								</div>
								<div class="col-6 col-12-medium">
									<h5>Ordered</h5>
									<ol>
										<li>Dolor pulvinar etiam.</li>
										<li>Etiam vel felis viverra.</li>
										<li>Felis enim feugiat.</li>
										<li>Dolor pulvinar etiam.</li>
										<li>Etiam vel felis lorem.</li>
										<li>Felis enim et feugiat.</li>
									</ol>
									<h5>Icons</h5>
									<ul class="icons">
										<li><a href="#" class="icon fa-twitter"><span class="label">Twitter</span></a></li>
										<li><a href="#" class="icon fa-facebook"><span class="label">Facebook</span></a></li>
										<li><a href="#" class="icon fa-instagram"><span class="label">Instagram</span></a></li>
										<li><a href="#" class="icon fa-github"><span class="label">Github</span></a></li>
									</ul>
								</div>
							</div>
							<h5>Actions</h5>
							<ul class="actions">
								<li><a href="#" class="button primary">Default</a></li>
								<li><a href="#" class="button">Default</a></li>
							</ul>
							<ul class="actions small">
								<li><a href="#" class="button primary small">Small</a></li>
								<li><a href="#" class="button small">Small</a></li>
							</ul>
							<div class="row">
								<div class="col-6 col-12-small">
									<ul class="actions stacked">
										<li><a href="#" class="button primary">Default</a></li>
										<li><a href="#" class="button">Default</a></li>
									</ul>
								</div>
								<div class="col-6 col-12-small">
									<ul class="actions stacked">
										<li><a href="#" class="button primary small">Small</a></li>
										<li><a href="#" class="button small">Small</a></li>
									</ul>
								</div>
								<div class="col-6 col-12-small">
									<ul class="actions stacked">
										<li><a href="#" class="button primary fit">Default</a></li>
										<li><a href="#" class="button fit">Default</a></li>
									</ul>
								</div>
								<div class="col-6 col-12-small">
									<ul class="actions stacked">
										<li><a href="#" class="button primary small fit">Small</a></li>
										<li><a href="#" class="button small fit">Small</a></li>
									</ul>
								</div>
							</div>
						</section>

						<section>
							<h4>Table</h4>
							<h5>Default</h5>
							<div class="table-wrapper">
								<table>
									<thead>
										<tr>
											<th>Name</th>
											<th>Description</th>
											<th>Price</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td>Item One</td>
											<td>Ante turpis integer aliquet porttitor.</td>
											<td>29.99</td>
										</tr>
										<tr>
											<td>Item Two</td>
											<td>Vis ac commodo adipiscing arcu aliquet.</td>
											<td>19.99</td>
										</tr>
										<tr>
											<td>Item Three</td>
											<td> Morbi faucibus arcu accumsan lorem.</td>
											<td>29.99</td>
										</tr>
										<tr>
											<td>Item Four</td>
											<td>Vitae integer tempus condimentum.</td>
											<td>19.99</td>
										</tr>
										<tr>
											<td>Item Five</td>
											<td>Ante turpis integer aliquet porttitor.</td>
											<td>29.99</td>
										</tr>
									</tbody>
									<tfoot>
										<tr>
											<td colspan="2"></td>
											<td>100.00</td>
										</tr>
									</tfoot>
								</table>
							</div>

							<h5>Alternate</h5>
							<div class="table-wrapper">
								<table class="alt">
									<thead>
										<tr>
											<th>Name</th>
											<th>Description</th>
											<th>Price</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td>Item One</td>
											<td>Ante turpis integer aliquet porttitor.</td>
											<td>29.99</td>
										</tr>
										<tr>
											<td>Item Two</td>
											<td>Vis ac commodo adipiscing arcu aliquet.</td>
											<td>19.99</td>
										</tr>
										<tr>
											<td>Item Three</td>
											<td> Morbi faucibus arcu accumsan lorem.</td>
											<td>29.99</td>
										</tr>
										<tr>
											<td>Item Four</td>
											<td>Vitae integer tempus condimentum.</td>
											<td>19.99</td>
										</tr>
										<tr>
											<td>Item Five</td>
											<td>Ante turpis integer aliquet porttitor.</td>
											<td>29.99</td>
										</tr>
									</tbody>
									<tfoot>
										<tr>
											<td colspan="2"></td>
											<td>100.00</td>
										</tr>
									</tfoot>
								</table>
							</div>
						</section>

						<section>
							<h4>Buttons</h4>
							<ul class="actions">
								<li><a href="#" class="button primary">Primary</a></li>
								<li><a href="#" class="button">Default</a></li>
							</ul>
							<ul class="actions">
								<li><a href="#" class="button">Default</a></li>
								<li><a href="#" class="button small">Small</a></li>
							</ul>
							<ul class="actions fit">
								<li><a href="#" class="button primary fit">Fit</a></li>
								<li><a href="#" class="button fit">Fit</a></li>
							</ul>
							<ul class="actions fit small">
								<li><a href="#" class="button primary fit small">Fit + Small</a></li>
								<li><a href="#" class="button fit small">Fit + Small</a></li>
							</ul>
							<ul class="actions">
								<li><a href="#" class="button primary icon fa-download">Icon</a></li>
								<li><a href="#" class="button icon fa-download">Icon</a></li>
							</ul>
							<ul class="actions">
								<li><span class="button primary disabled">Disabled</span></li>
								<li><span class="button disabled">Disabled</span></li>
							</ul>
						</section>

						<section>
							<h4>Form</h4>
							<form method="post" action="#">
								<div class="row gtr-uniform">
									<div class="col-6 col-12-xsmall">
										<input type="text" name="demo-name" id="demo-name" value="" placeholder="Name" />
									</div>
									<div class="col-6 col-12-xsmall">
										<input type="email" name="demo-email" id="demo-email" value="" placeholder="Email" />
									</div>
									<div class="col-12">
										<select name="demo-category" id="demo-category">
											<option value="">- Category -</option>
											<option value="1">Manufacturing</option>
											<option value="1">Shipping</option>
											<option value="1">Administration</option>
											<option value="1">Human Resources</option>
										</select>
									</div>
									<div class="col-4 col-12-small">
										<input type="radio" id="demo-priority-low" name="demo-priority" checked>
										<label for="demo-priority-low">Low</label>
									</div>
									<div class="col-4 col-12-small">
										<input type="radio" id="demo-priority-normal" name="demo-priority">
										<label for="demo-priority-normal">Normal</label>
									</div>
									<div class="col-4 col-12-small">
										<input type="radio" id="demo-priority-high" name="demo-priority">
										<label for="demo-priority-high">High</label>
									</div>
									<div class="col-6 col-12-small">
										<input type="checkbox" id="demo-copy" name="demo-copy">
										<label for="demo-copy">Email me a copy</label>
									</div>
									<div class="col-6 col-12-small">
										<input type="checkbox" id="demo-human" name="demo-human" checked>
										<label for="demo-human">Not a robot</label>
									</div>
									<div class="col-12">
										<textarea name="demo-message" id="demo-message" placeholder="Enter your message" rows="6"></textarea>
									</div>
									<div class="col-12">
										<ul class="actions">
											<li><input type="submit" value="Send Message" class="primary" /></li>
											<li><input type="reset" value="Reset" /></li>
										</ul>
									</div>
								</div>
							</form>
						</section>

						<section>
							<h4>Image</h4>
							<h5>Fit</h5>
							<div class="box alt">
								<div class="row gtr-uniform gtr-50">
									<div class="col-12"><span class="image fit"><img src="images/pic04.jpg" alt="" /></span></div>
									<div class="col-4"><span class="image fit"><img src="images/pic04.jpg" alt="" /></span></div>
									<div class="col-4"><span class="image fit"><img src="images/pic04.jpg" alt="" /></span></div>
									<div class="col-4"><span class="image fit"><img src="images/pic04.jpg" alt="" /></span></div>
									<div class="col-4"><span class="image fit"><img src="images/pic04.jpg" alt="" /></span></div>
									<div class="col-4"><span class="image fit"><img src="images/pic04.jpg" alt="" /></span></div>
									<div class="col-4"><span class="image fit"><img src="images/pic04.jpg" alt="" /></span></div>
									<div class="col-4"><span class="image fit"><img src="images/pic04.jpg" alt="" /></span></div>
									<div class="col-4"><span class="image fit"><img src="images/pic04.jpg" alt="" /></span></div>
									<div class="col-4"><span class="image fit"><img src="images/pic04.jpg" alt="" /></span></div>
								</div>
							</div>
							<h5>Left &amp; Right</h5>
							<p><span class="image left"><img src="images/pic05.jpg" alt="" /></span>Fringilla nisl. Donec accumsan interdum nisi, quis tincidunt felis sagittis eget. tempus euismod. Vestibulum ante ipsum primis in faucibus vestibulum. Blandit adipiscing eu felis iaculis volutpat ac adipiscing accumsan eu faucibus. Integer ac pellentesque praesent tincidunt felis sagittis eget. tempus euismod. Vestibulum ante ipsum primis in faucibus vestibulum. Blandit adipiscing eu felis iaculis volutpat ac adipiscing accumsan eu faucibus. Integer ac pellentesque praesent. Donec accumsan interdum nisi, quis tincidunt felis sagittis eget. tempus euismod. Vestibulum ante ipsum primis in faucibus vestibulum. Blandit adipiscing eu felis iaculis volutpat ac adipiscing accumsan eu faucibus. Integer ac pellentesque praesent tincidunt felis sagittis eget. tempus euismod. Vestibulum ante ipsum primis in faucibus vestibulum. Blandit adipiscing eu felis iaculis volutpat ac adipiscing accumsan eu faucibus. Integer ac pellentesque praesent.</p>
							<p><span class="image right"><img src="images/pic05.jpg" alt="" /></span>Fringilla nisl. Donec accumsan interdum nisi, quis tincidunt felis sagittis eget. tempus euismod. Vestibulum ante ipsum primis in faucibus vestibulum. Blandit adipiscing eu felis iaculis volutpat ac adipiscing accumsan eu faucibus. Integer ac pellentesque praesent tincidunt felis sagittis eget. tempus euismod. Vestibulum ante ipsum primis in faucibus vestibulum. Blandit adipiscing eu felis iaculis volutpat ac adipiscing accumsan eu faucibus. Integer ac pellentesque praesent. Donec accumsan interdum nisi, quis tincidunt felis sagittis eget. tempus euismod. Vestibulum ante ipsum primis in faucibus vestibulum. Blandit adipiscing eu felis iaculis volutpat ac adipiscing accumsan eu faucibus. Integer ac pellentesque praesent tincidunt felis sagittis eget. tempus euismod. Vestibulum ante ipsum primis in faucibus vestibulum. Blandit adipiscing eu felis iaculis volutpat ac adipiscing accumsan eu faucibus. Integer ac pellentesque praesent.</p>
						</section>

					</div>
					<a href="#footer" class="goto-next scrolly">Next</a>
				</div>
			</section>
		-->

		<!-- Footer -->
			<section id="footer">
				<!--<div class="container">
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
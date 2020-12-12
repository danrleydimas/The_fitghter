
<?php
include_once("conexao.php");
session_start();
if (!isset( $_SESSION['logado'])) {
				header('Location:index.php');
					# code...
				} 
?>

<!DOCTYPE html>
<html lang="pt-br">
<meta charset="utf-8">
<head>
	<title>pagina meu ovo</title>
</head>
<body>
<h1>olá Usuário  <?php echo $_SESSION['id_usuario'];?></h1>
<a href="logout.php" >sair</a>
</body>
</html>
<!DOCTYPE html>
<html lang="pt-br">
<?php 
include_once("../conexao.php");
include_once("../luta.Dao.php");
session_start();


$id_usu = $_SESSION['id_usuario'];
       
 $cd_luta = $_SESSION['cd_luta'];
//var_dump($cd_luta);

//var_dump($id_usu);
if(isset($_POST['inserir'])){
	
	

$cx2 = new Conexao();
$dao2 = new LutaDao($cx2);
$dao2->cadastrarLuta($cd_luta,$id_usu);

    $cx1 = new Conexao();
    $dao1 = new LutaDao($cx1);
    $dao1->deletaLuta($cd_luta);
    echo "<meta HTTP-EQUIV='refresh' CONTENT='0;URL=index.php'>";

}

 ?>
<head>
<meta charset="utf-8">
	<title></title>
</head>
<body>

<H1>VOCÊ CONCORDA COM OS NOSSOS TERMOS DE LUTA, E ESTÁ DISPOSTO A APANHAR BASTANTE, SEM DIREITO A MERTHIOLATE?</H1>
<H2>CLICA AQUI PARA CONFIRMAR</H2>


<form method="POST" action="teste-termo.php">
<input type="submit" name="inserir">

	
</form>


</body>
</html>
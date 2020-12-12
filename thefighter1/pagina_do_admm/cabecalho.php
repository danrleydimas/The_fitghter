
<?php
session_start();
if (!isset($_SESSION['logado'])) {
        header('Location:..\index.php');
          # code...
        } 
 
?>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>pro</title>

    <!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" href="..\pagina_do_atleta/bootstrap.min.css" >
    <!-- Our Custom CSS -->
    <link rel="stylesheet" href="..\pagina_do_atleta/style.css">

    <!-- Font Awesome JS -->
    <script defer src="js/solid.js" ></script>
    <script defer src="js/fontawesome.js"></script>
    
</head>

<body>
    <div class="wrapper">
        <!-- Sidebar  -->

        <nav id="sidebar" class="bg-dark">
            <!-- aqui vai a foto do perfil-->
            <div class="sidebar-header bg-dark">        
                <figure class="figure">
                  <img src=".../400x300" class="figure-img img-fluid rounded" alt="PERFIL">
                  <figcaption class="figure-caption"><big style="color: white;"><?php echo $_SESSION["nome_usuario"]; ?></big></figcaption>

                </figure>
                <br>
                
              
            </div>
            <!-- aqui acaba a foto do perfil-->
            <ul class="list-unstyled components"> 
                <li class="active">
                    <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Lutas</a>
                    <ul class="collapse list-unstyled" id="homeSubmenu">
                        <li>
                            <a href="#">Lutas Pendentes</a>
                        </li>
                        <li>
                            <a href="cadastrarlutas.php">Cadastrar lutas</a>
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
                          <button class="btn btn-info "  type="submit">Pesquisar</button>
                    </form>

                </div>
            </nav>


                <!-- Rank Geral -->

        


      
  
    

    <!-- jQuery CDN - Slim version (=without AJAX) -->
    <script src="..\pagina_do_atleta/jquery-3.3.1.slim.min.js"></script>
    <!-- Popper.JS -->
    <script src="..\pagina_do_atleta/popper.min.js"></script>
    <!-- Bootstrap JS -->
    <script src="..\pagina_do_atleta/bootstrap.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function () {
            $('#sidebarCollapse').on('click', function () {
                $('#sidebar').toggleClass('active');
            });
        });
    </script>
</body>

</html>
<!DOCTYPE html>
<html lang="pt-br">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Cadastro</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/business-casual.css" rel="stylesheet">

    <!-- Fonts -->
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Josefin+Slab:100,300,400,600,700,100italic,300italic,400italic,600italic,700italic" rel="stylesheet" type="text/css">
    <style type="text/css">
    body,td,th {
	font-size: 9px;
}
    </style>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div class="brand">Sistema de Avaliação Online</div>
    <div class="address-bar">Belém | Pará | Brasil</div>

    <!-- Navigation -->
    <nav class="navbar navbar-default" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <!-- navbar-brand is hidden on larger screens, but visible when the menu is collapsed -->
                <a class="navbar-brand" href="index.html">Business Casual</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="index.html">Inicio</a>
                    </li>
                    <li>
                        <a href="sobre.html">Sobre</a>
                    </li>
                    <li>
                        <a href="quemsomos.html">Quem somos</a>
                    </li>
                    <li>
                        <a href="contato.html">contato</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <div class="container">

        <div class="row">
            <div class="box">
                <div class="col-lg-12">
                    <hr>
                    <h2 class="intro-text text-center">=>
                        <strong>Cadastro</strong>
                    </h2>
                    <hr>
                </div>
<?php
			$nome           = $_POST['nome'];			
			$email          = $_POST['email'];
			$login_digitado = $_POST['login'];
			$senha          = $_POST['senha'];
			$confirma_senha = $_POST['confirma_senha'];
			$telefone       = $_POST['telefone'];
			$tipo           = $_POST['tipo'];
			
			 
    if($login_digitado == "" || $nome==""|| $email==""|| $senha==""|| $confirma_senha==""||
	   $telefone=="")
	    {
        echo"<script language='javascript' type='text/javascript'>alert('Os campos devem ser preenchidos');window.location.href='cadastro.php';</script>";
		die();
		}
	if($senha!=$confirma_senha)
	    {
		echo"<script language='javascript' type='text/javascript'>alert('As senhas não são iguais');window.location.href='cadastro.php';</script>";
		die();
		}
   else
   {
   {
   include("connection.php");
   $busca=mysql_query ("Select login From usuarios where login='$login_digitado'")
         or die ("<h1>Não foi possível realizar as busca:</h1>".mysql_error());

   while ($reg=mysql_fetch_assoc($busca))
        ($login_db= $reg["login"]);
   }
   
    if ($login_db==$login_digitado)    /*se a expressao for verdadeira, o bloco abaixo sera executado */
      {
      echo "<BR><center><h3>Infelizmente este login já existe, por favor, tente outro.</h3></center>";
      echo  "<BR><BR><center><a href=\"cadastro.php\">clique aqui para tentar
            novamente<a/><BR><BR>";

      mysql_free_result($busca);
      $login_db="";
      mysql_close($link);
      }
	  
	  else
       {
       mysql_free_result($busca);   //esvazia o resultado da busca feita na linha 33
       mysql_close($link);          //encerra a conexao com o banco de dados

       $res1= mysql_connect("local da hospedagem", "usuario", "senha")    // $res1 conecta com o banco de dados
       or die("<h1>Não foi possível fazer a conexão para à inserção de dados: </h1>".mysql_error());

       if ($res1)  // verdadeira se estiver conectada ao servidor mysql
           {
           $sql = "insert into usuarios (nome,email,login,senha,telefone,tipo)
		   VALUES ('$nome','$email','$login','$senha','$telefone','$tipo')";
           $res2 = mysql_db_query("nome do banco", $sql, $res1); //atribui a $res2 a abertura do banco de dados, informa qual BD esta sendo aberto, informa a conexao com o servidor, sendo $sql informado a tabela e a sequencia a ser usada
           }

       if ($res2)
          {
          echo "<BR>";
          echo "<h2>Os adados foram inseridos no cadastro com sucesso !</h2>";
          echo "<center><a href=\"entrar.php\">Clique aqui para ir para a tela de login</a>";
          echo "<BR><BR>";
          }

      else
          {
              echo ("<BR><BR><h1>Erro de conexão, não foi possível inserir dados cadastrais</h1>".mysql_error());
              echo "<BR><BR><center><a href=\"index.html\">Clique aqui para voltar a tela de entrada</a>";
          }
       }
   }  
               
              
		?>
 </div>
                <div class="clearfix"></div>
            </div>
        </div>


       

    </div>
    <!-- /.container -->

    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <p>Desenvolvido por Eduardo e Cristiano &copy; 2014</p>
                </div>
            </div>
        </div>
    </footer>

    <!-- jQuery Version 1.11.0 -->
    <script src="js/jquery-1.11.0.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>

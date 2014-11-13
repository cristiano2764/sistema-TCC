''	<hr />
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>
<?
     $login_digitado=$_POST["login_digitado"];
     $senha_digitada=$_POST["senha_digitada"];

     include("connection.php");

     $busca=mysql_query ("Select login, senha, tipo from usuarios where login='$login_digitado'")
         or die ("<h1>Não foi possível realizar as buscas!</h1>".mysql_error());

while ($reg=mysql_fetch_assoc($busca))
      {
      $login_db= $reg["login"];
      $senha_db= $reg["senha"];
	  $tipo_db=  $reg["tipo"];
      }

if ($login_digitado=="" || $senha_digitada=="")
      {
      echo "<BR><BR><center><h2>Os campos login e senha não podem
           ter valores nulos</h2></center>";
      echo "<BR><center><a href=\"entrar.php\">Clique aqui para
           tentar novamente</a>";
      }

else
    {
    if($login_db==$login_digitado && $senha_db==$senha_digitada)
    {
       echo "<center><h2>Login realizado com sucesso!</center></h2>";
       if ($tipo_db==professor)
	   {
	   echo "<BR><center><a href=\"area_do_professor.php\">Clique aqui para
             acessar o sistema do professor</a>";
	   }
	   else
	   		{
	   echo "<BR><center><a href=\"area_do_aluno.php\">Clique aqui para
             acessar o sistema do aluno</a>";
			}
    }
    
    else
        {
        echo "<BR><BR><BR><BR><center><h2>O login não pode ser realizado
              <BR><BR> login inexistente ou senha incorreta</h2></center>";
        echo "<BR><BR><center><a href=\"entrar.php\">Clique aqui para tentar
              novamente</a>";
        }
    }

mysql_free_result ($busca);
mysql_close ($link);
?>
<body>
</body>
</html>

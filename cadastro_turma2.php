<html>
<head>
<title>Documento php</title>
</head>
<body>
<?

	$nome_turma = $_POST['turma'];
	
	if($nome_turma=="")
	{
	echo "<br><br><center><h2>O campo turma não pode ficar em branco!</h2></center>";
	echo "<br><center><a href=\"cadastro_turma.php\">Clique aqui
		  para tentar novamente</a>";
	}
	else
	{
        include("connection.php");
		
		$busca=mysql_query("select * from turma where nome='$nome_turma'")
		   or die ("<h1>Não foi possivel realizar a busca:</h1>".mysql_error());
			
			while ($reg=mysql_fetch_assoc($busca))
			{
			$turma_db = $reg["turma"];	
			}
			if($turma_db==$nome_turma)
			{
			echo "<center><h2>Turma existente!</h2></center>";
			echo "<br><center><a href=\"cadastro_turma.php\">Clique aqui
			      para tentar novamente</a>";
		
			mysql_free_result($busca);
			mysql_close($link);
		}
		else
		{
			mysql_free_result($busca);
			
			$busca = "insert into turma (nome) values ('$nome_turma')";
			$resultado = mysql_query($busca) or die
			("<br><br><br><br><br><br><h2><center>Não foi possivel inserir dados!</h2></center>");
		}
		
		if($resultado)
		{
			echo "<br><br><br><br><br><h1><center>Turma cadastrada com sucesso!</center></h1>";
			echo "<br><center><a href=\"area_do_professor.php\">Clique aqui
			      para voltar ao inicio</a>";
		}
	}
?>
</body>
</html>

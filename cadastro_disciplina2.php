<html>
<head>
<title>Documento php</title>
</head>
<body>
<?

	$nome_disciplina = $_POST['disciplina'];
	
	if($nome_disciplina=="")
	{
	echo "<br><br><center><h2>O campo disciplina não pode ficar em branco!</h2></center>";
	echo "<br><center><a href=\"cadastro_disciplina.php\">Clique aqui
		  para tentar novamente</a>";
	}
	else
	{
        include("connection.php");
		
		$busca=mysql_query("select * from disciplina where nome='$nome_disciplina'")
		   or die ("<h1>Não foi possivel realizar a busca:</h1>".mysql_error());
			
			while ($reg=mysql_fetch_assoc($busca))
			{
			$disciplina_db = $reg["nome"];	
			}
			if($disciplina_db==$nome_disciplina)
			{
			echo "<center><h2>Grupo existente!</h2></center>";
			echo "<br><center><a href=\"cadastro_disciplina.php\">Clique aqui
			      para tentar novamente</a>";
		
			mysql_free_result($busca);
			mysql_close($link);
		}
		else
		{
			mysql_free_result($busca);
			
			$busca = "insert into disciplina (nome) values ('$nome_disciplina')";
			$resultado = mysql_query($busca) or die
			("<br><br><br><br><br><br><h2><center>Não foi possivel inserir dados!</h2></center>");
		}
		
		if($resultado)
		{
			echo "<br><br><br><br><br><h1><center>Disciplina cadastrada com sucesso!</center></h1>";
			echo "<br><center><a href=\"area_do_professor.php\">Clique aqui
			      para voltar ao inicio</a>";
		}
	}
?>
</body>
</html>

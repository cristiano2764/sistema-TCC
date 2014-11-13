<html>
<head><title>document php<title>
</head>
<body>
<?php

	$link=mysql_connect("local hospedagem", "usuario", "senha")
     		 or die ("<h1>Não foi possivel conectar !!!</h1>".mysql_error());

  	$banco=mysql_select_db("bome do bd", $link)
      		 or die ("<h1>Erro ao abrir o banco de dados !!! </h1><BR><BR>".mysql_error());
?>
</body>
</html>


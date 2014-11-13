<HTML>
<HEAD>
 <TITLE>Documento PHP</TITLE>
</HEAD>
<BODY bgcolor="#d0d0d0">

<?

      $disciplina_id    = $_POST['disciplina_id'];
	  $topico           = $_POST['topico'];
      $turma_id         = $_POST['turma_id'];
	  $serie            = $_POST['serie'];
      $comando          = $_POST['comando'];
      $alternativa_a    = $_POST['alternativa_a'];
	  $alternativa_b    = $_POST['alternativa_b'];
	  $alternativa_c    = $_POST['alternativa_c'];
	  $alternativa_d    = $_POST['alternativa_d'];
	  $alternativa_e    = $_POST['alternativa_e'];
	  $resposta         = $_POST['resposta'];
	  $assinatura       = $_POST['assinatura'];

if ($disciplina_id=="" || $turma_id="")
    {
    echo "<BR><BR><center><h2>Nãofoi selecionado o grupo a que o
         produto deve participar</h2></center>" ;
    echo "<BR><center><a href=\"cad_produtos.php\">Clique aqui para
         tentar novamente</a>";
    }

else
    if ($topico=="" || $serie=="" || $comando=="" || $alternativa_a=="" || $alternativa_b==""
		|| $alternativa_c=="" || $alternativa_d=="" || $alternativa_e=="" || $resposta==""
		|| $assinatura=="")
    {
    echo "<BR><BR><center><h2>Não pode haver campo(s) em branco(s)</h2></center>" ;
    echo "<BR><center><a href=\"cadastro_questao.php\">clique aqui para
         tentar novamente</a>";
    }
    else
        {
        include("connection.php");
        
        $busca=mysql_query ("Select * From questoes where comando='$comando'")
               or die ("<h1>Não foi possível realizar a busca de
               			questão cadastrada. </h1>".mysql_error());

            while ($reg=mysql_fetch_assoc($busca))
            {
            $comando_db=$reg["comando"];
            }
            if($comando_db==$comando)
            {
            echo "<center><h2>Questão existente!</h2></center>";
            echo "<BR><center><a href=\"cadastro_questao.php\">clique aqui para
            tentar novamente</a>";
            
            mysql_free_result($busca);
            mysql_close($link);
            }
               else
                   {
                   mysql_free_result($busca);
                   $busca = "INSERT INTO questoes (disciplina_id, topico, turma_id, serie,
					comando,
				    alternativa_a, alternativa_b, alternativa_c, alternativa_d, alternativa_e,
					resposta, assinatura)
                   VALUES ('$disciplina_id,', '$topico', '$turma_id', '$serie', '$comando',
				   '$alternativa_a', '$alternativa_b', '$alternativa_c', '$alternativa_d',
					'$alternativa_e', '$resposta','$assinatura')";
                   $resultado = mysql_query($busca) or die
                   ("<BR><BR><BR><BR><BR><BR><h2><center>Não foi possível inserir dados !!!</center></h2>");
                   }
                   if ($resultado)
                   {
                   echo "<BR><BR><BR><BR><BR><h1><center>Questão cadastrada com sucesso...</center></h1>";
				   echo "<br><center><a href=\"area_do_professor.php\">Clique aqui
			      para voltar ao inicio</a>";
                   }
        }
?>
</BODY>
</HTML>

<HTML>
<HEAD>
 <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<TITLE>Cadastro grupo de produto</TITLE>
</HEAD>
<?
      $link=mysql_connect("mysql.hostinger.com.br", "u240726327_cris", "CM7947cm")
     		 or die ("<h1>Não foi possivel conectar !!!</h1>".mysql_error());

  	$banco=mysql_select_db("u240726327_sis", $link)
      		 or die ("<h1>Erro ao abrir o banco de dados !!! </h1><BR><BR>".mysql_error());
      
      $busca=mysql_query ("Select * From disciplina order by disciplina_id asc ") or die
      ("<center><BR><BR><BR><BR><b><h2>Erro ao realizar busca
      de disciplina cadastrada </h2></b></center>");
	  
	  $busca2=mysql_query ("Select * From turma order by turma_id asc ") or die
      ("<center><BR><BR><BR><BR><b><h2>Erro ao realizar busca
      de turma cadastrada </h2></b></center>");
?>
<BODY><center>
<div align="center">
  <p><strong><u>CADASTRO DE QUEST&Atilde;O</u></strong>
  <p><BR>
    N&atilde;o esque&ccedil;a de preencha todas as &aacute;reas. Voc&ecirc; n&atilde;o precisa digitar o n&uacute;mero da quest&atilde;o e nem a letra da alternativa, elas aparecer&atilde;o altomaticamente.  
  <p>IMPORTANTE: Todos os campos devem ser prenchidos!</p>
</div>

<form method="post" action="cadastro_questao2.php">
<table border="7">
   <tr>
           <td>Disciplina</td>
           <td><select name="disciplina_id" size=4>
           <?while ($reg=mysql_fetch_assoc($busca))
           {
           ?>
       <option value="<?echo $reg['disciplina_id']; ?>"><? echo $reg['nome'];?></option>
           <?
           }
           ?>
        </select></td></tr>
        
        <tr>
        <td>Tópico da disciplina</td>
        <td><input type="text" name="topico" size="50"></td>
        </tr>
        
       <tr>
           <td>Turma</td>
           <td><select name="turma_id" size=4>
           <?while ($reg=mysql_fetch_assoc($busca2))
           {
           ?>
       <option value="<?echo $reg['turma_id']; ?>"><? echo $reg['nome'];?></option>
           <?
           }
           ?>
       </select></td></tr>
       
       <tr>
           <td>S&eacute;rie</td>
           <td><select class="span2" name="serie" id="serie">
			    <option value="1_ano">1&ordm; S&eacute;rie (M&eacute;dio)</option>
			    <option value="2_ano">2&ordm; S&eacute;rie (M&eacute;dio)</option>
                <option value="3_ano">3&ordm; S&eacute;rie (M&eacute;dio)</option>
		      </select>
           </td></tr>

       <tr>
           <td>Digite o comando da quest&atilde;o</td>
           <td><textarea name="comando" cols="50" id="comando"></textarea>
      </td></tr>
        
        <tr>
           <td>Digite a Alternativa &quot;A&quot;</td>
           <td><textarea name="alternativa_a" cols="50" id="alternativa_a"></textarea>
           </td></tr>
        
        <tr>
           <td>Digite a Alternativa &quot;B&quot;</td>
           <td><textarea name="alternativa_b" cols="50" id="alternativa_b"></textarea>
           </td></tr>
        
        <tr>
           <td>Digite a Alternativa &quot;C&quot;</td>
           <td><textarea name="alternativa_c" cols="50" id="alternativa_c"></textarea>
           </td></tr>
           
       <tr>
           <td>Digite a Alternativa &quot;D&quot;</td>
           <td><textarea name="alternativa_d" cols="50" id="alternativa_d"></textarea>
      </td></tr>
           
       <tr>
           <td>Digite a Alternativa &quot;E&quot;</td>
           <td><textarea name="alternativa_e" cols="50" id="alternativa_e"></textarea>
           </td></tr>
       
       <tr>
           <td>Indique qual a alternativa correta</td>
           <td><select class="span2" name="resposta" id="resposta">
		     <option value="a">A</option>
             <option value="b">B</option>
             <option value="c">C</option>
             <option value="d">D</option>
             <option value="e">E</option>
                </select>
           </td></tr> 
        
        <tr>
        	<td>Sua assinatura</td>
            <td><input type="text" name="assinatura" size="50"></td>
            </tr>
           
<tr>
           <td colspan><center>
           <input type="reset" value="-    Limpar     -">
           &nbsp;&nbsp;&nbsp;
           <input type= "submit" value="Cadastrar Quest&atilde;o">
           </center></td></tr>
           
</table>

</center><div align="center"><a href="area_do_professor.php">voltar</a></div></BODY></HTML>
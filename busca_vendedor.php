<?php
	
	include "conexao.php";
	/*Verifica a conexão com o banco de dados*/

	$nome = $_POST["nome"];
	/*Recebe os dados do formulario*/

	if(strlen(trim($nome))==0){
		$msg_erro = "Informe o nome do Vendedor.";
		echo"<script>alert('Informe o nome do vendedor!')</script>"
		. "<meta HTTP-EQUIV='Refresh' CONTENT='0; URL=index.html'>";
	}
	/*Verifica se o campo foi preenchido*/

	$sql = ("SELECT * FROM vendedor WHERE nome = '$nome'");
	$busca = $conexao->query($sql);
	if($busca){
		while($linha = $busca->fetch_array(MYSQLI_ASSOC)) {
			/*Cria um array com os dados do vendedor*/
?>
	<table>
		<h1 align="center">Dados do vendedor</h1>
		<tr>
			<td>Identificação:| <br><?php echo  $linha['id_vendedor'];?></td>
			<br><td>Nome:| <br><?php echo $linha['nome']; ?></td>
			<td>E-mail: <br><?php echo $linha['email']; ?></td>	
			<td><?php?></td>
			<td><?php?></td>
		</tr>
	</table>

<?php	
			/*Exibe os dados do vendedor*/
		}		
	} else{
			echo "Erro SQL>" . $conexao->error;
}
	$conexao->close();
			/*Fecha a conexão ao banco*/
?>

<html>
	<body bgcolor="#6495ED"/>
	<br><br><a href="index.html">Voltar a página principal</a>
</html>
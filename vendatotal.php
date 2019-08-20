<?php
	
	include "conexao.php";
	/*Verifica a conexao ao banco*/

	$data = $_POST['data'];
	/*Recebe os dados do formulario*/

	if(strlen(trim($data))==0){
		$msg_erro = "Informe a data.";
		echo "<script>alert('Informe a data!')</script>"
		. "<meta HTTP-EQUIV='Refresh' CONTENT='0; URL=index.html'>";
	}
	/*Verifica se o campo foi preenchido*/

	$sql = ("SELECT valor FROM venda WHERE data = '$data'");
	$busca = $conexao->query($sql);
	if($busca){
		while($linha = $busca->fetch_array(MYSQLI_ASSOC)){
			/*Cria um array com os dados do vendedor*/
?>
	<table>
			<tr>
				<td>Valor:| <br>R$<?php echo $linha['valor']; ?></td>
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
	<form action="envia_email.php" method="post">
		<br><br><br>Mensagem:
		<br><input type="text" name="msg" size="30" placeholder="Digite a mensagem">
		<br>Valor total das vendas:
		<br><input type="text" name="venda" size="15" placeholder="Digite a venda total do dia">
		<br><input type="submit" value="Enviar">
	</form>
	<body bgcolor="#6495ED"/>
	<br><br><a href="index.html">Voltar a página principal</a>
</html>
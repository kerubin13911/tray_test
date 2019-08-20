<?php
	include "conexao.php";
	/*Verifica a conexão com o banco de dados*/

	$iden = $_POST["iden"];
	/*Recebe os dados do formulario*/

	if(strlen(trim($iden))==0){
		$msg_erro = "Informe o vendedor.";
		echo "<script>alert('Informe os dados do vendedor!')</script>"
		. "<meta HTTP-EQUIV='Refresh' CONTENT='0; URL=index.html'>";
	}
	/*Verifica se o campo foi inserido*/

	$sql = ("SELECT * FROM vendedor WHERE id_vendedor = '$iden' ");
	$busca = $conexao->query($sql);
	if($busca){
		while($linha = $busca->fetch_array(MYSQLI_ASSOC)){
		    /*Cria um array com os dados do vendedor*/
?>
	<table>
		<h1 align="center">Dados do vendedor</h1>
		<tr>
			<td>Identificação do vendedor:| <br><?php echo  $linha['id_vendedor'];?></td>
			<br><td>Nome:| <br><?php echo $linha['nome']; ?>|</td>
			<td>E-mail: <br><?php echo $linha['email']; ?></td>	
			<td><?php?></td>
			<td><?php?></td>
		</tr>
	</table>
		<h1 align="center">Dados da venda</h1>
<?php	
			/*Exibe os dados do vendedor*/
		}		
	} else{
			echo "Erro SQL>" . $conexao->error;
}
	$conexao->close();
			/*Fecha a conexão ao banco*/
?>
<?php
	include "conexao.php";
	/*Verifica a conexão com o banco de dados*/

	$iden = $_POST["iden"];
	/*Recebe os dados do formulario*/

	if(strlen(trim($iden))==0){
		$msg_erro = "Informe o vendedor.";
		echo "$msg_erro <br>";
	}	

	$sql = ("SELECT valor, comissao, data FROM venda WHERE id_vendedor = '$iden'");
	$busc = $conexao->query($sql);
	if($busc){
		while($row = $busc->fetch_array(MYSQLI_ASSOC)){
			/*Cria um array com os dados da venda*/
?>
	<table>
		<tr>
			<td>Valor da venda:| <br>R$<?php echo $row['valor'];?></td>
			<td>Comissão do vendedor:| <br>R$<?php echo $row['comissao'];?></td>
			<td>Data da venda:| <br><?php echo date('d/m/Y',strtotime($row['data'])); ?></td>
			<td><?php?></td>
			<td><?php?></td>
		</tr>
	</table>

<?php
			/*Exibe os dados da venda*/
		}
	}else{
			echo "Erro SQL>" . $conexao->error;
}
		$conexao->close();
?>
<html>
	<body bgcolor="#6495ED"/>
	<br><br><a href="index.html">Voltar a página principal</a>
</html>
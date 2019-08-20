<?php

	include "conexao.php";
	/*Verifica a conexao com o banco*/

	$nome = $_POST["nome"];
	$email = $_POST["email"];
	$ok = true;
	/*Recebe os dados do formulario*/

	if(strlen(trim($nome))==0){
		echo "<script>alert('Informe os dados do vendedor!')</script>"
		. "<meta HTTP-EQUIV='Refresh' CONTENT='0; URL=index.html'>";
		$ok = false;
	}

	if(strlen(trim($email))==0){
		$ok = false;
	}

		if($ok){
	/*Verifica se os campos foram preenchidos*/

	$sql = "INSERT INTO vendedor(id_vendedor, nome, email) VALUES('null', '$nome', '$email')";
	/*Salva os dados no banco*/

	$status = $conexao->query($sql);
	if($status == 0){
		echo "Erro ao salvar os dados " . $conexao->error;
	}else if ($status == 1) {
		echo "<script>alert('Vendedor salvo com sucesso!')</script>"
		. "<meta HTTP-EQUIV='Refresh' CONTENT='0; URL=index.html'>";

	}else {
		echo "<script>alert('Falha em salvar os dados')</script>"
		. "<meta HTTP-EQUIV='Refresh' CONTENT='0; URL=index.html'>";
	}
	/*Verifica se os dados foram salvos*/
	}
		$conexao->close();
?>

<html>
	<body bgcolor="#6495ED"/>
	<br><br><a href="index.html">Voltar ao início</a>
</html>
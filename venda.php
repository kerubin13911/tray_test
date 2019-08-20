<?php
	
	include "conexao.php";
	/*Verifica a conexão ao banco*/

	$vendedor = $_POST["id_vende"];
	$data = $_POST["data"];
	$valor = $_POST["valor"];
	$div = 100;
	$mult = 8.5;
	$comissao = ($valor * $mult) / $div;
	$ok = true;
	/*Recebe os dados e efetua o calculo da comissao*/

	if(strlen(trim($vendedor))==0){
		echo "<script>alert('Informe os dados da venda!')</script>"
		. "<meta HTTP-EQUIV='Refresh' CONTENT='0; URL=index.html'>";
		$ok = false;
	}

	if(strlen(trim($data))==0){
		$ok = false;
	}

	if(strlen(trim($valor))==0){
		$ok = false;
	}

	if(strlen(trim($comissao))==0){
		$ok = false;
	}

		if($ok){
	/*Verifica se os campos foram preenchidos*/

	$sql = "INSERT INTO venda(id_venda, id_vendedor, valor, comissao, data) VALUES('null', '$vendedor', '$valor', '$comissao', '$data')";
	/*Salva os dados no banco*/

	$status = $conexao->query($sql);
	if($status == 0){
		echo "Erro ao salvar os dados " . $conexao->error;
	}else if ($status == 1) {
		echo "<script>alert('Venda salva com sucesso!')</script>"
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
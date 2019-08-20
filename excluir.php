<?php
	
	include "conexao.php";
	/*Verifica a conexão ao banco*/

	$iden = $_POST["iden"];
	$nome = $_POST["nome"];
	$email = $_POST["email"];
	$ok = true;
	/*Recebe os dados do vendedor*/

	if(strlen(trim($nome))==0){
		$msg_erro = "Informe todos os dados!";
		echo "<script>alert('Informe os dados solicitados!')</script>"
		. "<meta HTTP-EQUIV='Refresh' CONTENT='0; URL=index.html'>";
		$ok = false;
	}

	if (strlen(trim($email))==0){
		$ok = false;
	}

	if(strlen(trim($iden))==0){
		$ok = false;
	}

	if($ok){
	/*Verifica o preenchimento dos campos*/

	$sql = ("DELETE  FROM vendedor WHERE id_vendedor = $iden");
	$status = $conexao->query($sql);
	if($status ==0){
		echo "Erro ao deletar: " . $conexao->error;
	}else if ($status == 1){
		echo "<script>alert('Dados excluidos com sucesso!')</script>"
		. "<meta HTTP-EQUIV='Refresh' CONTENT='0; URL=index.html'>";
	}
} else {
			echo "<script>alert('Falha em excluir os dados!')</script>";
} 
	$conexao->close();

	/*Verifica se os dados foram salvos*/

?>

<html>
    <body bgcolor="#6495ED"/>
    <br><br><a href="index.html">Voltar a página anterior</a>
</html>
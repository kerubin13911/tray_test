<?php
	
	include "conexao.php";
	/*Verifica a conexão ao banco*/

	$nome = $_POST["nome"];
	$email = $_POST["email"];
	$iden = $_POST["iden"];
	$ok = true;
	/*Recebe os dados*/

	if(strlen(trim($nome))==0){
		$msg_erro = "Informe todos os dados!";
		echo "<script>alert('Informe todos os dados!')</script>"
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
	/*Verifica se os campos foram preenchidos*/

	$sql = ("UPDATE vendedor SET id_vendedor = '$iden', nome = '$nome', email = '$email' WHERE id_vendedor = $iden");
	/*Atualiza as informações do banco*/
		
	$status = $conexao->query($sql);
	if($status ==0){
		echo "Erro ao inserir: " . $conexao->error;
	}else if ($status == 1){
		echo "<script>alert('Dados atualizados com sucesso!')</script>"
		. "<meta HTTP-EQUIV='Refresh' CONTENT='0; URL=index.html'>";
	}
} else {
			echo "<script>alert('Falha em atualizar os dados!')</script>";
} 
	$conexao->close();

	/*Verifica se os dados foram salvos*/

?>

<html>
    <body bgcolor="#6495ED"/>
    <br><br><a href="index.html">Voltar a página inicial</a>
</html>
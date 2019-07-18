<?php
	
	//session_start($_SESSION["idSessao"]); //inicia sessao
	session_start();
	if(!isset($_SESSION["usuario"])) // se  a sessao usuario no tiver sido definida e iniciada exibe o ech se nao abre a tela principal
	{
		echo "<h1 align='center'>Favor efetuar login<h1>";
  		
  	}
  	else
  	{

?>
	<!DOCTYPE html>
		<html>
			<head>
				<?php include "cabecalho.html" ?>

			</head>
			<body>
				<?php
				
					echo "<h7>Bem vindo Usuario: ".$_SESSION["usuario"]."</h7><br>";
				

				?>

				<div>
				<br>
				<br>
				<br>
				<br>
				<br>
				<br>
					<h1 align="center"><p id="fonteIndex">Carteira WEB - Controle de Ativos.      </p></h1>	
		
				
				</div>
			</body>
	</html>
<?php
}

?>


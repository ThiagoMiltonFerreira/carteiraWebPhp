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
	<link rel="stylesheet" type="text/css" href="CSS/retirarValor.css">
</head>
<body>

	<br><h1 id="sublinhar" align="center">Retirar Valor(Protótipo).</h1>
	<div class="CentralizarCorpo">
		<form action='#' method='get'>
	  
	        		
	        		Saldo:  <input type='text' name='txtRetirarValorSaldo' placeholder="Saldo Atual." required onKeyPress = "teclaSomenteNumero()"><br><br>
		        	Retirada:  <input type='text' name='txtRetirarValorRetirada'placeholder="Valor Retirado." required onKeyPress = "teclaSomenteNumero()"><br><br>
		        	Saldo Atual:  <input type='text' name='txtRetirarValorSaldoAtual'placeholder="Saldo Atual" required onKeyPress = "teclaSomenteNumero()"><br><br>
		        
		        	<br><br><br><br>
		        	<div id="divPagto">
		        		Descrição:<br>
		        		<textarea name='txtRetirarAreaDescricao'placeholder="Descriçao da retirada." required></textarea>
		        	</div>
		        	
				<br><br>
				
				<button name='retirarValor' value ="1" id="btn-salvar">Salvar</button>
	        
	        	<button name='retirarValor' value="2" id="btn-calcular">Calcular</button>

		</form>
	</div>	
</body>
</html>
<?php
}

?>

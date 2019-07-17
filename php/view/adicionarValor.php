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

	<br><h1 id="sublinhar">Adicionar Valor(Protótipo).</h1>
	<form action='#' method='get'>
	  
	        		
	        		Saldo:  <input type='text' name='txtRetirarValorSaldo' placeholder="Saldo Atual." required onKeyPress = "teclaSomenteNumero()"><br><br>
		        	Adiciona:  <input type='text' name='txtRetirarValorRetirada'placeholder="Valor adicionar." required onKeyPress = "teclaSomenteNumero()"><br><br>
		        	Saldo Atual:  <input type='text' name='txtRetirarValorSaldoAtual'placeholder="Saldo Atual" required onKeyPress = "teclaSomenteNumero()"><br><br>
		        
		        	<br><br><br><br>
		        	<div id="divPagto">
		        		Descrição:<br>
		        		<textarea name='txtRetirarAreaDescricao'placeholder="Descriçao." required></textarea>
		        	</div>
		        	
				<br><br>
				
				<button name='retirarValor' value ="1" id="btn-salvar">Salvar</button>
	        
	        	<button name='retirarValor' value="2" id="btn-calcular">Calcular</button>

</form>
</body>
</html>
<?php
}

?>

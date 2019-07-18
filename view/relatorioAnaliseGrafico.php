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

	<br><h1 id="sublinhar">Relatorio Geral.</h1>
	<form action="ProcessaRelatorio1" method='get'>
	  
	        		
	        		<!-- Data Inicial:  <input type='date' name='txtRetirarValorSaldo' placeholder="Saldo Atual." required> -->
		        	<!-- Data Final:  <input type='date' name='txtRetirarValorRetirada'placeholder="Valor adicionar." required>
		        	Relatorio de:  <select name='qualRelatorio'>
									  <option value='1'>Compra</option>
									  <option value='2'>Venda</option>
					 -->				  

		        		<h1 id="fonteIndex">Vendas.</h1>
						<iframe src="retRelatorio" width="500px" id="iframeRelatorio">.</iframe>
						<h1 id="fonteIndex">Compras.</h1>
						<iframe src="retRelatorioCompra" width="500px" id="iframeRelatorio"></iframe>

	</form>
</body>
</html>
</html>
<?php
}

?>

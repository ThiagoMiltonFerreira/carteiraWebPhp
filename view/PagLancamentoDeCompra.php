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
	<link rel="stylesheet" type="text/css" href="CSS/lancCompra.css">
</head>
<body>
 	
    <br><h1 id="sublinhar" align="center">Lancamento de Compras.</h1>
        <div class="CentralizarCorpo">
        	<form action="../controller/lancVendas.php" method='post'>
        	    <!-- 1 Salvar |   2 Pesquisar | 3 Alterar | 4 Excluir :  <input type='text' name='txtLancVendasOpc' placeholder="0"><br><br>-->
        		Qual campo deseja alterar  colocar? <!--  <input type='text' name='qualCampoAlterar' value="10" placeholder="0">-->
        		
        		<select name='qualCampoAlterar'>
					  <option value='10'>Nao Alterar</option>
					  <option value='1'>1</option>
					  <option value='2'>2</option>
					  <option value='3'>3</option>
					  <option value='4'>4</option>
					  <option value='5'>5</option>
					  
				</select>		
        		<br><br>
        		Codigo:  <input type='text' name='txtLancVendasCodigo' placeholder="Codigo do produto." onKeyPress = "teclaSomenteNumero()">
	        	1 - Produto:  <input type='text' name='txtLancVendasProduto'placeholder="Nome do produto." >
	        	2 - Quantidade:  <input type='text' name='txtLancVendasQuantidade'placeholder="Quantidade de produto disponivel." onKeyPress = "teclaSomenteNumero()" >
	        	3 - Preco Unitario:  <input type='text' name='txtLancVendasPrecoUnitario'placeholder="Preço unitario." onKeyPress = "teclaSomenteNumero()">    	
	        	4 - Total:  <input type='text' name='txtLancVendasTotal'value="0" required onKeyPress = "teclaSomenteNumero()">
	        	<br><br><br>5 - Descricao:<br>  <textarea name='txtAreaDescricao'placeholder="Descriçao do produto ate 255 caracteres." ></textarea><br>
	        	<br>
	        	<div id="divPagto">
	        	<h1 id="sublinhar"> Pagamento:</h1>
	        	<input type='radio' name='radioPagamento' value='Dinheiro' checked="checked">Dinheiro <br>
	        	<input type='radio' name='radioPagamento' value='Debito'>Debito <br>
	        	<input type='radio' name='radioPagamento' value='Transferencia'>Transferencia<br>
	        	<input type='radio' name='radioPagamento' value='Credito'>Credito
	        	- Parcelas <input type='text' name='txtParcelas'value="0" required onKeyPress = "teclaSomenteNumero()">
	        	<br><br>
	        	Destino do Produto comprado<input type='text' name='txtDestProdutoComprado'placeholder="Qual setor ultilizara o produto?"><br>
	        	</div>
	        	
	      
	        	
        	<br><br><button name='crudLancVenda' value ="1" id="btn-salvar">Salvar</button>
        	<button name='crudLancVenda' value="2" id="btn-pesquisar">Pesquisar</button>
        	<button name='crudLancVenda' value="3" id="btn-alterar">Alterar</button>
        	<button name='crudLancVenda' value="4" id="btn-excluir">Excluir</button>
        
        	</form>
        </div>	

</body>
</html>
<?php
}

?>

<?php
	
	//session_start($_SESSION["idSessao"]); //inicia sessao
	session_start();
	if(!isset($_SESSION["usuario"])) // se  a sessao usuario no tiver sido definida e iniciada exibe o ech se nao abre a tela principal
	{
		echo "<h1 align='center'>Favor efetuar login<h1>";
  		
  	}
  	else
  	{ 	
  	
  		$dadosPesquisa="";
  		 //Se nao existir a varivel pesquisa entao cria ela 	
  		if(!isset($_SESSION["pesquisa"]))
  		{
  			$_SESSION["pesquisa"]="";
  		}
  		 //Se ja foi criada entao atribui o valor para a variavel dados pequisa,
  		 //e destroi a sessao pesquisa
  		else
  		{
  			$dadosPesquisa = $_SESSION["pesquisa"];
  			$dadosCampos = array();

  			
  			foreach ($dadosPesquisa as $key => $value) 
  			{
  				foreach ($value as $key => $value) 
  				{
  					
  					array_push($dadosCampos,$value);

  				}
  				
  			}
  			//var_dump($dadosCampos);
  		}

  		  
?>
<!DOCTYPE html>
<html>
<head>
	<?php include "cabecalho.html" ?>
</head>
<body>
 		
        	<br><h1 id="sublinhar">Lancamento de Vendas.</h1>
        	<form action="../controller/lancVendas.php" method='post'>
	
        		<br><br>
        		Codigo:  <input type='text' name='txtLancVendasCodigo' placeholder="Codigo do produto." required onKeyPress = "teclaSomenteNumero()" value="<?php
        		if(isset($dadosCampos[2]))
        		{
        			echo $dadosCampos[2];
        		}
        		else
        		{
        			echo "";
        		}
             	?>">

	        	1 - Produto:  <input type='text' name='txtLancVendasProduto'placeholder="Nome do produto." value="<?php
	        	if(isset($dadosCampos[3]))
        		{
        			echo $dadosCampos[3];
        		}
        		else
        		{
        			echo "";
        		}
             	?>">


	        	2 - Quantidade:  <input type='text' name='txtLancVendasQuantidade'placeholder="Quantidade de produto disponivel." onKeyPress = "teclaSomenteNumero()" value="<?php
	        	if(isset($dadosCampos[4]))
        		{
        			echo $dadosCampos[4];
        		}
        		else
        		{
        			echo "";
        		}
             	?>">
	        	3 - Preco Unitario:  <input type='text' name='txtLancVendasPrecoUnitario'placeholder="Preço unitario." onKeyPress = "teclaSomenteNumero()" value="<?php
	        	if(isset($dadosCampos[5]))
        		{
        			echo $dadosCampos[5];
        		}
        		else
        		{
        			echo "";
        		}
             	?>">    	
	        	4 - Total:  <input type='text' name='txtLancVendasTotal' onKeyPress = "teclaSomenteNumero()" value="<?php
	        	if(isset($dadosCampos[6]))
        		{
        			echo $dadosCampos[6];
        		}
        		else
        		{
        			echo "";
        		}
             	?>">

	        	
	        	<br><br><br>5 - Descricao:<br>  <textarea name='txtAreaDescricao'>
	        	<?php 
		        	if(isset($dadosCampos[7]))
	        		{
	        			echo $dadosCampos[7];
	        		}
	        		else
	        		{
	        			echo "";
	        		}   
	        		?>
        			
        		</textarea><br>
	        	<br>
	        	<div id="divPagto">
  	
		        	<h1 id="sublinhar"> Pagamento:</h1>
		        	<input type='radio' name='radioPagamento' required value='Dinheiro'
		        	<?php
		        		if(isset($dadosCampos[8])&&$dadosCampos[8]==="Dinheiro")
		        		{
		        			echo'checked="checked"';
		        		}

		        	?>
		        	>Dinheiro


		        	<br>


		        	<input type='radio' name='radioPagamento' required value='Debito'
		        	<?php
		        		if(isset($dadosCampos[8])&&$dadosCampos[8]==="Debito")
		        		{
		        			echo'checked="checked"';
		        		}

		        	?>
		        	>Debito 
		        	<br>


		        	<input type='radio' name='radioPagamento' required value='Transferencia'
		        	<?php
		        		if(isset($dadosCampos[8])&&$dadosCampos[8]==="Transferencia")
		        		{
		        			echo'checked="checked"';
		        		}

		        	?>
		        	>Transferencia
		        	<br>

		        	<input type='radio' name='radioPagamento' required value='Credito'
		        	<?php
		        		if(isset($dadosCampos[8])&&$dadosCampos[8]==="Credito")
		        		{
		        			echo'checked="checked"';
		        		}

		        	?>
		        	>
		        	Credito- Parcelas <input type='text' name='txtParcelas' placeholder="Parcelas." required onKeyPress = "teclaSomenteNumero()" required value="<?php
		        	if(isset($dadosCampos[9]))
	        		{
	        			echo $dadosCampos[9];
	        		}
	        		else
	        		{
	        			echo "";
	        		}
	             	?>">
		        	<br>
		        	<br>
		        	Origem do Produto vendido <input type='text' name='txtDestProdutoComprado'placeholder="Qual setor ultilizava o produto?" value="<?php
		        	if(isset($dadosCampos[10]))
	        		{
	        			echo $dadosCampos[10];
	        		}
	        		else
	        		{
	        			echo "";
	        		}
	             	?>">
	             	<br>
	        	</div>
	        	
	      
	        	
        	<br>
        	<br>
        	<button name='crudLancVenda' value ="1" id="btn-salvar">Salvar</button>
        	<button name='crudLancVenda' value="2" id="btn-pesquisar">Pesquisar</button>
        	<button name='crudLancVenda' value="3" id="btn-alterar">Alterar</button>
        	<button name='crudLancVenda' value="4" id="btn-excluir">Excluir</button>
        
        	</form>
        	

</body>
</html>
<?php
}

?>

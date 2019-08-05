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
	<link rel="stylesheet" type="text/css" href="CSS/lancVenda.css">
</head>
<body>
  <h1 id="sublinhar" align="center">Lancamento de Vendas.</h1>
  <div class="CentralizarCorpo">
    
    <form action="../controller/lancVendas.php" method='post'>
	    <div class="form-group">
	        <label for="exampleInputEmail1">Codigo:</label>
	        <input type='text' name='txtLancVendasCodigo' placeholder="Codigo do produto." required onKeyPress = "teclaSomenteNumero()" value="<?php
	        if(isset($dadosCampos[2]))
	        {
	        	echo $dadosCampos[2];
	        }
	        else
	        {
	        	echo "";
	        }
	        ?>">
	    </div> 		
	    <div class="form-group">
	        <label for="exampleInputPassword1">Produto:</label>  
	        	<input type='text' name='txtLancVendasProduto'placeholder="Nome do produto." value="<?php
	        	if(isset($dadosCampos[3]))
        		{
        			echo $dadosCampos[3];
        		}
        		else
        		{
        			echo "";
        		}
             	?>"
            >
        </div>
        <div class="form-group">	        
	        <label for="exampleInputFile">Quantidade:</label>
	        	<input type='text' name='txtLancVendasQuantidade'placeholder="Quantidade de produto disponivel." onKeyPress = "teclaSomenteNumero()" value="<?php
	        	if(isset($dadosCampos[4]))
        		{
        			echo $dadosCampos[4];
        		}
        		else
        		{
        			echo "";
        		}
             	?>"
            >
        </div>
        <div class="form-group">
	        <label for="exampleInputFile">Preco Unitario:</label>
	        <input type='text' name='txtLancVendasPrecoUnitario'placeholder="Preço unitario." onKeyPress = "teclaSomenteNumero()" value="<?php
	        if(isset($dadosCampos[5]))
        	{
        		echo $dadosCampos[5];
        	}
        	else
        	{
        		echo "";
        	}
            ?>"
           > 
        </div>   	
	    <div class="form-group">
	        <label for="exampleInputFile">Total:</label>
	        <input type='text' name='txtLancVendasTotal' onKeyPress = "teclaSomenteNumero()" value="<?php
	        if(isset($dadosCampos[6]))
        	{
        		echo $dadosCampos[6];
        	}
        	else
        	{
        		echo "";
        	}
            ?>"
           >
       		<br>
       		<br>	
	        <label for="exampleInputFile">Descricao:</label>
	        <br>
	        <textarea name='txtAreaDescricao'>
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
        			
        	</textarea>
        </div>
        <div class="Corpo">
        <div class="form-group">	
		    <h1 id="sublinhar"> Pagamento:</h1>
		    <input type='radio' name='radioPagamento' required value='Dinheiro'
		        <?php
		        if(isset($dadosCampos[8])&&$dadosCampos[8]==="Dinheiro")
		        {
		        	echo'checked="checked"';
		       	}
		        ?>
		    >
		    <label for="exampleInputFile"> Dinheiro </label>
		    <br>
		    <input type='radio' name='radioPagamento' required value='Debito'
		        <?php
		        if(isset($dadosCampos[8])&&$dadosCampos[8]==="Debito")
		        {
		        	echo'checked="checked"';
		       	}

		        ?>
		    >
		    <label for="exampleInputFile"> Debito </label>
		    <br>
		    <input type='radio' name='radioPagamento' required value='Transferencia'
		        <?php
		        if(isset($dadosCampos[8])&&$dadosCampos[8]==="Transferencia")
		        {
		        	echo'checked="checked"';
		        }

		        ?>
		    >
		    <label for="exampleInputFile">Transferencia</label>
		    <br>
		    <input type='radio' name='radioPagamento' required value='Credito'
		        <?php
		        if(isset($dadosCampos[8])&&$dadosCampos[8]==="Credito")
		        {
		        	echo'checked="checked"';
		        }

		        ?>
		    >
		    <label for="exampleInputFile">Credito- Parcelas </label><input type='text' name='txtParcelas' placeholder="Parcelas." required onKeyPress = "teclaSomenteNumero()" required value="<?php
		        if(isset($dadosCampos[9]))
	        	{
	        		echo $dadosCampos[9];
	        	}
	        	else
	        	{
	        		echo "";
	        	}
	            ?>"
	        >
	    </div>    

		     <label for="exampleInputFile">Origem do Produto vendido </label>
		     <input type='text' name='txtDestProdutoComprado'placeholder="Qual setor ultilizava o produto?" value="<?php
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
	        	
        <br>
        <br>
        <button name='crudLancVenda' class="btn btn-primary" value ="1" id="btn-salvar">
        	Salvar
        </button>
        <button name='crudLancVenda' class="btn btn-success" value="2" id="btn-pesquisar">
        	Pesquisar
    	</button>
        <button name='crudLancVenda' class="btn btn-info" value="3" id="btn-alterar">
        	Alterar
        </button>
        <button name='crudLancVenda' class="btn btn-danger" value="4" id="btn-excluir">
        	Excluir
        </button>      
    </form>
  </div>	  	
</body>
</html>
<?php
}

?>

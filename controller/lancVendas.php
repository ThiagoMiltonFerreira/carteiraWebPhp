<?php
session_start();

function __autoload($class)
{
  require_once($class.".php");
} 
require_once("../model".DIRECTORY_SEPARATOR."sqls.php");
$query = new sqls();
$getSet = new getSetLancVenda();



$host = $_SERVER['REQUEST_METHOD'];
 
		
	if(!isset($_POST['txtLancVendasCodigo'])||!isset($_POST['txtLancVendasProduto'])||!isset($_POST['txtLancVendasQuantidade']) ||!isset($_POST['txtLancVendasPrecoUnitario'])||!isset($_POST['txtLancVendasTotal'])||!isset($_POST['txtAreaDescricao'])||!isset($_POST['radioPagamento'])||!isset($_POST['txtParcelas'])||!isset($_POST['txtDestProdutoComprado']))
	{
		unset($_SESSION["usuario"]);
		header("Location: ../view/index.html");

	}
	else if ($host == 'GET')
	{	
		unset($_SESSION["usuario"]);
		header("Location: ../view/index.html");

	}
	else
	{
			$getSet->SetLancVendasCodigo($_POST['txtLancVendasCodigo']);
			$getSet->SetLancVendasProduto($_POST['txtLancVendasProduto']);
			$getSet->SetLancVendasQuantidade($_POST['txtLancVendasQuantidade']);
			$getSet->SetLancVendasPrecoUnitario($_POST['txtLancVendasPrecoUnitario']);
			$getSet->SetLancVendasTotal($_POST['txtLancVendasTotal']);
			$getSet->SetLancVendasAreaDescricao($_POST['txtAreaDescricao']);
			$getSet->SetLancVendasRadioPagamento($_POST['radioPagamento']);
			$getSet->SetLancVendasParcelas($_POST['txtParcelas']);
			$getSet->SetLancVendasDestProdutoComprado($_POST['txtDestProdutoComprado']);
	
		if($_POST['crudLancVenda'] === "1")
		{	
	
			$return = $query->InsereNoBanco("INSERT INTO bdcarteiraweb.tb_vendas (usuario,codigo, produto, quantidade, preco_unitario, total,descricao, tipo_pagamento, parcelas, dest_prod_vendido) VALUES ('".$_SESSION["usuario"]."','".$getSet->GetLancVendasCodigo()."','".$getSet->GetLancVendasProduto()."','".$getSet->GetLancVendasQuantidade()."','".$getSet->GetLancVendasPrecoUnitario()."','".$getSet->GetLancVendasTotal()."','".$getSet->GetLancVendasAreaDescricao()."','".$getSet->GetLancVendasRadioPagamento()."', '".$getSet->GetLancVendasParcelas()."','".$getSet->GetLancVendasDestProdutoComprado()."')");

			if($return==true)
			{
		
				header("Location: ../view/PagLancamentoDeVenda.php");
			}
			else
			{
				echo"Erro em Inserir (SQL) :: Tabela vendas <br> lancVendas - linha 53 !";
				//header("Location: ../view/PagDeErro.html");
			}
		}	
		if($_POST['crudLancVenda'] === "2")
		{
      	
        	$codigo = $getSet->GetLancVendasCodigo();
        	$return = $query->BuscaNoBanco("SELECT * FROM bdcarteiraweb.tb_vendas WHERE codigo = $codigo");
        	//$_SESSION["pesquisa"] ="ferreira";
        	
        	//var_dump($_SESSION["pesquisa"]);
        	if($return==true)
			{
				$_SESSION["pesquisa"] = $return;
				header("Location: ../view/PagLancamentoDeVenda.php");
			}
			else
			{
			   echo"Erro em Pesquisar (SQL) :: Tabela vendas <br> lancVendas - linha 72!";
				//header("Location: ../view/PagDeErro.html");
			}
			
		}
		if($_POST['crudLancVenda'] === "3")
		{
      	
        	$codigo 	= $getSet->GetLancVendasCodigo();
        	$produto	= $getSet->GetLancVendasProduto();
			$quantidade = $getSet->GetLancVendasQuantidade();	
			$precoUnitario = $getSet->GetLancVendasPrecoUnitario();
			$total         = $getSet->GetLancVendasTotal();
			$areaDescricao = $getSet->GetLancVendasAreaDescricao();
		    $radioPagamento= $getSet->GetLancVendasRadioPagamento();
			$parcelas 	   = $getSet->GetLancVendasParcelas();
		    $ProdutoVendido= $getSet->GetLancVendasDestProdutoComprado();

        	$return = $query->Alterar("UPDATE `bdcarteiraweb`.`tb_vendas` SET `produto` = '$produto', `quantidade` = '$quantidade', `preco_unitario` = '$precoUnitario', `total` = '$total', `descricao` = '$areaDescricao', `tipo_pagamento` = '$radioPagamento', `parcelas` = '$parcelas', `dest_prod_vendido` = '$ProdutoVendido' WHERE (`codigo` = '$codigo')");
        	//var_dump($return);
        	if($return===true)
        	{
				header("Location: ../view/PagLancamentoDeVenda.php");
			}
			else
			{
				echo"Erro em alterar (SQL) :: Tabela vendas <br> lancVendas - linha 89 !";
			}
		}
		if($_POST['crudLancVenda'] === "4")
		{
      	
        	$codigo 	= $getSet->GetLancVendasCodigo();
        	$return = $query->Excluir("DELETE FROM `bdcarteiraweb`.`tb_vendas` WHERE (`codigo` = '$codigo')");
        	//var_dump($return);
        	if($return===true)
        	{
				header("Location: ../view/PagLancamentoDeVenda.php");
			}
			else
			{
				echo"Erro em alterar (SQL) :: Tabela vendas <br> lancVendas - linha 89 !";
			}
		}		

/*

        echo $getSet->GetLancVendasCodigo()."<br>";
		echo $getSet->GetLancVendasProduto()."<br>";
		echo $getSet->GetLancVendasQuantidade()."<br>";	
		echo $getSet->GetLancVendasPrecoUnitario()."<br>";
		echo $getSet->GetLancVendasTotal()."<br>";
		echo $getSet->GetLancVendasAreaDescricao()."<br>";
		echo $getSet->GetLancVendasRadioPagamento()."<br>";
		echo $getSet->GetLancVendasParcelas()."<br>";
		echo $getSet->GetLancVendasDestProdutoComprado()."<br>";
*/		
		

 
	}





















?>
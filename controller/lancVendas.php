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
				//echo "Erro Ao Inserir no banco. Tabela vendas";
				header("Location: ../view/PagDeErro.html");
			}
		}	
		if($_POST['crudLancVenda'] === "2")
		{
      	
        	$codigo = $getSet->GetLancVendasCodigo();
        	$return = $query->BuscaNoBanco("SELECT * FROM bdcarteiraweb.tb_vendas WHERE codigo = $codigo");
        	$_SESSION["pesquisa"] ="ferreira";
        	//$_SESSION["pesquisa"] = $return;
        	//var_dump($_SESSION["pesquisa"]);
			header("Location: ../view/PagLancamentoDeVenda.php");

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
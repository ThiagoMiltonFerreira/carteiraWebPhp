<?php
session_start();

function __autoload($class)
{
  require_once($class.".php");
} 
require_once("../model".DIRECTORY_SEPARATOR."sqls.php");
$query = new sqls();

$host = $_SERVER['REQUEST_METHOD'];

$getSet = new getSetLancVenda();
$crud = new sqls(); 
		
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
<?php
class sqls extends PDO
{
	private $conn;
	public function __construct()
	{

		$this->conn = new PDO("mysql:host=localhost;dbname=bdcarteiraweb", "root", "");
	}

	public function BuscaNoBanco ($querySql)
	{
		//echo $querySql."<br>";
		$stmt = $this->conn->prepare($querySql);

		$stmt->execute();
		$results = $stmt->fetchAll(PDO::FETCH_ASSOC);
		//var_dump($results); 
		return $results;

	}
	public  function InsereNoBanco ($querySql)
	{

		//$e = "INSERT INTO bdcarteiraweb.tb_vendas (usuario,codigo, produto, quantidade, preco_unitario, total,descricao, tipo_pagamento, parcelas, dest_prod_vendido) VALUES ('thiago',1, 'Teste', 1, 10, 10, 'teste', 'Debito', 0, 'Admin')";
		$stmt = $this->conn->prepare($querySql);
		$results = $stmt->execute();
		return $results;
		//return $stmt;

	}

	public function Excluir ($querySql)
	{
		$stmt = $this->conn->prepare($querySql);
		$results = $stmt->execute();
		return $results;


	}
	public function Alterar ($querySql)
	{
		$stmt = $this->conn->prepare($querySql);
		$results = $stmt->execute();
		return $results;
		

	}


}



?>
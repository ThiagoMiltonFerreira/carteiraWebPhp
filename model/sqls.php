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
<?php
class getSetLancVenda
{
	private $txtLancVendasCodigo;
	private $txtLancVendasProduto;
	private $txtLancVendasQuantidade;
	private $txtLancVendasPrecoUnitario;
	private $txtLancVendasTotal;
	private $txtLancVendasAreaDescricao;
	private $txtLancVendasRadioPagamento;
	private $txtLancVendasParcelas;
	private $txtLancVendasDestProdutoComprado;


	public function GetLancVendasCodigo()
	{
		return $this->txtLancVendasCodigo;
	}
	public function SetLancVendasCodigo($codigo)
	{
		$this->txtLancVendasCodigo=$codigo;
	}


	public function GetLancVendasProduto()
	{
		return $this->txtLancVendasProduto;
	}
	public function SetLancVendasProduto($produto)
	{
		$this->txtLancVendasProduto=$produto;
	}



	public function GetLancVendasQuantidade()
	{
		return $this->txtLancVendasQuantidade;
	}
	public function SetLancVendasQuantidade($quantidade)
	{
		$this->txtLancVendasQuantidade=$quantidade;
	}


	public function GetLancVendasPrecoUnitario()
	{
		return $this->txtLancVendasPrecoUnitario;
	}
	public function SetLancVendasPrecoUnitario($precoUnitario)
	{
		$this->txtLancVendasPrecoUnitario=$precoUnitario;
	}


	public function GetLancVendasTotal()
	{
		return $this->txtLancVendasTotal;
	}
	public function SetLancVendasTotal($total)
	{
		$this->txtLancVendasTotal=$total;
	}


	public function GetLancVendasAreaDescricao()
	{
		return $this->txtLancVendasAreaDescricao;
	}
	public function SetLancVendasAreaDescricao($descricao)
	{
		$this->txtLancVendasAreaDescricao=$descricao;
	}


	public function GetLancVendasRadioPagamento()
	{
		return $this->txtLancVendasRadioPagamento;
	}
	public function SetLancVendasRadioPagamento($pagamento)
	{
		$this->txtLancVendasRadioPagamento=$pagamento;
	}


	public function GetLancVendasParcelas()
	{
		return $this->txtLancVendasParcelas;
	}
	public function SetLancVendasParcelas($parcela)
	{
		$this->txtLancVendasParcelas=$parcela;
	}


	public function GetLancVendasDestProdutoComprado()
	{
		return $this->txtLancVendasDestProdutoComprado;
	}
	public function SetLancVendasDestProdutoComprado($prodComprado)
	{
		$this->txtLancVendasDestProdutoComprado=$prodComprado;
	}

}

?>
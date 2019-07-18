<?php
session_start();

function __autoload($class)
{
  require_once($class.".php");
} 
require_once("../model".DIRECTORY_SEPARATOR."sqls.php");
	$query = new sqls();
	$getSetUsuario = new getSetUsuario();
	$host = $_SERVER['REQUEST_METHOD'];

	if(!isset($_POST['nome'])||!isset($_POST['senha']))
	{

		header("Location: ../view/index.html");

	}
	else if ($host == 'GET')
	{	
		header("Location: ../view/index.html");
	}
	else
	{
		$login = $_POST['nome'];
		$senha = $_POST['senha'];
	}
	$getSetUsuario->setUsuario($login);
	$getSetUsuario->setSenha($senha);

	$criptoSenha = md5($getSetUsuario->GetSenha()); //criptografa pelo metodo hash a senha digitada pelo usuario
	$usuarioAtivo =$getSetUsuario->GetUsuario();
	//$GLOBALS["usuarioAtivo"] = $getSetUsuario->GetUsuario();

	/**
	   Logica da senha e seguinte:

	     a senha salva no banco e a senha que o usuario digita no form criptografada,
	     verifica se a criptografia da senha digitada correspode a que esta no banco.

	     A senha no banco corresponde a senha digitada pelo usuario criptograda.


	**/	
	//$dadosSelect = $query->BuscaNoBanco("SELECT * FROM bdcarteiraweb.tb_usuarios");
	//$usuario2 =$getSetUsuario->GetUsuario(); 

	//$GLOBALS["usuarioLogado"] = $getSetUsuario->GetUsuario();
	
	$dadosSelect = $query->BuscaNoBanco("SELECT * FROM bdcarteiraweb.tb_usuarios WHERE nome = '$usuarioAtivo'  AND senha = '$criptoSenha'");
	

	if(empty($dadosSelect))
	{
		echo "Tabela Vazia! Verifique o seu usuario/senha. <br>";

	}
	else
	{

		$_SESSION["usuario"]=$getSetUsuario->GetUsuario(); // Cria sessao usuario armazenando o usuario atual
	
		// Usuário logado! Redireciona para a página princial do sistema
		header("Location: ../view/principal.php");
		// TUDO OK! Agora, passa os dados para a sessão e redireciona o usuário 
		//session_name($getSetUsuario->GetUsuario());
        //$_SESSION["usuarioAtual"]= $usuarioAtivo; 
        //session_name($usuarioAtivo);
    	
		
	
	
	 	
	 	/*
	 	echo "Usuario Atual: " . $getSetUsuario->getUsuario() . "\n";
	 	
		foreach ($dadosSelect as $linha)  
		{
			
				foreach ($linha as $chave => $valor) 
				{
					
					echo $chave . " - " . $valor."\n";
					
				}
		}
		*/
}




/**
//Insere
$dadosInsert = $query->InsereNoBanco("INSERT INTO bdcarteiraweb.tb_usuarios (nome,email,senha,perg_Secreta,resp_perg_secreta) VALUES(
'Edson','edsonbh@gmail.com','123','Qual Nome do seu cachorro?','meu toto')");

if ($dadosInsert===true) 
{
	echo "Dados inseridos com sucesso!";

}
else
{
	echo "Erro ao inserir dados!";
}
**/

/**
//Excluir
$dadosExcluir = $query->Excluir("DELETE FROM bdcarteiraweb.tb_usuarios WHERE id_usuarios =12");

if ($dadosExcluir===true) 
{
	echo "Dados Excluidos com sucesso!";

}
else
{
	echo "Erro ao Excluir dados!";
}
**/

/**
//Buscar
$dadosSelect = $query->BuscaNoBanco("SELECT * FROM bdcarteiraweb.tb_usuarios");
if(empty($dadosSelect))
{
	echo "Tabela Vazia! <br>";
}
else
{
//echo json_encode($dadosSelect);
//var_dump($dadosSelect);

foreach ($dadosSelect as $linha)  //do array  dadosSelect pega a linha
{
	foreach ($linha as $chave => $valor) // da linha pega chave e valor
	{

		echo $chave . " - " . $valor ."\n";



	}
	
}

}
**/


//echo "<meta HTTP-EQUIV='refresh' CONTENT='5;URL=principal.php'>"; // atualiza a pagina a cada 5 segundos

?>
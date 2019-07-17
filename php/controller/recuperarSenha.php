<?php
/**
function __autoload($class){
  require_once( $class.".php");
}
**/
require_once("../model/sqls.php");
require("envioEmail.php");


$query = new sqls();

$pergSeguranca = $_GET['perguntaSeguranca'];
$respostaSeguranca = $_GET['respostaSeguranca'];
$email = $_GET['email'];

//Busca no banco com base os dados que veio no formulario

$dadosSelect = $query->BuscaNoBanco("SELECT * FROM bdcarteiraweb.tb_usuarios WHERE perg_secreta = '$pergSeguranca' AND resp_perg_secreta = '$respostaSeguranca' AND email ='$email'");

		//verifica se o select do banco foi feito
		if(empty($dadosSelect))
		{
				echo "Dados Incorretos!. <br>";
				echo "<meta HTTP-EQUIV='refresh' CONTENT='5;URL=../view/esqueciMinhaSenha.html'>"; // atualiza a pagina a cada 5 segundos
		}
		else
		{
		    $arrayNome = array();
			foreach ($dadosSelect as $linha)  
			{
				
					foreach ($linha as $chave => $valor) 
					{
						// adiciona no array os dados do campo que veio do select 
						array_push($arrayNome,$valor); 
						
						//echo $chave . " - " . $valor."\n";


					}
			}

			$enviaEmail = new envioEmail();
			//Pega senha que esta no array(que esta no banco de dados) recriptografa.
			$criptoSenha = md5($arrayNome[3]);

			//Alteraçao de senha: A nova senha é a recriptografia da senha antiga do banco de dados.Ou seja pega a senha antiga que esta no banco e criptografa atualiza no banco e envia por email a nova senha. 
			//Atualiza no banco com a senha criptografada, pega no array do select na posicao 0 que armazana o id e altera com where 
			$query->Alterar ("UPDATE `bdcarteiraweb`.`tb_usuarios` SET `senha` = '$criptoSenha' WHERE (`id_usuario` = '$arrayNome[0]')");
			

			//Envia por email a nova senha ou seja a antiga senha criptografada que sera o novo acesso do usuario.
			$RetornoEvioDoEmail = $enviaEmail->enviarEmail($arrayNome[2],$arrayNome[1] ,"Redefiniçao de senha CARTEIRA WEB" ,"Nova Senha: " . $arrayNome[3]);
			

			if($RetornoEvioDoEmail ==="Seu email foi enviado com sucesso!" || $RetornoEvioDoEmail !="Seu email foi enviado com sucesso!")
			{
				echo $RetornoEvioDoEmail;
				echo "<meta HTTP-EQUIV='refresh' CONTENT='5;URL=../view/esqueciMinhaSenha.html'>"; // atualiza a pagina a cada 5 segundos
			}
			
			/**

			Posiçao do array - valor do banco
			$arrayNome[0]  - id;
			$arrayNome[1]  - email;
			$arrayNome[2]  - Senha;
			$arrayNome[3]  - Perg_Secreta;
			$arrayNome[4]  - Resp_perg_secreta;
			
			**/


				
				
				
			
		
		
	}		

?>
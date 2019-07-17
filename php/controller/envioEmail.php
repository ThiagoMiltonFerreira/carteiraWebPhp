<?php
// Inclui o arquivo class.phpmailer.php localizado na mesma pasta do arquivo php 

function __autoload($class){
  //ArquivosExternos/PHPMailer-master/class.phpmailer.php"
  require_once( "../ArquivosExternos".DIRECTORY_SEPARATOR."PHPMailer-master".DIRECTORY_SEPARATOR."class.".$class.".php");
}
 
class envioEmail
{ 
	public function enviarEmail($destinatario, $destinatarioNome, $assuntoDaMensagem,$conteudoDoEmail)
	{ 
		// Inicia a classe PHPMailer 
		$mail = new PHPMailer(); 
		 
		// Método de envio 
		$mail->IsSMTP(); 
		 
		// Enviar por SMTP 
		$mail->Host = "smtp.gmail.com"; 
		 
		// Você pode alterar este parametro para o endereço de SMTP do seu provedor 
		$mail->Port = 587; 
		 
		 
		// Usar autenticação SMTP (obrigatório) 
		$mail->SMTPAuth = true; 
		 
		// Usuário do servidor SMTP (endereço de email) 
		// obs: Use a mesma senha da sua conta de email 
		$mail->Username = 'thiagomilton.f@gmail.com'; 
		$mail->Password = '30081996'; 
		 
		// Configurações de compatibilidade para autenticação em TLS 
		$mail->SMTPOptions = array( 'ssl' => array( 'verify_peer' => false, 'verify_peer_name' => false, 'allow_self_signed' => true ) ); 
		 
		// Você pode habilitar esta opção caso tenha problemas. Assim pode identificar mensagens de erro. 
		//$mail->SMTPDebug = 3; 
		 
		// Define o remetente 
		// Seu e-mail 
		$mail->From = "thiagomilton.f@gmail.com"; 
		 
		// Seu nome 
		$mail->FromName = "CARTEIRA WEB - SOLICITAÇAO DE NOVA SENHA"; 
		 
		// Define o(s) destinatário(s) 
		$mail->AddAddress($destinatario, $destinatarioNome); 
		 
		// Opcional: mais de um destinatário
		// $mail->AddAddress('fernando@email.com'); 
		 
		// Opcionais: CC e BCC
		// $mail->AddCC('joana@provedor.com', 'Joana'); 
		// $mail->AddBCC('roberto@gmail.com', 'Roberto'); 
		 
		// Definir se o e-mail é em formato HTML ou texto plano 
		// Formato HTML . Use "false" para enviar em formato texto simples ou "true" para HTML.
		$mail->IsHTML(true); 
		 
		// Charset (opcional) 
		$mail->CharSet = 'UTF-8'; 
		 
		// Assunto da mensagem 
		$mail->Subject = $assuntoDaMensagem; 
		 
		// Corpo do email 
		$mail->Body = $conteudoDoEmail; 
		 
		// Opcional: Anexos 
		// $mail->AddAttachment("/home/usuario/public_html/documento.pdf", "documento.pdf"); 
		 
		// Envia o e-mail 
		$enviado = $mail->Send(); 
		 
		// Exibe uma mensagem de resultado 
		if ($enviado) 
		{ 
		    //echo "Seu email foi enviado com sucesso!"; 
		    return "Seu email foi enviado com sucesso!";
		} else {
			return "Houve um erro enviando o email: ".$mail->ErrorInfo;
		    //echo "Houve um erro enviando o email: ".$mail->ErrorInfo; 
		} 

	}
	
}



?>
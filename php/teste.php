<?php

//include("envioEmail.php");
require_once("envioEmail.php");
$email = new envioEmail();
$email->enviarEmail("thiagomilton.f@gmail.com","thiago" ,"Redefiniçao de senha CARTEIRA WEB" ,"Nova Senha: 123");


?>
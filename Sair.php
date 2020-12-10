<?php
session_start();                      //SAINDO DA SESSAO QUE FOI LOGADO
unset($_SESSION['id_usuario']);          //APAGANDO A VARIAVEL DE LOGIN PRA SAIR
header("Location: Login.php");              //SESSAO DESTRUIDA, NAO CONSEGUIRA MAIS ACESSAR A AREA PRIVADA DO PÉRFIL
?>
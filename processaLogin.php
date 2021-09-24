<?php

session_start();

require_once('./funcoes.php');

if ((isset ($_POST["txt_usuario"])) || (isset ($_POST["txt_senha"]))) {
 
    $usuario = $_POST["txt_usuario"];
    $senha = $_POST["txt_senha"];

    relizarLogin($usuario, $senha, lerArquivo('./public/json/usuarios.json'));

} else if($_GET["logout"]) {

    finalizarLogin();
}
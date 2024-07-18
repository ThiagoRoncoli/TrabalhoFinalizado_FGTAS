<?php

$email = $_POST["emailUsuario"];
$senha = $_POST["senhaUsuario"];


include_once("../model/clsUsuario.php");
include_once("../dao/clsUsuarioDAO.php");
include_once("../dao/clsConexao.php");


$user = new Usuario(email:$email, senha:$senha);

if( !$user ) {
	header("Location: ../index.php?usuarioInvalido");
}else{
	session_start();
	$_SESSION["logado"] = true;
	$_SESSION["emailUsuario"] = $user->getEmail();
	$_SESSION["senhaUsuario"] = $user->getSenha();
	header("Location: ../view/home.php");
}


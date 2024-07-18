<?php
// LEMBRAR --> O USUARIO NÃO É COM A GENTE É DE OUTRO GRUPO <-- !


require_once("../dao/clsConexao.php");
require_once("../dao/clsUsuarioDAO.php");
require_once("../model/clsUsuario.php");


if(isset($_REQUEST["inserir"])){
    $nome = $_POST["nomeUsuario"];
    $email = $_POST["emailUsuario"];
    $senha =  $_POST["senhaUsuario"];
    $cargo = $_POST["nomePerfil"];
    $ativo = $_POST["ativo"];
    
    if(strlen($nome) == 0 ){
        header("Location: ../cadastra.php?nomeVazio");
    }else{
        $usuario = new Usuario($nome, $email, $senha, $cargo, $ativo);
        UsuarioDAO:: inserir($usuario);
        header("Location: ../cadastra.php?nome=$nome");
    }
}


if(isset($_REQUEST["excluir"]) && isset($_REQUEST["id"])){
    $id = $_REQUEST["id"];
    UsuarioDAO:: excluir($id);
    header("Location: ../cadastra.php?usuarioExcluido");
}



if( isset( $_REQUEST["editar"] ) &&  isset( $_REQUEST["id"] ) ){
    $nome = $_POST["nomeUsuario"];
    $id = $_REQUEST["id"];
    UsuarioDAO::editar( $nome, $id );
    header( "Location: ../cadastra.php?usuarioEditado");
}
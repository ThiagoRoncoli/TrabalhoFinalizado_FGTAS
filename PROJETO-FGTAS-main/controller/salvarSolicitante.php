<?php
require_once("../model/clsSolicitante.php");
require_once("../dao/clsConexao.php");
require_once("../dao/SolicitanteDAO.php");

//INSERIR solicitante

if(isset($_REQUEST["inserir"])) {
    $nome_solicitante = $_REQUEST["identificacaoAtendente"];
    $tipo_solicitante = $_REQUEST["pessoasAtendimento"];
    $forma_atendimento = $_REQUEST["tipoAtendimento"];


    $solicitante = new Solicitante($nome_solicitante, $tipo_solicitante, $forma_atendimento);
    $dao = new SolicitanteDAO();
    $dao->create($solicitante);

    if($tipo_solicitante == "trabalhador"){
        header("Location: ../view/trabalhador.php");
    } else if($tipo_solicitante == "empregador"){
        header("Location: ../view/empregador.php");
    } else if($tipo_solicitante == "ads" || $tipo_solicitante == "setores"){
        header("Location: ../view/tipo_atendimento.php");
    } else if($tipo_solicitante == "mercadoTrabalho"){
        header("Location: ../view/mercado_trabalho.php");
    } else if($tipo_solicitante == "outro"){
        header("Location: ../view/identificacao.php");
    }
}

// EXCLUIR solicitante

if(isset($_REQUEST["excluir"]) && isset($_REQUEST["id"])) {
    $id = $_REQUEST["id"];
    $dao = new SolicitanteDAO();
    $dao->delete($id);
    header("Location: ../view/home.php?solicitanteExcluido");
}

// EDITAR solicitante

if(isset($_REQUEST["editar"]) && isset($_REQUEST["identificador_unico"])) {
    $solicitante = new Solicitante($_POST["tipoPessoa"], $_POST["tipoSolicitante"], 
    $_REQUEST["identificador_unico"]);
    $dao = new SolicitanteDAO();
    $dao->update($solicitante);
    header("Location: ../view/home.php?solicitanteEditado");
}
?>
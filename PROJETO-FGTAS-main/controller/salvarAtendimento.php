<?php
require_once("../dao/clsConexao.php");
require_once("../dao/AtendimentoDAO.php");
require_once("../model/clsAtendimento.php");

if (isset($_REQUEST["inserir"])) {
    $tipo = $_REQUEST["nomeAtendimento"];
    $informacao = $_REQUEST["informacao"];
    $idSolicitante = $_REQUEST["id_solicitante"]; 

    $atendimento = new Atendimento();
    $atendimento->setTipo($tipo);
    $atendimento->setInformacao($informacao);
    $atendimento->setIdSolicitante($idSolicitante);

    AtendimentoDAO::inserir($atendimento);

    switch ($tipo) {
        case "carteira_trabalho":
            header("Location: ../view/carteira_trabalho.php");
            break;
        case "vida_centro_humanistico":
            header("Location: ../view/centro_humanistico.php");
            break;
        case "informacoes_mercado_trabalho":
            header("Location: ../view/mercado_trabalho.php");
            break;
        default:
            header("Location: ../view/home.php");
            break;
    }
}

if (isset($_REQUEST["excluir"]) && isset($_REQUEST["tipo"])) {
    $tipo = $_REQUEST["nomeAtendimento"];
    AtendimentoDAO::excluir($tipo);
    header("Location: ../home.php?atendimentoExcluido");
}

if (isset($_REQUEST["editar"]) && isset($_REQUEST["tipo"])) {
    $tipo = $_REQUEST["nomeAtendimento"];
    $informacao = $_REQUEST["informacao"];
    
    $atendimento = new Atendimento();
    $atendimento->setTipo($tipo);
    $atendimento->setInformacao($informacao);
    AtendimentoDAO::editar($atendimento);
    
    header("Location: ../view/home.php?atendimentoEditado");
}
?>

<?php
require("../dao/clsConexao.php");
require("../model/clsAtendimento.php");
require("../dao/AtendimentoDAO.php");

$atendimento = null;

if (isset($_GET['tipo'])) {
    $tipoAtendimento = $_GET['tipo'];
    $atendimento = AtendimentoDAO::getAtendimentoByTipo($tipoAtendimento);
}

if (!$atendimento) {
    $atendimento = new Atendimento(); 
}

$solicitantes = AtendimentoDAO::getSolicitantes(); // listando aqui.
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./estilos/ds.css">
    <title>Editar Atendimento</title>
</head>

<body>
    <header class="grid100 menu">
        <nav class="w100 direita pv1">
            <?php if (isset($_SESSION['nome']) && $_SESSION['nome'] == 'admin'): ?>
                <a href="admin.php" class="menu__botao">Admin</a>
            <?php endif; ?>
            <a href="usuario.php" class="menu__botao">Usuário</a>
        </nav>
    </header>
    <form method="post" name="editar" action="../controller/salvarAtendimento.php" class="formulario mt12-5 centralizado">
        <fieldset class="formulario__campo w80">
            <legend class="formulario__subtitulo">Atendimento</legend>
            <fieldset class="sem_borda w100 centralizado">
                <legend class="formulario__legenda">Id do Solicitante</legend>
                <select class="formulario__selecao w90" name="idSolicitante" required>
                    <?php foreach ($solicitantes as $solicitante): ?>
                        <option value="<?php echo $solicitante['id']; ?>" <?php if ($atendimento->getIdSolicitante() == $solicitante['id']) echo 'selected'; ?>>
                            <?php echo $solicitante['nome']; ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </fieldset>
            <fieldset class="sem_borda w100 centralizado">
                <legend class="formulario__legenda">Tipo de Atendimento</legend>
                <select class="formulario__selecao w90" name="nomeAtendimento" required>
                    <option value="carteiraTrabalho" <?php if ($atendimento->getTipo() == 'carteiraTrabalho') echo 'selected'; ?>>
                        Carteira de Trabalho, SD, Vagas
                    </option>
                    <option value="programaGauchoArtesanato" <?php if ($atendimento->getTipo() == 'programaGauchoArtesanato') echo 'selected'; ?>>
                        Programa Gaúcho de Artesanato
                    </option>
                    <option value="centroHumanistico" <?php if ($atendimento->getTipo() == 'centroHumanistico') echo 'selected'; ?>>
                        Vida Centro Humanístico
                    </option>
                    <option value="empreendedorismo" <?php if ($atendimento->getTipo() == 'empreendedorismo') echo 'selected'; ?>>
                        Orientação sobre empreendedorismo
                    </option>
                    <option value="cursoQualificacao" <?php if ($atendimento->getTipo() == 'cursoQualificacao') echo 'selected'; ?>>
                        Orientação sobre cursos de qualificação
                    </option>
                    <option value="mercadoTrabalho" <?php if ($atendimento->getTipo() == 'mercadoTrabalho') echo 'selected'; ?>>
                        Informações sobre o mercado de trabalho
                    </option>
                    <option value="outro" <?php if ($atendimento->getTipo() == 'outro') echo 'selected'; ?>>
                        Outro
                    </option>
                </select>
            </fieldset>
            <fieldset class="sem_borda w100 centralizado">
                <legend class="formulario__legenda">Informação</legend>
                <select class="formulario__selecao w90" name="informacao">
                </select>
            </fieldset>
        </fieldset>
        <div class="grid50-50 w50 centralizado mv0-5 gp5">
            <a href="usuario.php" class="formulario__botao__secundario formulario__botao__padrao">Voltar</a>
            <input type="submit" value="Editar" class="formulario__botao formulario__botao__padrao">
        </div>
    </form>
</body>

</html>

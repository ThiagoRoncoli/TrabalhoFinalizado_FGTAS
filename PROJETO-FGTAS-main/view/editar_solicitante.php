<?php
require_once("../dao/clsConexao.php");
require_once("../model/clsSolicitante.php");
require_once("../dao/SolicitanteDAO.php");

session_start(); 

$isAdmin = isset($_SESSION['nome']) && $_SESSION['nome'] == 'admin';

$solicitante = null;

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['editar'])) {

    $idSolicitante = $_POST['idSolicitante'];

    $nomePublico = $_POST["nomePublico"];
    $emailSolicitante = $_POST["emailSolicitante"];
    $telefoneSolicitante = $_POST["telefoneSolicitante"];
    $tipoPessoa = $_POST["tipoPessoa"];
    $identificadorUnico = $_POST["identificadorUnico"];
    $formaAtendimento = $_POST["formaAtendimento"];
    $tipoSolicitante = $_POST["tipoSolicitante"];
    $ativo = $_POST["ativo"];
    $descricaoAtividade = $_POST["descricaoAtividade"];

    // Cria um novo objeto Solicitante com os dados atualizados
    $solicitante = new Solicitante();
    $solicitante->setId($idSolicitante); 
    $solicitante->setNomePublico($nomePublico);
    $solicitante->setEmailSolicitante($emailSolicitante);
    $solicitante->setTelefoneSolicitante($telefoneSolicitante);
    $solicitante->setTipoPessoa($tipoPessoa);
    $solicitante->setIdentificadorUnico($identificadorUnico);
    $solicitante->setFormaAtendimento($formaAtendimento);
    $solicitante->setTipoSolicitante($tipoSolicitante);
    $solicitante->setAtivo($ativo);
    $solicitante->setDescricaoAtividade($descricaoAtividade);

    $dao = new SolicitanteDAO();
    if ($dao->update($solicitante)) {
        header("Location: usuario.php?solicitanteEditado");
        exit();
    } else {
        echo "Erro ao editar o solicitante.";
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['excluir'])) {
    $idSolicitante = $_POST['idSolicitante'];

    $dao = new SolicitanteDAO();
    if ($dao->delete($idSolicitante)) {

        header("Location: usuario.php?solicitanteExcluido");
        exit();
    } else {
        echo "Erro ao excluir o solicitante.";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./estilos/ds.css">
    <title>Editar Solicitante</title>
</head>

<body>
    <header class="grid100  menu ">
        <nav class="w100 direita pv1">
            <?php if ($isAdmin): ?>
                <a href="admin.php" class="menu__botao">Admin</a>
            <?php endif; ?>
            <a href="usuario.php" class="menu__botao">Usuário</a>
        </nav>
    </header>
    <form method="post" class="formulario">
        <fieldset class="formulario__campo w80 mt5 centralizado">
            <legend class="formulario__subtitulo">Solicitante</legend>
            <section class="centralizado">
                <label class="formulario__etiqueta" for="nomePublico">Nome</label>
                <div>
                    <input class="formulario__entrada w90" type="text" name="nomePublico" id="nomePublico" value="<?= htmlspecialchars($solicitante ? $solicitante->getNomePublico() : ''); ?>"
                        required>
                </div>
            </section>
            <section class="centralizado mv0-5">
                <label class="formulario__etiqueta" for="emailSolicitante">E-mail</label>
                <div>
                    <input class="formulario__entrada w90" type="email" name="emailSolicitante" id="emailSolicitante"
                        value="<?= htmlspecialchars($solicitante ? $solicitante->getEmailSolicitante() : ''); ?>" required>
                </div>
            </section>
            <section class="centralizado mv0-5">
                <label class="formulario__etiqueta" for="telefoneSolicitante">Telefone</label>
                <div>
                    <input type="tel" name="telefoneSolicitante" id="telefoneSolicitante" value="<?= htmlspecialchars($solicitante ? $solicitante->getTelefoneSolicitante() : ''); ?>" required
                        class="formulario__entrada w90">
                </div>
            </section>
            <fieldset class="sem_borda mv0-5 centralizado">
                <legend class="formulario__legenda">Tipo de pessoa</legend>
                <div>
                    <input class="formulario__opcao " type="radio" name="tipoPessoa" value="Física" id="fisica" <?= $solicitante && $solicitante->getTipoPessoa() === "Física" ? "checked" : ""; ?> required>
                    <label class="formulario__etiqueta" for="fisica">Física</label>
                </div>
                <div>
                    <input class="formulario__opcao" type="radio" name="tipoPessoa" value="Jurídica" id="juridica" <?= $solicitante && $solicitante->getTipoPessoa() === "Jurídica" ? "checked" : ""; ?> required>
                    <label for="juridica" class="formulario__etiqueta">Jurídica</label>
                </div>
                <div>
                    <input class="formulario__entrada w50 mv1" type="text" value="<?= htmlspecialchars($solicitante ? $solicitante->getIdentificadorUnico() : ''); ?>" name="identificadorUnico"
                        id="identificadorUnico" placeholder="Insira o CPF ou CNPJ">
                </div>
            </fieldset>
            <fieldset class="sem_borda centralizado">
                <legend class="formulario__legenda">Forma de atendimento</legend>
                <select class="formulario__selecao w90" required name="formaAtendimento">
                    <option value="presencial" <?= $solicitante->getFormaAtendimento() === "presencial" ? "selected" : ""; ?>>Presencial</option>
                    <option value="whatsapp" <?= $solicitante && $solicitante->getFormaAtendimento() === "whatsapp" ? "selected" : ""; ?>>Whatsapp</option>
                    <option value="telefone" <?= $solicitante && $solicitante->getFormaAtendimento() === "telefone" ? "selected" : ""; ?>>Ligação telefônica</option>
                    <option value="email" <?= $solicitante && $solicitante->getFormaAtendimento() === "email" ? "selected" : ""; ?>>E-mail</option>
                    <option value="redesSociais" <?= $solicitante && $solicitante->getFormaAtendimento() === "redesSociais" ? "selected" : ""; ?>>Redes Sociais</option>
                    <option value="teams" <?= $solicitante && $solicitante->getFormaAtendimento() === "teams" ? "selected" : ""; ?>>Teams</option>
                    <option value="outro" <?= $solicitante && $solicitante->getFormaAtendimento() === "outro" ? "selected" : ""; ?>>Outro</option>
                </select>
            </fieldset>
            <fieldset class="sem_borda mv1 centralizado">
                <legend class="formulario__legenda">Tipo de solicitante</legend>
                <div>
                    <select name="tipoSolicitante" class="formulario__selecao w90" required>
                        <option value="empregador" <?= $solicitante && $solicitante->getTipoSolicitante() === "empregador" ? "selected" : ""; ?>>Empregador</option>
                        <option value="trabalhador" <?= $solicitante && $solicitante->getTipoSolicitante() === "trabalhador" ? "selected" : ""; ?>>Trabalhador</option>
                        <option value="outraAgencia" <?= $solicitante && $solicitante->getTipoSolicitante() === "outraAgencia" ? "selected" : ""; ?>>Outras agências</option>
                        <option value="ads" <?= $solicitante && $solicitante->getTipoSolicitante() === "ads" ? "selected" : ""; ?>>ADS</option>
                        <option value="setor" <?= $solicitante && $solicitante->getTipoSolicitante() === "setor" ? "selected" : ""; ?>>Setores da FGTAS</option>
                        <option value="mercadoTrabalho" <?= $solicitante && $solicitante->getTipoSolicitante() === "mercadoTrabalho" ? "selected" : ""; ?>>Interessado em informações sobre o mercado de trabalho</option>
                        <option value="outro" <?= $solicitante && $solicitante->getTipoSolicitante() === "outro" ? "selected" : ""; ?>>Outro</option>
                    </select>
            <!-- ? elemento ternario vê se é true ou false , === vê se é exatamente igual, && é para combinar as duas expressões e no inicio e final abri a tag php!-->
                </div>
            </fieldset>
            <fieldset class="sem_borda centralizado">
                <legend class="formulario__legenda">Ativo</legend>
                <select name="ativo" class="formulario__selecao w90" required>
                    <option value="Ativado" <?= $solicitante && $solicitante->getAtivo() === "Ativado" ? "selected" : ""; ?>>Ativado</option>
                    <option value="Desativado" <?= $solicitante && $solicitante->getAtivo() === "Desativado" ? "selected" : ""; ?>>Desativado</option>
                </select>
            </fieldset>
            <fieldset class="sem_borda centralizado">
                <legend class="formulario__legenda">Tipo de informação</legend>
                <select class="formulario__selecao w90" name="tipoInformacao">
                    <option></option>
                </select>
            </fieldset>
            <div class="centralizado">
                <label class="formulario__etiqueta" for="descricaoAtividade">Descrição da atividade</label>
                <div>
                    <textarea required id="descricaoAtividade" name="descricaoAtividade"
                        class="formulario__caixa__texto w90"><?= htmlspecialchars($solicitante ? $solicitante->getDescricaoAtividade() : ''); ?></textarea>
                </div>
            </div>
            <input type="hidden" name="idSolicitante" value="<?= $solicitante ? $solicitante->getId() : ''; ?>">
        </fieldset>
        <div class="grid50-50 w50 gp5 mv0-5 centralizado">
            <a href="usuario.php" class="formulario__botao__secundario formulario__botao__padrao">Voltar</a>
            <input type="submit" name="editar" class="formulario__botao formulario__botao__padrao" value="Editar">
        </div>
    </form>
    <!--  Excluir o Solicitante -->
    <?php if ($solicitante): ?>
        <div class="centralizado">
            <form method="post">
                <input type="hidden" name="idSolicitante" value="<?= $solicitante->getId(); ?>">
                <input type="hidden" name="excluir">
                <input type="submit" class="formulario__botao__secundario formulario__botao__padrao" value="Excluir Solicitante"
                    onclick="return confirm('Tem certeza que deseja excluir este solicitante?');">
            </form>
        </div>
    <?php endif; ?>
</body>

</html>

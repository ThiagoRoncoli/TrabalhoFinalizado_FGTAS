<?php
require_once('../dao/SolicitanteDAO.php');
require_once('../dao/AtendimentoDAO.php');

$solicitanteDAO = new SolicitanteDAO();
$solicitantes = $solicitanteDAO->readAll(); // to listando através do banco os solicitantes


$atendimentoDAO = new AtendimentoDAO();
$atendimentos = $atendimentoDAO->readAll();
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./estilos/ds.css">
    <title>Lista de Solicitantes e Atendimentos</title>
</head>

<body>

    <section class="centralizado mv0-5">
        <h1 class="formulario__titulo">Solicitantes</h1>
        <table class="tabela w95 centralizado mc">
            <thead>
                <tr class="cabecalho">
                    <th>Id</th>
                    <th>Nome</th>
                    <th>Tipo da Pessoa</th>
                    <th>Tipo do Solicitante</th>
                    <th>Forma de Atendimento</th>
                    <th>Tipo de Informação</th>
                    <th>Data do registro</th>
                    <th>Ativo</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($solicitantes as $solicitante): ?>
                <tr>
                    <td><?php echo $solicitante->getIdentificadorUnico(); ?></td>
                    <td><?php echo $solicitante->getNomePublico(); ?></td>
                    <td><?php echo $solicitante->getTipoPessoa(); ?></td>
                    <td><?php echo $solicitante->getTipoSolicitante(); ?></td>
                    <td><?php echo $solicitante->getFormaAtendimento(); ?></td>
                    <td><?php echo $solicitante->getTipoInformacao(); ?></td>
                    <td><?php echo $solicitante->getDataRegistro(); ?></td>
                    <td><?php echo $solicitante->getAtivo(); ?></td>
                    <td>
                        <a href='editar_solicitante.php?id=<?php echo $solicitante->getIdentificadorUnico(); ?>'>Editar</a>
                        <a onclick='return confirm("Você tem certeza que deseja apagar?")' href='../controller/salvarSolicitante.php?excluir&id=<?php echo $solicitante->getIdentificadorUnico(); ?>'>Excluir</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </section>

    <section class="centralizado mt1">
        <h1 class="formulario__titulo">Atendimentos</h1>
        <table class="tabela w95 centralizado mc">
            <thead>
                <tr class="cabecalho">
                    <th>Id</th>
                    <th>Id_Solicitante</th>
                    <th>Tipo</th>
                    <th>Informação</th>
                    <th>Data Registro</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($atendimentos as $atendimento): ?>
                <tr>
                    <td><?php echo $atendimento->getId(); ?></td> <!-- aqui to abrindo tag php para imprimir na tela o dado e passando via get que defini na clase -->
                    <td><?php echo $atendimento->getIdSolicitante(); ?></td>
                    <td><?php echo $atendimento->getTipo(); ?></td>
                    <td><?php echo $atendimento->getInformacao(); ?></td>
                    <td><?php echo $atendimento->getDataRegistro(); ?></td>
                    <td>
                        <a href='editar_atendimento.php?id=<?php echo $atendimento->getId(); ?>'>Editar</a>
                        <a onclick='return confirm("Você tem certeza que deseja apagar?")' href='../controller/excluir_atendimento.php?id=<?php echo $atendimento->getId(); ?>'>Excluir</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </section>

    <div class="centralizado mt1">
        <a href="./relatorio.php" class="formulario__botao__padrao formulario__botao">Gerar Relatório</a>
    </div>

    <script src="https://kit.fontawesome.com/df85906e6a.js" crossorigin="anonymous"></script>
</body>

</html>

<?php
require_once('clsConexao.php');
require_once('../model/clsAtendimento.php');
require_once('../model/clsSolicitante.php');

class AtendimentoDAO {

    public static function inserir(Atendimento $atendimento) {
        try {
            $tipo = $atendimento->getTipo();
            $informacao = $atendimento->getInformacao();
            $idSolicitante = $atendimento->getIdSolicitante();
            $dataRegistro = date('Y-m-d H:i:s');

            $sql = "INSERT INTO atendimento (tipo, informacao, id_solicitante, data_registro) VALUES (:tipo, :informacao, :idSolicitante, :dataRegistro)";
            $statement   = Conexao::getConexao()->prepare($sql);
            $statement  ->bindValue(":tipo", $tipo);
            $statement  ->bindValue(":informacao", $informacao);
            $statement  ->bindValue(":idSolicitante", $idSolicitante);
            $statement  ->bindValue(":dataRegistro", $dataRegistro);

            return $statement  ->execute();
        } catch (PDOException $executar) {
            echo "Erro ao inserir atendimento: " . $executar->getMessage();
            return false;
        }
    }

    public static function getAtendimentoByTipo($tipo) {
        try {
            $sql = "SELECT * FROM atendimento WHERE tipo = :tipo";
            $statement   = Conexao::getConexao()->prepare($sql);
            $statement  ->bindValue(":tipo", $tipo);
            $statement  ->execute();

            $result = $statement  ->fetch(PDO::FETCH_ASSOC);
            if ($result) {
                $atendimento = new Atendimento();
                $atendimento->setId($result['id']);
                $atendimento->setTipo($result['tipo']);
                $atendimento->setInformacao($result['informacao']);
                $atendimento->setDataRegistro($result['data_registro']);
                $atendimento->setIdSolicitante($result['id_solicitante']);
                return $atendimento;
            } else {
                return null;
            }
        } catch (PDOException $executar) {
            echo "Erro ao buscar atendimento: " . $executar->getMessage();
            return null;
        }
    }

    public static function editar(Atendimento $atendimento) {
        try {
            $id = $atendimento->getId();
            $tipo = $atendimento->getTipo();
            $informacao = $atendimento->getInformacao();
            $idSolicitante = $atendimento->getIdSolicitante();

            $sql = "UPDATE atendimento SET tipo = :tipo, informacao = :informacao, id_solicitante = :idSolicitante WHERE id = :id";
            $statement   = Conexao::getConexao()->prepare($sql);
            $statement  ->bindValue(":id", $id);
            $statement  ->bindValue(":tipo", $tipo);
            $statement  ->bindValue(":informacao", $informacao);
            $statement  ->bindValue(":idSolicitante", $idSolicitante);

            return $statement  ->execute();
        } catch (PDOException $executar) {
            echo "Erro ao atualizar atendimento: " . $executar->getMessage();
            return false;
        }
    }

    public static function excluir($id) {
        try {
            $sql = "DELETE FROM atendimento WHERE id = :id";
            $statement   = Conexao::getConexao()->prepare($sql);
            $statement  ->bindValue(":id", $id);

            return $statement  ->execute();
        } catch (PDOException $executar) {
            echo "Erro ao excluir atendimento: " . $executar->getMessage();
            return false;
        }
    }

    public static function getSolicitantes() {
        try {
            $sql = "SELECT id, nome FROM solicitante";
            $statement   = Conexao::getConexao()->prepare($sql);
            $statement  ->execute();

            $result = $statement  ->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        } catch (PDOException $executar) {
            echo "Erro ao buscar solicitantes: " . $executar->getMessage();
            return null;
        }
    }

    public static function readAll() {
        try {
            $sql = "SELECT * FROM atendimento";
            $stmt = Conexao::getConexao()->query($sql);

            $lista = array();
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $atendimento = new Atendimento();
                $atendimento->setId($row['id']);
                $atendimento->setIdSolicitante($row['id_solicitante']);
                $atendimento->setTipo($row['tipo']);
                $atendimento->setInformacao($row['informacao']);
                $atendimento->setDataRegistro($row['data_registro']);
                $atendimento->setIdSolicitante($row['id_solicitante']);
                
                $lista[] = $atendimento;
            }
            return $lista;
        } catch (PDOException $executar) {
            echo "Erro ao listar atendimentos: " . $executar->getMessage();
            return array();
        }
    }
}
?>

<?php
require_once('../model/clsSolicitante.php');
require_once('clsConexao.php');

class SolicitanteDAO {

    public function create(Solicitante $solicitante) {
        try {
            $sql = "INSERT INTO solicitante (
                        id_usuario, nome, tipo_solicitante, forma_atendimento
                    ) VALUES (
                        :id_usuario, :nome, :tipo_solicitante, :forma_atendimento
                    )";
            
            $statement   = Conexao::getConexao()->prepare($sql);
            $statement  ->bindValue(":id_usuario", 1); 
            $statement  ->bindValue(":nome", $solicitante->getNome());
            $statement  ->bindValue(":tipo_solicitante", $solicitante->getTipoSolicitante());
            $statement  ->bindValue(":forma_atendimento", $solicitante->getFormaAtendimento());
            
            return $statement  ->execute();
        } catch (Exception $executar) {
            print "Erro ao Inserir solicitante <br>" . $executar->getMessage() . '<br>';
        }
    }

    public function read($id) {
        try {
            $sql = "SELECT * FROM solicitante WHERE identificador_unico = :identificador_unico";
            $statement   = Conexao::getConexao()->prepare($sql);
            $statement  ->bindValue(":identificador_unico", $id);
            $statement  ->execute();
            
            $result = $statement  ->fetch(PDO::FETCH_ASSOC);
            return $this->listaSolicitantes($result);
        } catch (Exception $e) {
            print "Erro ao Buscar solicitante<br>" . $e->getMessage() . '<br>';
        }
    }

    public function update(Solicitante $solicitante) {
        try {
            $sql = "UPDATE solicitante SET
                        tipo_pessoa = :tipo_pessoa,
                        tipo_solicitante = :tipo_solicitante,
                        identificador_unico = :identificador_unico,
                        forma_atendimento = :forma_atendimento,
                        nome = :nome,
                        email = :email,
                        telefone = :telefone,
                        tipo_informacao = :tipo_informacao,
                        descricao = :descricao,
                        ativo = :ativo,
                        data_registro_soli = :data_registro_soli 
                    WHERE identificador_unico = :identificador_unico";
            
            $statement   = Conexao::getConexao()->prepare($sql);
            $statement  ->bindValue(":tipo_pessoa", $solicitante->getTipoPessoa());
            $statement  ->bindValue(":tipo_solicitante", $solicitante->getTipoSolicitante());
            $statement  ->bindValue(":identificador_unico", $solicitante->getIdentificadorUnico());
            $statement  ->bindValue(":forma_atendimento", $solicitante->getFormaAtendimento());
            $statement  ->bindValue(":nome", $solicitante->getNomePublico()); 
            $statement  ->bindValue(":email", $solicitante->getEmailSolicitante()); 
            $statement  ->bindValue(":telefone", $solicitante->getTelefoneSolicitante()); 
            $statement  ->bindValue(":tipo_informacao", $solicitante->getTipoInformacao());
            $statement  ->bindValue(":descricao", $solicitante->getDescricaoAtividade()); 
            $statement  ->bindValue(":ativo", $solicitante->getAtivo());
            $statement  ->bindValue(":data_registro_soli", $solicitante->getDataRegistro()); 

            return $statement  ->execute();
        } catch (Exception $executar) {
            print "Erro ao Atualizar solicitante<br>" . $executar->getMessage() . '<br>';
        }
    }

    public function delete($id) {
        try {
            $sql = "DELETE FROM solicitante WHERE identificador_unico = :identificador_unico";
            $statement   = Conexao::getConexao()->prepare($sql);
            $statement  ->bindValue(":identificador_unico", $id);
            return $statement  ->execute();
        } catch (Exception $executar) {
            print "Erro ao Excluir solicitante<br>" . $executar->getMessage() . '<br>';
        }
    }

    public function readAll() {
        try {
            $sql = "SELECT * FROM solicitante";
            $stmt = Conexao::getConexao()->query($sql);
            
            $solicitantes = [];
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $solicitante = $this->listaSolicitantes($row);
                $solicitantes[] = $solicitante;
            }
            
            return $solicitantes;
        } catch (Exception $executar) {
            print "Erro ao Listar solicitantes<br>" . $executar->getMessage() . '<br>';
        }
    }

    private function listaSolicitantes($row) {
        $solicitante = new Solicitante();

        $solicitante->setNomePublico($row['nome']); 
        $solicitante->setTipoSolicitante($row['tipo_solicitante']);
        $solicitante->setIdentificadorUnico($row['identificador_unico']);
        $solicitante->setFormaAtendimento($row['forma_atendimento']);
        $solicitante->setEmailSolicitante($row['email']); 
        $solicitante->setTelefoneSolicitante($row['telefone']); 
        $solicitante->setTipoInformacao($row['tipo_informacao']);
        $solicitante->setDescricaoAtividade($row['descricao']); 
        $solicitante->setAtivo($row['ativo']);
        $solicitante->setDataRegistro($row['data_registro_soli']); 
        return $solicitante;
    }

    
}
?>

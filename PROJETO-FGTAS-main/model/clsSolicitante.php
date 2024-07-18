<?php

class Solicitante {

    public $id;
    public $nome_solicitante;
    public $tipo_pessoa;
    public $tipo_solicitante;
    public $identificador_unico;
    public $forma_atendimento;
    public $nomePublico;
    public $emailSolicitante;
    public $telefoneSolicitante;
    public $tipo_informacao;
    public $descricaoAtividade;
    public $ativo;
    public $data_registro;

    public function __construct($nome_solicitante = null, $tipo_solicitante = null, $forma_atendimento = null) {
        $this->nome_solicitante = $nome_solicitante;
        $this->tipo_solicitante = $tipo_solicitante;
        $this->forma_atendimento = $forma_atendimento;
    }

    public function getId() {
        return $this->id;
    }

    public function getNome() {
        return $this->nome_solicitante;
    }

    public function getTipoPessoa() {
        return $this->tipo_pessoa;
    }

    public function getTipoSolicitante() {
        return $this->tipo_solicitante;
    }

    public function getIdentificadorUnico() {
        return $this->identificador_unico;
    }

    public function getFormaAtendimento() {
        return $this->forma_atendimento;
    }

    public function getNomePublico() {
        return $this->nomePublico;
    }

    public function getEmailSolicitante() {
        return $this->emailSolicitante;
    }

    public function getTelefoneSolicitante() {
        return $this->telefoneSolicitante;
    }

    public function getTipoInformacao() {
        return $this->tipo_informacao;
    }

    public function getDescricaoAtividade() {
        return $this->descricaoAtividade;
    }

    public function getAtivo() {
        return $this->ativo;
    }

    public function getDataRegistro() {
        return $this->data_registro;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setNome($nome_solicitante) {
        $this->nome_solicitante = $nome_solicitante;
    }

    public function setTipoPessoa($tipo_pessoa) {
        $this->tipo_pessoa = $tipo_pessoa;
    }

    public function setTipoSolicitante($tipo_solicitante) {
        $this->tipo_solicitante = $tipo_solicitante;
    }

    public function setIdentificadorUnico($identificador_unico) {
        $this->identificador_unico = $identificador_unico;
    }

    public function setFormaAtendimento($forma_atendimento) {
        $this->forma_atendimento = $forma_atendimento;
    }

    public function setNomePublico($nomePublico) {
        $this->nomePublico = $nomePublico;
    }

    public function setEmailSolicitante($emailSolicitante) {
        $this->emailSolicitante = $emailSolicitante;
    }

    public function setTelefoneSolicitante($telefoneSolicitante) {
        $this->telefoneSolicitante = $telefoneSolicitante;
    }

    public function setTipoInformacao($tipo_informacao) {
        $this->tipo_informacao = $tipo_informacao;
    }

    public function setDescricaoAtividade($descricaoAtividade) {
        $this->descricaoAtividade = $descricaoAtividade;
    }

    public function setAtivo($ativo) {
        $this->ativo = $ativo;
    }

    public function setDataRegistro($data_registro) {
        $this->data_registro = $data_registro;
    }
}
?>

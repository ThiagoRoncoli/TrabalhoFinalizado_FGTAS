<?php
class Atendimento {
    private $id;
    private $tipo;
    private $informacao;
    private $dataRegistro;
    private $idSolicitante;

    public function getIdSolicitante() {
        return $this->idSolicitante;
    }

    public function setIdSolicitante($idSolicitante) {
        $this->idSolicitante = $idSolicitante;
    }

    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getTipo() {
        return $this->tipo;
    }

    public function setTipo($tipo) {
        $this->tipo = $tipo;
    }

    public function getInformacao() {
        return $this->informacao;
    }

    public function setInformacao($informacao) {
        $this->informacao = $informacao;
    }

    public function getDataRegistro() {
        return $this->dataRegistro;
    }

    public function setDataRegistro($dataRegistro) {
        $this->dataRegistro = $dataRegistro;
    }
}
?>

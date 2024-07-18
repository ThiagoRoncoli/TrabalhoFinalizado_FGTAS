<?php

    class Usuario{

        private $id, $nome, $email, 
        $senha, $cargo, $ativo;

        public function __construct($nome = NULL, $email = NULL, 
        $senha = NULL, $cargo = NULL, $ativo = NULL){
//o id eu posso tirar talvez//

            $this->nome = $nome;
            $this->email = $email;
            $this->senha = $senha;
            $this->cargo = $cargo; 
            $this->ativo = $ativo;             
        }
    

    public function getNome()
        {
            return $this->nome;
        }

        public function setNome()
        {
            return $this->nome;
        }

    public function getEmail()
            {
                return $this->email;
            }

            public function setEmail()
            {
                return $this->email;
            }

    public function getSenha()
            {
                return $this->senha;
            }

            public function setSenha()
            {
                return $this->email;
            }

    public function getCargo()
            {
                return $this->cargo;
            }
            
    public function getAtivo()
            {
                return $this->ativo;
            }

        public function autenticar()
            {

            }
        
    }
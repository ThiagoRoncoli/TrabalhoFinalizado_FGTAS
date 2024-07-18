<?php
require_once('clsConexao.php');


class UsuarioDAO{


    public static function inserir($usuario){
        $id = $usuario->id;
        $nome = $usuario->nome;
        $email = $usuario->email;
        $senha=  $usuario->senha;
        $cargo = $usuario->cargo;
        $ativo = $usuario->ativo;

        
        $sql = "INSERT INTO usuario (nome, email, senha,
        cargo, ativo) VALUES ('$nome', '$email', '$senha',
        '$cargo','$ativo', 'S');";
        $id = Conexao::executarComRetornoId($sql);
        return $id;
    }
    
    
    public static function getUsuarioByLoginSenha($email, $senha){
        $sql = "SELECT id, nome, email
                FROM usuario 
                WHERE email = '$email' AND senha = '$senha' ";
              
        $result = Conexao::consultar($sql);
            if (mysqli_num_rows($result) == 0){
                return null;
            }else{
                list($_id, $_nome, $_email) = mysqli_fetch_row($result);
                $user = new Usuario($_id, $_nome, $_email);
                return $user;
            }
    }

    //EDITAR
public static function editar( $usuario, $id ){
    //$id = $id;
    $nome = $usuario;
    $sql = "UPDATE usuario SET nome = '$nome' WHERE id = $id ;" ;
    Conexao::executar( $sql );
}

//EXCLUIR
    public static function excluir($id){
            $sql = "DELETE FROM usuario WHERE id = $id;";
            Conexao::executar($sql);
            }

    


           /* public function getEmail(string $email): void {
                if (empty($email)) {
                    header("Location: /view/login.php");
                    exit();
                } else {
                    $this->autenticar($email);
                }
            }

            public function getSenha(string $senha): void {
                if (empty($senha)) {
                    header("Location: /view/login.php");
                    exit();
                } else {
                    $this->autenticar($senha);
                }
            }
            /*public function getEmail(): void {
                if (empty($this->email) || empty($this->senha)) {
                    header("Location: /view/login.php");
                    exit();
                } else {
                    $this->autenticar($this->email, $this->senha);
                }
            }*/
}
?>
<?php

class Usuario{
    private $id="";
    private $nome="";
    private $email="";
    private $senha="";
    private $registro="";

    public function listar(){
        $conexao = new mysqli("localhost","root","","teste2");
        $sql = "select * from usuario";
        $dados = $conexao->query($sql);
        $result = array();
        while($linha = $dados->fetch_array()){
            $result[] = $linha; 
        }
        return $result;
    }
    public function cadastrar($dados){
        $conexao = new mysqli("localhost","root","","teste2");
        list($nome,$email,$senha) = $dados;
        $this->setNome($nome);
        $this->setEmail($email);
        $this->setSenha($senha);
        
        $userFromDb = $conexao->query("select email from usuario where email='{$email}'");
        if(mysqli_num_rows($userFromDb) == 1){
            return "cadastrado";
        }else{
        $sql = "insert into usuario(nome,email,senha,registro) values('{$this->getNome()}','{$this->getEmail()}','{$this->getSenha()}',now())";
        $result = $conexao->query($sql);
        return $result="gravado";
        }
    }
    public function deletar($dados){
        $conexao = new mysqli("localhost","root","","teste2");
        list($id) = $dados;
        $this->setId($id);
        $sql = "delete from usuario where id='{$this->getId()}'";
        $result = $conexao->query($sql);
        return $result;
    }
    public function editar($dados){
        list($id,$nome,$email,$senha) = $dados;
        $this->setId($id);
        $this->setNome($nome);
        $this->setEmail($email);
        $this->setSenha($senha);
        $conexao = new mysqli("localhost","root","","teste2");
        $sql = "update usuario set nome='{$this->getNome()}',email='{$this->getEmail()}',senha='{$this->getSenha()}',registro= now() where id = '{$this->getId()}'";
        $result = $conexao->query($sql);
        return $result;
    }

    public function setId($id){
        $this->id = $id;
    }
    public function getId(){
        return $this->id;
    }
    public function setNome($nome){
        $this->nome = $nome;
    }
    public function getNome(){
        return $this->nome;
    }
    public function setEmail($email){
        $this->email = $email;
    }
    public function getEmail(){
        return $this->email;
    }
    public function setSenha($senha){
        $this->senha = $senha;
    }
    public function getSenha(){
        return $this->senha;
    }
    public function setRegistro($registro){
        $this->regostro = $registro;
    }
    public function getRegistro(){
        return $this->registro;
    }

}
?>
<?php

session_start();
$logado = $_SESSION['nome'];
if(!isset($_SESSION['email'])&&!isset($_SESSION['senha'])){
    unset($_SESSION['email']);
    unset($_SESSION['senha']);
    unset($_SESSION['nome']);
session_destroy();
header("location: index.php?msg=facalogin");    
}

if(filter_input(INPUT_POST,"operacao")){
    $operacao = filter_input(INPUT_POST,"operacao");
}elseif(filter_input(INPUT_GET,"operacao")){
    $operacao = filter_input(INPUT_GET,"operacao");
}

if($operacao == "cadastrar"){ 
    $nome = filter_input(INPUT_POST,"nome");
    $email = filter_input(INPUT_POST,"email");
    $senha = filter_input(INPUT_POST,"senha");  
    $dados = array($nome,$email,$senha);  
    include '../model/user.php';
    $user = new Usuario();
    $result = $user->cadastrar($dados);
    if($result == "cadastrado"){
        header("location: ../site.php?msg=saveDuplicate");
    }elseif($result == "gravado"){
        header("location: ../site.php?msg=saveSuccess");
    }else{
        header("location: ../site.php?msg=saveErr");
    }

}elseif($operacao == "editar"){
    $id = filter_input(INPUT_POST,"id");
    $nome = filter_input(INPUT_POST,"nome");
    $email = filter_input(INPUT_POST,"email");
    $senha = filter_input(INPUT_POST,"senha");
    $dados = array($id,$nome,$email,$senha);
    include '../model/user.php';
    $user = new Usuario();
    $result = $user->editar($dados);
    if($result){
        header("location: ../site.php?msg=editSuccess");
    }else{
        header("location: ../site.php?msg=editErr");
    }

}elseif($operacao == "excluir"){
    $id = filter_input(INPUT_GET,"id");
    $dados= array($id);
    include '../model/user.php';
    $user = new Usuario();
    $result = $user->deletar($dados);
    if($result){
        header("location: ../site.php?msg=delSuccess");
    }else{
        header("location: ../site.php?msg=delErr");
    }
}
?>
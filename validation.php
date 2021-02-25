<?php
require_once 'replace.php';
// session_start inicia a sessão
session_start();
// as variáveis login e senha recebem os dados digitados na página anterior
$email = sanitizeString($_POST['email']);
$senha = sanitizeString($_POST['pass']);
if(isset($_POST['remember'])==true){
  setcookie("login", $email);
  }
// as próximas 3 linhas são responsáveis em se conectar com o bando de dados.

echo $email;
echo $senha;

$conexao = new mysqli("localhost","root","","teste2");

$sql = "select * from usuario where email='{$email}' and senha ='{$senha}'";
// A variavel $result pega as varias $login e $senha, faz uma
//pesquisa na tabela de usuarios
$result = $conexao->query($sql);
/* Logo abaixo temos um bloco com if e else, verificando se a variável $result foi
bem sucedida, ou seja se ela estiver encontrado algum registro idêntico o seu valor
será igual a 1, se não, se não tiver registros seu valor será 0. Dependendo do
resultado ele redirecionará para a página site.php ou retornara  para a página
do formulário inicial para que se possa tentar novamente realizar o login */
if(mysqli_num_rows($result) > 0 )
{
$listnome = array();
while($linha = $result->fetch_array()){
$listnome[] = $linha;
}
foreach($listnome as $key => $value){
$nome = $value['nome'];
}

$_SESSION['email'] = $email;
$_SESSION['senha'] = $senha;
$_SESSION['nome'] = $nome;

header('location:site.php');
}


else{
  unset ($_SESSION['email']);
  unset ($_SESSION['senha']);
  unset ($_SESSION['nome']);
  header('location:index.php?msg=errlogin');

  }

?>
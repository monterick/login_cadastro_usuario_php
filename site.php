
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

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link type="text/css" rel="stylesheet" href="./bootstrap/bootstrap/dist/css/bootstrap.min.css">
    <link type="text/css" rel="stylesheet" href="./bootstrap/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link type="text/css" rel="stylesheet" href="./node_modules/font-awesome/css/font-awesome.min.css">
    <link type="text/css" rel="stylesheet" href="./css/styles.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

</head>

<body>
<?php

if(filter_input(INPUT_GET,"msg")){
    $msg = $_GET['msg'];
include 'mensagens.php';
msg($msg);
}
?>
  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
           </div>
        <div class="modal-body">
        <h1>Cadastrar Usuário</h1>
<form action="./controller/controller.php" method="post" oninput='confirmPass.setCustomValidity(confirmPass.value != senha.value ? "Senhas não conferem." : "")'>
<div class="form-group">
    <label for="inputAddress">Email</label>
    <input type="email" class="form-control" id="email" name="email" required autofocus>
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="nome">Nome</label>
      <input type="text" class="form-control" id="nome" name=" nome" required autofocus>
    </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">Senha</label>
      <input type="password" class="form-control" id="senha" name="senha" required autofocus>
    </div>
  </div>

   <div class="form-row">
    <div class="form-group col-md-6">
      <label for="cpf">Confirmar senha</label>
      <input type="password" class="form-control" id="confirmPass" name="ConfirmPass" required autofocus>
    </div>
  </div>
  <input type="hidden" id="operacao" name="operacao" value="cadastrar">
   <button type="submit" class="btn btn-primary">Salvar</button>
</form>
        
        
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>

  <!-- Modal Editar -->
  <div class="modal fade" id="myModal2" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
           </div>
        <div class="modal-body">
        <h1>Editar Usuário</h1>
<form action="./controller/controller.php" method="post" oninput='confirmPass.setCustomValidity(confirmPass.value != senha.value ? "Senhas não conferem." : "")'>
<div class="form-group">
    <label for="inputAddress">Email</label>
    <input type="email" class="form-control" id="editemail" name="email" required autofocus>
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="nome">Nome</label>
      <input type="text" class="form-control" id="editnome" name=" nome" required autofocus>
    </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">Senha</label>
      <input type="password" class="form-control" id="editsenha" name="senha" required autofocus>
    </div>
  </div>

   <div class="form-row">
    <div class="form-group col-md-6">
      <label for="cpf">Confirmar senha</label>
      <input type="password" class="form-control" id="confirmPass" name="ConfirmPass" required autofocus>
    </div>
  </div>
  <input type="hidden" name="id" id="editid">
  <input type="hidden" id="operacao" name="operacao" value="editar">
   <button type="submit" class="btn btn-primary">Salvar</button>
</form>
        
        
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>

  <!-- fim modal-->

<div id="site">
   <nav class="navbar navbar-expand-lg navbar navbar-dark bg-primary">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Bem vindo, <?php echo $logado;?></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarScroll">
      <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
        <li class="nav-item active">
        <a class="nav-link" href="./sair.php"><strong>Sair</strong></a>
        </li>
       </ul>
     
    </div>
  </div>
</nav>

<div class="container content">
    <h1><i class="fa fa-users blue"></i>Usuários</h1><button type="button" class="btn btn-success"  data-toggle="modal" data-target="#myModal"><i class="fa fa-user"></i> [+] Novo</button>
<table class="table table-striped table-hover">
  <thead>
      <th>Id</th>
      <th>Nome</th>
      <th>Email</th>
      <th>Registro</th>
      <th>Editar</th>
      <th>Excluir</th>
  </thead>
  <tbody>
      <?php
      include './model/user.php';
      $user = new Usuario();
      $result = $user->listar();
      foreach($result as $key => $value){
      ?>
      <tr>
          <td><?php echo $value['id']?></td>
          <td><?php echo $value['nome']?></td>
          <td><?php echo $value['email']?></td>
          <td><?php echo $value['registro']?></td>
          <td><button onclick="injectValue(<?php echo $value['id'];?>,'<?php echo $value['nome'];?>','<?php echo $value['email'];?>','<?php echo $value['senha'];?>')" type="button"  class="btn btn-warning" data-toggle="modal" data-target="#myModal2" ><i class="fa fa-pencil"></i></button></td>
          <td><button type="button" class="btn btn-danger" onclick="exclusao(<?php echo $value['id']?>,<?php  echo $value['id'];?>)"><i class="fa fa-trash"></i></button></td>
      </tr>
      <?php
      }
      ?>
  </tbody>
</table>
</div>
<footer class="footer">
<span>Desenvolvido com <i class="fa fa-heart blue"></i> por <strong><a href="https://www.facebook.com/ricardo.monte.10">@Ricardo</a></strong>2021</span>
</footer>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
<script type="text/javascript" src="./js/scripts.js"></script>
    </body>
</html>
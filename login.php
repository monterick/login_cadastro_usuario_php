<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
	<link type="text/css" rel="stylesheet" href="./bootstrap/bootstrap/dist/css/bootstrap.min.css">
    <link type="text/css" rel="stylesheet" href="./bootstrap/font-awesome/css/font-awesome.min.css">
    <link type="text/css" rel="stylesheet" href="./css/styles.css">
    </head>
<body>

<?php
if(filter_input(INPUT_GET,"msg")){
    $msg = $_GET['msg'];
include 'mensagens.php';
msg($msg);
}
?>
 	<div class="container h-100">
		<div class="d-flex justify-content-center h-100">
			<div class="user_card">
				<div class="d-flex justify-content-center">
					<div class="brand_logo_container">
						<img src="./img/acai.png" class="brand_logo" alt="Logo">
					</div>
				</div>
				<div class="d-flex justify-content-center form_container">
					<form action="validation.php" method="post">
						<div class="input-group mb-3">
							<div class="input-group-append">
								<span class="input-group-text"><i class="fa fa-user"></i></span>
							</div>
							<input type="email" name="email" class="form-control input_user" value="<?php if(isset($_COOKIE["login"])) { echo $_COOKIE["login"]; } ?>" placeholder="Email">
						</div>
						<div class="input-group mb-2">
							<div class="input-group-append">
								<span class="input-group-text"><i class="fa fa-key"></i></span>
							</div>
							<input type="password"  class="form-control input_pass" name="pass" placeholder="Senha">
						</div>
						<div class="form-group">
							<div class="custom-control custom-checkbox">
								<input type="checkbox" class="custom-control-input" name="remember" id="customControlInline">
								<label class="custom-control-label" for="customControlInline">Relembrar-me</label>
							</div>
						</div>
							<div class="d-flex justify-content-center mt-3 login_container">
				 	<button type="submit" name="button" class="btn login_btn">Login</button>
				   </div>
					</form>
				</div>
		
			
			</div>
		</div>
	</div>
    <script type="text/javascript" src="./node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
</body>
</html>	
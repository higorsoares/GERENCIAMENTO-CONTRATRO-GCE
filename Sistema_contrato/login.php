<?php 
require 'pages/header.php';
require 'classes/usuarios.class.php';

if(!empty($_POST['nome'])){
	$nome = addslashes($_POST['nome']);
	$senha = addslashes($_POST['senha']);

	$user = new Usuarios();

	$resp = $user->login($nome , $senha);

	if(!empty($resp)){
		header("Location: index.php");
	}else{
		?>
			<div class="alert alert-warning">
			Usuario e ou Senha errados!
			</div>
	   <?php
	}



}

?>

<div class="container">
		<h1>Login</h1>

		<form method="POST">
			<div class="form-group">
				<label for="nome">usuario:</label>
				<input type="text" name="nome" id="nome" class="form-control">
			</div>
			<div class="form-group">
				<label for="senha">Senha:</label>
				<input type="password" name="senha" id="senha" class="form-control">
			</div>
			<input type="submit" value='Logar' class="btn btn-default">
		</form>
	</div>


<?php require 'pages/footer.php';?>
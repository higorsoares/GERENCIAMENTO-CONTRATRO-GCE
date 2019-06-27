<?php 
session_start();
//require 'pages/header.php';

require 'pages/headerLogin.php';

require 'classes/usuarios.class.php';



if(!empty($_POST['nome'])){

	$nome = addslashes($_POST['nome']);

	$senha = addslashes($_POST['senha']);



	$user = new Usuarios();



	$resp = $user->login($nome , $senha);



	if(!empty($resp)){

		//header("Location: index.php");

		?>

			<script language= "JavaScript">

				location.href="index.php";

			</script>

	   <?php

	}else{

		?>

			<div class="alert alert-warning">

			Usuario e ou Senha errados!

			</div>

	   <?php

	}







}



?>

<!--

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

			<a class="btn btn-primary" href="cadastre-se.php">Cadastre-se</a>

			

		</form>

	</div>

-->





	<div class="wrapper fadeInDown">

  <div id="formContent">

    



   

    <div class="fadeIn first">

      <i class="fas fa-user" style="font-size: 60px"> </i>

      

    </div>



    

    <form method="POST">

      <input type="text" id="nome" class="fadeIn second" name="nome" placeholder="User">

      <input type="text" id="senha" class="fadeIn third" name="senha" placeholder="password">

      <input type="submit" class="fadeIn fourth" value="logar">

    </form>



   

    <div id="formFooter">

      <p class="underlineHover" >Bem Vindo</p>

    </div>



  </div>

</div>



<?php require 'pages/footer.php';?>
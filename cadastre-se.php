<?php require 'pages/header.php';?>

	<div class="container">
		<h1>cadastre-se</h1>

		<?php 
			require 'classes/usuarios.class.php';

			$u = new Usuarios();
				if(isset($_POST['nome']) && !empty($_POST['nome'])){
					$nome = addslashes($_POST['nome']);
					$senha = $_POST['senha'];
					
					if(!empty($nome)  && !empty($senha) ){
							$u->cadastrar($nome,$senha);
					}else{
						?>
							<div class="alert alert-warning">
								Preencha Todos Os Campos!
							</div>
						<?php

					}

				}
			


		?>
		<form method="POST">
			<div class="form-group">
				<label for="nome">Seu Nome:</label>
				<input type="text" name="nome" id="nome" class="form-control">
			</div>
			<div class="form-group">
				<label for="senha">Senha:</label>
				<input type="password" name="senha" id="senha" class="form-control">
			</div>
			<input type="submit" value='Cadastrar' class="btn btn-default">
		</form>
	</div>

<?php require 'pages/footer.php';?>
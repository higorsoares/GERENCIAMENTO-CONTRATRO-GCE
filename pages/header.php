<?php

session_start();

?>

<!DOCTYPE html>

<html>

<head>

	<title>Gerenciamento de contrato</title>

	<meta charset="utf-8">

	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">

	<link rel="stylesheet" type="text/css" href="assets/css/style.css">
	<link rel="stylesheet" type="text/css" href="assets/datatable/datatables.min.css"/>

	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.2/css/all.css">
	<link href="assets/fontawesome/css/all.css" rel="stylesheet">

	

</head>

<body>



	<nav class="navbar navbar-inverse">

		<div class="container-fluid">

			<div class="navbar-header">

				<a href="./" class="navbar-brand">Gerenciamento de contrato</a>

			</div>

			<ul class="nav navbar-nav navbar-right">

				<?php  if(isset($_SESSION['cLogin']) && !empty($_SESSION['cLogin'])):?>
				    <li><a href="agenda.php">Agenda</a></li>
				    <li><a href="produtos.php">Estoque</a></li>
                    <li><a href="contratoCadastro.php">Novo Contrato</a></li>
					<li><a href="meusContratos.php">Meus Contratos</a></li>
					

					<!--<li><a href="meusContratos.php">Meus Contratos</a></li>-->

				    <li><a href="sair.php">Sair</a></li>

			    <?php  else: ?>

			 		<!--<li><a href="Cadastre-se.php">Cadastre-se</a></li>-->

					<!--<li><a href="login.php">Login</a></li>-->

				<?php endif;?>

			</ul>

			

		</div>

	</nav>
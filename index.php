<?php require 'pages/header.php';?>

<?php

if(!empty($_SESSION['cLogin'])){

		 ?>

	<div class="container img1">
		<div class="jumbotron  img2"  >
			<h1 class="titulo"> Gerenciamento De Contratos</h1>
			<h3>Bem Vindo! Acompanhe Seu Rendimento</h3>
		</div>
		<div class="row">
				<form method="POST" id="formPesquisa">
						<div class="form-group col-md-5">

						<label for="txtDataInicio">Data Inicio:</label>

						<input type="date" class="form-control" id="txtDataInicio" name="txtDataInicio">


					</div>

					<div class="form-group col-md-5">

						<label for="txtDataFim">Data final:</label>

						<input type="date" class="form-control" id="txtDataFim" name="txtDataFim">

					</div>


					
					<div class="form-group col-md-2">

						<input type="submit" value='Pesquisar' class="btn btn-primary btnn">
					</div>
								
				</form>

		</div>

		  <div class="row">
		  		<div class="col-md-12">
		  		 <canvas id="myChart" width="600px" height="200px"></canvas>
		  		</div> 
		  </div>

		</div>

		

	</div>	         

							

	<?php

}else{

	 ?>

		<script language= "JavaScript">

			location.href="login.php";

		</script>

							

	<?php

}



	

?>

	



<?php require 'pages/footer.php';?>
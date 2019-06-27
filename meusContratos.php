<?php
require 'pages/header.php';
require 'classes/produtos.class.php';

$produto = new Produtos();


?>
<div class="container">
	<div class="row">
		<nav aria-label="breadcrumb">
		   <ol class="breadcrumb">
		   		<li class="breadcrumb-item"><a class="btn btn-primary" href="produtos.php">Estoque</a></li>
		    	<li class="breadcrumb-item"><a class="btn btn-warning" href="cadastroProdutos.php">Cadastro De produtos</a></li>
		    	<li class="breadcrumb-item"><a class="btn btn-success" href="cadastroVendas.php">Realizar Vendas</a></li>
		   </ol>
		</nav>
	</div>
	
	
	<h1>Cadastrar  Novo Produto</h1>

	<div class="row">
				<form method="POST" id="formCadastroProduto">
						<div class="form-group col-md-8">

						<label for="txtDescricaoProduto">Nome Do produto :</label>

						<input type="txt" class="form-control" id="txtDescricaoProduto" name="txtDescricaoProduto">
					</div>		
					<div class="form-group col-md-2">

						<input type="submit" value='Cadastrar' class="btn btn-primary btnn">
					</div>
								
				</form>

		</div>




	<div class="row">
			  <table class="table table-hover" width="100%" id="tbProdutos">

				   		 <thead>
						      <tr>
						        <th>Nome do Produto</th>
						        <th>Data Cadastro</th>
						        <th>Usuário Cadastro</th>
						        <th>ações</th>
						      </tr>
				   		 </thead>
				    <tbody>


				    </tbody>
                  </table>

		</div>	
</div>



<?php
	if(!empty($_POST['txtDescricaoProduto'])){
		$txtDescricaoProduto = addslashes($_POST['txtDescricaoProduto']);
		$produto->addProdutos($txtDescricaoProduto);
	}
?>



<?php require 'pages/footer.php';?>


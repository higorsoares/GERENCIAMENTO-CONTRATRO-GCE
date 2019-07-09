<?php
require 'pages/header.php';
require 'classes/vendas.class.php';
require 'classes/produtos.class.php';


$produto = new Produtos();
$venda = new Vendas();

//$venda->addVendas(1,20,"power Moramento",10);


?>
<div class="container">
	<div class="row">
		<nav aria-label="breadcrumb">
		   <ol class="breadcrumb">
		   		<li class="breadcrumb-item"><a class="btn btn-warning" href="cadastroProdutos.php">Cadastro De produtos</a></li>
	   			<li class="breadcrumb-item"><a class="btn btn-info" href="cadastroPedidos.php">Pedidos</a></li>
		    	<li class="breadcrumb-item"><a class="btn btn-primary" href="produtos.php">Estoque</a></li>
		    	<li class="breadcrumb-item"><a class="btn btn-success" href="cadastroVendas.php">Realizar Vendas</a></li>
		   </ol>
		</nav>
	</div>
	
	<h1>Cadastrar Vendas </h1>

	<div class="row">
				<form method="POST" id="formCadastroVendas">
					<div class="form-group col-md-3">
					<label for="txtProdudo">Produto</label>
					<select class="form-control" name="txtProdudo" id="txtProdudo">
						<option>Selecione</option>
						<?php 
							$cat = $produto->getProduto();
							foreach ($cat as $item):
						?>
							<option value="<?php echo utf8_decode( $item['id_produto']); ?>"><?php echo utf8_encode( $item['descricao_produto']);?></option>
						<?php endforeach;?>
					</select>
				</div>

					<div class="form-group col-md-2">
						<label for="txtQuantidade">Quantidade:</label>
						<input type="number" class="form-control"  placeholder="Quantidade" id="txtQuantidade" name="txtQuantidade">
					</div>	
					<div class="form-group col-md-3">
						<label for="txtEmpresa">Empresa:</label>
						<input type="text" class="form-control" placeholder="Nome Da Empresa" id="txtEmpresa" name="txtEmpresa">
					</div>
					<div class="form-group col-md-2">
						<label for="txtFrete">Frete:</label>
						<input type="text" class="form-control"  placeholder="Valor Do Frete" id="txtFrete" name="txtFrete">
					</div>	
					<div class="form-group col-md-2">
						<!--<input type="submit" value='Cadastrar' class="btn btn-primary btnn">-->
						<button type="submit" id="btnVenda" class="btn btn-primary btnn"><i class="fas fa-money-check-alt"> Cadastrar  Venda</i></button>
					</div>		
				</form>

		</div>




	<div class="row">
			  <table class="table table-bordered" width="100%" id="tbVendas">

				   		 <thead>
						      <tr>
						        <th>Produto</th>
						        <th>Empresa</th>
						        <th>Quantidade</th>
						        <th>frete</th>
						        <th>Data Venda</th>
						        <th>ações</th>
						      </tr>
				   		 </thead>
				    <tbody>


				    </tbody>
                  </table>

		</div>	
</div>



<?php
	/*
	if(!empty($_POST['txtProdudo'])){

	

	    $txtProduto = $_POST['txtProdudo'];
		$txtQuantidade = $_POST['txtQuantidade'];
		$txtEmpresa = $_POST['txtEmpresa'];
		$txtFrete = $_POST['txtFrete'];

		$venda->addVendas($txtProduto,$txtQuantidade,$txtEmpresa,$txtFrete);
}
*/
?>



<?php require 'pages/footer.php';?>


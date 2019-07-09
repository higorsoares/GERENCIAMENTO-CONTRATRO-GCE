<?php
require 'pages/header.php';
require 'classes/produtos.class.php';
require 'classes/quantidade.class.php';

$produto = new Produtos();
$quantidade = new Quantidade();



?>
<div class="container">
	<nav aria-label="breadcrumb">
	   <ol class="breadcrumb">
	   			<li class="breadcrumb-item"><a class="btn btn-warning" href="cadastroProdutos.php">Cadastro De produtos</a></li>
	   			<li class="breadcrumb-item"><a class="btn btn-info" href="cadastroPedidos.php">Pedidos</a></li>
		    	<li class="breadcrumb-item"><a class="btn btn-primary" href="produtos.php">Estoque</a></li>
		    	<li class="breadcrumb-item"><a class="btn btn-success" href="cadastroVendas.php">Realizar Vendas</a></li>
	   </ol>
	</nav>
	<h1>Quantidade Em Estoque</h1>
	<div class="row">
		<?php 
	   		if($_SESSION['cLogin'] != 5):
	   	?>
				<form method="POST" id="formCadastroQuantidade">
					<div class="form-group col-md-3">
					<label for="txtProdudo">Produto</label>
					<select class="form-control" name="txtProdudo">
						<option>Selecione</option>
						<?php 
							$cat = $produto->getProduto();
							foreach ($cat as $item):
						?>
							<option value="<?php echo utf8_decode( $item['id_produto']); ?>"><?php echo utf8_encode( $item['descricao_produto']);?></option>
						<?php endforeach;?>
					</select>
				</div>

					<div class="form-group col-md-3">
						<label for="txtQuantidade">Quantidade:</label>
						<input type="number" placeholder="Quantidade" class="form-control" id="txtQuantidade" name="txtQuantidade">
				
					</div>	
					<!--
					<div class="form-group col-md-3">
						<label for="txtValorProduto">Valor Do produto :</label>
						<input type="number" placeholder="Valor Do Produto" class="form-control" id="txtValorProduto" name="txtValorProduto">
					</div>	
						-->
					<div class="form-group col-md-2">
						<input type="submit" value='Cadastrar' class="btn btn-primary btnn">
					</div>		
				</form>
          <?php endif;?>
		</div>



	<div class="row">
			  <table class="table table-hover" width="100%" id="tbQuantidade">

				   		 <thead>
						      <tr>
						        <th>Nome do Produto</th>
						        <th>Quantidade</th>
						         <th>Eqpt Defeitos</th>
						        <th>Usuário Cadastro</th>
						        <th>AddQuantidade</th>
						        <th>AddEqpt Defeitos</th>
						      </tr>
				   		 </thead>
				    <tbody>


				    </tbody>
                  </table>

		</div>	


</div>

<?php
if(!empty($_POST['txtProdudo'])){

	$txtProdudo = addslashes($_POST['txtProdudo']);
	$txtQuantidade = addslashes($_POST['txtQuantidade']);
	

	$quantidade->addQuantidade($txtProdudo,$txtQuantidade);
}

?>
<?php require 'pages/footer.php';?>


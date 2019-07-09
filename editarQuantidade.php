<?php
require 'pages/header.php';
require 'classes/produtos.class.php';
require 'classes/quantidade.class.php';
$produto = new Produtos();
$quantidade = new Quantidade();

if(!empty($_GET['id'])){
	$id_qtd = $_GET['id'];

$ret = $quantidade->getId($id_qtd);


}else{
	echo "nada encontrado";
}

?>

<div class="container">
	
	<h1>Adicionar nova quantidade </h1>
	<div class="row">
				<form method="POST" id="formEditarQuantidade">
					<input type="hidden" value="<?php echo $ret['idQtd']?>" name="txtIdQuantidade">
					<div class="form-group col-md-3">
					<label for="txtProdudo">Produto</label>
					<select class="form-control" name="txtProdudo">
						<option>Selecione</option>
						<?php 
							$cat = $produto->getProduto();
							foreach ($cat as $item):
						?>
							<option value="<?php echo utf8_decode( $ret['id_produto']); ?>" <?php echo utf8_encode( $ret['descricao_produto']) ==  utf8_encode($ret['descricao_produto']) ? 'selected':'';?>><?php echo utf8_encode( $ret['descricao_produto']);?></option>
						<?php endforeach;?>
					</select>
				</div>

					<div class="form-group col-md-3">
						<label for="txtQuantidade">Quantidade:</label>
						<input type="number" placeholder="Quantidade" class="form-control" id="txtQuantidade" name="txtQuantidade">
					</div>	
						<div class="form-group col-md-3">
						<label for="txtValorProduto">Valor Do produto :</label>
						<input type="number" value="<?php echo $ret['valor_produto'];?>" placeholder="Valor Do Produto" class="form-control" id="txtValorProduto" name="txtValorProduto">
					</div>	
					<div class="form-group col-md-2">
						<input type="submit" value='Cadastrar' class="btn btn-primary btnn">
					</div>		
				</form>

		</div>

		</div>

<?php
if(!empty($_POST['txtQuantidade'])){

	$txtIdQuantidade = $_POST['txtIdQuantidade'];
	$txtQuantidade = $_POST['txtQuantidade'];
	$txtValorProduto = $_POST['txtValorProduto'];

	$rxr = $quantidade->AltQuantidade($txtIdQuantidade,$txtQuantidade, $txtValorProduto);
	echo $rxr;
}



?>




<?php require 'pages/footer.php';?>
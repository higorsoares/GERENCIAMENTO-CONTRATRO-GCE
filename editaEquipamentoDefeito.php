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
	
	<h1>Adicionar Produtos Com Defeitos </h1>
	<div class="row">
				<form method="POST" id="formProdutosDefeitos">
					<input type="hidden" value="<?php echo $ret['idQtd']?>" name="txtIdQuantidade" id="txtIdQuantidade">
					<div class="form-group col-md-3">
					<label for="txtProdudo">Produto</label>
					<select class="form-control" name="txtProdudo" id="txtProdudo">
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
						<label for="txtEqptDefeito">Quantidade Equipamento Defeito:</label>
						<input type="number"  placeholder="Digite a quantidade" class="form-control" id="txtEqptDefeito" name="txtEqptDefeito">
					</div>	
					<button type="submit" id="btnProdutoEstrgado" class="btn btn-primary btnn"><i class="fas fa-money-check-alt"> Adicionar Produto</i></button>
									</div>	
				</form>

		</div>

		</div>


<?php require 'pages/footer.php';?>
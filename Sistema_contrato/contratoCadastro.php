<?php 
require 'pages/header.php';
require 'classes/categoria.class.php';
require 'classes/situacao.class.php';
require 'classes/contrato.class.php';
$categorias = new Categoria();
$situacoes = new Situacao();
$contrato = new Contrato();

?>

	<div class="container">
		<h1>Novo Contrato</h1>
		<form method="POST">
			<div class="row">
				<div class="form-group col-md-7">
					<label for="nome">Razão social:</label>
					<input type="text" name="razao" id="razao" class="form-control">
				</div>
				<div class="form-group col-md-2">
					<label for="text">cnpj:</label>
					<input type="text" name="cnpj" id="cnpj" class="form-control">
				</div>
				<div class="form-group col-md-3">
					<label for="text">Responsavel:</label>
					<input type="text" name="Responsavel" id="Responsavel" class="form-control">
				</div>
				
			</div>
			<div class="row">
				<div class="form-group col-md-2">
					<label for="telefone">Telefone:</label>
					<input type="text" name="telefone" id="telefone" class="form-control">
				</div>
				<div class="form-group col-md-10">
					<label for="Email">Email:</label>
					<input type="email" name="email" id="email" class="form-control">
				</div>

			</div>
			<div class="row">
				<div class="form-group col-md-5">
					<label for="senha">Tipo de contrato:</label>
					<select class="form-control" name="tipoCont">
						<option>Selecione</option>
						<?php 
							$cat = $categorias->getCategoria();
							foreach ($cat as $item):
						?>
							<option value="<?php echo utf8_decode( $item['id']); ?>"><?php echo utf8_encode( $item['descricao_cat']);?></option>
						<?php endforeach;?>
					</select>
				</div>
				<div class="form-group col-md-5">
					<label for="telefone">Situação do contrato:</label>
					
					<select class="form-control" name="situacoes">
						<option>Selecione</option>
						<?php 
							$sit = $situacoes->getSituacao();
							foreach ($sit as $item):
						?>
							<option value="<?php echo utf8_decode( $item['id']); ?>"><?php echo utf8_encode( $item['descricao']);?></option>
						<?php endforeach;?>
					</select>

				
				</div>
				<div class="form-group col-md-2">
					<label for="valor">Valor:</label>
					<input type="text" name="valor" id="valor" class="form-control">
				</div>
			</div>
			
			
			<input type="submit" value='Cadastrar' class="btn btn-default">
		</form>
		
	</div>
	<?php
		if(!empty($_POST['razao']) && !empty($_POST['cnpj']) && !empty($_POST['Responsavel'])){
				$razao = addslashes($_POST['razao']);
				$cnpj = addslashes($_POST['cnpj']);
				$responsavel = addslashes($_POST['Responsavel']);
				$telefone = addslashes($_POST['telefone']);
				$valor = addslashes($_POST['valor']);
				$email = addslashes($_POST['email']);
				$tipoCont = addslashes($_POST['tipoCont']);
				$sit = addslashes($_POST['situacoes']);

				$contrato->cadastroContrato($razao,$cnpj,$responsavel,$telefone,$valor,$tipoCont,$sit,$email);

				         ?>
				         <div class="container">
				         	<div class="alert alert-warning">
								Cadastro concluido!
							</div>
				         </div>
							
						<?php
		}else{
				       
		}

	?>

<?php require 'pages/footer.php';?>
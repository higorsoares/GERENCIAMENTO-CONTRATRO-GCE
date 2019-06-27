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
					<input type="text" name="razao" id="razao" class="form-control" placeholder="Razão social">
				</div>
				<div class="form-group col-md-2">
					<label for="text">cnpj:</label>
					<input type="text" name="cnpj" id="cnpj" class="form-control" placeholder="CNPJ OU CPF">
				</div>
				<div class="form-group col-md-3">
					<label for="text">Responsavel:</label>
					<input type="text" name="Responsavel" id="Responsavel" class="form-control" placeholder="Responsavel pela empresa">
				
				</div>
			</div>
			<div class="row">
				<div class="form-group col-md-2">
					<label for="telefone">Telefone 1:</label>
					<input type="text" name="telefone" id="telefone" class="form-control" placeholder="Contao 1">
				</div>
				<div class="form-group col-md-2">
					<label for="txtTelefone2">Telefone 2:</label>
					<input type="text" name="txtTelefone2" id="txtTelefone2" class="form-control" placeholder="Contato 2">
				</div>
				<div class="form-group col-md-8">
					<label for="Email">Email:</label>
					<input type="email" name="email" id="email" class="form-control" placeholder="E-mail: exemplo@gmail.com">
				</div>

			</div>
			<div class="row">
				<div class="form-group col-md-2">
					<label for="txtEstado">Estado:</label>
					<select class="form-control" name="txtEstado">
						<option>Selecione</option>
						<option value="AL">AL</option>
						<option value="SP">SP</option>
						<option value="RJ">RJ</option>
						<option value="MG">MG</option>
						<option value="BA">BA</option>
						<option value="ES">ES</option>
						<option value="SC">SC</option>
						<option value="RS">RS</option>
						<option value="GO">GO</option>
						<option value="DF">DF</option>
						<option value="MT">MT</option>
					</select>
				</div>
				
				<div class="form-group col-md-3">
					<label for="Cidade">Cidade:</label>
					<input type="text" name="txtCidade" id="txtCidade" class="form-control" placeholder="Cidade">
				</div>
				<div class="form-group col-md-3">
					<label for="txtBairro">Bairro:</label>
					<input type="text" name="txtBairro" id="txtBairro" class="form-control" placeholder="Bairro">
				</div>
				<div class="form-group col-md-3">
					<label for="txtRua">Rua:</label>
					<input type="text" name="txtRua" id="txtRua" class="form-control" placeholder="Endereço">
				</div>
				<div class="form-group col-md-1">
					<label for="txtNumero">Numero:</label>
					<input type="text" name="txtNumero" id="txtNumero" class="form-control" placeholder="Nº">
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
				<div class="form-group col-md-3">
					<label for="situacao">Situação do contrato:</label>
					
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
					<label for="valor">Valor start:</label>
					<input type="text" name="valor" id="valor" class="form-control" placeholder="Valor Inicial">
				</div>
				<div class="form-group col-md-2">
					<label for="txtValorMensal">Valor mensal:</label>
					<input type="text" name="txtValorMensal" id="txtValorMensal" class="form-control" placeholder="Valor Mensal">
				</div>
			</div>
			
			
			<input type="submit" value='Cadastrar' class="btn btn-primary">
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

				$telefone_2 = addslashes($_POST['txtTelefone2']);
				$estado = addslashes($_POST['txtEstado']);
				$cidade = addslashes($_POST['txtCidade']);
				$bairro = addslashes($_POST['txtBairro']);
				$rua = addslashes($_POST['txtRua']);
				$numero = addslashes($_POST['txtNumero']);
				$valor_mensal = addslashes($_POST['txtValorMensal']);

				$contrato->cadastroContrato(
					$razao,
					$cnpj,
					$responsavel,
					$telefone,
					$valor,
					$tipoCont,
					$sit,
					$email,
					$telefone_2,
					$estado,
					$cidade,
					$bairro,
					$rua,
					$numero,
					$valor_mensal
				);

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
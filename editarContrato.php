<?php

require 'pages/header.php';

require 'classes/categoria.class.php';

require 'classes/contrato.class.php';

require 'classes/situacao.class.php';

$categorias = new Categoria();

$contract = new Contrato();

$situacoes = new Situacao();





$contract = new Contrato();

if(!empty($_GET['id'])){

	$id = $_GET['id'];

	

	$ret = $contract->getId2($id);





}



?>

Prezado Cliente,										
										
Recebemos em nossa central o Acionamento de um ALERTA identificado abaixo, efetuamos varias tentativas de contato em todos os telefones cadastrados, porem sem sucesso de contato com cliente/associado, devido ha isso tomamos as seguintes medidas:	
	
											
TIPO DE ALERTA:
PLACA:      {{PLACA}} 
CLIENTE/ASSOCIADO:     {{CLIENTE}}
MODELO DO VEICULO:    {{MODELO}}
LOCALIZAÇÃO:      {{LOCAL}}
RECADO NA CAIXA DE MSG CEL:										
ENVIO DE WHATSAPP: (   ) sim /  (   ) não	
										
Gostaríamos de saber se vocês possuem algum outro contato do cliente que não esteja em seu cadastro?

PROTOCOLOS DE LIGAÇOES EFETUADAS:


										
Finalizando, colocamo-nos à disposição para prestar quaisquer esclarecimentos adicionais julgados necessários. 

<div class="container">

		<h1>Editar informações</h1>

		<form method="POST" action="update.php">

			<div class="row">

				<input type="hidden" name="id" id="id" value="<?php echo $ret['id_emp']?>" class="form-control">

				<div class="form-group col-md-7">

					<label for="nome">Razão social:</label>

					<input type="text" name="razao" id="razao" value="<?php echo $ret['razao_social']?>" class="form-control">

				</div>

				<div class="form-group col-md-2">

					<label for="text">cnpj:</label>

					<input type="text" name="cnpj" id="cnpj" value="<?php echo $ret['cnpj']?>"class="form-control">

				</div>

				<div class="form-group col-md-3">

					<label for="text">Responsavel:</label>

					<input type="text" name="Responsavel" id="Responsavel" value="<?php echo $ret['nome_responsavel']?>" class="form-control">

				</div>

				

			</div>

			<div class="row">

				<div class="form-group col-md-2">

					<label for="telefone">Telefone:</label>

					<input type="text" name="telefone" id="telefone" value="<?php echo $ret['telefone_contato']?>"class="form-control">

				</div>
				<div class="form-group col-md-2">
					<label for="txtTelefone2">Telefone 2:</label>
					<input type="text" name="txtTelefone2" id="txtTelefone2" value="<?php echo $ret['telefone_contato2'];?>" class="form-control" placeholder="Contato 2">
				</div>

				<div class="form-group col-md-8">

					<label for="Email">Email:</label>

					<input type="email" name="email" id="email" value="<?php echo $ret['email']?>" class="form-control">

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
					<input type="text" name="txtCidade" value="<?php echo $ret['cidade']?>" id="txtCidade" class="form-control" placeholder="Cidade">
				</div>
				<div class="form-group col-md-3">
					<label for="txtBairro">Bairro:</label>
					<input type="text" name="txtBairro" value="<?php echo $ret['bairro']?>" id="txtBairro" class="form-control" placeholder="Bairro">
				</div>
				<div class="form-group col-md-3">
					<label for="txtRua">Rua:</label>
					<input type="text" name="txtRua" value="<?php echo $ret['rua']?>" id="txtRua" class="form-control" placeholder="Endereço">
				</div>
				<div class="form-group col-md-1">
					<label for="txtNumero">Numero:</label>
					<input type="text" name="txtNumero" value="<?php echo $ret['numero']?>" id="txtNumero" class="form-control" placeholder="Nº">
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

							<option value="<?php echo utf8_decode( $item['id']); ?>" <?php echo utf8_encode( $ret['descricao_cat']) ==  utf8_encode($item['descricao_cat']) ? 'selected':'';?>><?php echo utf8_encode( $item['descricao_cat']);?></option>

						<?php endforeach;?>

					</select>

				</div>

				<div class="form-group col-md-3">

					<label for="telefone">Situação do contrato:</label>

					

					<select class="form-control" name="situacoes">

						<option >Selecione</option>

						<?php 

							$sit = $situacoes->getSituacao();

							foreach ($sit as $item):

						?>

							<option value="<?php echo utf8_encode( $item['id']);?>" <?php echo utf8_encode( $ret['descricao']) ==  utf8_encode($item['descricao']) ? 'selected':'';?>><?php echo utf8_encode( $item['descricao']);?></option>

						<?php endforeach;?>

					</select>



				

				</div>

				<div class="form-group col-md-2">

					<label for="valor">Valor:</label>

					<input type="text" name="valor" id="valor" value="<?php echo $ret['valor']?>"class="form-control">

				</div>
				<div class="form-group col-md-2">
					<label for="txtValorMensal">Valor mensal:</label>
					<input type="text" name="txtValorMensal" value="<?php echo $ret['valor_mensal']?>" id="txtValorMensal" class="form-control" placeholder="Valor Mensal">
				</div>

			</div>

			

			

			<input type="submit" value='Atualizar informações' class="btn btn-primary">

		</form>

		

	</div>







	

	<?php require 'pages/footer.php';?>
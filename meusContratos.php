<?php 

require 'pages/header.php';

require 'classes/categoria.class.php';
require 'classes/situacao.class.php';

require 'classes/contrato.class.php';

$categorias = new Categoria();

$situacao = new Situacao();

$contract = new Contrato();



?>



	<div class="container">

		<div class="row">

			<form method="POST" id="formCategoria">
				<div class="row">

					<div class="form-group col-md-5">

						<label for="txtCategoria">Tipo de contrato:</label>

						<select class="form-control" name="txtCategoria" id="txtCategoria">

							<option>Selecione</option>

								<?php 

									$cat = $categorias->getCategoria();

									foreach ($cat as $item):

								?>

							 <option value="<?php echo  $item['id']; ?>"><?php echo utf8_encode($item['descricao_cat']) ;?></option>

								<?php endforeach;?>

						</select>

					</div>

					


					
					<div class="form-group col-md-2">

						<input type="submit" value='Pesquisar' class="btn btn-primary btnn">
					</div>

				</div>

				<div class="row">

					

				</div>
			</form>

		</div>



		<div class="row">

			  <table class="table table-bordered" width="100%" id="table">

				   		 <thead>

						      <tr>

						        <th>Razao Social</th>

						        <th>Responsavel</th>

						        <th>Telefone</th>

						        <th>Situação do contrato</th>

						        <th>Data de cadastro</th>
						        <th>acoes</th>

						        

						      </tr>

				   		 </thead>

				    <tbody>


				    </tbody>

                  </table>

		</div>		

	</div>






<?php require 'pages/footer.php';?>
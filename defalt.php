<?php 

require 'pages/header.php';

require 'classes/categoria.class.php';

require 'classes/contrato.class.php';

$categorias = new Categoria();

$contract = new Contrato();



?>



	<div class="container">

		<div class="row">

			<form method="POST">

				<div class="row">

					<div class="form-group col-md-5">

						<input type="submit" value='Pesquisar' class="btn btn-default">

					</div>

				</div>

				





			</form>

		</div>



		<div class="row">

			  <table class="table table-hover">

				   		 <thead>

						      <tr>

						        <th>Razao Social</th>

						        <th>Responsavel</th>

						        <th>Telefone</th>

						        <th>Situação do contrato</th>

						        <th>Data de cadastro</th>

						        <th>Ações</th>

						      </tr>

				   		 </thead>

				    <tbody>

				    	<?php

				    	$ret = $contract->getALL();

				    	



				    		foreach ($ret as $item ) :



				    		

				    	?>

				      <tr>

				        <td><?php echo $item['razao_social'];?></td>

				        <td><?php echo $item['nome_responsavel'];?></td>

				        <td><?php echo $item['telefone_contato'];?></td>

				        <td><?php echo utf8_encode($item['descricao']);?></td>

				        <td><?php echo $item['dh_cadastro'];?></td>

				        <td>

				        	<a class="btn btn-info" href="editarContrato.php?id=<?php echo $item['id_emp']?>">Alterar Situação</a>

				        	<a class="btn btn-danger" href="editar.php?id=<?php echo $item['id_emp']?>">Cancelar</a>

				        </td>

				      </tr>

				  <?php endforeach;?>

				    </tbody>

                  </table>

		</div>		

	</div>









<?php require 'pages/footer.php';?>
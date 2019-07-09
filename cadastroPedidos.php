<?php
require 'pages/header.php';
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

	<ul class="nav nav-tabs">
		<li class="active">
			<a href="#tab-cadastroPedido" data-toggle="tab">Novo Pedido</a>
		</li>
		<li>
			<a href="#tab-ProdutoRelatorio" data-toggle="tab">Relatorio Pedidos</a>
		</li>
		
		
	</ul>
	

	<div class="tab-content">
		<div class="tab-pane active" id="tab-cadastroPedido">
			<h1>Novo Pedido</h1>

					<div class="row">
								<form method="POST" id="formCadastroPedido">
									<div class="form-group col-md-3">
										<label for="txtNomeEmpresa">Nome empresa :</label>
										<input type="text" class="form-control" id="txtNomeEmpresa" name="txtNomeEmpresa">
									</div>	
									<div class="form-group col-md-3">
										<label for="txtProdutos">Produto :</label>
										<select class="form-control" id="txtProdutos" name="txtProdutos">
											<option> Selecione </option>
										</select>
									</div>

									<div class="form-group col-md-3">
										<label for="txtQuantidade">Quantidade:</label>
										<input type="text" class="form-control" id="txtQuantidade" name="txtQuantidade">
									</div>


									<div class="form-group col-md-2">
									<button type="submit" id="btnPedido" class="btn btn-primary btnn"><i class="fas fa-money-check-alt"> Cadastrar Pedido</i></button>
									</div>
												
								</form>

						</div>




					<div class="row">
							  <table class="table table-bordered" width="100%" id="tbPedidos">

								   		 <thead>
										      <tr>
										        <th>Empresa</th>
										        <th>Quantidade</th>
										        <th>Produto</th>
										        <th>Usuário Cadastro</th>
										        <th>Data Emisão</th>
										        <th>Status pedido</th>
										        <th>Confirmar Pedido</th>
										        <th>ações</th>
										      </tr>
								   		 </thead>
								    <tbody>


								    </tbody>
				                  </table>

					</div>	
			</div>
			<div class="tab-pane" id="tab-ProdutoRelatorio">
				<h1>Relatório de pedidos</h1>

				<div class="row">
					<form method="POST" id="FormRelatoriosProduto">
						<div class="form-group col-md-3">
								<label for="txtDataInicio">Data Inicial</label>
								<input type="date" class="form-control" id="txtDataInicio" name="txtDataInicio">
						</div>
						<div class="form-group col-md-3">
								<label for="txtDataFim">Data Final</label>
								<input type="date" class="form-control" id="txtDataFim" name="txtDataFim">
						</div>	
						<div class="form-group col-md-2">
							<button type="submit" id="btnPesquisa" class="btn btn-primary btnn"><i class="fas fa-money-check-alt"> Pesquisar</i></button>
						</div>
						
					</form>
				</div>

					<div class="row">
							  <table class="table table-bordered" width="100%" id="tbRelatorioPedidos">

								   		 <thead>
										      <tr>
										        <th>Empresa</th>
										        <th>Quantidade</th>
										        <th>Produto</th>
										        <th>Usuário Execução</th>
										        <th>Data Execução</th>
										        <th>Status pedido</th>
										      </tr>
								   		 </thead>
								    <tbody>


								    </tbody>
				                  </table>

					</div>




			</div>

		</div>
		
	</div>
	



<?php require 'pages/footer.php';?>
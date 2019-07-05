<?php

	//session_start();

//require 'config.php';

	class Contrato{

		private $pdo;



		public function __construct(){

			$this->pdo = new PDO('mysql:dbname=contratov3;host=localhost;','root','');

          //$this->pdo = new PDO('mysql:dbname=id4070983_contratov4;host=localhost;','id4070983_igor','itr12909012');

			//$this->pdo = new PDO('mysql:dbname=contratov5;host=localhost;','root','');

			//$this->pdo = new PDO('mysql:dbname=contrato;host=localhost;','root','');
			//$this->pdo = new PDO('mysql:dbname=id9889481_contratov3;host=localhost;','id9889481_igor','itr12909012');

//			$this->pdo = new PDO('mysql:dbname=id9889481_sistema_contrato;host=localhost;','id9889481_igor','itr12909012');

		}





		public function cadastroContrato(
		 $razao_social,
		 $cnpj,
		 $nome_responsavel,
		 $telefone_contato,
		 $valor,
		 $id_categoria,
		 $id_situacao,
		 $email,
		 $telefone_2,
		 $estado,
		 $cidade,
		 $bairro,
		 $rua,
		 $numero,
		 $valor_mensal,
		 $txtRestante,
		 $txtDataPagamento,
		 $txtObservacao){

        $sql = "INSERT INTO empresas SET razao_social = :razao_social, cnpj = :cnpj ,nome_responsavel = :nome_responsavel, telefone_contato = :telefone_contato, valor = :valor , id_categoria = :id_categoria, id_situacao = :id_situacao, id_user = :id_user, email = :email, telefone_contato2 = :telefone_contato2, estado = :estado, cidade = :cidade, bairro = :bairro , rua = :rua , numero = :numero , valor_mensal = :valor_mensal, valor_restante = :valor_restante, dh_pagamento = :dh_pagamento , observacao = :observacao";

			$sql = $this->pdo->prepare($sql);

			$sql->bindValue(':razao_social',$razao_social);

			$sql->bindValue(':cnpj',$cnpj);

			$sql->bindValue(':nome_responsavel',$nome_responsavel);

			$sql->bindValue(':telefone_contato',$telefone_contato);

			$sql->bindValue(':valor',$valor);

			$sql->bindValue(':id_categoria', $id_categoria);

			$sql->bindValue(':id_situacao',$id_situacao);

			$sql->bindValue(':id_user',$_SESSION['cLogin']);

			$sql->bindValue(':email',$email);
			$sql->bindValue(':telefone_contato2',$telefone_2);
			$sql->bindValue(':estado',$estado);
			$sql->bindValue(':cidade',$cidade);
			$sql->bindValue(':bairro',$bairro);
			$sql->bindValue(':rua',$rua);
			$sql->bindValue(':numero',$numero);
			$sql->bindValue(':valor_mensal',$valor_mensal);
			$sql->bindValue(':valor_restante',$txtRestante);
			$sql->bindValue(':dh_pagamento',$txtDataPagamento);
			$sql->bindValue(':observacao',$txtObservacao);

			$sql->execute();



		}







		public function updateContrato(
					 $razao_social,
					 $cnpj,
			 		 $nome_responsavel,
					 $telefone_contato,
					 $valor,
					 $id_categoria,
					 $id_situacao, 
					 $email,
					 $id,
					 $telefone_2,
					 $estado,
					 $cidade,
					 $bairro,
					 $rua,
					 $numero,
					 $valor_mensal,
					 $txtRestante,
					 $txtDataPagamento,
					 $txtObservacao
					){



			$sql = "UPDATE empresas SET razao_social = :razao_social, cnpj = :cnpj ,nome_responsavel = :nome_responsavel, telefone_contato = :telefone_contato, valor = :valor , id_categoria = :id_categoria, id_situacao = :id_situacao , email = :email, telefone_contato2 = :telefone_contato2, estado = :estado, cidade = :cidade, bairro = :bairro , rua = :rua , numero = :numero , valor_mensal = :valor_mensal,  valor_restante =:valor_restante, dh_pagamento = :dh_pagamento , observacao = :observacao WHERE id = :id";

			$sql = $this->pdo->prepare($sql);

			$sql->bindValue(':razao_social',$razao_social);

			$sql->bindValue(':cnpj',$cnpj);

			$sql->bindValue(':nome_responsavel',$nome_responsavel);

			$sql->bindValue(':telefone_contato',$telefone_contato);

			$sql->bindValue(':valor',$valor);

			$sql->bindValue(':id_categoria', $id_categoria);

			$sql->bindValue(':id_situacao',$id_situacao);

			$sql->bindValue(':email',$email);

			$sql->bindValue(':id',$id);

			$sql->bindValue(':telefone_contato2',$telefone_2);
			$sql->bindValue(':estado',$estado);
			$sql->bindValue(':cidade',$cidade);
			$sql->bindValue(':bairro',$bairro);
			$sql->bindValue(':rua',$rua);
			$sql->bindValue(':numero',$numero);
			$sql->bindValue(':valor_mensal',$valor_mensal);
			$sql->bindValue(':valor_restante',$txtRestante);
			$sql->bindValue(':dh_pagamento',$txtDataPagamento);
			$sql->bindValue(':observacao',$txtObservacao);

			$sql->execute();

		}





		public function getContratos(){

			$sql = "SELECT * FROM empresas WHERE id_user = :id_user";

			$sql = $this->pdo->prepare($sql);

			$sql->bindValue(":id_user",$_SESSION['cLogin']);

			$sql-execute();



			if($sql->rowCount() > 0){

				$sql->fecthAll();



				return $sql;

			}else{



				return false;

			}



		}



		public function getALL(){

			$id = '1';

			$sql = "SELECT emp.id as id_emp, emp.razao_social, emp.nome_responsavel, emp.telefone_contato, sit.descricao, emp.dh_cadastro  FROM empresas as emp 

			inner join situacoes as sit on emp.id_situacao = sit.id where emp.id_user = :id_user";

			$sql = $this->pdo->prepare($sql);

			$sql->bindValue(':id_user',$_SESSION['cLogin']);

			$sql->execute();



			if($sql->rowCount() > 0){

				$dados = $sql->fetchAll();



				return $dados;

			}else{

				return "nada encontrado";

			}



		}



		public function getId($id){

			$sql = "SELECT emp.id  FROM empresas as emp 

			inner join situacoes as sit on emp.id_situacao = sit.id

			inner join categoria as cat on emp.id_categoria = cat.id 

			where emp.id = :id";

			$sql = $this->pdo->prepare($sql);

			$sql->bindValue(':id',$id);

			$sql->execute();



			if($sql->rowCount() > 0){

				$dados = $sql->fetch();



				return $dados;

			}else{

				return "nada encontrado";

			}



		}

		public function getId2($id){

			$sql = "SELECT emp.id as id_emp, sit.id as id_sit , cat.id as id_cat , emp.razao_social, emp.cnpj, emp.nome_responsavel,emp.telefone_contato, emp.telefone_contato2 , emp.estado, emp.cidade, emp.bairro, emp.rua, emp.numero,cat.descricao_cat, sit.descricao, emp.valor, emp.valor_mensal, emp.email, emp.valor_restante, emp.dh_pagamento, emp.observacao FROM empresas as emp 

			inner join situacoes as sit on emp.id_situacao = sit.id

			inner join categoria as cat on emp.id_categoria = cat.id 

			where emp.id = :id";

			$sql = $this->pdo->prepare($sql);

			$sql->bindValue(':id',$id);

			$sql->execute();



			if($sql->rowCount() > 0){

				$dados = $sql->fetch();



				return $dados;

			}else{

				return "nada encontrado";

			}



		}

		public function getIdCategoria($id_categoria){

			$id = '1';

			$sql = "SELECT emp.id as id_emp, emp.razao_social, emp.nome_responsavel, emp.telefone_contato, sit.descricao, emp.dh_cadastro  FROM empresas as emp 

			inner join situacoes as sit on emp.id_situacao = sit.id where emp.id_user = :id_user AND id_categoria = :id_categoria ORDER BY sit.descricao DESC";

			$sql = $this->pdo->prepare($sql);

			$sql->bindValue(':id_user',$_SESSION['cLogin']);
			$sql->bindValue(':id_categoria',$id_categoria);

			$sql->execute();



			if($sql->rowCount() > 0){

				$dados = $sql->fetchAll();



				return $dados;

			}else{

				$retorno[]  = array(
				'razao_social' => 'Nem um registro', 
				'nome_responsavel' => 'Nem um registro',
				'telefone_contato' => 'Nem um registro',
				'descricao' => 'Nem um registro',
				'dh_cadastro' => 'Nem um registro',

				);

				return $retorno;

			}



		}


		public function getALL2(){

			

			$sql = "SELECT emp.id as id_emp, emp.razao_social, emp.nome_responsavel, emp.telefone_contato, sit.descricao, emp.dh_cadastro  FROM empresas as emp 

			inner join situacoes as sit on emp.id_situacao = sit.id where emp.id_user = :id_user  limit 1000";

			$sql = $this->pdo->prepare($sql);

			$sql->bindValue(':id_user','2');

			$sql->execute();



			if($sql->rowCount() > 0){

				$dados = $sql->fetchAll();





				return $dados;
				//var_dump($dados);

			}else{

				return "nada encontrado";

			}



		}

		public function agenda(){
			$dat = date('Y/m/d');
			$sql = "SELECT * FROM empresas WHERE dh_pagamento = :dh_pagamento";
			$sql = $this->pdo->prepare($sql);
			$sql->bindValue(':dh_pagamento',$dat);
			$sql->execute();

			if($sql->rowCount() > 0){
				$dado = $sql->fetchAll();
				return $dado;

			}

		}











	}





?>
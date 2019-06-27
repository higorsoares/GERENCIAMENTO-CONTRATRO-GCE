<?php
	//session_start();
//require 'config.php';
	class Contrato{
		private $pdo;

		public function __construct(){
			//$this->pdo = new PDO('mysql:dbname=sistema_contrato;host=localhost;','root','');
			$this->pdo = new PDO('mysql:dbname=id9889481_sistema_contrato;host=localhost;','igor','itr12909012');
		}


		public function cadastroContrato($razao_social, $cnpj,$nome_responsavel,$telefone_contato,$valor ="",
			$id_categoria,$id_situacao,$email){

			$sql = "INSERT INTO empresas SET razao_social = :razao_social, cnpj = :cnpj ,nome_responsavel = :nome_responsavel, telefone_contato = :telefone_contato, valor = :valor , id_categoria = :id_categoria, id_situacao = :id_situacao, id_user = :id_user, email = :email";
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
			$sql->execute();
		}



		public function updateContrato($razao_social, $cnpj,$nome_responsavel,$telefone_contato,$valor,
			$id_categoria,$id_situacao, $email,$id){

			$sql = "UPDATE empresas SET razao_social = :razao_social, cnpj = :cnpj ,nome_responsavel = :nome_responsavel, telefone_contato = :telefone_contato, valor = :valor , id_categoria = :id_categoria, id_situacao = :id_situacao , email = :email WHERE id = :id";
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
			$sql = "SELECT emp.id as id_emp, emp.razao_social, emp.nome_responsavel, emp.Telefone_contato, sit.descricao, emp.dh_cadastro  FROM empresas as emp 
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
			$sql = "SELECT * FROM empresas as emp 
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





	}


?>
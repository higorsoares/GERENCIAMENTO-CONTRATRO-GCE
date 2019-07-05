<?php



class Usuarios{

	private $pdo;



	public function __construct(){
//$this->pdo = new PDO('mysql:dbname=contratov5;host=localhost;','root','');
//$this->pdo = new PDO('mysql:dbname=id4070983_contratov4;host=localhost;','id4070983_igor','itr12909012');
		$this->pdo = new PDO('mysql:dbname=contratov3;host=localhost;','root','');
		//$this->pdo = new PDO('mysql:dbname=contratov2;host=localhost;','root','');
		//$this->pdo = new PDO('mysql:dbname=contrato;host=localhost;','root','');
//$this->pdo = new PDO('mysql:dbname=id9889481_contratov3;host=localhost;','id9889481_igor','itr12909012');
		//$this->pdo = new PDO('mysql:dbname=id9889481_sistema_contrato;host=localhost;','id9889481_igor','itr12909012');



	}



	public function cadastrar($nome, $senha){

		if($this->VerificaUsuario($nome) == false){

			$sql = 'INSERT INTO usuarios SET nome = :nome  pass =  :pass ';

			$sql = $this->pdo->prepare($sql);

			$sql->bindValue(':nome',$nome);

			$sql->bindValue(':pass',md5($senha));

			

			$sql->execute();

		}else{

			return false;

		}

		

	}



	public function VerificaUsuario($nome){

		$sql = 'SELECT * FROM usuarios WHERE nome = :nome';

		$sql = $this->pdo->prepare($sql);

		$sql->bindValue(':nome',$nome);

		$sql->execute();

		

		if($sql->rowCount() > 0){

			$sql->fecth();

			return true;

			//echo "usuarios ja cadastrado";

		}else{

			return false;

			//echo 'nem um usuario cadastrado';

		}





	}





	public function login($user , $senha){

		//global $pdo;

		//$ret = array();

		$sql = "SELECT * FROM usuarios WHERE nome = :nome AND pass = :pass";

		$sql = $this->pdo->prepare($sql);

		$sql->bindValue(":nome",$user);

		$sql->bindValue(":pass",md5($senha));

		$sql->execute();



		if($sql->rowCount() > 0){

			$dado = $sql->fetch();

				$_SESSION['cLogin'] = $dado['id'];



				return $dado['id'];



		}else{

			return false;

		}









	}



}



?>




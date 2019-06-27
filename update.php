<?php
require 'classes/contrato.class.php';
$contract = new Contrato();

if(!empty($_POST['razao']) && !empty($_POST['cnpj']) && !empty($_POST['Responsavel'])){
				$id = addslashes($_POST['id'])	;
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



				$contract->updateContrato(
					$razao,
					$cnpj,
					$responsavel,
					$telefone,
					$valor,
					$tipoCont,
					$sit,
					$email,
					$id,
					$telefone_2,
					$estado,
					$cidade,
					$bairro,
					$rua,
					$numero,
					$valor_mensal 
				);
				

				//echo $razao.$telefone."---".$sit.$email.$id;
				header("Location: teste.php ");


			}else{

				echo "ouve um erro";
			}




?>
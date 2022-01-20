<?php
	include dirname(__file__,2).'/models/fondas.php';

	$fondas = new Fondas();

	//Request: creacion de nueva fonda
	if(isset($_POST['create']))
	{
		$parametros = array();
        parse_str($_POST['form'], $parametros);
        if($parametros['id_fonda'] != ''){
        	if($fondas->editFonda($parametros)){
				echo 'Registro editado correctamente';
			}else{
				echo 'Error al editar el registro';
			}
        }else {
        	if($fondas->newFonda($parametros)){
				echo 'Registro almacenado correctamente';
				//header('location: ../index.php?page=new&folder='.$_GET['folder']);
			}else{
				echo 'Error al almacenar el registro';
				//header('location: ../index.php?page=new&folder='.$_GET['folder']);
			}
        }
	}

	if(isset($_GET['get']))
	{
		//echo 'Entra al edit obtener';
		$retorno = json_encode($fondas->getFondaById($_GET['id']));
		echo $retorno;
		
	}

	//Request: editar fonda
	if(isset($_POST['edit']))
	{
		echo 'Entra al edit guardar';
		if($fondas->setEditFonda($_POST)){
			header('location: ../index.php?page=edit&id='.$_POST['id'].'&success=true&folder='.$_GET['folder']);
		}else{
			header('location: ../index.php?page=edit&id='.$_POST['id'].'&error=true&folder='.$_GET['folder']);
		}

		
	}

	//Request: eliminar fonda
	if(isset($_GET['delete']))
	{
		if($fondas->deleteFonda($_GET['id'])){
			echo 'Registro eliminado correctamente';
		}else{
			echo 'No se pudo eliminar el registro';
		}
	}

?>
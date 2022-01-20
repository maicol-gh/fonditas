<?php
	include dirname(__file__,2).'/models/platillos.php';

	$platillos = new Platillos();

	//Request: creacion de nuevo platillo
	if(isset($_POST['create']))
	{
		$parametros = array();
        parse_str($_POST['form'], $parametros);
        if($parametros['id_platillo'] != ''){
        	if($platillos->editPlatillo($parametros)){
				echo 'Registro editado correctamente';
			}else{
				echo 'Error al editar el registro';
			}
        }else {
        	if($platillos->newPlatillo($parametros)){
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
		$retorno = json_encode($platillos->getPlatilloById($_GET['id']));
		echo $retorno;
	}

	//Request: editar usuario
	if(isset($_POST['edit']))
	{
		if($users->setEditUser($_POST)){
			header('location: ../index.php?page=edit&id='.$_POST['id'].'&success=true&folder='.$_GET['folder']);
		}else{
			header('location: ../index.php?page=edit&id='.$_POST['id'].'&error=true&folder='.$_GET['folder']);
		}
	}

	//Request: editar usuario
	if(isset($_GET['delete']))
	{
		if($platillos->deletePlatillo($_GET['id'])){
			echo 'Registro eliminado correctamente';
		}else{
			echo 'No se pudo eliminar el registro';
		}
	}

?>
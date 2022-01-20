<?php
	require_once dirname(__file__,2)."/config/conexion.php";
	class Platillos
	{
		private $conn;
		private $link;

		function __construct()
		{
			$this->conn   = new Conexion();
			$this->link   = $this->conn->conectarse();
		}

		//Obtiene todas los platillos registrados
		public function getPlatillos()
		{
			$query  ="select * FROM platillos";
			$result =mysqli_query($this->link,$query);
			$data   =array();
			while ($data[]=mysqli_fetch_assoc($result));
			array_pop($data);
			return $data;
		}

		//Cocina un nuevo platillo :)
		public function newPlatillo($data){
			$query="insert INTO platillos (id_fonda,nombre,descripcion,ingredientes,costo) 
						VALUES (".$data['id_fonda'].",'".$data['nombre']."','".$data['descripcion']."','".$data['ingredientes']."',".$data['costo'].")";
			$result =mysqli_query($this->link,$query);
			if(mysqli_affected_rows($this->link)>0){
				return true;
			}else{
				return false;
			}
		}

		//Obtiene el platillo por id
		public function getPlatilloById($id=NULL){
			if(!empty($id)){
				$query  ="select * FROM platillos WHERE id_platillo=".$id;
				$result =mysqli_query($this->link,$query);
				$data   =array();
				while ($data[]=mysqli_fetch_assoc($result));
				array_pop($data);
				return $data;
			}else{
				return false;
			}
		}

		//Edita el platillo por id
		public function editPlatillo($data){
			if(!empty($data['id_platillo'])){
				$query  ="update platillos 
						SET 
							id_fonda = ".$data['id_fonda'].",
							nombre = '".$data['nombre']."',
							descripcion = '".$data['descripcion']."',
							ingredientes = '".$data['ingredientes']."',
							costo = ".$data['costo']."
						WHERE id_platillo=".$data['id_platillo'];
				$result =mysqli_query($this->link,$query);
				if($result){
					return true;
				}else{
					return false;
				}
			}else{
				return false;
			}
		}

		//Elimina el platillo por id
		public function deletePlatillo($id=NULL){
			if(!empty($id)){
				$query  ="delete FROM platillos WHERE id_platillo=".$id;
				$result =mysqli_query($this->link,$query);
				if(mysqli_affected_rows($this->link)>0){
					return true;
				}else{
					return false;
				}
			}else{
				return false;
			}
		}
	}

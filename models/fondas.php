<?php
	require_once dirname(__file__,2)."/config/conexion.php";
	class Fondas
	{
		private $conn;
		private $link;

		function __construct()
		{
			$this->conn   = new Conexion();
			$this->link   = $this->conn->conectarse();
		}

		//Obtiene todas las fondas registradas
		public function getFondas()
		{
			$query  ="select * FROM fondas";
			$result =mysqli_query($this->link,$query);
			$data   =array();
			while ($data[]=mysqli_fetch_assoc($result));
			array_pop($data);
			return $data;
			mysql_close($link);
		}

		//Crea una nueva fonda
		public function newFonda($data){
			$query="insert INTO fondas (nombre_fonda,calle,interior,exterior,cp,colonia,delegacion,ciudad,estado,pais) 
						VALUES ('".$data['nombre_fonda']."','".$data['calle']."','".$data['interior']."','".$data['exterior']."','".$data['cp']."','".$data['colonia']."','".$data['delegacion']."','".$data['ciudad']."','".$data['estado']."','".$data['pais']."')";
			$result =mysqli_query($this->link,$query);
			if(mysqli_affected_rows($this->link)>0){
				return true;
			}else{
				return false;
			}
			mysql_close($link);
		}

		//Obtiene la fonda por id
		public function getFondaById($id=NULL){
			if(!empty($id)){
				$query  ="select * FROM fondas WHERE id_fonda=".$id;
				$result =mysqli_query($this->link,$query);
				$data   =array();
				while ($data[]=mysqli_fetch_assoc($result));
				array_pop($data);
				return $data;
			}else{
				return false;
			}
			mysql_close($link);
		}

		//Edita la fonda por id
		public function editFonda($data){
			if(!empty($data['id_fonda'])){
				$query  ="update fondas 
						SET 
							nombre_fonda = '".$data['nombre_fonda']."',
							calle = '".$data['calle']."',
							interior = '".$data['interior']."',
							exterior = '".$data['exterior']."',
							cp = '".$data['cp']."',
							colonia = '".$data['colonia']."',
							delegacion = '".$data['delegacion']."',
							ciudad = '".$data['ciudad']."',
							estado = '".$data['estado']."',
							pais = '".$data['pais']."'
						WHERE id_fonda=".$data['id_fonda'];
				$result =mysqli_query($this->link,$query);
				if($result){
					return true;
				}else{
					return false;
				}
			}else{
				return false;
			}
			mysql_close($link);
		}

		//Elimina la fonda por id
		public function deleteFonda($id=NULL){
			if(!empty($id)){
				$query  ="delete FROM fondas WHERE id_fonda=".$id;
				$result =mysqli_query($this->link,$query);
				if(mysqli_affected_rows($this->link)>0){
					return true;
				}else{
					return false;
				}
			}else{
				return false;
			}
			mysql_close($link);
		}
	}

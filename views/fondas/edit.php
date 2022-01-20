<?php

  include './models/fondas.php';
  $title="Edicion de fondas";

  $fonda     = new Fondas();
  $id       = isset($_GET['id'])?$_GET['id']:null;
  $fondas    = $fonda->getFondaById($id);
  $name     = '';
  $lastName = '';
  $email    = '';
  if($fondas){
    $calle     =$fondas[0]['calle'];
    $exterior =$fondas[0]['exterior'];
    $interior    =$fondas[0]['interior'];
    $cp     =$fondas[0]['cp'];
    $colonia =$fondas[0]['colonia'];
    $delegacion    =$fondas[0]['delegacion'];
    $ciudad     =$fondas[0]['ciudad'];
    $estado =$fondas[0]['estado'];
    $pais    =$fondas[0]['pais'];
  }

?>
<form action="./controllers/controllerFondas.php?folder=fondas" method="POST">
  <div class="row">
    <div class="col text-center">
      <i class="material-icons" style="font-size: 80px;">edit</i>
    </div>
  </div>
  <div class="form-group">
  	 <label for="name">Nombres</label>
    <input type="text" class="form-control" id="name" name="name" placeholder="Tus nombres" autofocus required value="<?php echo $name; ?>">
  </div>
  <div class="form-group">
  	 <label for="last_name">Apellidos</label>
    <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Tus apellidos" required value="<?php echo $lastName; ?>">
  </div>
  <div class="form-group">
  	 <label for="email">E-mail</label>
    <input type="email" class="form-control" id="email" name="email" placeholder="Tu e-mail" required value="<?php echo $email; ?>">
  </div>
  <div class="form-group text-center">
  	<input type="submit" name="edit" value="Editar" class="btn btn-primary">
  </div>
  <div class="form-group text-center">
  	<?php
  		if(isset($_GET['success'])){
	?>
			<div class="alert alert-success">
				La informacion ha sido actualizada.
			</div>
	<?php
  		}else if(isset($_GET['error'])){
  	?>
			<div class="alert alert-danger">
				Ha ocurrido un error al editar la información, por favor intente de nuevo.
			</div>
	<?php
  		}
  	?>
  </div>
  <input type="hidden" name="id" value="<?php echo $id ?>">
</form>
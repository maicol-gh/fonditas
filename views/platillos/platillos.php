<?php

	include './models/platillos.php';
	include './models/fondas.php';
	$platillo  = new Platillos();
	$fonda  = new Fondas();
	//Si utiliza el filtro de busqueda
	$platillos  = $platillo->getPlatillos();
	$fondas  = $fonda->getFondas();
	$title="Listado de Platillos";
?>

<div class="modal fade" id="modal_add_platillo">
  <div class="modal-dialog modal-dialog-scrollable" style="max-width: 1200px !important;">
      <div class="modal-content">
          <div class="modal-header bg-success">
            <h4 class="modal-title">Agregar Platillo</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form method="POST" id="platilloForm">
              <div class="modal-body">
                <div class="form-group row">
                  <label class="col-2" for="id_fonda">Fonda</label>
                  <div class="col-4">
                  	<select name="id_fonda" class="form-control" id="id_fonda" required>
                  		<option value="">Seleccione una opción</option>
                  		<?php foreach ($fondas as $column => $value): ?>
                  			<option value="<?= $value['id_fonda'] ?>" selected><?= $value['id_fonda'].' - '.$value['nombre_fonda'] ?></option>
                  		<?php endforeach; ?>
										</select>
                  </div>
                  <label class="col-2" for="nombre">Nombre</label>
                  <div class="col-4">
                  	<input type="text" name="nombre" class="form-control" id="nombre" placeholder="Nombre del platillo" required>
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-1" for="descripcion">Descripcion</label>
                  <div class="col-3">
                  	<input type="text" name="descripcion" class="form-control" id="descripcion" placeholder="Descripcion" required>
                  </div>
                  <label class="col-1" for="ingredientes">Ingredientes</label>
                  <div class="col-3">
                  	<input type="text" name="ingredientes" class="form-control" id="ingredientes" placeholder="Ingredientes" required>
                  </div>
									<label class="col-1" for="costo">Costo</label>
                  <div class="col-3">
                  	<input type="text" name="costo" class="form-control" id="costo" placeholder="Costo" required onkeypress="return validaNumero(event);">
                  </div>
                </div>
                <input type="hidden" name="id_platillo" id="id_platillo">
              </div>
              <div class="modal-footer justify-content-right">
                  <button type="submit" class="btn btn-primary"><i class="fas fa-check"></i>Guardar</button>
                  <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
              </div>
          </form>
      </div>
  </div>
</div>
<section class="content-header">
</section>

<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="card card-info">
          <div class="card-header">
            <h3 class="card-title">Platillos</h3>
          </div>
          <div class="card-body">
            <div class="row mb-2">
              <div class="col-sm-6">
              </div>
              <div class="col-sm-6">
                <ol class="float-sm-right">
                  <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal_add_platillo" onclick="limpiaFormPlatillo();">
                  	<i class="fas fa-hamburger"></i> Nueva Fonda</button>
                </ol>
            	</div>
            </div>
            <table align="center" id="tblFondas" style="width:100%" class="table table-bordered table-striped">
              <thead class="thead-dark">
              <tr>
                <th class="text-primary" scope="col">#</th>
                <th class="text-primary" scope="col">Fonda</th>
                <th class="text-primary" scope="col">Nombre</th>
                <th class="text-primary" scope="col">Descripcion</th>
                <th class="text-primary" scope="col">Ingredientes</th>
                <th class="text-primary" scope="col">Costo</th>
                <th class="text-primary" scope="col">Acciónes</th>
              </tr>
              </thead>
              <tbody>
                <?php foreach ($platillos as $column =>$value): ?>
                <tr>
                  <td class="text-center"><?= $value['id_platillo'] ?></td>
                  <td class="text-center"><?= $value['id_fonda'] ?></td>
                  <td class="text-center"><?= $value['nombre'] ?></td>
                  <td class="text-center"><?= $value['descripcion'] ?></td>
                  <td class="text-center"><?= $value['ingredientes'] ?></td>
                  <td class="text-center"><?= $value['costo'] ?></td>
	                <td class="text-center">
	                	<a class="btn btn-app bg-warning" data-toggle="modal" data-target="#modal_add_platillo" onclick="getPlatillo(<?= $value['id_platillo'] ?>);">
		                  <i class="fas fa-edit"></i>Editar
		                </a>
		                <a class="btn btn-app bg-danger" onclick="deletePlatillo(<?= $value['id_platillo'] ?>);">
		                  <i class="fas fa-trash-alt"></i>Eliminar
		                </a>
									</td>
                </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>      
    </div>  
  </div>
</section>
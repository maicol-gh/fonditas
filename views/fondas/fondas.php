<?php

	include './models/fondas.php';
	$fonda  = new Fondas();
	//Si utiliza el filtro de busqueda
	$fondas  = $fonda->getFondas();


	$title="Listado de Fondas";

?>

<div class="modal fade" id="modal_add_fonda">
  <div class="modal-dialog modal-dialog-scrollable" style="max-width: 1200px !important;">
      <div class="modal-content">
          <div class="modal-header bg-success">
            <h4 class="modal-title">Agregar Fonda</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form method="POST" id="fondaForm">
              <div class="modal-body">
                <div class="form-group row">
                  <label class="col-3" for="nombre_fonda">Nombre de la fonda</label>
                  <div class="col-9">
                    <input type="text" name="nombre_fonda" class="form-control" id="nombre_fonda" placeholder="Nombre de la fonda" required>
                  </div>
                  
                </div>
              	<div class="form-group row">
                  <label class="col-1" for="calle">Calle</label>
                  <div class="col-3">
                  	<input type="text" name="calle" class="form-control" id="calle" placeholder="Calle" required>
                  </div>
                  <label class="col-1" for="exterior">Número Exterior</label>
                  <div class="col-3">
                  	<input type="text" name="exterior" class="form-control" id="exterior" placeholder="Número exterior" required onkeypress="return validaNumero(event);">
                  </div>
                  <label class="col-1" for="interior">Número Interior</label>
                  <div class="col-3">
                  	<input type="text" name="interior" class="form-control" id="interior" placeholder="Número interior" required onkeypress="return validaNumero(event);">
                  </div>
                </div>
                
                <div class="form-group row">
                  <label class="col-1" for="cp">Código Postal</label>
                  <div class="col-3">
                  	<input type="text" name="cp" class="form-control" id="cp" placeholder="Código Postal" required onkeyup="countChars()" onkeypress="return validaNumero(event);">
                  </div>
                  <label class="col-1" for="colonia">Colonia</label>
                  <div class="col-3">
                  	<select name="colonia" class="form-control" id="colonia" required>
										</select>
                  </div>
                  <label class="col-1" for="delegacion">Delegacion</label>
                  <div class="col-3">
                  	<input type="text" name="delegacion" class="form-control" id="delegacion" placeholder="Delegacion" required readonly>
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-1" for="ciudad">Ciudad</label>
                  <div class="col-3">
                  	<input type="text" name="ciudad" class="form-control" id="ciudad" placeholder="Ciudad" required readonly>
                  </div>
                  <label class="col-1" for="estado">Estado</label>
                  <div class="col-3">
                  	<input type="text" name="estado" class="form-control" id="estado" placeholder="Estado" required readonly>
                  </div>
									<label class="col-1" for="pais">Pais</label>
                  <div class="col-3">
                  	<input type="text" name="pais" class="form-control" id="pais" placeholder="Pais" required readonly>
                  </div>
                </div>
                <input type="hidden" name="id_fonda" id="id_fonda">
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
            <h3 class="card-title">Fondas</h3>
          </div>
          <div class="card-body">
            <div class="row mb-2">
              <div class="col-sm-6">
              </div>
              <div class="col-sm-6">
                <ol class="float-sm-right">
                  <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal_add_fonda" onclick="limpiaForm();">
                  	<i class="fas fa-utensils"></i> Nueva Fonda</button>
                </ol>
            	</div>
            </div>
            <table align="center" id="tblFondas" style="width:100%" class="table table-bordered table-striped">
              <thead class="thead-dark">
              <tr>
                <th class="text-primary" scope="col">#</th>
                <th class="text-primary" scope="col">Nombre</th>
                <th class="text-primary" scope="col">Calle</th>
                <th class="text-primary" scope="col">Exterior</th>
                <!--<th class="text-primary" scope="col">Interior</th>-->
                <th class="text-primary" scope="col">CP</th>
                <th class="text-primary" scope="col">Colonia</th>
                <th class="text-primary" scope="col">Delegacion</th>
                <th class="text-primary" scope="col">Ciudad</th>
                <th class="text-primary" scope="col">Estado</th>
                <th class="text-primary" scope="col">Pais</th>
                <th class="text-primary" scope="col">Acción</th>
              </tr>
              </thead>
              <tbody>
                <?php foreach ($fondas as $column =>$value): ?>
                <tr>
                  <td class="text-center"><?= $value['id_fonda'] ?></td>
                  <td class="text-center"><?= $value['nombre_fonda'] ?></td>
                  <td class="text-center"><?= $value['calle'] ?></td>
                  <td class="text-center"><?= $value['exterior'] ?></td>
                  <!--<td class="text-center"><?= $value['interior'] ?></td>-->
                  <td class="text-center"><?= $value['cp'] ?></td>
                  <td class="text-center"><?= $value['colonia'] ?></td>
                  <td class="text-center"><?= $value['delegacion'] ?></td>
                  <td class="text-center"><?= $value['ciudad'] ?></td>
                  <td class="text-center"><?= $value['estado'] ?></td>
                  <td class="text-center"><?= $value['pais'] ?></td>
	                <td class="text-center">
	                	<a class="btn btn-app bg-warning" data-toggle="modal" data-target="#modal_add_fonda" onclick="getFonda(<?= $value['id_fonda'] ?>);">
		                  <i class="fas fa-edit"></i>Editar
		                </a>
		                <a class="btn btn-app bg-danger" onclick="deleteFonda(<?= $value['id_fonda'] ?>);">
		                  <i class="fas fa-trash-alt"></i>Eliminar
		                </a>

	                	<!--<a href="./index.php?page=edit&id=<?= $value['id_fonda'] ?>&folder=fondas" title="Editar fonda">
											<i class="material-icons btn_edit">edit</i>
										</a>
	                	<button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal_add_fonda">
	                		<i class="fas fa-clipboard-check"></i>Nueva Fonda</button>
	                	<a href="#" onclick="deleteUser(<?= $value["id_fonda"] ?>)" id="btnDeleteUser" title="Borrar fonda">
												<i class="material-icons btn_delete">Eliminar</i>
										</a>-->
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
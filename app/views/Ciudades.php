<div class="container">
	<h1>
		Ciudades
	</h1>

	<div id="ciudad" class="d-none" data-id="<?php echo $id; ?>"><?php echo $id; ?></div>

	<div class="row mt-3 mb-3">
		<button id="btn-nuevo" type="button" class="btn btn-sm btn-success" data-bs-toggle="modal" data-bs-target="#modal-ciudades">Nuevo</button>
	</div>

	<table id="tbl-ciudades" class="w-100 table table-bordered table-sm" >
		<thead>
			<tr>
				<th>Id</th>
				<th>Nombre</th>
				<th>Acciones</th>
			</tr>
		</thead>
	</table>

	<div id="modal-ciudades" class="modal modal-fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<form id="form-ciudades">
					<div class="modal-header">
						<h3>Edición de ciudad</h3>
					</div>
					<div class="modal-body">
						<div class="form-group mb-3">
							<label class="form-label">Id</label>
							<input type="text" name="id" class="form-control form-control-sm" readonly>
						</div>
						<div class="form-group mb-3">
							<label class="form-label">Id Pais</label>
							<input type="text" name="idPais" class="form-control form-control-sm" readonly value="<?php echo $id; ?>">
						</div>
						<div class="form-group mb-3">
							<label class="form-label">Nombre</label>
							<input type="text" name="nombre" class="form-control form-control-sm">
						</div>					
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">Cerrar</button>
						<button id="btn-submit" type="button" class="btn btn-sm btn-success">Enviar</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
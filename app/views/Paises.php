<div class="container">
	<h1>
		Países
	</h1>

	<div class="row mt-3 mb-3">
		<button id="btn-nuevo" type="button" class="btn btn-sm btn-success" data-bs-toggle="modal" data-bs-target="#modal-paises">Nuevo</button>
	</div>

	<table id="tbl-paises" class="w-100 table table-bordered table-sm table-responsive">
		<thead>
			<tr>
				<th>Id</th>
				<th>Nombre Pais</th>
				<th>Ciudades</th>
				<th>Acciones</th>
			</tr>
		</thead>
	</table>

	<div id="modal-paises" class="modal modal-fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<form id="form-paises">
					<div class="modal-header">
						<h3>Edición de país</h3>
					</div>
					<div class="modal-body">
						<div class="form-group mb-3">
							<label class="form-label">Id</label>
							<input type="text" name="idPais" class="form-control form-control-sm" placeholder="[auto]" readonly>
						</div>
						<div class="form-group mb-3">
							<label class="form-label">Nombre</label>
							<input type="text" name="nombrePais" class="form-control form-control-sm">
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
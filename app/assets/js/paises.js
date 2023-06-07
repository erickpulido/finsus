paises()

function paises()
{
	var table = $("#tbl-paises").DataTable({
		ajax:"index.php?url=Paises/paises",
		columns:[
			{'data': "idPais"},
			{'data': "nombrePais"},
			{'data': "nombreCiudades"},
			{'data': "acciones"}
		],
		columnDefs:[
			{
				targets:3,
				render: function()
				{
					return `<button type="button" class="btn btn-sm btn-primary badge update">Update</button>
							<button type="button" class="btn btn-sm btn-secondary badge edit" data-bs-toggle="modal" data-bs-target="#modal-paises">Editar</button>
							<button type="button" class="btn btn-sm btn-danger badge delete">Eliminar</button>`
				}
			}
		]
	});

	table.on('click', '.update', function()
		{
			var data = table.row($(this).parents('tr')).data()

			window.location.href=`index.php?url=Ciudades/index/${data.idPais}`
		}
	)

	table.on('click', '.edit', function()
		{
			var data = table.row($(this).parents('tr')).data()

			$("#btn-submit").attr("data-action", "update")

			Object.entries(data).forEach(function([key, value]){
				$(`input[name=${key}]`).val(value)
			})
		}
	)

	table.on('click', '.delete', function()
		{
			var data = table.row($(this).parents('tr')).data()

			deleteId(data.idPais)
		}
	)
}

$("#btn-nuevo").on({
	click:function(){
		var form = $("#form-paises"),
			btnSubmit = $("#btn-submit")

		form.trigger('reset')

		btnSubmit.attr('data-action', 'create')
	}
})

$("#btn-submit").on({
	click:function(){
		var control = $(this),
			form = control.parents('form'),
			data = form.serializeArray(),
			action = control.attr("data-action");

		var request = $.ajax({
			url:`index.php?url=Paises/update/${action}`,
			type:"POST",
			dataType:"JSON",
			data:data
		});

		request.done(function(response){
			$("#tbl-paises").DataTable().ajax.reload()
		})

		request.fail(function(error){
			console.log(error)
		})
	}
})


function deleteId(idPais)
{
	var request = $.ajax({
		url:`index.php?url=Paises/update/delete`,
		type:"POST",
		dataType:"JSON",
		data:{idPais}
	});

	request.done(function(response){
		$("#tbl-paises").DataTable().ajax.reload()
	})

	request.fail(function(error){
		console.log(error)
	})
}


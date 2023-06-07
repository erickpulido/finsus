let id = $("#ciudad").text()

ciudades(id)

function ciudades(id)
{
	var table = $("#tbl-ciudades").DataTable({
		ajax:`index.php?url=Ciudades/ciudades/${id}`,
		columns:[
			{'data': "id"},
			{'data': "nombre"},
			{'data': "acciones"}
		],
		columnDefs:[
			{
				targets:2,
				render: function()
				{
					return `<button type="button" class="btn btn-sm btn-primary badge update" data-bs-toggle="modal" data-bs-target="#modal-ciudades">Editar</button>
							<button type="button" class="btn btn-sm btn-danger badge delete">Eliminar</button>`
				}
			}
		]
	});

	table.on('click', '.update', function()
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

			deleteId(data.id)
		}
	)
}

$("#btn-nuevo").on({
	click:function(){
		var form = $("#form-ciudades"),
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
			url:`index.php?url=Ciudades/update/${action}`,
			type:"POST",
			dataType:"JSON",
			data:data
		});

		request.done(function(response){
			$("#tbl-ciudades").DataTable().ajax.reload()
		})

		request.fail(function(error){
			console.log(error)
		})
	}
})

function deleteId(id)
{
	var request = $.ajax({
		url:`index.php?url=Ciudades/update/delete`,
		type:"POST",
		dataType:"JSON",
		data:{id}
	});

	request.done(function(response){
		$("#tbl-ciudades").DataTable().ajax.reload()
	})

	request.fail(function(error){
		console.log(error)
	})
}



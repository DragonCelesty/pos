/*========================================
=            EDITAR CATEGORIA            =
========================================*/

$(document).on("click",".btnEditarCategoria",function(){

	var idCategoria = $(this).attr("idCategoria");

	var datos = new FormData();
	datos.append("idCategoria", idCategoria);
	$.ajax({
		url:"ajax/categorias.ajax.php",
		method:"POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		dataType: "json",
		success:function(respuesta){
			 console.log("respuesta",respuesta);
			 $("#editarCategoria").val(respuesta["categoria"]);
			 $("#idCategoria").val(respuesta["id"]);
			
		}
	});
})

/*=====  End of EDITAR CATEGORIA  ======*/

/*==========================================
=            VALIDAR CATEGORIAS            =
==========================================*/

 $("#nuevaCategoria").change(function(){
	$(".alert").remove();

	var categoria = $(this).val();

	var datos = new FormData();
	datos.append("validarCategoria", categoria);

	$.ajax({
		url:"ajax/categorias.ajax.php",
		method:"POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		dataType: "json",
		success:function(respuesta){
			// console.log("respuesta",respuesta);
			if (respuesta) {
				$("#nuevaCategoria").parent().after('<div class="alert alert-warning">Este categoria ya existe en la base de datos</div>');
				$("#nuevaCategoria").val("");
			}
		}
	});
})


/*=====  End of VALIDAR CATEGORIAS  ======*/

/*==========================================
=            ELIMINAR CATEGORIA            =
==========================================*/

$(document).on("click", ".btnEliminarCategoria", function(){
	var idCategoria = $(this).attr("idCategoria");

	Swal.fire({
		title: 'Esta seguro que desea borrar la categoria?',
		test: "Si no lo esta puede cancelar la accion!",
		type: 'warning',
		showCancelButton: true,
		confirButtonColor: '#3085d6',
		cancelButtonColor:'#d33',
		cancelButtonText: 'Cancelar',
		confirmButtonText: 'Si, Borrar Categoria!'
	}).then(function(result){
		if (result.value) {
			window.location = "index.php?ruta=categorias&idCategoria="+idCategoria;
		}
	})
})

/*=====  End of ELIMINAR CATEGORIA  ======*/

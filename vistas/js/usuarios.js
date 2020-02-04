/*====================================================
=            SUBIENDO LA FOTO DEL USUARIO            =
====================================================*/
$(".nuevaFoto").change(function(){
	var imagen = this.files[0];

	// VALIDANDO EL FORMATO DE LA IMAGEN SEA JPG O PNG

	if (imagen["type"] != "image/jpeg" && imagen["type"] != "image/png") {
		$(".nuevaFoto").val("");

		Swal.fire({
			title: "Error al subir la imagen",
			text: "La imagen debe estar en formato JPG o PNG!",
			type: "error",
			confirButtonText: "Cerrar"
		});
	}else if (imagen["size"] > 2000000) {
		$(".nuevaFoto").val("");

		Swal.fire({
			title: "Error al subir la imagen",
			text: "La imagen no debe pesar mas de 2MB",
			type: "error",
			confirButtonText: "Cerrar"
		});
	}else{
		var datosImagen = new FileReader;
		datosImagen.readAsDataURL(imagen);

		$(datosImagen).on("load", function(event){
			var rutaImagen = event.target.result;
			$(".previsualizar").attr("src",rutaImagen);
		});
	}

}
)

/*=====  End of SUBIENDO LA FOTO DEL USUARIO  ======*/

/*======================================
=            EDITAR USUARIO            =
======================================*/

$(document).on("click",".btnEditarUsuario",function(){
	var idUsuario = $(this).attr("idUsuario");

	var datos = new FormData();
	datos.append("idUsuario", idUsuario);
	$.ajax({
		url:"ajax/usuarios.ajax.php",
		method:"POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		dataType: "json",
		success:function(respuesta){
			$("#editarNombre").val(respuesta["nombre"]);
			$("#editarUsuario").val(respuesta["usuario"]);
			$("#editarPerfil").html(respuesta["perfil"]);
			$("#editarPerfil").val(respuesta["perfil"]);
			$("#fotoActual").val(respuesta["foto"]);
			$("#passwordActual").val(respuesta["password"]);

			if (respuesta["foto"] != "") {
				$(".previsualizar").attr("src",respuesta["foto"]);
			}
		}
	});
})

/*=====  End of EDITAR USUARIO  ======*/

/*=======================================
=            ACTIVAR USUARIO            =
=======================================*/
$(document).on("click",".btnActivar",function(){

	var idUsuario = $(this).attr("idUsuario");
	var estadoUsuario = $(this).attr("estadoUsuario");

	var datos = new FormData();
	datos.append("activarId", idUsuario);
	datos.append("activarUsuario", estadoUsuario);

		$.ajax({
		url:"ajax/usuarios.ajax.php",
		method:"POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		dataType: "json",
		success:function(respuesta){
			console.log("hasta aqui bien");
			if (window.matchMedia("(max-width:767px)").matches) {

				Swal.fire({
					title: "El usuario ha sido actualizado",
					type: "success",
					confirButtonText:"Cerrar"
				}).then(function(result){
					if (result.value) {
						window.location = "usuarios";
					}
				})
			}
		}
	});
	if (estadoUsuario == 0) {
		$(this).removeClass('btn-success');
		$(this).addClass('btn-danger');
		$(this).html('Desactivado');
		$(this).attr('estadoUsuario',1);
	}else{
		$(this).removeClass('btn-danger');
		$(this).addClass('btn-success');
		$(this).html('Activado');
		$(this).attr('estadoUsuario',0);
	}
})


/*=====  End of ACTIVAR USUARIO  ======*/



/*================================================================
=            Revisar si el usuario ya esta registrado            =
================================================================*/
$("#nuevoUsuario").change(function(){
	$(".alert").remove();

	var usuario = $(this).val();

	var datos = new FormData();
	datos.append("validarUsuario", usuario);

	$.ajax({
		url:"ajax/usuarios.ajax.php",
		method:"POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		dataType: "json",
		success:function(respuesta){
			if (respuesta) {
				$("#nuevoUsuario").parent().after('<div class="alert alert-warning">Este usuario ya existe en la base de datos</div>');
				$("#nuevoUsuario").val("");
			}
		}
	});
})


/*=====  End of Revisar si el usuario ya esta registrado  ======*/


/*========================================
=            ELIMINAR USUARIO            =
========================================*/

$(document).on("click", ".btnEliminarUsuario", function(){
	var idUsuario = $(this).attr("idUsuario");
	var fotoUsuario = $(this).attr("fotoUsuario");
	var usuario = $(this).attr("usuario");

	Swal.fire({
		title: 'Esta seguro que desea borrar el usuario?',
		test: "Si no lo esta puede cancelar la accion!",
		type: 'warning',
		showCancelButton: true,
		confirButtonColor: '#3085d6',
		cancelButtonColor:'#d33',
		cancelButtonText: 'Cancelar',
		confirmButtonText: 'Si, Borrar Usuario!'
	}).then(function(result){
		if (result.value) {
			window.location = "index.php?ruta=usuarios&idUsuario="+idUsuario+"&usuario="+usuario+"&fotoUsuario="+fotoUsuario;
		}
	})
})

/*=====  End of ELIMINAR USUARIO  ======*/

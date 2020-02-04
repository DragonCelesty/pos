<?php

class ControladorCategorias{

/*=======================================
=            CREAR CATEGORIA            =
=======================================*/

	static public function ctrCrearCategoria(){

		if(isset($_POST["nuevaCategoria"])){
			if (preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevaCategoria"])) {
				
				$tabla = "categorias";
				$datos = $_POST["nuevaCategoria"];
				$respuesta = ModeloCategorias::mdlIngresarCategoria($tabla, $datos);
				if ($respuesta == "ok") {
						echo '<script>

					Swal.fire({
						type: "success",
						title: "La categoria ha sido guardada exitosamente!",
						showConfirmButton: true,
						confirmButtonText: "Cerrar",
						closeOnConfirm: false
						}).then((result)=>{
							if(result.value){
								window.location = "categorias";
							}
							});
				</script>';
					}

			}else{
				echo '<script>

					Swal.fire({
						type: "error",
						title: "La categoria no puede ir vacia o llevar caracteres especiales!",
						showConfirmButton: true,
						confirmButtonText: "Cerrar",
						closeOnConfirm: false
						}).then((result)=>{
							if(result.value){
								window.location = "categorias";
							}
							});
				</script>';
			}
		}
	}

/*=====  End of CREAR CATEGORIA  ======*/

/*==========================================
=            MOSTRAR CATEGORIAS            =
==========================================*/

	static public function ctrMostrarCategorias($item, $valor){
		$tabla = "categorias";

		$respuesta = ModeloCategorias::mdlMostrarCategorias($tabla, $item, $valor);
		return $respuesta;
	}

/*=====  End of MOSTRAR CATEGORIAS  ======*/

/*========================================
=            EDITAR CATEGORIA            =
========================================*/

	static public function ctrEditarCategoria(){

		if(isset($_POST["editarCategoria"])){
			if (preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarCategoria"])) {
				
				$tabla = "categorias";
				$datos = array("categoria"=>$_POST["editarCategoria"], "id"=>$_POST["idCategoria"]);
				$respuesta = ModeloCategorias::mdlEditarCategoria($tabla, $datos);
				if ($respuesta == "ok") {
						echo '<script>

					Swal.fire({
						type: "success",
						title: "La categoria ha sido cambiada exitosamente!",
						showConfirmButton: true,
						confirmButtonText: "Cerrar",
						closeOnConfirm: false
						}).then((result)=>{
							if(result.value){
								window.location = "categorias";
							}
							});
				</script>';
					}

			}else{
				echo '<script>

					Swal.fire({
						type: "error",
						title: "La categoria no puede ir vacia o llevar caracteres especiales!",
						showConfirmButton: true,
						confirmButtonText: "Cerrar",
						closeOnConfirm: false
						}).then((result)=>{
							if(result.value){
								window.location = "categorias";
							}
							});
				</script>';
			}
		}
	}


/*=====  End of EDITAR CATEGORIA  ======*/

/*========================================
=            BORRAR CATEGORIA            =
========================================*/
static public function ctrBorrarCategoria(){
			if(isset($_GET["idCategoria"])){

				$tabla = "categorias";
				$datos = $_GET["idCategoria"];

				$respuesta = ModeloCategorias::mdlBorrarCategoria($tabla, $datos);


				 if ($respuesta == "ok") {
					echo '<script>
				 		Swal.fire({
				 			type: "success",
				 			title: "La categoria a sido borrado correctamente!",
				 			showConfirmButton: true,
					 		confirmButtonText: "Cerrar",
					 		closeOnConfirm: false
					 		}).then((result)=>{
								if(result.value){
				 					window.location = "categorias";
				 				}
				 			})
				 		</script>';
					}
			}
		}


/*=====  End of BORRAR CATEGORIA  ======*/



}
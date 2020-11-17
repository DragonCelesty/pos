<?php

class ControladorProductos{
	/*=========================================
	=            MOSTRAR PRODUCTOS            =
	=========================================*/
	static public function ctrMostrarProductos($item,$valor){
		$tabla = "productos";

		$respuesta = ModeloProductos::mdlMostrarProductos($tabla,$item,$valor);
		return $respuesta;

	}
	
	
	/*=====  End of MOSTRAR PRODUCTOS  ======*/

	/*======================================
	=            CREAR PRODUCTO            =
	======================================*/
	static public function ctrCrearProducto(){
		if (isset($_POST["nuevaDescripcion"])) {
			if (preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevaDescripcion"]) && preg_match('/^[0-9]+$/', $_POST["nuevoStock"]) && preg_match('/^[0-9.]+$/', $_POST["nuevoPrecioCompra"]) && preg_match('/^[0-9.]+$/', $_POST["nuevoPrecioVenta"])) {
				
					// VALORAR IMAGEN
					$ruta = "vistas/img/Productos/default/anonymous.png";
				
					
					if (isset($_FILES["nuevaImagen"]["tmp_name"])) {
					 	list($ancho, $alto) = getimagesize($_FILES["nuevaImagen"]["tmp_name"]);
					 	$nuevoAncho = 500;
					 	$nuevoAlto = 500;

					 	// CREAMOS EL DIRECTORIO DONDE VAMOS A GUARDAR LA Imagen DEL producto

					 	$directorio = "vistas/img/productos/".$_POST["nuevoCodigo"];
					 	mkdir($directorio, 0755);

					 	// De acuaerdo al tipo de imagen aplicamos las funciones por defecto de PHP

					 	// si es JPEG
					 	if ($_FILES["nuevaImagen"]["type"] == "image/jpeg") {
					 		// Guardamos la imagen en el directorio
					 		$aleatorio = mt_rand(100,999);
					 		$ruta = "vistas/img/productos/".$_POST["nuevoCodigo"]."/".$aleatorio.".jpg";

					 		$origen = imagecreatefromjpeg($_FILES["nuevaImagen"]["tmp_name"]);
					 		$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

					 		imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

					 		imagejpeg($destino, $ruta);
					 	}
					 // si es PNG
					 if ($_FILES["nuevaImagen"]["type"] == "image/png") {
					 		// Guardamos la imagen en el directorio
					 		$aleatorio = mt_rand(100,999);
					 		$ruta = "vistas/img/productos/".$_POST["nuevoCodigo"]."/".$aleatorio.".png";

					 		$origen = imagecreatefrompng($_FILES["nuevaImagen"]["tmp_name"]);
					 		$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

					 		imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

					 		imagepng($destino, $ruta);
					 	}
					 } 


				$tabla = "productos";

				$datos = array("id_categoria" => $_POST["nuevaCategoria"],
								"codigo" => $_POST["nuevoCodigo"],
								"descripcion" => $_POST["nuevaDescripcion"],
								"stock" => $_POST["nuevoStock"],
								"precio_venta" => $_POST["nuevoPrecioVenta"],
								"precio_compra" => $_POST["nuevoPrecioCompra"],
								"imagen" => $ruta);
				$respuesta = ModeloProductos::mdlIngresarProducto($tabla, $datos);
				if ($respuesta == "ok") {
						echo '<script>

					Swal.fire({
						type: "success",
						title: "El producto ha sido guardada exitosamente!",
						showConfirmButton: true,
						confirmButtonText: "Cerrar",
						closeOnConfirm: false
						}).then((result)=>{
							if(result.value){
								window.location = "productos";
							}
							});
				</script>';
					}


			}else{
				echo '<script>

					Swal.fire({
						type: "error",
						title: "El producto no puede ir con los campos vacios o llevar caracteres especiales!",
						showConfirmButton: true,
						confirmButtonText: "Cerrar",
						closeOnConfirm: false
						}).then((result)=>{
							if(result.value){
								window.location = "productos";
							}
							});
				</script>';
			}
		}
	}
	
	
	/*=====  End of CREAR PRODUCTO  ======*/

	/*=======================================
	=            EDITAR PRODUCTO            =
	=======================================*/
	static public function ctrEditarProducto(){
		if (isset($_POST["editarDescripcion"])) {
			if (preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarDescripcion"]) && preg_match('/^[0-9]+$/', $_POST["editarStock"]) && preg_match('/^[0-9.]+$/', $_POST["editarPrecioCompra"]) && preg_match('/^[0-9.]+$/', $_POST["editarPrecioVenta"])) {
				
					// VALORAR IMAGEN
					$ruta = $_POST["imagenActual"];
				
					
					if (isset($_FILES["editarImagen"]["tmp_name"]) && !empty($_FILES["editarImagen"]["tmp_name"])) {
					 	list($ancho, $alto) = getimagesize($_FILES["editarImagen"]["tmp_name"]);
					 	$nuevoAncho = 500;
					 	$nuevoAlto = 500;

					 	// CREAMOS EL DIRECTORIO DONDE VAMOS A GUARDAR LA Imagen DEL producto

					 	$directorio = "vistas/img/productos/".$_POST["editarCodigo"];

					 	//PRIMERO PREGUNTAMOS SI EXISTE OTRA IMAGEN EN LA BD
					 	
					 	if(!empty($_POST["imagenActual"]) && $_POST["imagenActual"] != "vistas/img/productos/default/anonymous.png"){
					 		unlink($_POST["imagenActual"]);
					 	}else{
					 		mkdir($directorio, 0755);
					 	}
					 	

					 	// De acuaerdo al tipo de imagen aplicamos las funciones por defecto de PHP

					 	// si es JPEG
					 	if ($_FILES["editarImagen"]["type"] == "image/jpeg") {
					 		// Guardamos la imagen en el directorio
					 		$aleatorio = mt_rand(100,999);
					 		$ruta = "vistas/img/productos/".$_POST["editarCodigo"]."/".$aleatorio.".jpg";

					 		$origen = imagecreatefromjpeg($_FILES["editarImagen"]["tmp_name"]);
					 		$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

					 		imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

					 		imagejpeg($destino, $ruta);

					 	}
					 // si es PNG
					 if ($_FILES["editarImagen"]["type"] == "image/png") {
					 		// Guardamos la imagen en el directorio
					 		$aleatorio = mt_rand(100,999);
					 		$ruta = "vistas/img/productos/".$_POST["editarCodigo"]."/".$aleatorio.".png";

					 		$origen = imagecreatefrompng($_FILES["editarImagen"]["tmp_name"]);
					 		$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

					 		imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

					 		imagepng($destino, $ruta);
					 	}
					 } 


				$tabla = "productos";

				$datos = array("id_categoria" => $_POST["editarCategoria"],
								"codigo" => $_POST["editarCodigo"],
								"descripcion" => $_POST["editarDescripcion"],
								"stock" => $_POST["editarStock"],
								"precio_venta" => $_POST["editarPrecioVenta"],
								"precio_compra" => $_POST["editarPrecioCompra"],
								"imagen" => $ruta);

				$respuesta = ModeloProductos::mdlEditarProducto($tabla, $datos);
				if ($respuesta == "ok") {
						echo '<script>

					Swal.fire({
						type: "success",
						title: "El producto ha sido editado exitosamente!",
						showConfirmButton: true,
						confirmButtonText: "Cerrar",
						closeOnConfirm: false
						}).then((result)=>{
							if(result.value){
								window.location = "productos";
							}
							});
				</script>';
					}


			}else{
				echo '<script>

					Swal.fire({
						type: "error",
						title: "El producto no puede ir con los campos vacios o llevar caracteres especiales!",
						showConfirmButton: true,
						confirmButtonText: "Cerrar",
						closeOnConfirm: false
						}).then((result)=>{
							if(result.value){
								window.location = "productos";
							}
							});
				</script>';
			}
		}
	}
	
	
	
	/*=====  End of EDITAR PRODUCTO  ======*/
	
	/*=======================================
	=            BORRAR PRODUCTO            =
	=======================================*/
	static public function ctrBorrarProducto(){
			if(isset($_GET["idProducto"])){

				$tabla = "productos";
				$datos = $_GET["idProducto"];

				if($_GET["imagen"] != "" && $_GET["imagen"] != "vistas/img/productos/default/anonymous.png"){
					unlink($_GET["imagen"]);
					rmdir('vistas/img/productos/'.$_GET["codigo"]);
				}
				$respuesta = ModeloProductos::mdlBorrarProducto($tabla, $datos);


				 if ($respuesta == "ok") {
					echo '<script>
				 		Swal.fire({
				 			type: "success",
				 			title: "El producto a sido borrado correctamente!",
				 			showConfirmButton: true,
					 		confirmButtonText: "Cerrar",
					 		closeOnConfirm: false
					 		}).then((result)=>{
								if(result.value){
				 					window.location = "productos";
				 				}
				 			})
				 		</script>';
					}
			}
		}
	
	
	/*=====  End of BORRAR PRODUCTO  ======*/
	
	
}
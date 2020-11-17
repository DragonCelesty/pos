<?php 

require_once "../controladores/categorias.controlador.php";
require_once "../modelos/categorias.modelo.php";

class AjaxCategorias{

	/*=========================================
	=            Editar Categorias            =
	=========================================*/
	public $idCategoria;

	public function ajaxEditarCategoria(){

		$item = "id";
		$valor = $this->idCategoria;
		$respuesta = ControladorCategorias::ctrMostrarCategorias($item, $valor);

		echo json_encode($respuesta);
	}	
	/*=====  End of Editar Categorias  ======*/

	/*=======================================
	=            Validar Categoria          =
	=======================================*/
	public $validarCategoria;

	public function ajaxValidarCategoria(){
		$item = "categoria";
		$valor = $this->validarCategoria;
		$respuesta = ControladorCategorias::ctrMostrarCategorias($item, $valor);

		echo json_encode($respuesta);

	}
	
	
	/*=====  End of Validar Categoria  ======*/
	
	
	
}

//EDITAR CATEGORIA

if (isset($_POST["idCategoria"])) {
	$editar = new AjaxCategorias();
	$editar -> idCategoria = $_POST["idCategoria"];
	$editar -> ajaxEditarCategoria();
}

//VALIDAR CATEGORIA
if(isset($_POST["validarCategoria"])){
	$validarCategoria = new AjaxCategorias();
	$validarCategoria -> validarCategoria = $_POST["validarCategoria"];
	$validarCategoria -> ajaxValidarCategoria();
}
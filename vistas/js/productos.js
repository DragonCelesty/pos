/*=============================================================
=            CARGAR LA TABLA DINAMICA DE PRODUCTOS            =
=============================================================*/
// $.ajax({
// 	url:"ajax/datatable-productos.ajax.php",
// 	success:function(respuesta){
// 		console.log("respuesta", respuesta);
// 	}
// })



$('.tablaProductos').DataTable({
	"ajax":"ajax/datatable-productos.ajax.php",
	"deferRender": true,
	"retrieve": true,
	"processing":true,
	 "language":{
		 		"sProcessing":     "Procesando...",
                "sLengthMenu":     "Mostrar _MENU_ registros",
                "sZeroRecords":    "No se encontraron resultados",
                "sEmptyTable":     "Ningún dato disponible en esta tabla =(",
                "sInfo":           "Mostrando registros del _START_ de _END_ de un total de _TOTAL_ ",
                "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
                "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
                "sInfoPostFix":    "",
                "sSearch":         "Buscar:",
                "sUrl":            "",
                "sInfoThousands":  ",",
                "sLoadingRecords": "Cargando...",
                "oPaginate": {
                    "sFirst":    "Primero",
                    "sLast":     "Último",
                    "sNext":     "Siguiente",
                    "sPrevious": "Anterior"
                },
                "oAria": {
                    "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
                    "sSortDescending": ": Activar para ordenar la columna de manera descendente"
                },
                "buttons": {
                    "copy": "Copiar",
                    "colvis": "Visibilidad"
                }
	}
});

/*===================================================================
=            CAPTURANDO LA CATEGORIA PARA ASIGNAR CODIGO            =
===================================================================*/
$("#nuevaCategoria").change(function(){
	var idCategoria = $(this).val();

	var datos = new FormData();
	datos.append("idCategoria", idCategoria);
	$.ajax({
		url:"ajax/productos.ajax.php",
		method:"POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		dataType: "json",
		success:function(respuesta){
            if (!respuesta) {
               var nuevoCodigo = idCategoria+"01";
                $("#nuevoCodigo").val(nuevoCodigo); 
            }else{
                var nuevoCodigo = Number(respuesta["codigo"])+1;
                $("#nuevoCodigo").val(nuevoCodigo);
            }
            
		} 
	});
})


/*=====  End of CAPTURANDO LA CATEGORIA PARA ASIGNAR CODIGO  ======*/


/*=================================================
=            AGREGANDO PRECIO DE VENTA            =
=================================================*/
$("#nuevoPrecioCompra, #editarPrecioCompra").change(function(){
    if ($(".porcentaje").prop("checked")) {
        var valorPorcentaje = $(".nuevoPorcentaje").val();
        var porcentaje = Number(($("#nuevoPrecioCompra").val()*valorPorcentaje/100))+Number($("#nuevoPrecioCompra").val());
        var editarPorcentaje = Number(($("#editarPrecioCompra").val()*valorPorcentaje/100))+Number($("#editarPrecioCompra").val());

        $("#nuevoPrecioVenta").val(porcentaje);
        $("#nuevoPrecioVenta").prop("readonly",true);

        $("#editarPrecioVenta").val(editarPorcentaje);
        $("#editarPrecioVenta").prop("readonly",true);
    }
    
})


/*=====  End of AGREGANDO PRECIO DE VENTA  ======*/

/*============================================
=            CAMBIO DE PORCENTAJE            =
============================================*/

$(".nuevoPorcentaje").change(function(){
    if ($(".porcentaje").prop("checked")) {
        var valorPorcentaje = $(this).val();
        var porcentaje = Number(($("#nuevoPrecioCompra").val()*valorPorcentaje/100))+Number($("#nuevoPrecioCompra").val());
        var editarPorcentaje = Number(($("#editarPrecioCompra").val()*valorPorcentaje/100))+Number($("#editarPrecioCompra").val());

        $("#nuevoPrecioVenta").val(porcentaje);
        $("#nuevoPrecioVenta").prop("readonly",true);

        $("#editarPrecioVenta").val(editarPorcentaje);
        $("#editarPrecioVenta").prop("readonly",true);
   

    }
    
})
$(".porcentaje").on("ifUnchecked",function(){
    $("#nuevoPrecioVenta").prop("readonly",false);
    $("#editarPrecioVenta").prop("readonly",false);
    $(".nuevoPorcentaje").prop("readonly",true);
})
$(".porcentaje").on("ifChecked",function(){
    $("#nuevoPrecioVenta").prop("readonly",true);
    $("#editarPrecioVenta").prop("readonly",true);
    $(".nuevoPorcentaje").prop("readonly",false);
})
/*=====  End of CAMBIO DE PORCENTAJE  ======*/

/*====================================================
=            SUBIENDO LA Imagen DEL Producto           =
====================================================*/
$(".nuevaImagen").change(function(){
    var imagen = this.files[0];

    // VALIDANDO EL FORMATO DE LA IMAGEN SEA JPG O PNG

    if (imagen["type"] != "image/jpeg" && imagen["type"] != "image/png") {
        $(".nuevaImagen").val("");

        Swal.fire({
            title: "Error al subir la imagen",
            text: "La imagen debe estar en formato JPG o PNG!",
            type: "error",
            confirButtonText: "Cerrar"
        });
    }else if (imagen["size"] > 2000000) {
        $(".nuevaImagen").val("");

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

/*=====  End of SUBIENDO LA Imagen DEL Producto ======*/


/*=======================================
=            EDITAR PRODUCTO            =
=======================================*/

$(".tablaProductos tbody").on("click", "button.btnEditarProducto", function(){
    var idProducto = $(this).attr("idProducto");

    var datos = new FormData();
    datos.append("idProducto", idProducto);
    $.ajax({
        url:"ajax/productos.ajax.php",
        method:"POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success:function(respuesta){
          
            var datosCategoria = new FormData();
            datosCategoria.append("idCategoria", respuesta["id_categoria"]);
            $.ajax({
                url:"ajax/categorias.ajax.php",
                method:"POST",
                data: datosCategoria,
                cache: false,
                contentType: false,
                processData: false,
                dataType: "json",
                success:function(respuesta){

                   $("#editarCategoria").val(respuesta["id"]);
                   $("#editarCategoria").html(respuesta["categoria"]);
                    
                } 
            })
            $("#editarCodigo").val(respuesta["codigo"]);
            $("#editarDescripcion").val(respuesta["descripcion"]);
            $("#editarStock").val(respuesta["stock"]);
            $("#editarPrecioCompra").val(respuesta["precio_compra"]);
            $("#editarPrecioVenta").val(respuesta["precio_venta"]);
            if (respuesta["imagen"] != "") {
                $("#imagenActual").val(respuesta["imagen"]);
                $(".previsualizar").attr("src",respuesta["imagen"]);
            }
        } 
    })
})


/*=====  End of EDITAR PRODUCTO  ======*/

/*=========================================
=            ELIMINAR PRODUCTO            =
=========================================*/
$(".tablaProductos tbody").on("click", "button.btnEliminarProducto", function(){
    var idProducto = $(this).attr("idProducto");
    var codigo = $(this).attr("codigo");
    var imagen = $(this).attr("imagen");

    Swal.fire({
        title: 'Esta seguro que desea borrar el producto?',
        test: "Si no lo esta puede cancelar la accion!",
        type: 'warning',
        showCancelButton: true,
        confirButtonColor: '#3085d6',
        cancelButtonColor:'#d33',
        cancelButtonText: 'Cancelar',
        confirmButtonText: 'Si, Borrar Producto!'
    }).then(function(result){
        if (result.value) {
            window.location = "index.php?ruta=productos&idProducto="+idProducto+"&imagen="+imagen+"&codigo"+codigo;
        }
    })
   
})



/*=====  End of ELIMINAR PRODUCTO  ======*/

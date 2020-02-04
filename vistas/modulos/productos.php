   <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Administrar Productos
      </h1>
      <ol class="breadcrumb">
        <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li class="active">Administrar Productos</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">

          <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarProducto">
            Agregar producto
          </button>
         
        </div>
        <div class="box-body">

          <!--=====================================
          =            Tabla                      =
          ======================================-->
                
         
          <table class="table table-bordered table-striped dt-responsive tablaProductos" width="100%">

            <thead>
              <tr>
                <th style="width: 10px">#</th>
                <th>Imagen</th>
                <th>Codigo</th>
                <th>Descripcion</th>
                <th>Categoria</th>
                <th>Stock</th>
                <th>Precio de compra</th>
                <th>Precio de venta</th>
                <th>Agregado</th>
                <th>Acciones</th>
              </tr>
            </thead>

 
            
          </table>

           <!--====  Fin de la tabla  ====-->

        </div>
        <!-- /.box-body -->

      </div>
      <!-- /.box -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!--============================================
  =            Modal Agregar Productos            =
  =============================================-->
  <!-- Modal -->
<div id="modalAgregarProducto" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <form action="" role="form" method="post" enctype="multipart/form-data">

    <!-- Modal content-->
    <div class="modal-content">
<!--============================================
  =            Cabecera del Modal            =
  =============================================-->
      <div class="modal-header" style="background: #3c8dbc; color: white;">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Agregar producto</h4>
      </div>
<!--============================================
  =            Cuerpo del Modal            =
  =============================================-->
      <div class="modal-body">
        <div class="box-body">

            <!-- ENTRADA PARA SELECCIONAR CATEGORIA-->
          
          <div class="form-group">
            <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-th"></i></span>
              <select name="nuevaCategoria" id="nuevaCategoria" class="form-control input-lg" required>
                <option value="">Seleccionar categoria</option>
                <?php 
                $item = null;
                $valor= null;

                $categorias = ControladorCategorias::ctrMostrarCategorias($item, $valor);

                foreach ($categorias as $key => $value) {
                  echo '<option value="'.$value["id"].'">'.$value["categoria"].'</option>';
                }
                 ?>
               
              </select>
            </div>
          </div>

          <!-- ENTRADA PARA EL CODIGO -->
          
          <div class="form-group">
            <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-code"></i></span>
              <input type="text" class="form-control input-lg" name="nuevoCodigo" id="nuevoCodigo" placeholder="Ingresar codigo" readonly required>
            </div>
          </div>

          <!-- ENTRADA PARA DESCRIPCION -->
          
          <div class="form-group">
            <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-product-hunt"></i></span>
              <input type="text" class="form-control input-lg" name="nuevaDescripcion" placeholder="Ingresar descripcion" required>
            </div>
          </div>

           <!-- ENTRADA PARA EL STOCK -->
          
          <div class="form-group">
            <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-check"></i></span>
              <input type="number" class="form-control input-lg" name="nuevoStock" min="0" placeholder="Cantidad disponible " required>
            </div>
          </div>

           <!-- ENTRADA PARA EL PRECIO COMPRA -->
          
          <div class="form-group row">
            <div class="col-xs-12 col-sm-6">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-arrow-up"></i></span>
                <input type="text" class="form-control input-lg" name="nuevoPrecioCompra" id="nuevoPrecioCompra" step="any" placeholder="Precio de compra" required>
              </div>
            </div>

             <!-- ENTRADA PARA EL PRECIO VENTA -->
            
            <div class="col-xs-12 col-sm-6">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-arrow-down"></i></span>
                <input type="text" class="form-control input-lg" id="nuevoPrecioVenta" name="nuevoPrecioVenta" step="any" placeholder="Precio de venta" required>
              </div>
              <br>
              <!-- CHEKBOX PARA PORCENTAJE -->
              <div class="col-xs-6">
                <div class="form-group">
                  <label>
                    <input type="checkbox" class="minimal porcentaje" checked>
                    Utilizar porcentaje
                  </label>
                </div>
              </div>
               <!-- ENTRADA PARA PORCENTAJE -->
               <div class="col-xs-6" style="padding: 0">
                <div class="input-group">
                   <input type="number" class="form-control input-lg nuevoPorcentaje" min="0" value="40" required>
                   <span class="input-group-addon"><i class="fa fa-percent"></i></span>
                </div>
              </div>

            </div>
          </div>
           <!-- ENTRADA PARA SUBIR FOTO -->
          
          <div class="form-group">
           <div class="panel">SUBIR IMAGEN</div>

           <input type="file" class="nuevaImagen" name="nuevaImagen">
           <p class="help-block">Peso maximo de la foto 2MB</p>
           <img src="vistas/img/Productos/default/anonymous.png" class="img-thumbnail previsualizar" width="100px">
          </div>
        </div>
      </div>



       
      <!--============================================
  =            Pie del Modal            =
  =============================================-->
      <div class="modal-footer">
        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>
        <button type="submit" class="btn btn-primary">Guardar producto</button>
      </div>
    
    </div>
    </form>
  <?php 

    $crearProducto = new ControladorProductos();
    $crearProducto -> ctrCrearProducto();
   ?>
  </div>
</div>
  
  
  <!--====  End of Modal Agregar Productos  ====-->
  
    <!--============================================
  =            Modal Editar Productos            =
  =============================================-->
  <!-- Modal -->
<div id="modalEditarProducto" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <form action="" role="form" method="post" enctype="multipart/form-data">

    <!-- Modal content-->
    <div class="modal-content">
<!--============================================
  =            Cabecera del Modal            =
  =============================================-->
      <div class="modal-header" style="background: #3c8dbc; color: white;">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Editar producto</h4>
      </div>
<!--============================================
  =            Cuerpo del Modal            =
  =============================================-->
      <div class="modal-body">
        <div class="box-body">

            <!-- ENTRADA PARA SELECCIONAR CATEGORIA-->
          
          <div class="form-group">
            <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-th"></i></span>
              <select name="editarCategoria" class="form-control input-lg" required readonly>
                <option id="editarCategoria"></option>               
              </select>
            </div>
          </div>

          <!-- ENTRADA PARA EL CODIGO -->
          
          <div class="form-group">
            <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-code"></i></span>
              <input type="text" class="form-control input-lg" name="editarCodigo" id="editarCodigo" readonly required>
            </div>
          </div>

          <!-- ENTRADA PARA DESCRIPCION -->
          
          <div class="form-group">
            <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-product-hunt"></i></span>
              <input type="text" class="form-control input-lg" name="editarDescripcion" id="editarDescripcion" required>
            </div>
          </div>

           <!-- ENTRADA PARA EL STOCK -->
          
          <div class="form-group">
            <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-check"></i></span>
              <input type="number" class="form-control input-lg" name="editarStock" id="editarStock" min="0"  required>
            </div>
          </div>

           <!-- ENTRADA PARA EL PRECIO COMPRA -->
          
          <div class="form-group row">
            <div class="col-xs-12 col-sm-6">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-arrow-up"></i></span>
                <input type="text" class="form-control input-lg" name="editarPrecioCompra" id="editarPrecioCompra" step="any"  required>
              </div>
            </div>

             <!-- ENTRADA PARA EL PRECIO VENTA -->
            
            <div class="col-xs-12 col-sm-6">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-arrow-down"></i></span>
                <input type="text" class="form-control input-lg" id="editarPrecioVenta" name="editarPrecioVenta" step="any"  required readonly>
              </div>
              <br>
              <!-- CHEKBOX PARA PORCENTAJE -->
              <div class="col-xs-6">
                <div class="form-group">
                  <label>
                    <input type="checkbox" class="minimal porcentaje" checked>
                    Utilizar porcentaje
                  </label>
                </div>
              </div>
               <!-- ENTRADA PARA PORCENTAJE -->
               <div class="col-xs-6" style="padding: 0">
                <div class="input-group">
                   <input type="number" class="form-control input-lg nuevoPorcentaje" min="0" value="40" required>
                   <span class="input-group-addon"><i class="fa fa-percent"></i></span>
                </div>
              </div>

            </div>
          </div>
           <!-- ENTRADA PARA SUBIR FOTO -->
          
          <div class="form-group">
           <div class="panel">SUBIR IMAGEN</div>

           <input type="file" class="nuevaImagen" name="editarImagen">
           <p class="help-block">Peso maximo de la foto 2MB</p>
           <img src="vistas/img/Productos/default/anonymous.png" class="img-thumbnail previsualizar" width="100px">
           <input type="hidden" name="imagenActual" id="imagenActual">
          </div>
        </div>
      </div>



       
      <!--============================================
  =            Pie del Modal            =
  =============================================-->
      <div class="modal-footer">
        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>
        <button type="submit" class="btn btn-primary">Guardar cambios</button>
      </div>
    
    </div>
    </form>
  <?php 

    $editarProducto = new ControladorProductos();
    $editarProducto -> ctrEditarProducto();
   ?>
  </div>
</div>
  
  
  <!--====  End of Modal Editar Productos  ====-->

    <?php 

    $borrarProducto = new ControladorProductos();
    $borrarProducto -> ctrBorrarProducto();
   ?>
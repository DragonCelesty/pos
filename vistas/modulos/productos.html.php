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
                
         
          <table class="table table-bordered table-striped dt-responsive tablas" width="100%">

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

            <tbody>
              <tr>
                <td>1</td>
                <td><img src="vistas/img/productos/default/anonymous.png" class="img-thumbnail" width="40px"></td>
                <td>0001</td>
                <td>Lorem ipsum dolor sit amet</td>
                <td>Lorem ipsum</td>
                <td>20</td>
                <td>$ 5.00</td>
                <td>$ 10.00</td>
                <td>2020-01-01 12:05:32</td>
                <td>
                  <div class="btn-group">
                    <button class="btn btn-warning"><i class="fa fa-pencil"></i></button>
                    <button class="btn btn-danger"><i class="fa fa-times"></i></button>
                  </div>
                </td>
              </tr>
            </tbody>
            
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

          <!-- ENTRADA PARA EL CODIGO -->
          
          <div class="form-group">
            <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-code"></i></span>
              <input type="text" class="form-control input-lg" name="nuevoCodigo" placeholder="Ingresar codigo" required>
            </div>
          </div>

          <!-- ENTRADA PARA DESCRIPCION -->
          
          <div class="form-group">
            <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-product-hunt"></i></span>
              <input type="text" class="form-control input-lg" name="nuevaDescripcion" placeholder="Ingresar descripcion" required>
            </div>
          </div>

          <!-- ENTRADA PARA SELECCIONAR CATEGORIA-->
          
          <div class="form-group">
            <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-th"></i></span>
              <select name="nuevaCategoria" class="form-control input-lg">
                <option value="">Seleccionar categoria</option>
                <option value="Administrador">movil</option>
                <option value="Especial">pc</option>
                <option value="Vendedor">accesorios</option>
              </select>
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
            <div class="col-xs-6">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-arrow-up"></i></span>
                <input type="text" class="form-control input-lg" name="nuevoPrecioCompra" placeholder="Precio de compra" required>
              </div>
            </div>

             <!-- ENTRADA PARA EL PRECIO VENTA -->
            
            <div class="col-xs-6">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-arrow-down"></i></span>
                <input type="text" class="form-control input-lg" name="nuevoPrecioVenta" placeholder="Precio de venta" required>
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

           <input type="file" id="nuevaImagen" name="nuevaImagen">
           <p class="help-block">Peso maximo de la foto 2MB</p>
           <img src="vistas/img/Productos/default/anonymous.png" class="img-thumbnail" width="100px">
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

  </div>
</div>
  
  
  <!--====  End of Modal Agregar Productos  ====-->
  
   <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Administrar Categorias
      </h1>
      <ol class="breadcrumb">
        <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li class="active">Administrar Categorias</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">

          <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarCategoria">
            Agregar categoria
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
                <th>Categoria</th>
                <th>Acciones</th>
              </tr>
            </thead>

            <tbody>

              <?php 

                $item=null;
                $valor=null;

                $categorias = ControladorCategorias::ctrMostrarCategorias($item, $valor);

                foreach ($categorias as $key => $value) {
                  echo ' <tr>
                <td>'.($key+1).'</td>
                <td class="text-uppercase">'.$value["categoria"].'</td>
                <td>
                  <div class="btn-group">
                    <button class="btn btn-warning btnEditarCategoria" idCategoria="'.$value["id"].'" data-toggle="modal" data-target="#modalEditarCategoria"><i class="fa fa-pencil"></i></button>
                    <button class="btn btn-danger btnEliminarCategoria" idCategoria="'.$value["id"].'"><i class="fa fa-times"></i></button>
                  </div>
                </td>
              </tr>';
                }

               ?>
             
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
  =            Modal Agregar Categoria           =
  =============================================-->
  <!-- Modal -->
<div id="modalAgregarCategoria" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <form action="" role="form" method="post">

    <!-- Modal content-->
    <div class="modal-content">
<!--============================================
  =            Cabecera del Modal            =
  =============================================-->
      <div class="modal-header" style="background: #3c8dbc; color: white;">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Agregar Categoria</h4>
      </div>
<!--============================================
  =            Cuerpo del Modal            =
  =============================================-->
      <div class="modal-body">
        <div class="box-body">

          <!-- ENTRADA PARA LA CATEGORIA -->
          
          <div class="form-group">
            <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-th"></i></span>
              <input type="text" class="form-control input-lg" name="nuevaCategoria" id="nuevaCategoria" placeholder="Ingresar Categoria" required>
            </div>
          </div>
        </div>
      </div>



       
      <!--============================================
  =            Pie del Modal            =
  =============================================-->
      <div class="modal-footer">
        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>
        <button type="submit" class="btn btn-primary">Guardar Categoria</button>
      </div>

        <?php 
        $crearCategoria = new ControladorCategorias();
        $crearCategoria -> ctrCrearCategoria();
       ?>
    
    </div>
    </form>

  </div>
</div>
  
  
  <!--====  End of Modal Agregar Categoria  ====-->
  

  <!--============================================
  =            Modal Editar Categoria           =
  =============================================-->
  <!-- Modal -->
<div id="modalEditarCategoria" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <form action="" role="form" method="post">

    <!-- Modal content-->
    <div class="modal-content">
<!--============================================
  =            Cabecera del Modal            =
  =============================================-->
      <div class="modal-header" style="background: #3c8dbc; color: white;">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Editar Categoria</h4>
      </div>
<!--============================================
  =            Cuerpo del Modal            =
  =============================================-->
      <div class="modal-body">
        <div class="box-body">

          <!-- ENTRADA PARA LA CATEGORIA -->
          
          <div class="form-group">
            <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-th"></i></span>
              <input type="text" class="form-control input-lg" name="editarCategoria" id="editarCategoria" required>
              <input type="hidden" name="idCategoria" id="idCategoria" required>
            </div>
          </div>
        </div>
      </div>



       
      <!--============================================
  =            Pie del Modal            =
  =============================================-->
      <div class="modal-footer">
        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>
        <button type="submit" class="btn btn-primary">Guardar Cambios</button>
      </div>

         <?php 
        $editarCategoria = new ControladorCategorias();
        $editarCategoria -> ctrEditarCategoria();
       ?> 
    
    </div>
    </form>

  </div>
</div>
  
  
  <!--====  End of Modal Editar Categoria  ====-->
  <?php 
        $borrarCategoria = new ControladorCategorias();
        $borrarCategoria -> ctrBorrarCategoria();
       ?> 
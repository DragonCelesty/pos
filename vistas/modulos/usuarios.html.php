   <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Administrar Usuarios
      </h1>
      <ol class="breadcrumb">
        <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li class="active">Administrar Usuarios</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">

          <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarUsuario">
            Agregar usuario
          </button>
         
        </div>
        <div class="box-body">

          <!--=====================================
          =            Tabla                      =
          ======================================-->
                
         
          <table class="table table-bordered table-striped dt-responsive tablas">

            <thead>
              <tr>
                <th style="width: 10px">#</th>
                <th>Nombre</th>
                <th>Foto</th>
                <th>Perfil</th>
                <th>Estado</th>
                <th>Ultimo login</th>
                <th>Acciones</th>
              </tr>
            </thead>

            <tbody>
              <tr>
                <td>1</td>
                <td>Usuario administrador</td>
                <td>admin</td>
                <td><img src="vistas/img/usuarios/default/anonymous.png" alt=""></td>
                <td><button class="btn btn-success btn-xs">Activado</button></td>
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
  =            Modal Agregar Usuarios            =
  =============================================-->
  <!-- Modal -->
<div id="modalAgregarUsuario" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <form action="" role="form" method="post" enctype="multipart/form-data">

    <!-- Modal content-->
    <div class="modal-content">
<!--============================================
  =            Cabecera del Modal            =
  =============================================-->
      <div class="modal-header" style="background: #3c8dbc; color: white;">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Agregar usuario</h4>
      </div>
<!--============================================
  =            Cuerpo del Modal            =
  =============================================-->
      <div class="modal-body">
        <div class="box-body">

          <!-- ENTRADA PARA EL NOMBRE -->
          
          <div class="form-group">
            <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-user"></i></span>
              <input type="text" class="form-control input-lg" name="nuevoNombre" placeholder="Ingresar nombre" required>
            </div>
          </div>

          <!-- ENTRADA PARA EL USUARIO -->
          
          <div class="form-group">
            <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-key"></i></span>
              <input type="text" class="form-control input-lg" name="nuevoUsuario" placeholder="Ingresar usuario" required>
            </div>
          </div>

          <!-- ENTRADA PARA EL PASSWORD -->
          
          <div class="form-group">
            <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-lock"></i></span>
              <input type="password" class="form-control input-lg" name="nuevoPassword" placeholder="Ingresar contraseña" required>
            </div>
          </div>
     

       <!-- ENTRADA PARA SELECCIONAR EL PERFIL -->
          
          <div class="form-group">
            <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-users"></i></span>
              <select name="nuevoPerfil" class="form-control input-lg">
                <option value="">Seleccionar perfil</option>
                <option value="Administrador">Administrador</option>
                <option value="Especial">Especial</option>
                <option value="Vendedor">Vendedor</option>
              </select>
            </div>
          </div>

           <!-- ENTRADA PARA SUBIR FOTO -->
          
          <div class="form-group">
           <div class="panel">SUBIR FOTO</div>

           <input type="file" id="nuevaFoto" name="nuevaFoto">
           <p class="help-block">Peso maximo de la foto 200MB</p>
           <img src="vistas/img/usuarios/default/anonymous.png" class="img-thumbnail" width="100px">
          </div>
        </div>
      </div>



       
      <!--============================================
  =            Pie del Modal            =
  =============================================-->
      <div class="modal-footer">
        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>
        <button type="submit" class="btn btn-primary">Guardar usuario</button>
      </div>
    
    </div>
    </form>

  </div>
</div>
  
  
  <!--====  End of Modal Agregar Usuarios  ====-->
  
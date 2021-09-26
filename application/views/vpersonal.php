<div class="container">
	<div class="row">
    <section class="content">
      <div class="row">
        <div class="col-xs-12">

          <div class="box box-primary">
            <div class="box-header">
              <h4 class="box-title"><b>Registro General de Trabajadores</b></h4>
            </div>
            <!-- /.box-header -->
            <div class="box-body">

       
             <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Nombre</th>
                  <th>Codigo</th>
                  <th>DNI</th>
                  <th>IP</th>
                  <th>Local</th>
                  <th>Editar</th>
                  <th>Dar Baja</th>
                </tr>
                </thead>
                <tbody>

                
             	<?php foreach ($datos->result() as $row) {
             		echo '<tr>';
            		echo '<td>'.$row->nombre.'</td>';
            		echo '<td>'.$row->id_codigo.'</td>';
            		echo '<td>'.$row->dni.'</td>';
                echo '<td>'.$row->IP.'</td>';
                echo '<td>'.$row->nomlocal.'</td>';

                echo  '<td><form action="'.base_url().'crud/update" method="post">';
                echo  '<input type="hidden" name="codigo" value='.$row->id_codigo.'>';
                echo  "<input type='hidden' name='nombre' value='".$row->nombre."'>";
                echo  '<input type="hidden" name="dni" value='.$row->dni.'>';
                echo  '<input type="hidden" name="ip" value='.$row->IP.'>';
                echo  "<input type='hidden' name='nomlocal' value='".$row->nomlocal."'>";
                echo  '<input type="hidden" name="permiso" value='.$row->permiso.'>';
                echo  '<input type="hidden" name="cusuario" value='.$row->cUsuario.'>';
                echo  '<input type="hidden" name="codsap" value='.$row->codsap.'>';

                      echo '<button type="submit" class="btn btn-primary"><i class="glyphicon glyphicon-search" ></i></button>
                        </td>';
                      echo  '</form>';

                echo  '<td><form action="'.base_url().'crud/baja" method="post">';
                echo  '<input type="hidden" name="codigo" value='.$row->id_codigo.'>';          
                echo  "<input type='hidden' name='nombre' value='".$row->nombre."'>";
                echo  '<input type="hidden" name="cusuario" value='.$row->cUsuario.'>';
                echo '<button type="submit" class="btn btn-danger"><i class="glyphicon glyphicon-trash" ></i> </button>
                        </td>';
                      echo  '</form>';
                    } ?>

                </tbody>
                <tfoot>
                <tr>
                  <th>Nombre</th>
                  <th>Codigo</th>
                  <th>DNI</th>
                  <th>IP</th>
                  <th>Local</th>
                  <th>Editar</th>
                  <th>Dar Baja</th>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>

	</div>

</div>


<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Modal title</h4>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>


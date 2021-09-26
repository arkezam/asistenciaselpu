<div class="container">
	<div class="row">
    <section class="content">
      <div class="row">
        <div class="col-xs-12">

          <div class="box box-primary">
            <div class="box-header">
              <h4 class="box-title"><b>Registro De Trabajadores dados de Baja</b></h4>
            </div>
            <!-- /.box-header -->
            <div class="box-body">

       
             <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Código</th>
                  <th>Nombres</th>
                  <th>Usuario</th>
                  <th>Fecha Baja</th>
                  <th>Administrador</th>
                </tr>
                </thead>
                <tbody>

                
             	<?php foreach ($datos->result() as $row) {
             		echo '<tr>';
            		echo '<td>'.$row->id_codigo.'</td>';
            		echo '<td>'.$row->nombre.'</td>';
            		echo '<td>'.$row->cusuario.'</td>';
            		
                echo '<td>'.$row->fechabaja.'</td>';
                echo '<td>'.$row->celim.'</td>';

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


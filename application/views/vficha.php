<div class="container" style="background-color: white; padding-bottom: 50px">
	<div class="row">
		<div class="col-xs-12">
			<h3>IDENTIFICACIÓN DEL NUEVO TRABAJADOR</h3>
			<form action="<?php echo base_url();?>crud/guardar" method="POST">
				<div class="col-xs-4">
				<div class="form-group">
					<label for="">Cod. Trabajador</label><br>

					<input type="text" name="codigo" class="form-control"  placeholder="Ejm. 2900" maxlength="4">
				
				</div>
				<div class="form-group">
					<label for="">Nombres y Apellidos:</label><br>
					<input type="text" style="text-transform: uppercase;" name="nombres" class="form-control" placeholder="Nombre Completo" maxlength="40" required="" >
				</div>

				<div class="form-group">
					<label for="">Nombre de Usuario</label><br>
					<input type="text" name="usuario" class="form-control"  placeholder="Ejm. Pracgmf02" >
				</div>
				<div class="form-group">
					<label for="">DNI:</label><br>
					<input type="text" name="dni" class="form-control" pattern="^[0-9]+"  placeholder="Numero de DNI" maxlength="8" required="" >
				</div>
			<?php 
					if(isset($ide)){
			echo '<div class="alert alert-primary" role="alert">';
			echo '<strong>Usuario Agregado!</strong> El usuario Fue Agregado Correctamente';
			echo '</div>';
					}
				 ?>




				</div>
				<div  class="col-xs-1"></div>
				<div class="col-xs-4">
				<div class="form-group">
					<label for="">Permiso:</label><br>
					<div class="form-check">
					  <input class="form-check-input" type="radio" name="permiso" id="radio1" value="2" checked="">
					  <label class="form-check-label" for="radio1">Trabajador</label><br>
					  <input class="form-check-input" type="radio" name="permiso" id="radio2" value="1">
					  <label class="form-check-label" for="radio2">Administrador</label><br>
					  <input class="form-check-input" type="radio" name="permiso" id="radio3" value="3">
					  <label class="form-check-label" for="radio3">Registro Cod. Barras</label>
					</div>
				</div>
				<div class="row">
				<div class="form-group col-xs-6">
					<label for="">Codigo SAP</label><br>
					<input type="text" name="codsap"  class="form-control" maxlength="10">
				</div>
				<div class="form-group col-xs-6">
					<label for="">IP de local</label><br>
					<input type="text" name="ip" min="1" class="form-control" maxlength="15" required="">
				</div>
				
				<div class="form-group col-xs-6">
					<label for="">Cod. Local</label><br>
					<input type="text" name="codlocal" class="form-control">
				</div><br>
				<div class="form-group col-xs-6">
					<label for="">Nombre local</label><br>
					<input type="text" name="nomlocal" class="form-control">
				</div>

				<input  class="btn btn-primary btn-block btn-flat" type="submit" value="Guardar">

				
				</div>
				
				</div>

			</form>
		</div>
	</div>
</div>


<div class="container">
	<div class="row" style="background-color: white">
		<div class="col-xs-10">
			<h4><b></b>

		<form action="<?php echo base_url();?>crud/baja1" method="POST">
				<div class="col-xs-5">
					<label for="form-group">Dando de baja al Trabajador: </label>
				<div class="form-group">
					<label for="">Cod. Trabajador:</label><br>

					<input type="text" name="codigo" class="form-control" value="<?php echo $codigo; ?>"   >
				
				</div>
				<div class="form-group">
					<label for="">Nombres y Apellidos:</label><br>
					<input type="text" style="text-transform: uppercase;" name="nombre" class="form-control"  maxlength="40" value="<?php echo $nombre; ?>"  >
				</div>

				<div class="form-group">
					<label for="">Usuario:</label><br>
					<input type="text" name="cusuario" class="form-control" value="<?php echo $cusuario; ?>" >
				</div>
	
		 <button type="submit" class="btn btn-primary">Dar de Baja</button>
		 <a href="javascript: history.go(-1)" class="btn btn-danger"> Cancelar </a></div>


			</form>

		</div>
	</div>
</div>
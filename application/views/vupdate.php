<div class="container">
	<div class="row" style="background-color: white">
		<div class="col-xs-10">
			<h4><b></b>

		<form action="<?php echo base_url();?>crud/update1" method="POST">
				<div class="col-xs-5">
					<h1> MODIFICAR USUARIO</h1>
				<div class="form-group">
				
					<label for="">Cod. Trabajador:</label> <?php echo $codigo;  ?> <br>
					

					<input type="hidden" name="codigo" class="form-control" value="<?php echo $codigo;?>"  maxlength="5" >
				
				</div>
				<div class="form-group">
					<label for="">Nombres y Apellidos:</label><br>
					<input type="text" style="text-transform: uppercase;" name="nombre" class="form-control"  maxlength="40" value="<?php echo $nombre; ?>" required="" >
				</div>

				<div class="form-group">
					<label for="">Usuario:</label><br>
					<input type="text" name="cusuario" class="form-control" value="<?php echo $cusuario; ?>" required="">
				</div>
				<div class="form-group">
					<label for="">DNI:</label><br>
					<input type="text" name="dni" class="form-control" pattern="^[0-9]+"   maxlength="8" value="<?php echo $dni; ?>" required="" >
				</div>
				<div class="form-group">
					<label for="">Nombre de Local:</label><br>
					<input type="text" name="nomlocal" class="form-control" value="<?php echo $nomlocal;?>">
				</div>
					
				
		 <button type="submit" class="btn btn-primary">Modficar</button>
		 <a href="javascript: history.go(-1)" class="btn btn-danger"> Cancelar </a></div>
				
				<div class="col-xs-1"></div>
				<div class="col-xs-6" style="margin-top: 5rem">
				<div class="form-group">
					<label for="">Codigo SAP:</label><br>
					
					<input type="text" name="codsap" style="width: 15rem" class="form-control" value="<?php echo $codsap;?>">
				</div>
				<div class="form-group">
					<label for="">Permiso:</label><br>
					<input type="text" name="permiso" style="width: 10rem" class="form-control" value="<?php echo $permiso;?>">
				</div>
				<div class="row">
				<div class="form-group col-xs-6">
					<label for="">IP de local</label><br>
					<input type="text" name="ip" min="1" class="form-control" maxlength="15" value="<?php echo $ip;?>" required="">
				</div>

			
				</div>
				
				</div>

			</form>

		</div>
	</div>
</div>
<div class="container">
<div class="row" style="background-color: white">
	<div class="container" style="margin: 1rem">
		<div class="row"><h4><label>Generar Archivo para Exportación a SAP</label></h4></div>
	</div>
	<div class="row" style=" margin-left: 1rem">
	
	<div class="col-xs-3">

		<form name="formulario1" action="<?php echo base_url();?>cpanel/cexportarsap" method="POST">
	  
	  <div class="col-10">
	  	<p>Elegir una Fecha válida para la exportación </p>
	  	<label for="desde" class="col-2 col-form-label">Fecha de Exportación</label>
	    <input  type="date" name="finicio" id="finicio" value="<?php echo getd(); ?>">
	  </div>
	</div>	

	</div>
	
		<div class="col-xs-5" style="padding-top: 10px; padding-bottom: 10px" >

			<button type="submit" style="margin:10px" class="btn btn-primary btn-lg active"  aria-pressed="true">Exportar SAP</button>

		</div>

	</div>
	</form>

</div>
<?php
 
function getd(){
	date_default_timezone_set('America/Lima');
	$dat = new DateTime();

	//$dat->modify('-2 minutes');

	$fecha= $dat->format('Y-m-d');


	return $fecha;

}
 
 ?>.

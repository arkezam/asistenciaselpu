<div class="container">
<div class="row" style="background-color: white">
	<div class="container" style="margin: 1rem">
		<div class="row"><h4>Elegir el intervalo de las Fechas que desea Exportar:</h4></div>
	</div>
	<div class="row" style=" margin-left: 1rem">
	
	<div class="col-xs-3">

		<form name="formulario1" action="<?php echo base_url();?>cpanel/cexportar" method="POST">
	  
	  <div class="col-10">
	  	<label for="desde" class="col-2 col-form-label">Desde</label>
	    <input  type="date" name="finicio" id="finicio" value="<?php echo getd(); ?>">
	  </div>
	</div>	
	<div class="col-xs-4">
		
	  
	  <div class="col-3">
	  	<label for="hasta" class="col-2 col-form-label">Hasta</label>
	    <input  type="date" name="ffin" id="ffin" value="<?php echo getd1(); ?>" >
	  </div>
	</div>

	</div>
	
		<div class="col-xs-5" style="padding-top: 10px; padding-bottom: 10px" >

			<button type="submit" style="margin:10px" class="btn btn-primary btn-lg active"  aria-pressed="true">Exportar .dat</button>

		</div>

	</div>
	</form>

</div>
<?php
 
 function getd(){
date_default_timezone_set('America/Lima');
$dat = new DateTime();

//$dat->modify('-2 minutes');
$dat->modify('-1 month');
$fecha= $dat->format('Y-m-d');


return $fecha;

}
 
 function getd1(){
date_default_timezone_set('America/Lima');
$dat = new DateTime();

//$dat->modify('-2 minutes');

$fecha= $dat->format('Y-m-d');


return $fecha;

}
 ?>.

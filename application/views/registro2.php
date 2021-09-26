<?php
 //----------- Salida Remoto pantalla 2
	function getd(){
		date_default_timezone_set('America/Lima');
		$dat = new DateTime();
		//$dat->modify('-2 minutes')
		//$fecha= $dat->format('Y-m-d H:i:s');
		$fecha= $dat->format('H:i m-Y');

	return $fecha;
	}
 ?>

<style type="text/css">
  #padre {

	  margin: 1rem;
	  padding: 1rem;
	  border: 2px solid #C9DAEB;
	  background-color: #F8F9FB;
	  border-radius: 10px;  
	  text-align: center;
	}
</style>
<div class="container">
    <div class="row">
        <div class="col-xs-3">
        </div>
            <div id="padre" class="col-xs-6">
				<h2>HORA DEL SISTEMA</h2>
            	<div class="row">
	                <div class="col-xs-1">
	                </div>
	                <h1>
	                	<div id="clock">
	                		
	                	</div>
	                </h1>
            	</div>  
        	</div>
        <div class="col-xs-12">
        	<div ID="padre">
      
      <?php 

        echo "<h3>INGRESO TRAB. REMOTO: ".$d2." Registrado Exitosamente</h3>";
		echo "<h3>Hora Registrada: ".getd()."<h3>";
        

        if (isset($res)) {

        if ($res==1) {
          switch ($tipo) {
          case 0:
            echo "<h3>INGRESO de: ";
            break;
          case 1:
            echo "<h3>SALIDA de: ";
            break;
          case 2:
            echo "<h3>SALIDA TRAB REMOTO: ";
            break;
          }
          echo " ".$usern." Registrado Exitosamente</h3>";
          }
        else
          {
            echo "<h2>El Usuario Ingresado no Existe en el Sistema</h2>";
          }
        }

    ?>
    
  </div>

			</div>
		</div>
	</div>
	<div class="container">
		<!--aqui va-->
				 <form name="formulario1" action="<?php echo base_url();?>cpanel/cregistroper2" method="POST">
              <div class="form-group" >
              	<div class="col-xs-3"></div>
                <div class="col-xs-7" style="padding-left: 0rem; margin-left: 0rem">
               
               
                <div style="margin: 15px">
                	<input type="hidden" name='fecha' value ="">
					<input type="hidden" name='dni' value =<?php echo $this->session->userdata('s_usuario'); ?>>

                <button type="submit" class="btn btn-primary btn-lg btn-block " >Registrar Salida</button>
                </div>
              </div>

              

                <div class="radio" style="visibility:hidden;" >
                  <label style="font-size: 20px">
                    <div>
                      <input type="radio" id="entrada" class="regular-radio" name="tipo" value="3" checked>
                      <label for="entrada">Entrada</label>
                    </div>

                    <div>
                      <input type="radio" id="salida"  name="tipo" value="3" >
                      <label for="salida">Salida</label>
                    </div>

                    <div>
                      <input type="radio" id="refrigerio" name="tipo" value="3">
                      <label for="refrigerio">Refrigerio</label>
                    </div>
                  
                  </label>
                </div>


              </div>
              
            </form>
	</div>


<!------------------>
<script type="text/javascript">

function check(){

document.formulario1.re.value ="asdf";

}
    function startTime() {
    var today = new Date();
    var	Y = today.getFullYear();
    var Mo = today.getMonth()+1;
    var d = today.getDate()
    var hr = today.getHours();
    var min = today.getMinutes();
    var sec = today.getSeconds();
    //Add a zero in front of numbers<10  2020-05-07 12:46:08

    sec = checkTime(sec); 
    min = checkTime(min);
    Mo = checkTime(Mo);
    d = checkTime(d);
    document.getElementById("clock").innerHTML = hr + " : " + min + " : " + sec;
    var time = setTimeout(function(){ startTime() }, 1000);
    document.getElementsByName("fecha").value = time ;

document.formulario1.fecha.value = Y +"-"+ Mo + "-"+ d + " " + hr + ":" + min + ":" + sec;



    if (hr <= 8) {
    	document.getElementById('entrada').checked = true;}
    else if (hr >= 11 && hr <= 15) {
   	 	document.getElementById('refrigerio').checked = true;
    }
    else if (hr >= 16) {
    document.getElementById('salida').checked = true;
	}else
    document.getElementById('oficial').checked = true;


}
function checkTime(i) {
    if (i < 10) {
        i = "0" + i;
    }
    return i;
}


</script>



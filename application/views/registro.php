<?php
 
    function getRealIP(){

            return $_SERVER["REMOTE_ADDR"];
    }       

 function getd(){
date_default_timezone_set('America/Lima');
$dat = new DateTime();
//$dat->modify('-2 minutes');
$fecha= $dat->format('Y-m-d H:i:s');

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
                <div class="col-xs-1"></div>

                <h1><div id="clock"></div></h1>
            </div>  
        </div>
        <div class="col-xs-12">
         <form name="formulario1" action="<?php echo base_url();?>cpanel/cregistroper" method="POST">
             
              <div class="form-group">

                <div id="bloq" class="col-xs-5">
                <label for="campodni">Numero de Doc. Identidad</label>
                <input  type="text" onblur="this.focus()" autofocus class="form-control" name="dni" id='dni'  placeholder="Ingrese Su DNI" autocomplete="off" required="ingresa" required pattern="[0-9]+" maxlength="8" >
        <div id="ocultar" name="ocultar"></div>
                <div style="margin: 15px">
                  <input type="hidden" name='fecha' value ="<?php echo getd();?>">
          
              <input type="hidden" name='iphost' value ="<?php echo getRealIP()?>">

                <button type="submit" class="btn btn-primary">Ingresar</button>
                </div>
              </div>
              <div class="col-xs-5" style="margin-top: 2rem">

                <div class="radio">
                  <label style="font-size: 20px">
                    
                    <div id="entrar1" style="display: none;">
                      <input type="radio" id="entrada" name="tipo" value="0"
                             checked>
                      <label for="entrada">Entrada</label>
                    </div>

                    <div id="salir1" style="display: none;">
                      <input type="radio" id="salida" name="tipo" value="1">
                      <label for="salida">Salida</label>
                    </div>


                    <div id="oficial1" style="display: none;">
                      <input type="radio"  id="oficial" name="tipo" value="2">
                      <label for="oficial">Oficial</label>
                    </div>
<!--

                    <div  style="visibility:hidden;">
                      <input type="radio" id="oficial" name="tipo" value="3">
                      <label for="oficial">Oficial</label>
                    </div>
                    <div>
                      <input type="radio" id="salud" name="tipo" value="4">
                      <label for="salud">Salud</label>
                    </div>
                    <div>
                      <input type="radio" id="particular" name="tipo" value="5">
                      <label for="particular">Particular</label>
                    </div>                  
                  </label>
-->
                </div>

              </div>

              </div>
              
            </form>

<div style="fon"></div>
        </div>
    </div>
</div>

<?php 

  if (isset($res)) {

    if ($res==1) {
      switch ($tipo) {
        case 0:
            echo "<h3>Marcación de: \"";
            break;
        case 1:
            echo "<h3>Marcación de: \"";
            break;
        case 2:
            echo "<h3>Marcación Oficial de: ";
            break;
        }
        echo $nom."\" </br></br><p><label>Registrado Exitosamente</label><p></h3>";
    }
    elseif ($res==2)
    {
        echo "<h3>".$nom."</h3> <h3><label>Ya Registró su Marcación Anteriormente</label></h3>";
    }
     else
    {
        echo "<h2>El Usuario Ingresado no Existe en el Sistema</h2>";
    }
  }


?>


<!------------------>
<script type="text/javascript">


function callback(e){
    resultado=JSON.parse(e);
    document.getElementById("horaServidor").innerHTML=resultado.hora;
}
function check(){

document.formulario1.re.value ="asdf";

}
    function startTime() {
    var today = new Date();
    var Y = today.getFullYear();
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
  var contador = hr+""+min;
    document.getElementById("clock").innerHTML = hr + " : " + min + " : " + sec;
    var time = setTimeout(function(){ startTime() }, 1000);
    document.getElementsByName("fecha").value = time ;

//document.formulario1.fecha.value = Y +"-"+ Mo + "-"+ d + " " + hr + ":" + min + ":" + sec;

  document.getElementById("dni").focus();

    if (contador <= 815 ) {

      document.getElementById('entrar1').style.display='';
      document.getElementById('salir1').style.display='none';
      document.getElementById('oficial1').style.display='none';
      document.getElementById('entrada').checked = true;
      document.getElementById('dni').style.display='';
      document.getElementById('ocultar').innerHTML='';
      }

    if (contador >= 816  && contador <= 1359) {
      document.getElementById('oficial1').style.display='';
      document.getElementById('salir1').style.display='none';
      document.getElementById('entrar1').style.display='none';
      document.getElementById('oficial').checked = true;
      document.getElementById('dni').style.display='';
      document.getElementById('ocultar').innerHTML='';
    }

    if (contador >= 1400 && contador <= 2014 ) {
      document.getElementById('entrar1').style.display='none';
      document.getElementById('oficial1').style.display='none';
      document.getElementById('salir1').style.display='';
      document.getElementById('salida').checked = true;
      document.getElementById('dni').style.display='';
      document.getElementById('ocultar').innerHTML='';
  }
  
  if (contador >= 2015) {
    document.getElementById('dni').style.display='none';
    document.getElementById('ocultar').innerHTML='<h2>Sistema Bloqueado por horario</h2>';
  }
/*
if (hr <= 8 && min <= 20) {
    document.getElementById('entrada').checked = true;}

    else if (hr >= 14) {
    document.getElementById('salida').checked = true;
}
*/

/*
    if (hr <= 8) {
      document.getElementById('entrada').checked = true;}
    else if (hr >= 13 && hr <= 15) {
      document.getElementById('refrigerio').checked = true;
    }
    else if (hr >= 16) {
    document.getElementById('salida').checked = true;
  }else
    document.getElementById('oficial').checked = true;
*/
  

}
function checkTime(i) {
    if (i < 10) {
        i = "0" + i;
    }
    return i;
}


</script>



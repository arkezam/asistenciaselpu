<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cpanel extends CI_Controller {
	

    public function __construct(){
    
        parent::__construct();
        $this->load->model('mdata');
        $this->load->helper('url');
		$this->load->library('session');


    }

	public function index(){

        $this->load->view('vlogin');

    }

    public function ingresar()
	{
		//$this->output->set_header('Expires: Sat, 26 Jul 2000 05:00:00 GMT');
		//$this->output->set_header('Cache-Control: no-cache, no-store, must-revalidate, max-age=0');
		//$this->output->set_header('Cache-Control: post-check=0, pre-check=0', FALSE);
		//$this->output->set_header('Pragma: no-cache');
    //echo "Tu dirección IP es: {$_SERVER['REMOTE_ADDR']}";
	///////////////////////////////////////////////////////////
	require("ldap.php"); 
	//$usr=trim($_POST[user]);
    $usr =  $this->input->post('user');									
	//agregar despues de crear los perfiles
	//$sql = "SELECT * FROM personal WHERE cUsuario='$usr'";
	//$rs = mysql_db_query($sql,$cnx);
	$res = $this->mdata->validar($usr);
	if(isset($usr,$_POST["pass"]) && $res ==1){
	$usuario = mailboxpowerloginrd($usr,$_POST["pass"]);
	$log =  array(
        's_usuario' => $usr,
         'login'=> true);
	
	if($usuario == "0" || $usr == ''){ 
        
	    
            $_SERVER = array(); 
            $_SESSION = array(); 
            //echo"<script> alert('Usuario o clave incorrecta. Vuelva a digitarlos por favor.	'); </script>"; 
			$data['a'] = 'Nombre de Usuario o Contraseña incorrecta';
            $this->load->view('vlogin',$data);
    }
	else 
	{ 	
		$this->session->set_userdata($log);
		
	        //sesiones
			//agregar a la tabla seguridad(fechas y horas ingreso/salida)
			//
		$tip=$this->mdata->getpermiso();
		
			if($tip == 2){
				
			$this->load->view('layout/header2');

			//$this->mdata->getusername();
			//$data2['d2'] = $this->mdata->getnombre2();
			
            $this->load->view('registro1');
            $this->load->view('layout/footer');
			} else if ($tip == 1){
			$this->load->view('layout/header');
			$this->load->view('layout/menu');
            $this->load->view('registro');
            $this->load->view('layout/footer');
			}
			else if ($tip == 3){
			$this->load->view('layout/header');
			$this->load->view('layout/menu3');
			$this->load->view('registro');
            $this->load->view('layout/footer');
			}
	}
	}
	else{
		$data['a'] = 'Nombre de Usuario o Contraseña incorrecta';
		$this->load->view('vlogin',$data);
	}
		

    }
	public function ingresorem(){

			$this->load->view('layout/header2');
			
            $this->load->view('registro1');
            $this->load->view('layout/footer');
    }
	
		public function ingresorem3(){

	
			$data2['d2'] = $this->mdata->getnombre2();
			$this->mdata->getusername(); 
			$this->load->view('layout/header2');
			
            $this->load->view('registro2',$data2);
 
            $this->load->view('layout/footer');
    }
	

    public function cpersonal(){

        $this->load->view('layout/header');
        $this->load->view('layout/menu');
        
        $data ['datos'] = $this->mdata->mgetpersonal();

        $this->load->view('vpersonal',$data);
        $this->load->view('layout/footer');    
    }
    public function cregistro(){

        $this->load->view('layout/header');
        $this->load->view('layout/menu');
        $this->load->view('registro');

        $this->load->view('layout/footer');    
    }
    public function cficha(){
        $this->load->view('layout/header');
        $this->load->view('layout/menu');

        $this->load->view('vficha');

        $this->load->view('layout/footer'); 
    }



        public function cregistroper(){
        $data ['dni'] = $this->input->post('dni');
        $data ['fecha'] = $this->input->post('fecha');
        $data ['tipo'] = $this->input->post('tipo');
		
        $data ['iphost'] = $this->input->post('iphost');

        $dni = $this->input->post('dni');
		$res1 ['tipo'] = $data['tipo'];
        $res = $this->mdata->mregpersonal($data,$dni);
        $res1 ['res'] = $res;
		if(isset($res1)){
        $nom = $this->mdata->getnombre($dni);
        $res1 ['nom'] = $nom;
		
		$this->load->view('layout/header');
        $this->load->view('layout/menu3');
        $this->load->view('registro',$res1); 
        $this->load->view('layout/footer'); 
		}
    }

        public function cregistroper2(){


        $data ['dni'] = $this->session->userdata('s_usuario'); //cambiar
        $data ['fecha'] = $this->input->post('fecha');
        $data ['tipo'] = $this->input->post('tipo');
		
        $dni = $this->input->post('dni');
		$res1 ['tipo'] = $data['tipo'];
        $res = $this->mdata->mregpersonal2($data,$dni);
        $res1 ['res'] = $res;
        $nom = $this->mdata->getnombre($dni);
        $res1 ['nom'] = $nom;
		echo '<script type="text/javascript">
        alert("Registro de Salida Validado correctamente \n Presione ACEPTAR para terminar la Sesion Remota");</script>';
		
        $this->load->view('vlogin'); 
		

    }
		

        public function creporte(){

        $this->load->view('layout/header');
        $this->load->view('layout/menu');
        $this->load->view('vexportar'); 
        $this->load->view('layout/footer'); 
        
    }
        public function cexportar(){


            $data ['finicio'] = $this->input->post('finicio');
            $data ['ffin'] = $this->input->post('ffin');

            $file_name='archivo'.date('Ymd').'.dat';
            
            header('Content-Description: File Transfer');
            header('Content-Disposition: attachment; filename='.$file_name);
            header('Content-type: application/csv');

            /*
            header('Cache-Control: no-store, no-cache, must-revalidate');
            header('Cache-Control: post-check=0, pre-check=0');
            header('Pragma: no-cache');
            header('Expires:0');
            */

            $data = $this->mdata->getexportar($data);

            $file = fopen('php://output','w+');

            
            
            foreach ($data->result_array() as $key => $value) {
                //echo "\t";
                fputcsv($file,$value,"\t");


            }
            fclose($file);
            exit;
			
			

            
    }
	
     public function creportesap(){
        $this->load->view('layout/header');
        $this->load->view('layout/menu');
        $this->load->view('vexportarsap'); 
        $this->load->view('layout/footer'); 

     }
     public function cexportarsap(){


            $data ['finicio'] = $this->input->post('finicio');
               
            $data['finicio'] = $data['finicio'].'%';
            
           
            $file_name='archivo'.date('Ymd').'.dat';
            
            header('Content-Description: File Transfer');
            header('Content-Disposition: attachment; filename='.$file_name);
            header('Content-type: application/csv');

        /*
            header('Cache-Control: no-store, no-cache, must-revalidate');
            header('Cache-Control: post-check=0, pre-check=0');
            header('Pragma: no-cache');
            header('Expires:0');
            */
        

           $data = $this->mdata->getexportarsap($data);
        
        

            $file = fopen('php://output','w+');

            
   
    }
	
}

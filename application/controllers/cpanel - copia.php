<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cpanel extends CI_Controller {
	

    public function __construct(){
    
        parent::__construct();
        $this->load->model('mdata');
        $this->load->helper('url');

    }

	public function index(){

        $this->load->view('vlogin');

    }

    public function ingresar()
	{
    
	///////////////////////////////////////////////////////////
	require("ldap.php"); 
	//$usr=trim($_POST[user]);
    $usr =  $this->input->post('user');
	//agregar despues de crear los perfils
	//$sql = "SELECT * FROM personal WHERE cUsuario='$usr'";
	//$rs = mysql_db_query($sql,$cnx);
	$usuario = mailboxpowerloginrd($usr,$_POST["pass"]); 
	if($usuario == "0" || $usr == ''){ 
            $_SERVER = array(); 
            $_SESSION = array(); 
            echo"<script> alert('Usuario o clave incorrecta. Vuelva a digitarlos por favor.'); </script>"; 
    }
	else
	{ 	
	        //sesiones
			//agregar a la tabla seguridad(fechas y horas ingreso/salida)
			//
			
			$this->load->view('layout/header');
            $this->load->view('layout/menu');
            $this->load->view('registro');
            $this->load->view('layout/footer');
	}	

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

        $this->load->view('layout/header');
        $this->load->view('layout/menu');

        $data ['dni'] = $this->input->post('dni');
        $data ['fecha'] = $this->input->post('fecha');
        $data ['tipo'] = $this->input->post('tipo');

        $dni = $this->input->post('dni');
 
        $res = $this->mdata->mregpersonal($data,$dni);
        $res1 ['res'] = $res;
        $nom = $this->mdata->getnombre($dni);
        $res1 ['nom'] = $nom;
        $this->load->view('registro',$res1); 
        $this->load->view('layout/footer'); 
        


    }

        public function creporte(){

        $this->load->view('layout/header');
        $this->load->view('layout/menu');
        $this->load->view('vexportar'); 
        $this->load->view('layout/footer'); 
        
    }
        public function cexportar(){

            $file_name='archivo'.date('Ymd').'.csv';
            
            header('Content-Description: File Transfer');
            header('Content-Disposition: attachment; filename='.$file_name);
            header('Content-type: application/csv');

            /*
            header('Cache-Control: no-store, no-cache, must-revalidate');
            header('Cache-Control: post-check=0, pre-check=0');
            header('Pragma: no-cache');
            header('Expires:0');
            */

            $data = $this->mdata->getexportar();

            $file = fopen('php://output','w');

            $header = array ("codigo","fecha","cod1","tipo_marc","modo_marc","cod2");
            fputcsv($file, $header);
            foreach ($data->result_array() as $key => $value) {
                fputcsv($file, $value);

            }
            fclose($file);
            exit;

    }


}

//https://code.tutsplus.com/es/tutorials/how-to-work-with-session-data-in-codeigniter--cms-28658
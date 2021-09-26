<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Crud extends CI_Controller {
	
	public function __construct(){

        parent::__construct();
        $this->load->model('mcrud');
        $this->load->helper('url');
		$this->load->library('session');
    }

    public function create(){
    	
		$this->load->view('layout/header');
    	$this->load->view('layout/menu');
    	$this->load->view('vficha');
    	$this->load->view('layout/footer');    	
    } 

    public function guardar(){
        $data['codigo'] = $this->input->post('codigo');
        $data['nombres'] = strtoupper( $this->input->post('nombres'));
        $data['usuario'] = $this->input->post('usuario');
        $data['dni'] = $this->input->post('dni');
        $data['ip'] = $this->input->post('ip');
        $data['permiso'] = $this->input->post('permiso');
        $data['codlocal'] = $this->input->post('codlocal');
        $data['nomlocal'] = $this->input->post('nomlocal');
        $data['codsap'] = $this->input->post('codsap');
		
        $this->mcrud->mcreate($data);
		$ident['ide'] = 1;
        $this->load->view('layout/header');
        $this->load->view('layout/menu');
		$this->load->view('vficha',$ident);
        $this->load->view('layout/footer'); 
    }

    public function update(){
        $data['codigo'] = $this->input->post('codigo');

        $data['nombre'] = $this->input->post('nombre');
        $data['cusuario'] = $this->input->post('cusuario');

        $data['permiso'] = $this->input->post('permiso');

        $data['dni'] = $this->input->post('dni');
        $data['ip'] = $this->input->post('ip');
        $data['nomlocal'] = $this->input->post('nomlocal');
		$data['codsap'] = $this->input->post('codsap');
        $this->load->view('layout/header');
        $this->load->view('layout/menu');
        $this->load->view('vupdate',$data);
        $this->load->view('layout/footer'); 


    }
    public function update1(){

        $data['codigo'] = $this->input->post('codigo');
        $data['nombre'] = strtoupper( $this->input->post('nombre'));
        $data['cusuario'] = $this->input->post('cusuario');
        $data['permiso'] = $this->input->post('permiso');
        $data['dni'] = $this->input->post('dni');
        $data['ip'] = $this->input->post('ip');
        $data['nomlocal'] = $this->input->post('nomlocal');
		$data['codsap'] = $this->input->post('codsap');
        
        $this->mcrud->mupdate($data);

        $this->load->view('layout/header');
        $this->load->view('layout/menu');
        $dat ['datos'] = $this->mcrud->mgetpersonal();
        $this->load->view('vpersonal',$dat);
        $this->load->view('layout/footer'); 

    }


    public function baja(){

        $data['codigo'] = $this->input->post('codigo');
        $data['cusuario'] = $this->input->post('cusuario');
        $data['nombre'] = $this->input->post('nombre');

   

        $this->load->view('layout/header');
        $this->load->view('layout/menu');

        $this->load->view('vbaja',$data);



        $this->load->view('layout/footer'); 

    }
    public function baja1(){
        $data['codigo'] = $this->input->post('codigo');
        $data['cusuario'] = $this->input->post('cusuario');
        $data['nombre'] = $this->input->post('nombre');

        $this->mcrud->mbaja($data);
        
        $this->load->view('layout/header');
        $this->load->view('layout/menu');
        $dat ['datos'] = $this->mcrud->mgetpersonal();
        $this->load->view('vpersonal',$dat);
        $this->load->view('layout/footer'); 

    }
	public function listabaja(){
        $data ['datos'] = $this->mcrud->mlistabaja();
        $this->load->view('layout/header');
        $this->load->view('layout/menu');
        $this->load->view('vlistabaja',$data);
        $this->load->view('layout/footer');         

    }

   }

?>
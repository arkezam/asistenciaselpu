<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Mcrud extends CI_Model {

    public function mcreate($data){

    $campos = array( 


          'id_codigo'=> $data['codigo'],
          'nombre' 	=> 	$data['nombres'],
          'cusuario'=>	$data['usuario'],
          'dni' 	=> 	$data['dni'],
          'permiso' => 	$data['permiso'],
          'ip' 		=> 	$data['ip'],
          'codlocal'=> 	$data['codlocal'],
		  'codsap'=> 	$data['codsap'],
          'nomlocal'=> 	$data['nomlocal'],

        );

        $this->db->insert('personal', $campos);


    }
	 public function mupdate($data){
   
    $dat = array(

            'nombre'  => $data['nombre'],
            'cusuario'  => $data['cusuario'],
            'id_codigo'  => $data['codigo'],
            'permiso'  => $data['permiso'],
            'nomlocal'  => $data['nomlocal'],
            'dni'  => $data['dni'],
            'ip'  => $data['ip'],
			'codsap'  => $data['codsap'],
            
    );

    $this->db->where('id_codigo', $data['codigo']);
    $this->db->update('personal', $dat);
   }

    public function mgetpersonal(){

        $result = $this->db->query('SELECT * FROM personal');
        return $result;
    }


   public function mbaja($data){
   
    $fec = $this->db->query('SELECT NOW() as fechas');
      
      foreach ($fec->result() as $row) {

            $fech = $row->fechas;
      }

    $dat = array(


            'id_codigo'  => $data['codigo'],
            
            'nombre'  => $data['nombre'],
            'cusuario'  => $data['cusuario'],

    );

    $dat2 = array(

            //agregar nombre PC

            'id_codigo'  => $data['codigo'],
            'fechabaja'  => $fech,
            'nombres'  => $data['nombre'],
            'cusuario'  => $data['cusuario'],
            
            'celim' => $this->session->userdata('s_usuario')

    );
    $this->db->where('id_codigo', $data['codigo']);
    $this->db->insert('bajausuario', $dat2);

    $this->db->where('id_codigo', $data['codigo']);
    $this->db->delete('personal', $dat);
	}
	
	public function mlistabaja(){

        $result = $this->db->query('SELECT * FROM bajausuario');
        return $result;
    }

}
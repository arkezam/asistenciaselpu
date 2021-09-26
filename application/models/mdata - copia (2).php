<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Mdata extends CI_Model {

    public function validar($user,$pass){
        require("ldap.php"); 
		
        $this->db->select('*');
        $this->db->from('personal');
        $this->db->where('cUsuario',$user);
        $this->db->where('pass',$pass);
        $resultado = $this->db->get();

        
        if ($resultado->num_rows() == 1) {
            $r = $resultado->row();

            $s_usuario = array(
                's_user' => $r->username,
                's_pass' => $r->pass,
                's_idusuario' => $r->id_usuario,
                's_usuario' => $r->nom_usuario.' '.$r->ap_usuario
            );
            $this->session->set_userdata($s_usuario);
            return 1;
        }
        else{

            return 0;
        }

    }
    public function mgetpersonal(){
        $result = $this->db->query('SELECT * FROM personal');
        return $result;
    }

    public function m_setpaciente($data){


        $campos = array( 
            'nombre' => $data ['nombre'],
            'ap_paterno' => $data ['nombre'],
            'ap_materno' => $data ['nombre'],
            'sexo' => $data ['nombre'],
            'edad' => $data ['nombre'],

        );

        $this->db->insert('personal', $campos);

    }


        public function mregpersonal($data,$dni){

  

        $resulta = $this->db->query('SELECT ID_codigo from personal where dni = '.$dni);
        
        foreach ($resulta->result() as $row) {

                    $codigot = $row->ID_codigo;
        }
       $fec = $this->db->query('SELECT NOW() as fechas');
        
        foreach ($fec->result() as $row) {

                    $fech = $row->fechas;
        }

        if (isset($codigot)) {
        

        $campos = array( 
      
            'fecha' => $fech,
            'idcodigofk' => $codigot,
            'tiposalida' => $data['tipo'],
            'cod1' => 3,
            'cod2' => 1,
            'cod3' => 0,
        );


       $this->db->insert('registro', $campos);
       return 1;
        }
        else{
           return 0;

        }
    }
    public function getnombre($dni){
        $nombre = $this->db->query('SELECT nombre from personal where dni = '.$dni);
        foreach ($nombre->result() as $row) {

        $nombrep = $row->nombre;
        }
        if (isset($nombrep)) {
            return $nombrep;
        }
        
    }
    public function getexportar(){
        $this->db->select('idcodigofk,fecha,cod1,tiposalida,cod2,cod3');
        $this->db->from('registro');
        $result=$this->db->get();

        return $result;
        
    }
 
}
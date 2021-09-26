<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Mdata extends CI_Model {

    public function validar($user){

        $this->db->select('*');
        $this->db->from('personal');
        $this->db->where('cusuario',$user);
        
        
        $resultado = $this->db->get();
        
        if ($resultado->num_rows() == 1) {
            
            
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
       $fec = $this->db->query('SELECT (NOW() - INTERVAL 1 MINUTE) as fechas');
        
        foreach ($fec->result() as $row) {

                    $fech = $row->fechas;
        }

        if (isset($codigot)) {

         $dup = $this->db->query("SELECT count(*) cant from 

            registro where idcodigofk = ".$codigot." and DATE_FORMAT(fecha, '%d/%m/%y') = DATE_FORMAT(NOW(), '%d/%m/%y') and tiposalida = ".$data['tipo']);

        foreach ($dup->result() as $row) {

                    $dup1 = $row->cant;
        }
            if ($dup1 > 0){
                return 2;
            }  

        $campos = array( 
      
            'fecha' => $fech,
            'idcodigofk' => $codigot,
            'tiposalida' => $data['tipo'],
            'iphost' => $data['iphost'],
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
		public function mregpersonal2($data,$dni){

  $a = $this->mdata->hora();

        $resulta = $this->db->query('SELECT ID_codigo from personal where cusuario = "'.$dni.'"');
        
        foreach ($resulta->result() as $row) {

                    $codigot = $row->ID_codigo;
        }
       $fec = $this->db->query('SELECT NOW() as fechas');
        
        foreach ($fec->result() as $row) {

                    $fech = $row->fechas;
        }


        $campos = array( 
      
            'fecha' => $fech,
            'idcodigofk' => $codigot,
            'tiposalida' => $a,
            'cod1' => 3,
            'cod2' => 1,
            'cod3' => 0,
        );


       $this->db->insert('registro', $campos);

    }
    public function getnombre($dni){
        $nombre = $this->db->query('SELECT nombre from personal where dni = "'.$dni.'"');
        foreach ($nombre->result() as $row) {

        $nombrep = $row->nombre;
        }
        if (isset($nombrep)) {
            return $nombrep;
        }
    }
	    public function getnombre2(){
		
		$nomus = $this->session->userdata('s_usuario');
        $nombre = $this->db->query('SELECT nombre from personal where cusuario = "'.$nomus.'"');
        foreach ($nombre->result() as $row) {

        $nombrep = $row->nombre;
        }
        if (isset($nombrep)) {
            return $nombrep;
        }
    }
	
	    public function getpermiso(){
		$user = $this->session->userdata('s_usuario');
        $permiso = $this->db->query('SELECT permiso from personal where cusuario = "'.$user.'"');
        foreach ($permiso->result() as $row) {

        $permiso = $row->permiso;
        }
        if (isset($permiso)) {
            return $permiso;
        }
		}
		
		public function hora(){
			date_default_timezone_set('America/Lima');
			$dat = new DateTime();
			//$dat->modify('-2 minutes');
			$fecha= $dat->format('Y-m-d H:i:s');
			$hora = $dat->format('Hi');
            $a = $hora;
            if($a <= 810){
                $hd = 0;
            }
            elseif($a > 810 && $a < 1759){
                $hd = 3;
            }
            elseif($a >=1800){
                $hd = 1;
            }


			return $hd;
		}   
		
		public function getusername(){

            $a = $this->mdata->hora();

			$user =$this->session->userdata('s_usuario');
			$resulta = $this->db->query('SELECT id_codigo from personal where cusuario = "'.$user.'"');
			foreach ($resulta->result() as $row) {
						$codigot = $row->id_codigo;
			}
			
			
			
			$fec = $this->db->query('SELECT NOW() as fechas');
			
			foreach ($fec->result() as $row) {

						$fech = $row->fechas;
			}

			if (isset($codigot)) {
			
			

			$campos = array( 
		  
				'fecha' => $fech,
				'idcodigofk' => $codigot,
				'tiposalida' => $a, //entrada remoto
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

		
   
    public function getexportar($data){
		        $campos = array( 
            'finicio' => $data ['finicio'],
            'ffin' => $data ['ffin'],
        );

		$this->db->select('idcodigofk,cod1,tiposalida,fecha,IP,cod2,cod3');
        $this->db->from('registro');
        $this->db->join('personal','personal.id_codigo=registro.idcodigofk');
        $this->db->where('fecha >= "'.$data['finicio'].'" AND fecha <= date_add("'.$data['ffin'].'",INTERVAL 1 day)');
		$this->db->order_by("registro.fecha");

        $result=$this->db->get();

        return $result;
        
    }
	
	public function getexportarsap($data){
       $campos = array( 
            'finicio' => $data ['finicio'],
            
        );

	/*
        $this->db->select('codsap, idcodigofk, MIN( DATE_FORMAT( fecha, "%Y-%m-%d" ) ) AS a, MIN( DATE_FORMAT( fecha, "%H%i00" ) ) AS H, "P10" as i', false);
        $this->db->from('registro');
        $this->db->join('personal','personal.id_codigo=registro.idcodigofk');
        $this->db->where("fecha LIKE '".$data ['finicio']."'");
		$this->db->group_by('idcodigofk');
        $this->db->order_by("idcodigofk");

        $result1 = $this->db->get()->result();

       $this->db->select('codsap, idcodigofk, MAX( DATE_FORMAT( fecha, "%Y-%m-%d" ) ) AS a, MAX( DATE_FORMAT( fecha, "%H%i00" ) ) AS H, "P20" as i', false);
        $this->db->from('registro');
        $this->db->join('personal','personal.id_codigo=registro.idcodigofk');
        $this->db->where("fecha LIKE '".$data ['finicio']."'");
		$this->db->group_by('idcodigofk');
        $this->db->order_by("idcodigofk");

        $result2 = $this->db->get()->result();

        $result = array_merge($result1, $result2);
   
        if(isset($result)){
          foreach ( $result as $key=>$value  ) {
           
            echo $value->codsap."\t";
            echo $value->idcodigofk."\t";
            echo $value->a."\t";
            echo $value->H."\t";
            echo $value->i."\t";
            echo "\r";

        }

    }
	*/
	

        $result = "  SELECT codsap, idcodigofk, MIN(DATE_FORMAT(fecha, '%Y-%m-%d')) as a,MIN(DATE_FORMAT( fecha ,  '%H%i00' )) AS H , 'P10' i FROM registro JOIN personal ON idcodigofk=id_codigo  where fecha LIKE '".$data ['finicio']."' AND COdsap IS NOT NULL  GROUP BY  idcodigofk
    UNION ALL 
    SELECT codsap, idcodigofk, MAX(DATE_FORMAT(fecha, '%Y-%m-%d')) AS a,MAX(DATE_FORMAT( fecha ,  '%H%i00' )) AS H , 'P20' i FROM registro JOIN personal ON idcodigofk=id_codigo where fecha LIKE '".$data ['finicio']."' AND COdsap IS NOT NULL  GROUP BY  idcodigofk
    ORDER BY idcodigofk, a, H";
    

        $query = $this->db->query($result);
         
          foreach ( $query->result() as $key  ) {
           
            echo $key->codsap."\t";           
            echo $key->idcodigofk."\t";           
            echo $key->a."\t";           
            echo $key->H."\t";           
            echo $key->i."\t";           
            echo "\r";

        }

    }
	

}
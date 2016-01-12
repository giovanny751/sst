<?php

class Empleadohoraextra_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function save($data){
        
        $this->db->insert("empleado_horas_extra",$data);
    }

}

?>
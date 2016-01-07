<?php

class Accidentes_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function insert($data){
        try{
            $id = false;
            $this->db->trans_begin();
            $this->db->insert("accidentes",$data);
            if($this->db->trans_status() === FALSE){
                $this->db->trans_rollback();
                throw new Exception("Error al insertar en la base de datos");
            }else{
                $id = $this->db->insert_id();
                $this->db->trans_commit();
            }
        }  catch (Exception $e){
            $id = false;
        } finally {
            return $id;
        }
    }
    
    function detail() {
        try {
            $this->db->order_by("tipEve_descripcion","asc");
            $tipo = $this->db->get("tipo_evento");
            return $tipo->result();
        } catch (exception $e) {
            
        }
    }

}

?>
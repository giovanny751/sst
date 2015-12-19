<?php

class Empresa_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function create($data) {
        try {
            $this->db->insert_batch("empresa", $data);
            $this->db->select('*');
            $datos = $this->db->get('empresa');
            $datos = $datos->result();
            return $datos;
        } catch (exception $e) {
            
        }
    }

    function detail() {
        try {
            $empresa = $this->db->get("empresa");
            return $empresa->result();
        } catch (exception $e) {
            
        }
    }

    function update($data) {
        try {
            $this->db->update("empresa", $data);
            $this->db->select('*');
            $datos = $this->db->get('empresa');
            $datos = $datos->result();
            return $datos;
        } catch (exception $e) {
            
        }
    }

}

?>
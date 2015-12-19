<?php

class Dimension_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function create($data) {
        try {
            $this->db->insert_batch("dimension", $data);
        } catch (exception $e) {
            
        }
    }

    function update($data) {
        try {
            $this->db->update("dimension", $data);
        } catch (exception $e) {
            
        }
    }

    function detail() {
        try {
            $this->db->where("est_id", 1);
            $cargo = $this->db->get("dimension");
            return $cargo->result();
        } catch (exception $e) {
            
        }
    }

    function consultxname($name) {
        try {
            $this->db->where("dim_descripcion", $name);
            $this->db->where("est_id", 1);
            $cargo = $this->db->get("dimension");
            return $cargo->result();
        } catch (exception $e) {
            
        }
    }

    function delete($id) {
        try {
            $this->db->where("dim_id", $id);
            $this->db->set("est_id", 3);
            $this->db->update("dimension");
        } catch (exception $e) {
            
        }
    }

    function consultadimensionxid($dimid) {
        try {
            $this->db->where("dim_id", $dimid);
            $this->db->where("est_id", 1);
            $dim = $this->db->get("dimension");
            return $dim->result();
        } catch (exception $e) {
            
        }
    }

    function guardarmodificaciondimension($descripcion, $id) {
        try {
            $this->db->where("dim_id", $id);
            $this->db->set("dim_descripcion", $descripcion);
            $this->db->update("dimension");
        } catch (exception $e) {
            
        }
    }

    function dimensionunoriesgo($dimriesgo) {
        try {
            $this->db->where("dimension.dim_id", $dimriesgo);
            $this->db->select("riesgo.rie_descripcion");
            $this->db->distinct("riesgo.rie_descripcion");
            $this->db->join("riesgo", "riesgo.dim1_id = dimension.dim_id");
            $cargo = $this->db->get("dimension");
            return $cargo->result();
        } catch (exception $e) {
            
        }
    }

}

?>
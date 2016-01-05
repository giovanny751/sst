<?php

class Riesgoclasificacion_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function detail() {
        try {
            $this->db->order_by("rieCla_categoria","asc");
            $datos = $this->db->get("riesgo_clasificacion");
            return $datos->result();
        } catch (exception $e) {
            
        }
    }

    function detailandtipo() {
        try {
            $this->db->select("riesgo_clasificacion_tipo.rieClaTip_id");
            $this->db->select("riesgo_clasificacion.rieCla_id");
            $this->db->select("riesgo_clasificacion.rieCla_categoria");
            $this->db->select("riesgo_clasificacion_tipo.rieClaTip_tipo");
            $this->db->join("riesgo_clasificacion_tipo", "riesgo_clasificacion_tipo.rieCla_id = riesgo_clasificacion.rieCla_id", "LEFT");
            $datos = $this->db->get("riesgo_clasificacion");
//            echo $this->db->last_query();die;
            return $datos->result();
        } catch (exception $e) {
            
        }
    }

    function detailxcategoria($categoria) {
        try {
            $this->db->where("rieCla_categoria", $categoria);
            $datos = $this->db->get("riesgo_clasificacion");
            return $datos->result();
        } catch (exception $e) {
            
        }
    }

    function create($categoria, $rieCla_id = null) {
        try {
            if ($rieCla_id == null) {
                $this->db->set("rieCla_categoria", $categoria);
                $this->db->insert("riesgo_clasificacion");
            } else {
                $this->db->set("rieCla_categoria", $categoria);
                $this->db->where("rieCla_id", $rieCla_id);
                $this->db->update("riesgo_clasificacion");
            }
        } catch (exception $e) {
            
        }
    }

    function eliminar($id) {
        try {
            $this->db->where("rieClaTip_id", $id);
            $this->db->delete("riesgo_clasificacion_tipo");
        } catch (exception $e) {
            
        }
    }

    function eliminarCategoria($rieCat_id) {
        try {
            $this->db->where("rieCla_id", $rieCat_id);
            $this->db->delete("riesgo_clasificacion");
//            echo $this->db->last_query();die;
        } catch (exception $e) {
            
        }
    }

}

?>

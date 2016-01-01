<?php

class Evaluacion__model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function save_evaluacion($post) {
        if (isset($post['campo'])) {
            $this->db->where($post["campo"], $post[$post["campo"]]);
            $id = $post[$post["campo"]];
            unset($post['campo']);
            $this->db->update('evaluacion', $post);
        } else {
            $this->db->insert('evaluacion', $post);
            $id = $this->db->insert_id();
        }
        return $id;
    }

    function delete_evaluacion($post) {
        $this->db->set('ACTIVO', 'N');
        $this->db->where($post["campo"], $post[$post["campo"]]);
        $this->db->update('evaluacion');
    }

    function edit_evaluacion($post) {
        $this->db->where($post["campo"], $post[$post["campo"]]);
        $datos = $this->db->get('evaluacion', $post);
        return $datos = $datos->result();
    }

    function consult_evaluacion($post) {
        if (isset($post['eva_id']))
            if ($post['eva_id'] != "")
                $this->db->like('eva_id', $post['eva_id']);
        if (isset($post['eva_nombre']))
            if ($post['eva_nombre'] != "")
                $this->db->like('eva_nombre', $post['eva_nombre']);
        $this->db->select('eva_id');
        $this->db->select('eva_nombre');
        $this->db->where('ACTIVO', 'S');
        $datos = $this->db->get('evaluacion');
        $datos = $datos->result();
        return $datos;
    }

    function ver_evaluaciones($post) {
//        if (isset($post['eva_id']))
//            if ($post['eva_id'] != "")
//                $this->db->like('eva_id', $post['eva_id']);
//        if (isset($post['eva_nombre']))
//            if ($post['eva_nombre'] != "")
//                $this->db->like('eva_nombre', $post['eva_nombre']);
        $this->db->select('evaluacion.eva_id, eva_nombre,user_evaluacion.use_id',false);
        $this->db->join('user_evaluacion',"user_evaluacion.eva_id=evaluacion.eva_id and user_evaluacion.useEva_activo='S' and user_evaluacion.use_id=".$post['usuarioid'],'left',false);
        $this->db->where('ACTIVO', 'S');
        $datos = $this->db->get('evaluacion');
//        echo $this->db->last_query();
        $datos = $datos->result();
        return $datos;
    }

    function arignar_evaluacion($post) {
        $this->db->set('useEva_activo', 'N');
        $this->db->update('user_evaluacion');

        $info = explode('||', $post['info']);
        for ($i = 0; $i < count($info); $i++) {
            if (!empty($info[$i])) {
                $this->db->select('useEva_id');
                $this->db->where('use_id', $post['usuarioid']);
                $this->db->where('eva_id', $info[$i]);
                $datos = $this->db->get('user_evaluacion');
                $datos = $datos->result();

                $this->db->set('eva_id', $info[$i]);
                $this->db->set('use_id', $post['usuarioid']);
                if (count($datos)) {
                    $this->db->set('useEva_activo', 'S');
                    $this->db->where('useEva_id', $datos[0]->useEva_id);
                    $this->db->update('user_evaluacion');
                } else {
                    $this->db->insert('user_evaluacion');
                }
//                echo $this->db->last_query();
            }
        }
    }

}

?>

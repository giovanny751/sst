<?php 
class Evaluacion__model extends CI_Model {

    function __construct() {
        parent::__construct();
    }
    function save_evaluacion($post){
        if(isset($post['campo'])){ 
        $this->db->where($post["campo"],$post[$post["campo"]]);
        $id=$post[$post["campo"]];
            unset($post['campo']);
            $this->db->update('evaluacion',$post);
        }else{
            $this->db->insert('evaluacion',$post);
            $id=$this->db->insert_id();
        }
        return $id;
        
    }
    function delete_evaluacion($post){
        $this->db->set('ACTIVO','N');
        $this->db->where($post["campo"],$post[$post["campo"]]);
        $this->db->update('evaluacion');
    }
    function edit_evaluacion($post){
        $this->db->where($post["campo"],$post[$post["campo"]]);
        $datos=$this->db->get('evaluacion',$post);
        return $datos=$datos->result();
    }
    function consult_evaluacion($post){
            if(isset($post['eva_id']))
        if($post['eva_id']!="")
        $this->db->like('eva_id',$post['eva_id']);
                    if(isset($post['eva_nombre']))
        if($post['eva_nombre']!="")
        $this->db->like('eva_nombre',$post['eva_nombre']);
                                    $this->db->select('eva_id');
                                $this->db->select('eva_nombre');
                        $this->db->where('ACTIVO','S');
        $datos=$this->db->get('evaluacion');
        $datos=$datos->result();
        return $datos;
    }
}
?>

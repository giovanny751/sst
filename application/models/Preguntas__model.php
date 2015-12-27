<?php 
class Preguntas__model extends CI_Model {

    function __construct() {
        parent::__construct();
    }
    function save_preguntas($post){
        if(isset($post['campo'])){ 
        $this->db->where($post["campo"],$post[$post["campo"]]);
        $id=$post[$post["campo"]];
            unset($post['campo']);
            $this->db->update('preguntas',$post);
        }else{
            $this->db->insert('preguntas',$post);
            $id=$this->db->insert_id();
        }
        return $id;
        
    }
    function delete_preguntas($post){
        $this->db->set('ACTIVO','N');
        $this->db->where($post["campo"],$post[$post["campo"]]);
        $this->db->update('preguntas');
    }
    function edit_preguntas($post){
        $this->db->where($post["campo"],$post[$post["campo"]]);
        $datos=$this->db->get('preguntas',$post);
        return $datos=$datos->result();
    }
    function consult_preguntas($post){
            if(isset($post['pre_id']))
        if($post['pre_id']!="")
        $this->db->like('pre_id',$post['pre_id']);
                    if(isset($post['eva_id']))
        if($post['eva_id']!="")
        $this->db->like('eva_id',$post['eva_id']);
                    if(isset($post['tem_id']))
        if($post['tem_id']!="")
        $this->db->like('tem_id',$post['tem_id']);
                    if(isset($post['are_id']))
        if($post['are_id']!="")
        $this->db->like('are_id',$post['are_id']);
                    if(isset($post['tipPre_id']))
        if($post['tipPre_id']!="")
        $this->db->like('tipPre_id',$post['tipPre_id']);
                    if(isset($post['pre_nombre']))
        if($post['pre_nombre']!="")
        $this->db->like('pre_nombre',$post['pre_nombre']);
                    if(isset($post['res_id']))
        if($post['res_id']!="")
        $this->db->like('res_id',$post['res_id']);
                                    $this->db->select('pre_id');
                                $this->db->select('eva_id');
                                $this->db->select('tem_id');
                                $this->db->select('are_id');
                                $this->db->select('tipPre_id');
                                $this->db->select('pre_nombre');
                                $this->db->select('res_id');
                        $this->db->where('ACTIVO','S');
        $datos=$this->db->get('preguntas');
        $datos=$datos->result();
        return $datos;
    }
}
?>

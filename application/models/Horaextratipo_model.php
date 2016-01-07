<?php

class Horaextratipo_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

   function tipos(){
       try{
           $tipo = $this->db->get("hora_extra_tipo");
       }catch(exception $e){
           
       }finally{
           return $tipo->result();
       }
   }

}

?>
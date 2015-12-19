<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
/**
 *
 * @package     NYGSOFT
 * @author      Gerson J Barbosa / Nelson G Barbosa
 * @Pagina      www.nygsoft.com
 * @celular     301 385 9952
 * @email       javierbr12@hotmail.com    
 */
class Informes extends My_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('Ingreso_model');
        $this->load->model('Roles_model');
        $this->data["usu_id"] = $this->session->userdata('usu_id');
        validate_login($this->data["usu_id"]);
    }

    function informeactividades(){
        
        
        $this->layout->view("informes/informeactividades");
    }
    function phva(){
        $this->load->model('Tipo_model');
        $this->data['tipo'] = $this->Tipo_model->avanceciclophva();
        $this->layout->view("informes/informephva",$this->data);
    }

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
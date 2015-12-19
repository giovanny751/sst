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
class Tipo_contrato extends My_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('Tipo_contrato__model');
        $this->data["usu_id"] = $this->session->userdata('usu_id');
        validate_login($this->data["usu_id"]);
    }

    function index() {
        if ($this->consultaacceso($this->data["usu_id"])):
            $this->data['post'] = $this->input->post();
            $this->layout->view('tipo_contrato/index', $this->data);
        else:
            $this->layout->view("permisos");
        endif;
    }

    function consult_tipo_contrato() {
        $post = $this->input->post();
        $this->data['post'] = $this->input->post();
        $this->data['datos'] = $this->Tipo_contrato__model->consult_tipo_contrato($post);
        $this->layout->view('tipo_contrato/consult_tipo_contrato', $this->data);
    }

    function save_tipo_contrato() {
        $post = $this->input->post();
        $id = $this->Tipo_contrato__model->save_tipo_contrato($post);
        redirect('index.php/Tipo_contrato/consult_tipo_contrato', 'location');
    }

    function exist() {
        if (!empty($this->Tipo_contrato__model->exist($this->input->post("tipo")))) {
            echo 1;
        }
    }

    function delete_tipo_contrato() {
        $post = $this->input->post();
        $this->Tipo_contrato__model->delete_tipo_contrato($post);
        redirect('index.php/Tipo_contrato/consult_tipo_contrato', 'location');
    }

    function edit_tipo_contrato() {
        $this->data['post'] = $this->input->post();
        if (!isset($this->data['post']['campo']))
            redirect('index.php/Tipo_contrato/consult_tipo_contrato', 'location');
        $this->data['datos'] = $this->Tipo_contrato__model->edit_tipo_contrato($this->data['post']);
        $this->layout->view('tipo_contrato/index', $this->data);
    }

    function autocomplete_TipCon_Descripcion() {
        $this->db->where('activo','S');
        $info = auto("tipo_contrato", "TipCon_Id", "TipCon_Descripcion", $this->input->get('term'));
        $this->output->set_content_type('application/json')->set_output(json_encode($info));
    }

}

?>

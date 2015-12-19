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
class Tipo_aseguradora extends My_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('Tipo_aseguradora__model');
        $this->load->library('tcpdf/tcpdf.php');
        validate_login($this->session->userdata('usu_id'));
    }
    function index(){
        $this->data['post']=$this->input->post();
        $this->layout->view('tipo_aseguradora/index', $this->data);
    }
    function consult_tipo_aseguradora(){
        $post=$this->input->post();
        $this->data['post']=$this->input->post();
        $this->data['datos']=$this->Tipo_aseguradora__model->consult_tipo_aseguradora($post);
        $this->layout->view('tipo_aseguradora/consult_tipo_aseguradora', $this->data);
    }
    
    function validatipoaseguradora(){
        
        $data = $this->Tipo_aseguradora__model->validatipoaseguradora($this->input->post("TipAse_Nombre"));
        if(!empty($data)){
            echo 1;
        }
    }
    
    function save_tipo_aseguradora(){
        
        $post=$this->input->post();
        $id=$this->Tipo_aseguradora__model->save_tipo_aseguradora($post);            
        redirect('index.php/Tipo_aseguradora/consult_tipo_aseguradora', 'location');
    }
    function delete_tipo_aseguradora(){
        $post=$this->input->post();
        $this->Tipo_aseguradora__model->delete_tipo_aseguradora($post);
        redirect('index.php/Tipo_aseguradora/consult_tipo_aseguradora', 'location');
    }
    function edit_tipo_aseguradora(){
        $this->data['post']=$this->input->post();
        if(!isset($this->data['post']['campo']))
        redirect('index.php/Tipo_aseguradora/consult_tipo_aseguradora', 'location');
        $this->data['datos']=$this->Tipo_aseguradora__model->edit_tipo_aseguradora($this->data['post']);
        $this->layout->view('tipo_aseguradora/index', $this->data);
    }
                    function autocomplete_TipAse_Nombre(){
                  $info = auto("tipo_aseguradora","TipAse_Id","TipAse_Nombre",$this->input->get('term'));
                  $this->output->set_content_type('application/json')->set_output(json_encode($info));
                }
            }
?>

<?php 

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 *
 * @package     NYGSOFT
 * @author      Gerson J Barbosa / Nelson G Barbosa
 * @copyright   www.nygsoft.com
 * @celular     301 385 9952
 * @email       javierbr12@hotmail.com    
 */

class Actividad_padre extends My_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('Actividad_padre__model');
        validate_login($this->session->userdata('usu_id'));
        
    }
    function index(){
        $this->data['post']=$this->input->post();
        $this->layout->view('actividad_padre/index', $this->data);
    }
    function consult_actividad_padre(){
        $post=$this->input->post();
        $this->data['post']=$this->input->post();
        $this->data['datos']=$this->Actividad_padre__model->consult_actividad_padre($post);
        $this->layout->view('actividad_padre/consult_actividad_padre', $this->data);
    }
    function save_actividad_padre(){
        $post=$this->input->post();
                $id=$this->Actividad_padre__model->save_actividad_padre($post);
        
                        
        redirect('index.php/Actividad_padre/consult_actividad_padre', 'location');
    }
    function delete_actividad_padre(){
        $post=$this->input->post();
        $this->Actividad_padre__model->delete_actividad_padre($post);
        redirect('index.php/Actividad_padre/consult_actividad_padre', 'location');
    }
    function edit_actividad_padre(){
        $this->data['post']=$this->input->post();
        if(!isset($this->data['post']['campo']))
        redirect('index.php/Actividad_padre/consult_actividad_padre', 'location');
        $this->data['datos']=$this->Actividad_padre__model->edit_actividad_padre($this->data['post']);
        $this->layout->view('actividad_padre/index', $this->data);
    }
                    function autocomplete_actPad_nombre(){
                  $info = auto("actividad_padre","actPad_id","actPad_nombre",$this->input->get('term'));
                  $this->output->set_content_type('application/json')->set_output(json_encode($info));
                }
            }
?>

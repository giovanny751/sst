<?php 

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Preguntas extends My_Controller {

    function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->model('Preguntas__model');
        $this->load->helper('security');
        $this->load->helper('miscellaneous');
        $this->load->library('tcpdf/tcpdf.php');
        validate_login($this->session->userdata('usu_id'));
    }
    function index(){
        $this->data['post']=$this->input->post();
        $this->layout->view('preguntas/index', $this->data);
    }
    function consult_preguntas(){
        $post=$this->input->post();
        $this->data['post']=$this->input->post();
        $this->data['datos']=$this->Preguntas__model->consult_preguntas($post);
        $this->layout->view('preguntas/consult_preguntas', $this->data);
    }
    function save_preguntas(){
        $post=$this->input->post();
                $id=$this->Preguntas__model->save_preguntas($post);
        
                        
        redirect('index.php/Preguntas/consult_preguntas', 'location');
    }
    function delete_preguntas(){
        $post=$this->input->post();
        $this->Preguntas__model->delete_preguntas($post);
        redirect('index.php/Preguntas/consult_preguntas', 'location');
    }
    function edit_preguntas(){
        $this->data['post']=$this->input->post();
        if(!isset($this->data['post']['campo']))
        redirect('index.php/Preguntas/consult_preguntas', 'location');
        $this->data['datos']=$this->Preguntas__model->edit_preguntas($this->data['post']);
        $this->layout->view('preguntas/index', $this->data);
    }
    }
?>

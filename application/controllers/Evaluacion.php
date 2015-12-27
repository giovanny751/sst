<?php 

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Evaluacion extends My_Controller {

    function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->model('Evaluacion__model');
        $this->load->helper('security');
        $this->load->helper('miscellaneous');
        $this->load->library('tcpdf/tcpdf.php');
        validate_login($this->session->userdata('usu_id'));
    }
    function index(){
        $this->data['post']=$this->input->post();
        $this->layout->view('evaluacion/index', $this->data);
    }
    function consult_evaluacion(){
        $post=$this->input->post();
        $this->data['post']=$this->input->post();
        $this->data['datos']=$this->Evaluacion__model->consult_evaluacion($post);
        $this->layout->view('evaluacion/consult_evaluacion', $this->data);
    }
    function save_evaluacion(){
        $post=$this->input->post();
                $id=$this->Evaluacion__model->save_evaluacion($post);
        
                        
        redirect('index.php/Evaluacion/consult_evaluacion', 'location');
    }
    function delete_evaluacion(){
        $post=$this->input->post();
        $this->Evaluacion__model->delete_evaluacion($post);
        redirect('index.php/Evaluacion/consult_evaluacion', 'location');
    }
    function edit_evaluacion(){
        $this->data['post']=$this->input->post();
        if(!isset($this->data['post']['campo']))
        redirect('index.php/Evaluacion/consult_evaluacion', 'location');
        $this->data['datos']=$this->Evaluacion__model->edit_evaluacion($this->data['post']);
        $this->layout->view('evaluacion/index', $this->data);
    }
    }
?>

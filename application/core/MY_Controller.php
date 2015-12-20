<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 *
 * @package     NYGSOFT
 * @author      Gerson J Barbosa
 * @copyright   www.nygsoft.com
 * @celular     301 385 9952
 * @email       javierbr12@hotmail.com    
 */
class MY_Controller extends CI_Controller {

//  public $template_file = 'templates/main2';
    private $data = array();

    public function __construct() {
        // creación dinámica del menú
        parent::__construct();
        header('Pragma: no-cache');
        $this->load->database();
        $this->load->helper('miscellaneous');
        $this->load->helper('security');
        $this->load->library('tcpdf/tcpdf.php');
        $this->load->library('layout', 'layout_main');
        $this->data['user'] = $this->session->userdata();
        $this->load->model('Ingreso_model');
        
    }

    public function consultaacceso() {
        $ci = & get_instance();
        $controller = $ci->router->fetch_class();
        $method = $ci->router->fetch_method();
        $data['option'] = "uuu";
        if (
                ((strtoupper($controller) != strtoupper('login')) &&
                (
                strtoupper($method) != strtoupper('index') ||
                strtoupper($method) != strtoupper('verify')
                )
                )) {
            $view = $this->Ingreso_model->consultapermisosmenu($this->data['user']['usu_id'], $controller, $method);
            $permisosPeticion = $this->Ingreso_model->consultaPermisosAccion($this->data['user']['usu_id'], $controller, $method);
            if(!empty($view) ){
                if(!empty($view[0]['clase']) &&  !empty($view[0]['metodo']) && empty($view[0]['usu_id'])){
                    return 1;
                }
            }else if(!empty($permisosPeticion)){
                if(!empty($permisosPeticion[0]['clase']) &&  !empty($permisosPeticion[0]['metodo']) && empty($permisosPeticion[0]['usu_id'])){
                    return 2;
                }
            }
            else if(empty($permisosPeticion) || empty($view)){
                return 3;
            }
        }
    }

}

/* End of file MY_Controller.php */
/* Location: /application/libraries/MY_Controller.php */
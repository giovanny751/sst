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
    protected $data = array();

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
        $ci = & get_instance();
        $controller = $ci->router->fetch_class();
        $method = $ci->router->fetch_method();
//        if (
//                ((strtoupper($controller) != strtoupper('login')) &&
//                (
//                strtoupper($method) != strtoupper('index') ||
//                strtoupper($method) != strtoupper('verify')
//                )
//                )) {
////            Consulta permisos de Vista
//            $view = $this->Ingreso_model->consultapermisosmenu($this->data['user']['usu_id'], $controller, $method);
////           Consulta Permisos de Peticion 
//            $permisosPeticion = $this->Ingreso_model->consultaPermisosAccion($this->data['user']['usu_id'], $controller, $method);
//            if (empty($permisosPeticion) && !empty($view) || !empty($permisosPeticion) && empty($view) ) {
//                
//            }else if(empty($permisosPeticion) && empty($view)){
//                echo "No tiene permisos";
//            }
//            if (1 == 1) {
//                $data['message'] = array(
//                    "No tiene permisos por favor comunicarse con el administrador"
//                );
//                $this->output->set_content_type('application/json')->set_output(json_encode($data));
//            }
//        }
    }

    public function consultaacceso($usu_id, $controller, $method) {
        $this->load->model('Ingreso_model');
        $consulta = $this->Ingreso_model->consultapermisosmenu($usu_id, $controller, $method);
        if (!empty($consulta)) {
            if (strtoupper($controller) == strtoupper($consulta[0]['clase']) && strtoupper($method) == strtoupper($consulta[0]['metodo'])) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

}

/* End of file MY_Controller.php */
/* Location: /application/libraries/MY_Controller.php */
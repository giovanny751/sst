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
//        $this->verificacion();
    }
    function verificacion(){
        $ci = & get_instance();
        $controller = $ci->router->fetch_class();
        $method = $ci->router->fetch_method();
         if (
                ((strtoupper($controller) != strtoupper('login')) &&
                (
                strtoupper($method) != strtoupper('index') || strtoupper($method) != strtoupper('verify')
                )
                )) {
            $view = $this->Ingreso_model->consultapermisosmenu($this->data['user']['usu_id'], $controller, $method);
            $permisosPeticion = $this->Ingreso_model->consultaPermisosAccion($this->data['user']['usu_id'], $controller, $method);
//            var_dump($permisosPeticion);die;
            if (!empty($view)) {
                if (!empty($view[0]['clase']) && !empty($view[0]['metodo']) && empty($view[0]['usu_id'])) {
                    echo "No tiene permisos por favor comunicarse con el administrador";
                }
            } else if (!empty($permisosPeticion)) {
                if (!empty($permisosPeticion[0]['clase']) && !empty($permisosPeticion[0]['metodo']) && empty($permisosPeticion[0]['usu_id'])) {
                    $this->data['respuesta'] = array("message" => "No tiene permisos de ejecutar la acción");
                    $this->output->set_content_type('application/json')->set_output(json_encode($this->data['respuesta'],JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES))->_display();
                    exit;
                }else if($permisosPeticion[0]['accion'] == 4 && empty($permisosPeticion[0]['perRol_crear'])){
                    $this->data['respuesta'] = array("message" => "No tiene permisos de crear");
                    $this->output->set_content_type('application/json')->set_output(json_encode($this->data['respuesta'],JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES))->_display();
                    exit;
                }else if($permisosPeticion[0]['accion'] == 1 && empty($permisosPeticion[0]['perRol_eliminar'])){
                    $this->data['respuesta'] = array("message" => "No tiene permisos de eliminar");
                    $this->output->set_content_type('application/json')->set_output(json_encode($this->data['respuesta'],JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES))->_display();
                    exit;
                }else if($permisosPeticion[0]['accion'] == 2 && empty($permisosPeticion[0]['perRol_modificar'])){
                    $this->data['respuesta'] = array("message" => "No tiene permisos de modificar");
                    $this->output->set_content_type('application/json')->set_output(json_encode($this->data['respuesta'],JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES))->_display();
                    exit;
                }
            } else if (empty($permisosPeticion) || empty($view)) {
                $this->data['respuesta'] = array("message" => "No tiene permisos por favor comunicarse con el administrador");
                $this->output->set_content_type('application/json')->set_output(json_encode($this->data['respuesta'],JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES))->_display();
                exit;
            }
        }
    }

}

/* End of file MY_Controller.php */
/* Location: /application/libraries/MY_Controller.php */
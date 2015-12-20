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
class Login extends My_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('user_model');
        $this->load->model('Ingreso_model');
        if (
                ((strtoupper($controller) != strtoupper('login')) &&
                (
                strtoupper($method) != strtoupper('index') ||
                strtoupper($method) != strtoupper('verify')
                )
                )) {
            $view = $this->Ingreso_model->consultapermisosmenu($this->data['user']['usu_id'], $controller, $method);
            $permisosPeticion = $this->Ingreso_model->consultaPermisosAccion($this->data['user']['usu_id'], $controller, $method);
            if (!empty($view)) {
                if (!empty($view[0]['clase']) && !empty($view[0]['metodo']) && empty($view[0]['usu_id'])) {
                    echo "No tiene permisos para ingresar a visualizar la vista";
                    die;
                }
            } else if (!empty($permisosPeticion)) {
                if (!empty($permisosPeticion[0]['clase']) && !empty($permisosPeticion[0]['metodo']) && empty($permisosPeticion[0]['usu_id'])) {
                    $data["message"] = array("No tiene permisos para ejecutar a la acción");
                    $this->output->set_content_type('application/json')->set_output(json_encode($data));
                    die;
                }
            } else if (empty($permisosPeticion) || empty($view)) {
                $data = array('message' => "No tiene permisos por favor verificar con el administrador");
                $this->output->set_content_type('application/json')->set_output(json_encode($data));
                die;
            }
        }
    }

    public function index() {
        $datos = $this->session->userdata('usu_id');
        if (!empty($datos)) {
            redirect('index.php/presentacion/principal', 'location');
        } else {
            $this->load->view('login/index');
        }
    }

    public function make_hash($var = 1) {
        echo make_hash($var);
    }

    public function politica() {
        $this->user_model->listo_politica($this->input->post('username'), $this->input->post('password'));
        $this->verify();
    }

    function verify() {

//        echo $this->input->post('username')."***".$this->input->post('password');die;

        $user = $this->user_model->get_user($this->input->post('username'), $this->input->post('password'));
        if (!empty($user) > 0) {
            $this->data['username'] = $user[0]["usu_email"];
            $this->data['password'] = $user[0]["usu_contrasena"];
            if ($user[0]['usu_politicas'] == 0) {
                $this->data['inicio'] = $this->user_model->admin_inicio();
                $this->load->view('login/politicas', $this->data);
            } else {
                $this->acceso($user);
                $data[] = array(
                    'usu_id' => $user[0]['usu_id'],
                    'ing_fechaIngreso' => date('Y-m-d H:i:s')
                );
                $this->Ingreso_model->insertingreso($data);
                if ($user[0]['usu_cambiocontrasena'] == 1) {
                    redirect('index.php/presentacion/recordarcontrasena', 'location');
                    die;
                }
                if (!empty($user[0]['rol_id'])) {
                    redirect('index.php/presentacion/principal', 'location');
                } else {
                    redirect('index.php/presentacion/rol', 'location');
                }
            }
        } else {
            $this->session->set_flashdata(array('message' => 'Su n&uacute;mero de documento no se encuentra registrado en el sistema.', 'message_type' => 'warning'));
            redirect('', 'refresh');
        }
    }

    public function logout() {
        $this->session->set_userdata('logged_in', FALSE);
        $this->session->sess_destroy();
        redirect('index.php/login', 'location');
    }

    function acceso($user = null, $id = NULL) {
        $i = 0;
        if (!empty($id)) {
            $user = $this->user_model->validacionusuario(deencrypt_id($id));
            $i = 1;
        }
        $this->session->set_userdata($user[0]);
        if ($i == 1) {
            $ruta = 'index.php/presentacion/principal';
            redirect($ruta, 'location');
        }
    }

    function reset() {
        $mail = $this->input->post('email');
        $password = $this->user_model->reset($mail);
        $actualizar = $this->user_model->actualizar($mail);
        $data = mail($mail, "Actualizacion de Contraseña", 'clave: ' . $password);

        redirect('index.php', 'location');
    }

}

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
class Administrativo extends My_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('Ingreso_model');
        $this->load->model('Roles_model');
        $this->data["usu_id"] = $this->session->userdata('usu_id');
        validate_login($this->data["usu_id"]);
        $this->load->library('PHPExcel/Classes/PHPExcel.php');
        switch ($this->verificacion()) {
            case 1:
                $this->layout->view("permisos");
                break;
            case 2:
                $this->data['respuesta'] = array("message" => "No tiene permisos de ejecutar la acción");
                $this->output->set_content_type('application/json')->set_output(json_encode($this->data['respuesta']));
                break;
            case 3:
                $this->data['respuesta'] = array("message" => "No tiene permisos por favor comunicarse con el administrador");
                $this->output->set_content_type('application/json')->set_output(json_encode($this->data['respuesta']));
                break;
            default:
                break;
        }
    }

    function creacionempleados() {

        $this->data['empleado'] = "";

        $this->load->model('Tipocontrato_model');
        $this->load->model('Sexo_model');
        $this->load->model('Estadocivil_model');
        $this->load->model('Tipoaseguradora_model');
        $this->load->model('Dimension2_model');
        $this->load->model('Dimension_model');
        $this->load->model('Cargo_model');
        $this->load->model('Tipo_aseguradora__model');
        $this->load->model('Empleadotipoaseguradora_model');
        $this->load->model('Empresa_model');
        $this->load->model('Empleadoregistro_model');
        $this->load->model('Empleadoresponsable_model');

        $empleadoId = null;
        if (!empty($this->input->post('emp_id')))
            $empleadoId = $this->input->post('emp_id');
        else if (!empty($this->session->guardadoExitoIdEmpleado))
            $empleadoId = $this->session->guardadoExitoIdEmpleado;

        if (isset($empleadoId)) {
            $this->load->model('Empleadocarpeta_model');
            $this->load->model('Empleado_model');
            $this->data['empleado'] = $this->Empleado_model->consultaempleadoxid($empleadoId);
            $this->data["aserguradorasxempleado"] = $this->Empleadotipoaseguradora_model->consult_empleado($empleadoId);
//                var_dump($this->data["aserguradorasxempleado"]);die;
            $this->data["carpeta"] = $this->Empleadocarpeta_model->detail($empleadoId);
            $registro = $this->Empleadoregistro_model->detailxIdEmpleado($empleadoId);

            $i = array();
            foreach ($registro as $campo) {
                $i[$campo->empCar_id][$campo->empCar_nombre . " - " . $campo->empCar_descripcion][] = array($campo->nombreempleado, $campo->empReg_archivo, $campo->empReg_descripcion, $campo->empReg_version, $campo->empReg_id, $campo->empReg_tamano, $campo->empgReg_fecha);
            }
            $this->data['registro'] = $i;
            $this->session->guardadoExitoIdEmpleado = null;

            $this->data['empleadoresponsable'] = $this->Empleadoresponsable_model->detail();
        }
        $this->data['empresa'] = $this->Empresa_model->detail();
        if ((!empty($this->data['empresa'][0]->Dim_id)) && (!empty($this->data['empresa'][0]->Dimdos_id))) {
            $this->data['cargo'] = $this->Cargo_model->detail();
            $this->data['tipocontrato'] = $this->Tipocontrato_model->detail();
            $this->data['sexo'] = $this->Sexo_model->detail();
            $this->data['estadocivil'] = $this->Estadocivil_model->detail();
            $this->data['aseguradoras'] = $this->Tipo_aseguradora__model->aseguradoras();
            $this->data['tipoaseguradora'] = $this->Tipoaseguradora_model->detail();
            $this->data['dimension'] = $this->Dimension_model->detail();
            $this->data['dimension2'] = $this->Dimension2_model->detail();
            $this->layout->view("administrativo/creacionempleados", $this->data);
        } else {
            redirect('index.php/administrativo/empresa', 'location');
        }
    }

    function cargarempleadocarpeta() {
        $this->load->model('Empleadocarpeta_model');
        $carpeta = $this->Empleadocarpeta_model->cargarcarpeta($this->input->post("carpeta"));
        $this->output->set_content_type('application/json')->set_output(json_encode($carpeta[0]));
    }

    function eliminarregistro() {
        try {
            $this->load->model('Empleadoregistro_model');
            $this->Empleadoregistro_model->eliminarregistroempleado($this->input->post("empReg_id"));
        } catch (exception $e) {
            
        }
    }

    function modificarcarpeta() {

        $this->load->model('Empleadocarpeta_model');
        $carpeta = $this->Empleadocarpeta_model->actualizacarpeta(
                $this->input->post("nombrecarpeta"), $this->input->post("descripcioncarpeta"), $this->input->post("empCar_id")
        );
        $carpeta = $this->Empleadocarpeta_model->cargarcarpeta($this->input->post("empCar_id"));
        $this->output->set_content_type('application/json')->set_output(json_encode($carpeta[0]));
    }

    function eliminarcarpeta() {

        $this->load->model('Empleadocarpeta_model');
        $carpeta = $this->Empleadocarpeta_model->eliminarcarpeta(
                $this->input->post("empCar_id")
        );
    }

    function cargartablaincapacidad() {
        try {
            $this->load->model('Empleadoincapacidad_model');
            $this->data["tablaincapacidad"] = $this->Empleadoincapacidad_model->detailxid($this->input->post("empleado"));
            $this->output->set_content_type('application/json')->set_output(json_encode($this->data["tablaincapacidad"]));
        } catch (exception $e) {
            
        }
    }

    function guardarincapacidad() {
        try {
            $this->load->model('Empleadoincapacidad_model');

            $data = array(
                'empRes_id' => $this->input->post('responsable'),
                'empInc_fechaInicio' => $this->input->post('fechaInicioInc'),
                'empInc_fechaFinal' => $this->input->post('fechaFinalInc'),
                'empInc_motivo' => $this->input->post('motivoInc'),
                'empInc_observacion' => $this->input->post('observacionInc'),
                'usu_id' => $this->session->userdata('usu_id'),
                'emp_id' => $this->input->post('empleadoInc'),
                'empInc_fechaIngreso' => date("Y-m-d H:i:s")
            );
            $this->Empleadoincapacidad_model->create($data);
        } catch (exception $e) {
            
        }
    }

    function searchxid() {
        try {
            $this->load->model('Empleadoregistro_model');
            $data = $this->Empleadoregistro_model->searchxid($this->input->post("empReg_id"));
            $this->output->set_content_type('application/json')->set_output(json_encode($data[0]));
        } catch (exception $e) {
            
        }
    }

    function guardarcarpeta() {
        try {
            $this->load->model('Empleadocarpeta_model');
            $this->Empleadocarpeta_model->create(
                    $this->input->post("nombrecarpeta"), $this->input->post("descripcioncarpeta"), $this->input->post("emp_id")
            );
            $carpetas = $this->Empleadocarpeta_model->search(
                    $this->input->post("nombrecarpeta"), $this->input->post("descripcioncarpeta"), $this->input->post("emp_id")
            );
            $this->output->set_content_type('application/json')->set_output(json_encode($carpetas[0]));
        } catch (exception $e) {
            
        }
    }

    function guardarregistroempleado() {
        try {
            $post = $this->input->post();
            $this->load->model('Empleado_model');
            $this->load->model('Empleadoregistro_model');
            $tamano = round($_FILES["archivo"]["size"] / 1024, 1) . " KB";
            $post["empReg_tamano"] = $tamano;
            $fecha = new DateTime();
            $post["empgReg_fecha"] = $fecha->format('Y-m-d H:i:s');
            //Creamos carpeta con el ID del registro
            if (isset($_FILES['archivo']['name']))
                if (!empty($_FILES['archivo']['name']))
                    $post['empReg_archivo'] = basename($_FILES['archivo']['name']);

            if (empty($emp_id))
                $emp_id = $post['Emp_Id'];
            $targetPath = "./uploads/empleado/" . $post['Emp_Id'];

            if (empty($this->input->post('empReg_id')))
                $emp_id = $this->Empleadoregistro_model->empleado_registro($post);
            else {
                $this->Empleadoregistro_model->empleado_registroactualizar($post, $this->input->post('empReg_id'));
                $emp_id = $this->input->post('regEmp_id');
            }

            //De la carpeta idRegistro, creamos carpeta con el id del empleado
            if (!file_exists($targetPath)) {
                mkdir($targetPath, 0777, true);
            }
            $targetPath = "./uploads/empleado/" . $post['Emp_Id'] . '/' . $emp_id;
            if (!file_exists($targetPath)) {
                mkdir($targetPath, 0777, true);
            }

            $target_path = $targetPath . '/' . basename($_FILES['archivo']['name']);
            if (move_uploaded_file($_FILES['archivo']['tmp_name'], $target_path)) {
                
            }


            $detallecarpeta = $this->Empleadoregistro_model->detallexcarpeta($post['empReg_carpeta']);
            $this->output->set_content_type('application/json')->set_output(json_encode($detallecarpeta));
        } catch (exception $e) {
            
        }
    }

    function guardarempleado() {
        try {
            $this->load->model('Empleado_model');

            $data = array(
                'Emp_codigo' => $this->input->post('codigo'),
                'Emp_Cedula' => $this->input->post('cedula'),
                'TipDoc_id' => $this->input->post('tipodocumento'),
                'Emp_Nombre' => $this->input->post('nombre'),
                'Emp_Apellidos' => $this->input->post('apellidos'),
                'sex_Id' => $this->input->post('sexo'),
                'Emp_FechaNacimiento' => $this->input->post('fechadenacimiento'),
                'Emp_Estatura' => $this->input->post('estatura'),
                'Emp_Peso' => $this->input->post('peso'),
                'Emp_Telefono' => $this->input->post('telefono'),
                'Emp_Direccion' => $this->input->post('direccion'),
                'Emp_Contacto' => $this->input->post('contacto'),
                'Emp_TelefonoContacto' => $this->input->post('telefonocontacto'),
                'Emp_Email' => $this->input->post('email'),
                'EstCiv_id' => $this->input->post('estadocivil'),
                'TipCon_Id' => $this->input->post('tipocontrato'),
                'Emp_FechaInicioContrato' => $this->input->post('fechainiciocontrato'),
                'Emp_FechaFinContrato' => $this->input->post('fechafincontrato'),
                'Emp_PlanObligatorioSalud' => $this->input->post('planobligatoriodesalud'),
                'Emp_FechaAfiliacionArl' => $this->input->post('fechaafiliacionarl'),
                'Dim_id' => $this->input->post('dimension1'),
                'Dim_IdDos' => $this->input->post('dimension2'),
                'Est_id' => 1,
                'Car_id' => $this->input->post('cargo'),
                'emp_fondo' => $this->input->post('fondo')
            );

            $id = $this->Empleado_model->create($data);

            $this->load->model('Empleadotipoaseguradora_model');
            $tipoaseguradora = $this->input->post("tipoaseguradora");
            $data = array();
            if (!empty($tipoaseguradora[0])):

                $nombreaseguradora = $this->input->post("nombreaseguradora");
                for ($i = 0; $i < count($tipoaseguradora); $i++) {
                    if ($nombreaseguradora[$i] != ""):
                        $data[$i] = array(
                            "emp_id" => $id,
                            "ase_id" => $nombreaseguradora[$i],
                            "tipAse_id" => $tipoaseguradora[$i]
                        );

                    endif;
                }
                $this->Empleadotipoaseguradora_model->create($data);
            endif;
        } catch (exception $e) {
            
        }
    }

    function validarcedula() {
        $this->load->model('Empleado_model');
        $cedula = $this->Empleado_model->validacedula($this->input->post("cedula"));
        if (!empty($cedula)) {
            echo 1;
        } else {
            echo 2;
        }
    }

    function guardaractualizacion() {
        $this->load->model('Empleado_model');

        $data = array(
            'Emp_codigo' => $this->input->post('codigo'),
            'Emp_Cedula' => $this->input->post('cedula'),
            'TipDoc_id' => $this->input->post('tipodocumento'),
            'Emp_Nombre' => $this->input->post('nombre'),
            'Emp_Apellidos' => $this->input->post('apellidos'),
            'sex_Id' => $this->input->post('sexo'),
            'Emp_FechaNacimiento' => $this->input->post('fechadenacimiento'),
            'Emp_Estatura' => $this->input->post('estatura'),
            'Emp_Peso' => $this->input->post('peso'),
            'Emp_Telefono' => $this->input->post('telefono'),
            'Emp_Direccion' => $this->input->post('direccion'),
            'Emp_Contacto' => $this->input->post('contacto'),
            'Emp_TelefonoContacto' => $this->input->post('telefonocontacto'),
            'Emp_Email' => $this->input->post('email'),
            'EstCiv_id' => $this->input->post('estadocivil'),
            'TipCon_Id' => $this->input->post('tipocontrato'),
            'Emp_FechaInicioContrato' => $this->input->post('fechainiciocontrato'),
            'Emp_FechaFinContrato' => $this->input->post('fechafincontrato'),
            'Emp_PlanObligatorioSalud' => $this->input->post('planobligatoriodesalud'),
            'Emp_FechaAfiliacionArl' => $this->input->post('fechaafiliacionarl'),
            'Dim_id' => $this->input->post('dimension1'),
            'Dim_IdDos' => $this->input->post('dimension2'),
            'Car_id' => $this->input->post('cargo'),
            'emp_fondo' => $this->input->post('fondo')
        );
        $this->Empleado_model->update($data, $this->input->post('emp_id'));

        //--------------------- Actualiza tipo aseguradoras ----------------------------
        $id = $this->input->post('emp_id');
        $this->load->model('Empleadotipoaseguradora_model');
        $tipoaseguradora = $this->input->post("tipoaseguradora");
        $data = array();

//        if (isset($tipoaseguradora)) 
        if ((!empty($this->input->post("tipoaseguradora")[0])) && (!empty($this->input->post("nombreaseguradora")[0]))) {
            $nombreaseguradora = $this->input->post("nombreaseguradora");
            for ($i = 0; $i < count($tipoaseguradora); $i++) {
                if ($nombreaseguradora[$i] != ""):
                    $data[$i] = array(
                        "emp_id" => $id,
                        "ase_id" => $nombreaseguradora[$i],
                        "tipAse_id" => $tipoaseguradora[$i]
                    );
                endif;
            }
            $this->Empleadotipoaseguradora_model->actualizatipo($id, $data);
        }
    }

    function consultaaseguradoras() {
        $this->load->model('Aseguradora_model');
        $data = $this->Aseguradora_model->consulta_aseguradora($this->input->post("id"));
        $this->output->set_content_type('application/json')->set_output(json_encode($data));
    }

    function listadoempleados() {
        if ($this->consultaacceso($this->data["usu_id"])) :
            $this->load->model('Empresa_model');
            $this->data['empresa'] = $this->Empresa_model->detail();
            if ((!empty($this->data['empresa'][0]->Dim_id)) && (!empty($this->data['empresa'][0]->Dimdos_id))) {
                $this->load->model('Tipo_documento_model');
                $this->load->model('Tipocontrato_model');
                $this->load->model("Estados_model");
                $this->load->model('Cargo_model');
                $this->load->model('Dimension2_model');
                $this->load->model('Dimension_model');
                $this->data['dimension'] = $this->Dimension_model->detail();
                $this->data['dimension2'] = $this->Dimension2_model->detail();
                $this->data['cargo'] = $this->Cargo_model->detail();
                $this->data['estado'] = $this->Estados_model->detail();
                $this->data['tipocontrato'] = $this->Tipocontrato_model->detail();
//        var_dump($this->data['tipocontrato']);die;
                $this->data["tipodocumento"] = $this->Tipo_documento_model->detail();
                $this->layout->view("administrativo/listadoempleados", $this->data);
            } else {
                redirect('index.php/administrativo/empresa', 'location');
            }
        else:
            $this->layout->view("permisos");
        endif;
    }

    function consultaempleados() {
        $this->load->model('Empleado_model');
        $cedula = $this->input->post('cedula');
        $nombre = $this->input->post('nombre');
        $apellido = $this->input->post('apellido');
        $codigo = $this->input->post('codigo');
        $cargo = $this->input->post('cargo');
        $estado = $this->input->post('estado');
        $dim1 = $this->input->post('dimension1');
        $dim2 = $this->input->post('dimension2');
        $estado = $this->input->post('estado');
        $tipocontrato = $this->input->post('tipocontrato');
        $contratosvencidos = $this->input->post('contratosvencidos');
        $this->data['listado'] = $this->Empleado_model->filtroempleados($cedula, $nombre, $apellido, $codigo, $cargo, $estado, $contratosvencidos, $tipocontrato, $dim1, $dim2);
        $this->output->set_content_type('application/json')->set_output(json_encode($this->data['listado']));
    }

    function consultacontratosvencidos() {
        $this->load->model('Empleado_model');
        $this->data['listado'] = $this->Empleado_model->contratosvencidos();
        $this->output->set_content_type('application/json')->set_output(json_encode($this->data['listado']));
    }

    function eliminarempleado() {
        $this->load->model('Empleado_model');
        $this->Empleado_model->eliminarempleado($this->input->post('id'));
    }

    function creacionusuarios() {
        if ($this->consultaacceso($this->data["usu_id"])) :
            $this->load->model('Sexo_model');
            $this->load->model('Cargo_model');
            $this->load->model('Empleado_model');
            $this->load->model('Estados_model');
            $this->load->model('User_model');
            $this->load->model('Roles_model');
            $this->data['roles'] = $this->Roles_model->roles();
//            var_dump($this->data['roles']);die;
            $this->data['empleado'] = $this->Empleado_model->detail();
            $this->data['estado'] = $this->Estados_model->detail();
            $this->data['sexo'] = $this->Sexo_model->detail();
            $this->data['cargo'] = $this->Cargo_model->detail();
            $this->data['usuario'] = "";
            $user = $this->input->post('usu_id');
            if (!empty($user)) {
                $this->data['usuario'] = $this->User_model->consultausuarioxid($this->input->post('usu_id'));
                $this->data['empleado'] = $this->Empleado_model->empleadoxcargo($this->data['usuario'][0]->car_id);
//            var_dump($this->data['usuario']);die;
            }
            $this->layout->view("administrativo/creacionusuarios", $this->data);
        else:
            $this->layout->view("permisos");
        endif;
    }

    function listadousuarios() {
        if ($this->consultaacceso($this->data["usu_id"])) :
            $this->load->model('Tipo_documento_model');
            $this->load->model('Estados_model');
            $this->load->model('User_model');
            $this->load->model('Roles_model');
            $this->data['roles'] = $this->Roles_model->roles();
            $this->data['estado'] = $this->Estados_model->detail();
            $this->data["tipodocumento"] = $this->Tipo_documento_model->detail();
            $this->data["usuarios"] = $this->User_model->consultageneral();
            $this->layout->view("administrativo/listadousuarios", $this->data);
        else:
            $this->layout->view("permisos");
        endif;
    }

    function consultarusuario() {
        $this->load->model('User_model');
        $this->data['usuarios'] = $this->User_model->filteruser(
                $this->input->post('apellido')
                , $this->input->post('cedula')
                , $this->input->post('estado')
                , $this->input->post('nombre')
        );
        $this->output->set_content_type('application/json')->set_output(json_encode($this->data['usuarios']));
    }

    function guardarusuario() {
        $this->load->model('User_model');
        $this->load->model('Roles_model');
        $consultaexistencia = $this->User_model->consultausuarioxcedula($this->input->post('cedula'));
        if (empty($consultaexistencia)) {
            $data[] = array(
                'usu_contrasena' => $this->input->post('contrasena'),
                'est_id' => $this->input->post('estado'),
                'usu_politicas' => '0',
                'usu_cedula' => $this->input->post('cedula'),
                'usu_nombre' => $this->input->post('nombres'),
                'usu_apellido' => $this->input->post('apellidos'),
                'usu_usuario' => $this->input->post('usuario'),
                'usu_email' => $this->input->post('email'),
                'sex_id' => $this->input->post('genero'),
                'car_id' => $this->input->post('cargo'),
                'emp_id' => $this->input->post('empleado'),
                'usu_cambiocontrasena' => $this->input->post('cambiocontrasena'),
                'usu_fechaCreacion' => date('Y-m-d H:i:s'),
                'rol_id' => $this->input->post('rol')
            );

            $id = $this->User_model->create($data);
            if (!empty($id))
                $this->Roles_model->permisosusuario($id, $this->input->post('rol'));
        }
    }

    function actualizarusuario() {
        $this->load->model('User_model');
        $data = array(
            'usu_contrasena' => $this->input->post('contrasena'),
            'est_id' => $this->input->post('estado'),
            'usu_cedula' => $this->input->post('cedula'),
            'usu_nombre' => $this->input->post('nombres'),
            'usu_apellido' => $this->input->post('apellidos'),
            'usu_usuario' => $this->input->post('usuario'),
            'usu_email' => $this->input->post('email'),
            'sex_id' => $this->input->post('genero'),
            'car_id' => $this->input->post('cargo'),
            'emp_id' => $this->input->post('empleado'),
            'usu_cambiocontrasena' => $this->input->post('cambiocontrasena'),
            'usu_fechaCreacion' => date('Y-m-d H:i:s')
        );

        $this->User_model->update($data, $this->input->post('usuid'));
    }

    function consultaorganigrama($datosmodulos = null, $html = null) {
        $tipo = 2;
        $this->load->model('Cargo_model');
        $menu = $this->Cargo_model->consultaorganigrama($datosmodulos);
        $i = array();

        foreach ($menu as $modulo)
            $i[$modulo['car_id']][$modulo['car_nombre']][] = array($modulo['idjefe']);
        if ($datosmodulos == 'prueba')
            $html .='<ul id="org" style="display:none">';
        else
            $html .='<ul id="org" style="display:none">';

//        var_dump($i);die;

        foreach ($i as $padre => $nombrepapa)
            foreach ($nombrepapa as $nombrepapa => $menuidpadre)
                foreach ($menuidpadre as $modulos => $menu):
                    $html .= "<li class='liorganigrama'><p style='margin-top:20px'>" . strtoupper($nombrepapa) . "</p>";
                    $html .=$this->consultaorganigrama($padre, null);
                    $html .= "</li>";
                endforeach;
        $html.="</ul>";
        return $html;
    }

    function organigrama() {
        $this->layout->view("administrativo/organigrama");
    }

    function loadorganigrama() {
        $this->data["organigrama"] = $this->consultaorganigrama();
        $this->load->view("administrativo/organigrama_load", $this->data);
    }

    function cargos() {
        if ($this->consultaacceso($this->data["usu_id"])) :
            $this->load->model("Empresa_model");
            $this->load->model('Cargo_model');
            $this->data["cargo"] = $this->Cargo_model->detail();
            $this->data['informacion'] = $this->Empresa_model->detail();
            $this->layout->view("administrativo/cargos", $this->data);
        else:
            $this->layout->view("permisos");
        endif;
    }

    function cargoriesgo() {
        try {
            $this->load->model('Cargo_model');
            $riesgocargo = $this->Cargo_model->cargoriesgo($this->input->post('car_id'));
            $this->output->set_content_type('application/json')->set_output(json_encode($riesgocargo));
        } catch (exception $e) {
            
        }
    }

    function dimensionunoriesgo() {
        try {
            $this->load->model('Dimension_model');
            $riesgocargo = $this->Dimension_model->dimensionunoriesgo($this->input->post('dim_id'));
            $this->output->set_content_type('application/json')->set_output(json_encode($riesgocargo));
        } catch (exception $e) {
            
        }
    }

    function dimensiondosriesgo() {
        try {
            $this->load->model('Dimension2_model');
            $riesgocargo = $this->Dimension2_model->dimensionunoriesgo($this->input->post('dim_id'));
            $this->output->set_content_type('application/json')->set_output(json_encode($riesgocargo));
        } catch (exception $e) {
            
        }
    }

    function consultausuarioscargo() {

        $this->load->model('Empleado_model');
        $this->data["cargo"] = $this->Empleado_model->empleadoxcargo($this->input->post('cargo'));
        $this->output->set_content_type('application/json')->set_output(json_encode($this->data["cargo"]));
    }

    function consultausuariosflechas() {
        $this->load->model("User_model");
        $idUsuarioCreado = $this->input->post("idUsuarioCreado");
        $metodo = $this->input->post("metodo");
        $campos = $this->User_model->consultausuariosflechas($idUsuarioCreado, $metodo);

        if (!empty($campos)) {
            $this->output->set_content_type('application/json')->set_output(json_encode($campos[0]));
        }
    }

    function consultaempleadoflechas() {
        $this->load->model("Empleado_model");
        $idEmpleadoCreado = $this->input->post("idEmpleadoCreado");
        $metodo = $this->input->post("metodo");
        $campos = $this->Empleado_model->consultaempleadoflechas($idEmpleadoCreado, $metodo);
        if (!empty($campos)) {
            $this->output->set_content_type('application/json')->set_output(json_encode($campos[0]));
        }
    }

    function consultaempleadoflechasaseguradora() {
        $this->load->model("Empleadotipoaseguradora_model");
        $idEmpleadoCreado = $this->input->post("idEmpleadoCreado");
        $campos = $this->Empleadotipoaseguradora_model->consult_empleado($idEmpleadoCreado);
        if (!empty($campos)) {
            $this->output->set_content_type('application/json')->set_output(json_encode($campos));
        } else {
            die("null");
        }
    }

    function consultacargoxid() {
        $this->load->model('Cargo_model');
        $this->data["cargo"] = $this->Cargo_model->consultacargoxid($this->input->post('car_id'));
        $this->output->set_content_type('application/json')->set_output(json_encode($this->data["cargo"][0]));
    }

    function guardarcargo() {
        try {
            $this->load->model('Cargo_model');
            $cargo = $this->input->post("cargo");
            $cargojefe = $this->input->post("cargojefe");
            $porcentaje = $this->input->post("porcentaje");

            if (empty($this->Cargo_model->existe($cargo[0], $cargojefe[0]))) {
                $data = array();
                for ($i = 0; $i < count($cargo); $i++) {
                    $data[$i] = array(
                        "car_nombre" => $cargo[$i],
                        "car_jefe" => $cargojefe[$i],
                        "car_porcentajearl" => $porcentaje[$i],
                    );
                }
                $this->Cargo_model->create($data);
                $this->data["cargo"] = $this->Cargo_model->detail();
                $this->output->set_content_type('application/json')->set_output(json_encode($this->data["cargo"]));
            } else {
                echo "1";
            }
        } catch (exception $e) {
            echo "error";
        }
    }

    function eliminarcargo() {

        $this->load->model('Cargo_model');
        $consulta = $this->Cargo_model->consultahijos($this->input->post('id'));
        if ($consulta > 0) {
            echo 1;
        } else {
            $this->Cargo_model->delete($this->input->post('id'));
            $this->data["cargo"] = $this->Cargo_model->detail();
            $this->output->set_content_type('application/json')->set_output(json_encode($this->data["cargo"]));
        }
    }

    function eliminarusuario() {
        try {
            $this->load->model("User_model");
            $this->User_model->eliminarusuario($this->input->post("usu_id"));
        } catch (Exception $e) {
            
        }
    }

    function modificacioncargo() {
        try {
            $this->load->model('Cargo_model');

            $this->Cargo_model->update(
                    $this->input->post('cargo')
                    , $this->input->post('jefe')
                    , $this->input->post('cotizacion')
                    , $this->input->post('car_id')
            );
        } catch (exception $e) {
            
        }
    }

    function dimension2() {
        if ($this->consultaacceso($this->data["usu_id"])) {
            $this->load->model('Dimension2_model');
            $this->load->model('Empresa_model');
            $this->data['empresa'] = $this->Empresa_model->detail();
            if (!empty($this->data['empresa'][0]->Dimdos_id)) {
                $this->data['dimension'] = $this->Dimension2_model->detail();
                $this->layout->view("administrativo/dimension2", $this->data);
            } else {
                redirect('index.php/administrativo/empresa', 'location');
            }
        }
    }

    function consultadimensionxid2() {

        $this->load->model('Dimension2_model');
        $this->data['dimension'] = $this->Dimension2_model->consultadimensionxid($this->input->post('dim_id'));
        $this->output->set_content_type('application/json')->set_output(json_encode($this->data['dimension'][0]));
    }

    function guardarmodificaciondimension2() {
        try {
            $this->load->model('Dimension2_model');
            $this->Dimension2_model->guardarmodificaciondimension(
                    $this->input->post('descripcion'), $this->input->post('dimid')
            );
        } catch (exception $e) {
            
        }
    }

    function guardardimension2() {
        $this->load->model('Dimension2_model');
        $data[0] = array(
            "dim_descripcion" => $this->input->post('descripcion')
        );
        if (empty($this->Dimension2_model->consultxname($this->input->post('descripcion')))) {
            $this->Dimension2_model->create($data);
            $dimension = $this->Dimension2_model->detail();
            $this->output->set_content_type('application/json')->set_output(json_encode($dimension));
        } else {
            $respuesta["message"] = "Datos existente en el sistema";
            $this->output->set_content_type('application/json')->set_output(json_encode($respuesta));
        }
    }

    function eliminardimension2() {
        $this->load->model('Dimension2_model');
        $this->Dimension2_model->delete($this->input->post('id'));
    }

    function actualizardimension2() {
        $this->load->model('Dimension_model');
    }

    function dimension() {
        $this->load->model('Dimension_model');
        $this->load->model('Empresa_model');
        $this->data['empresa'] = $this->Empresa_model->detail();
        if (!empty($this->data['empresa'][0]->Dim_id)) {
            $this->data['dimension'] = $this->Dimension_model->detail();
            $this->layout->view("administrativo/dimension", $this->data);
        }
    }

    function consultadimensionxid() {

        $this->load->model('Dimension_model');
        $this->data['dimension'] = $this->Dimension_model->consultadimensionxid($this->input->post('dim_id'));
        $this->output->set_content_type('application/json')->set_output(json_encode($this->data['dimension'][0]));
    }

    function guardarmodificaciondimension() {

        $this->load->model('Dimension_model');
        $this->Dimension_model->guardarmodificaciondimension(
                $this->input->post('descripcion'), $this->input->post('dimid')
        );
    }

    function guardardimension() {
        $this->load->model('Dimension_model');
        $data[0] = array(
            "dim_descripcion" => $this->input->post('descripcion')
        );
        if (empty($this->Dimension_model->consultxname($this->input->post('descripcion')))) {
            $this->Dimension_model->create($data);
            $dimension = $this->Dimension_model->detail();
            $this->output->set_content_type('application/json')->set_output(json_encode($dimension));
        } else {
            $respuesta["message"] = "Datos existente en el sistema";
            $this->output->set_content_type('application/json')->set_output(json_encode($respuesta));
        }
    }

    function eliminardimension() {
//        $this->load->model('Dimension_model');
//        $this->output->set_content_type('application/json')->set_output(json_encode($this->Dimension_model->delete($this->input->post('id'))));
    }

    function actualizardimension() {
        $this->load->model('Dimension_model');
    }

    function empresa() {
        $this->load->model("Empresa_model");
        $this->load->model('Tamano_empresa_model');
        $this->load->model('Numero_empleados_model');
        $this->load->model('Ingreso_model');
        $this->load->model('Actividadeconomica_model');
        $this->data['mensaje'] = "";
        if ($this->session->guardadoexito == "guardado con exito") {
//                echo "esta aca";die;
            $this->data['mensaje'] = "guardado con exito";
            $this->session->guardadoexito = "xyz";
        }

        $this->data['ciudad'] = $this->Ingreso_model->ciudades();
        $this->data['tamano'] = $this->Tamano_empresa_model->detail();
        $this->data['numero'] = $this->Numero_empleados_model->detail();
        $this->data['informacion'] = $this->Empresa_model->detail();
        $this->data['actividadeconomica'] = $this->Actividadeconomica_model->detail();
//        var_dump($this->data['informacion']);die;
        $this->layout->view("administrativo/empresa", $this->data);
    }

    function guardarempresa() {


        try {
            $this->load->model("Empresa_model");
            if (isset($_FILES['userfile']['name']))
                if (!empty($_FILES['userfile']['name']))
                    $this->db->set("emp_logo", basename($_FILES['userfile']['name']));
            $data[] = array(
                "emp_razonSocial" => $this->input->post("razonsocial"),
                "emp_nit" => $this->input->post("nit"),
                "emp_direccion" => $this->input->post("direccion"),
                "ciu_id" => $this->input->post("ciudad"),
                "tam_id" => $this->input->post("tamano"),
                "numEmp_id" => $this->input->post("empleados"),
                "actEco_id" => $this->input->post("actividadeconomica"),
                "Dim_id" => $this->input->post("dimension1"),
                "Dimdos_id" => $this->input->post("dimension2"),
                "emp_representante" => $this->input->post("representante"),
                    //            "emp_logo"=>$this->input->post("")
            );
            $datos = $this->Empresa_model->detail();
            if (count($datos) == 0)
                $dd = $this->Empresa_model->create($data);
            else
                $dd = $this->Empresa_model->update($data[0]);

            $targetPath = "./uploads/empresa";
            if (!file_exists($targetPath)) {
                mkdir($targetPath, 0777, true);
            }
            $targetPath = "./uploads/empresa/" . $dd[0]->emp_id;
            if (!file_exists($targetPath)) {
                mkdir($targetPath, 0777, true);
            }

            $target_path = $targetPath . '/' . basename($_FILES['userfile']['name']);
            if (move_uploaded_file($_FILES['userfile']['tmp_name'], $target_path)) {
                
            }

            $this->session->guardadoexito = "guardado con exito";

            redirect('index.php/administrativo/empresa', 'location');
        } catch (exception $e) {
            redirect('index.php/administrativo/empresa', 'location');
        }
    }

    function autocompletar() {
        $info = auto("user", "usu_id", "usu_nombre", $this->input->get('term'));
        $this->output->set_content_type('application/json')->set_output(json_encode($info));
    }

    function autocompletaruapellido() {
        $info = auto("user", "usu_id", "usu_apellido", $this->input->get('term'));
        $this->output->set_content_type('application/json')->set_output(json_encode($info));
    }

    function autocompletaruacedula() {
        $info = auto("user", "usu_id", "usu_cedula", $this->input->get('term'));
        $this->output->set_content_type('application/json')->set_output(json_encode($info));
    }

    function autocompletarcedula() {
        $info = auto("empleado", "Emp_Id", "Emp_Cedula", $this->input->get('term'));
        $this->output->set_content_type('application/json')->set_output(json_encode($info));
    }

    function autocompletarnombre() {
        $info = auto("empleado", "Emp_Id", "Emp_Nombre", $this->input->get('term'));
        $this->output->set_content_type('application/json')->set_output(json_encode($info));
    }

    function autocompletarapellido() {
        $info = auto("empleado", "Emp_Id", "Emp_Apellido", $this->input->get('term'));
        $this->output->set_content_type('application/json')->set_output(json_encode($info));
    }

    function riesgo() {
        if ($this->consultaacceso($this->data["usu_id"])) {
            $this->layout->view("administrativo/riesgo");
        }
    }

    function clasificacionriesgo() {
        if ($this->consultaacceso($this->data["usu_id"])) {
            $this->layout->view("administrativo/clasificacionriesgo");
        }
    }

    function importar_empleados() {
        $this->layout->view("administrativo/importar_empleados");
    }

    public function subir_archivo() {
        ini_set('MAX_EXECUTION_TIME', -1);
        ini_set('memory_limit', -1);
        $this->load->model("Empleado_model");
        $uploaddir = './uploads';
        if (isset($_FILES['file'])) {
            $uploadfile = $uploaddir . '/' . basename($_FILES['file']['name']);
            if (move_uploaded_file($_FILES['file']['tmp_name'], $uploadfile)) {
                $datos['archivo'] = "El archivo es válido y fue cargado exitosamente.\n";
            } else {
                echo "<br>-¡Error en el cargue del archivo!\n";
                die();
            }
        } else {
            echo "<br>-¡Error en el cargue del archivo !\n";
            die();
        }


        $excel = PHPExcel_IOFactory::load($uploadfile)->setActiveSheetIndex(0);
        $lastRow = $excel->getHighestRow();
        $creados = 0;
        $actulizados = 0;
        $registros = 0;
        for ($row = 10; $row <= $lastRow; $row++) {
            $registros++;
            $info = array();
            $info['Emp_Cedula'] = $excel->getCell('A' . $row)->getValue();
            $info['Emp_Nombre'] = $excel->getCell('B' . $row)->getValue();
            $info['Emp_Apellidos'] = $excel->getCell('C' . $row)->getValue();
            $info['sex_Id'] = $excel->getCell('D' . $row)->getValue();
            $info['Emp_FechaNacimiento'] = $excel->getCell('E' . $row)->getValue();
            if (!empty($info['Emp_FechaNacimiento'])) {
                $info['Emp_FechaNacimiento'] = date('Y-m-d H:i:s', ($excel->getCell('E' . $row)->getValue() - 25569 - 0.08333) * 86400);
            }
            $info['Emp_Estatura'] = $excel->getCell('F' . $row)->getValue();
            $info['Emp_Peso'] = $excel->getCell('G' . $row)->getValue();
            $info['Emp_Telefono'] = $excel->getCell('H' . $row)->getValue();
            $info['Emp_Direccion'] = $excel->getCell('I' . $row)->getValue();
            $info['Emp_TelefonoContacto'] = $excel->getCell('J' . $row)->getValue();
            $info['Emp_Email'] = $excel->getCell('K' . $row)->getValue();
            $info['EstCiv_id'] = $excel->getCell('L' . $row)->getValue();
            if (($excel->getCell('M' . $row)->getValue()) != '')
                $info['TipCon_Id'] = $this->Empleado_model->buscar_tipo_contrato($excel->getCell('M' . $row)->getValue());
            $info['Emp_FechaInicioContrato'] = $excel->getCell('N' . $row)->getValue();
            if (!empty($info['Emp_FechaInicioContrato'])) {
                $info['Emp_FechaInicioContrato'] = date('Y-m-d H:i:s', ($excel->getCell('N' . $row)->getValue() - 25569 - 0.08333) * 86400);
            }
            $info['Emp_FechaFinContrato'] = $excel->getCell('O' . $row)->getValue();
            if (!empty($info['Emp_FechaFinContrato'])) {
                $info['Emp_FechaFinContrato'] = date('Y-m-d H:i:s', ($excel->getCell('O' . $row)->getValue() - 25569 - 0.08333) * 86400);
            }
            $info['Emp_PlanObligatorioSalud'] = $excel->getCell('P' . $row)->getValue();
            $info['Emp_FechaAfiliacionArl'] = $excel->getCell('Q' . $row)->getValue();
            if (!empty($info['Emp_FechaAfiliacionArl'])) {
                $info['Emp_FechaAfiliacionArl'] = date('Y-m-d H:i:s', ($excel->getCell('Q' . $row)->getValue() - 25569 - 0.08333) * 86400);
            }
            if (($excel->getCell('R' . $row)->getValue()) != '')
                $info['TipAse_Id'] = $this->Empleado_model->buscar_tipo_aseguradora($excel->getCell('R' . $row)->getValue());
            if (($excel->getCell('S' . $row)->getValue()) != '')
                $info['Ase_Id'] = $this->Empleado_model->buscar_aseguradora($excel->getCell('S' . $row)->getValue(), $info['TipAse_Id']);
            if (($excel->getCell('T' . $row)->getValue()) != '')
                $info['Dim_id'] = $this->Empleado_model->buscar_dimencion1($excel->getCell('T' . $row)->getValue());
            if (($excel->getCell('U' . $row)->getValue()) != '')
                $info['Dim_IdDos'] = $this->Empleado_model->buscar_dimencion2($excel->getCell('U' . $row)->getValue());
            if (($excel->getCell('V' . $row)->getValue()) != '')
                $info['Car_id'] = $this->Empleado_model->cargo($excel->getCell('V' . $row)->getValue());
            if (($excel->getCell('W' . $row)->getValue()) != '')
                $info['TipDoc_id'] = $this->Empleado_model->tipo_documento($excel->getCell('W' . $row)->getValue());
            $info['Est_id'] = $excel->getCell('X' . $row)->getValue();
            $info['emp_fondo'] = $excel->getCell('Y' . $row)->getValue();
            $info['Emp_contacto'] = $excel->getCell('Z' . $row)->getValue();

            $this->db->select('Emp_Id');
            $this->db->where('Emp_Cedula', $info['Emp_Cedula']);
            $datos = $this->db->get('empleado');
            $datos = $datos->result();
            if (count($datos)) {
                $this->db->where('Emp_Cedula', $info['Emp_Cedula']);
                $this->db->update('empleado', $info);
                $actulizados++;
            } else {
                $this->db->insert('empleado', $info);
                $creados++;
            }
        }
        echo "<p><br>Numero de registros: " . $registros;
        echo "<br>Registros actualizados : " . $actulizados;
        echo "<br>Registros Creados : " . $creados;
    }

    function accidente() {

        $this->layout->view("administrativo/accidente", $this->data);
    }

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
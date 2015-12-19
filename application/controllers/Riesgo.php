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
class Riesgo extends My_Controller {

    function __construct() {
        parent::__construct();
        validate_login($this->session->userdata('usu_id'));
    }

    function nuevoriesgo() {
        $this->load->model('Tarea_model');
        $this->load->model('Dimension2_model');
        $this->load->model('Dimension_model');
        $this->load->model('Empresa_model');
        $this->load->model("Riesgoclasificacion_model");
        $this->load->model("Estadoaceptacion_model");
        $this->load->model("Riesgo_model");
        $this->load->model("Tipo_model");
        $this->load->model("Riesgoclasificaciontipo_model");
        $this->load->model("Registrocarpeta_model");
        $this->load->model("Estadoaceptacioncolor_model");

        $this->load->model("Riesgocargo_model");
        $this->load->model("Cargo_model");
        $this->data['categoria'] = $this->Riesgoclasificacion_model->detail();
        $this->data['estadoaceptacionxcolor'] = $this->Estadoaceptacion_model->detail();
        $this->data['empresa'] = $this->Empresa_model->detail();
        $this->data['cargo'] = $this->Cargo_model->detail();
        if (!empty($this->data['empresa'][0]->Dim_id) && !empty($this->data['empresa'][0]->Dimdos_id)) {
            if (!empty($this->input->post("rie_id"))) {
                $this->data['carpetas'] = $this->Registrocarpeta_model->detailxriesgocarpetas($this->input->post('rie_id'));
                 $carpeta = $this->Registrocarpeta_model->detailxriesgo($this->input->post('rie_id'));
                $d = array();
                foreach ($carpeta as $c) {
                    $d[$c->regCar_id][$c->regCar_nombre." - ".$c->regCar_descripcion][] = array(
                        $c->reg_archivo, 
                        $c->reg_descripcion, 
                        $c->reg_version, 
                        $c->usu_nombre." ".$c->usu_apellido, 
                        $c->reg_tamano, 
                        $c->reg_fechaCreacion,
                        $c->reg_id
                            );
                }
                $this->data['carpeta'] = $d;
                $this->load->model("Planes_model");
                $this->data['rie_id'] = $this->input->post("rie_id");
                $this->data['tarea'] = $this->Tarea_model->tareaxRiesgo($this->data['rie_id']);
                $this->data['riesgo'] = $this->Riesgo_model->detailxid($this->input->post("rie_id"))[0];
                $this->data['tipo'] = $this->Riesgoclasificaciontipo_model->tipoxcategoria($this->data['riesgo']->rieCla_id);
                $this->data['color'] = $this->Estadoaceptacioncolor_model->colorxestado($this->data['riesgo']->estAce_id);
                $this->data['cargoId'] = $this->Riesgocargo_model->detailxid($this->input->post("rie_id"));
                $this->data['tareas'] = $this->Planes_model->tareaxplanriesgo($this->data['riesgo']->rieCla_id);
                $this->data['tareasinactivas'] = $this->Planes_model->tareaxplaninactivasriesgo($this->data['riesgo']->rieCla_id);
            }
            $this->data['dimension'] = $this->Dimension_model->detail();
            $this->data['dimension2'] = $this->Dimension2_model->detail();
            $this->layout->view("riesgo/nuevoriesgo", $this->data);
        } else {
            redirect('index.php/administrativo/empresa', 'location');
        }
    }

    function guardarriesgo() {
        try {
            $this->load->model('Riesgo_model');
            $this->load->model('Riesgocargo_model');
            $this->load->model('Riesgoclasificaciontipo_model');
            $data = array(
                "rie_descripcion" => $this->input->post("descripcion"),
                "rieCla_id" => $this->input->post("categoria"),
                "rieClaTip_id" => $this->input->post("tipo"),
                "dim1_id" => $this->input->post("dimensionuno"),
                "dim2_id" => $this->input->post("dimensiondos"),
                "rie_zona" => $this->input->post("zona"),
                "rie_requisito" => $this->input->post("requisito"),
                "rie_observaciones" => $this->input->post("observaciones"),
                "estAce_id" => $this->input->post("estado"),
                "col_id" => $this->input->post("color"),
                "rie_fecha" => $this->input->post("fecha"),
                "rie_fechaCreacion" => date("Y-m-d H:i:s"),
                "rie_actividad" => $this->input->post("actividades")
            );
            $id = $this->Riesgo_model->create($data);
            if (!empty($this->input->post("cargo"))):
                $cargo = $this->input->post("cargo");
                for ($i = 0; $i < count($cargo); $i++):
                    $dataCargo[] = array("car_id" => $cargo[$i], "rie_id" => $id);
                endfor;
                $this->Riesgocargo_model->guardarcargo($dataCargo);
            endif;
        } catch (Exception $ex) {
            
        }
    }

    function actualizarriesgo() {
        try {
            $this->load->model('Riesgo_model');
            $this->load->model('Riesgocargo_model');
            $data = array(
                "rie_descripcion" => $this->input->post("descripcion"),
                "rieCla_id" => $this->input->post("categoria"),
                "rieClaTip_id" => $this->input->post("tipo"),
                "dim1_id" => $this->input->post("dimensionuno"),
                "dim2_id" => $this->input->post("dimensiondos"),
                "rie_zona" => $this->input->post("zona"),
                "rie_requisito" => $this->input->post("requisito"),
                "rie_observaciones" => $this->input->post("observaciones"),
                "estAce_id" => $this->input->post("estado"),
                "col_id" => $this->input->post("color"),
                "rie_fecha" => $this->input->post("fecha"),
                "rie_fechaModificacion" => date("Y-m-d H:i:s"),
                "rie_actividad" => $this->input->post("actividades")
            );
            $this->Riesgo_model->atualizarriesgo($this->input->post("rie_id"), $data);
            $this->Riesgocargo_model->eliminarcargoriesgo($this->input->post("rie_id"));
            if (!empty($this->input->post("cargo"))):
                $cargo = $this->input->post("cargo");
                for ($i = 0; $i < count($cargo); $i++):
                    $dataCargo[] = array("car_id" => $cargo[$i], "rie_id" => $this->input->post("rie_id"));
                endfor;
                $this->Riesgocargo_model->guardarcargo($dataCargo);
            endif;
        } catch (Exception $ex) {
            
        }
    }

    function listadoavance2() {
        $this->load->model('Avancetarea_model');
        $clasificacion = $this->Avancetarea_model->listado_avanceriesgo($this->input->post('clasificacionriesgo'));
        $this->output->set_content_type('application/json')->set_output(json_encode($clasificacion));
    }

    function consultaRiesgoFlechas() {
        try {
            $this->load->model("Riesgo_model");
            $this->load->model("Riesgocargo_model");
            $this->load->model("Riesgoclasificaciontipo_model");
            $this->load->model("Estadoaceptacioncolor_model");
            $idRiesgo = $this->input->post("idRiesgo");
            $metodo = $this->input->post("metodo");
            $campos["campos"] = $this->Riesgo_model->consultaRiesgoFlechas($idRiesgo, $metodo)[0];
            die();
            if (!empty($campos)) {
                $data["tipo"] = $this->Riesgoclasificaciontipo_model->tipoxcategoria($campos["campos"]->cat_id);
                $data["color"] = $this->Estadoaceptacioncolor_model->colorxestado($campos["campos"]->estAce_id);
                ;
                $data["cargoId"] = $this->Riesgocargo_model->detailxid($campos["campos"]->rie_id);
                $campos = array_merge($campos, $data);
                $this->output->set_content_type('application/json')->set_output(json_encode($campos));
            } else {
                $this->output->set_content_type('application/json')->set_output("vacio");
            }
        } catch (Exception $e) {
            echo $e;
            die;
        }
    }

    function consultaestadoxcolor() {

        $this->load->model("Estadoaceptacioncolor_model");
        $data = $this->Estadoaceptacioncolor_model->colorxestado($this->input->post('estado'));
        $this->output->set_content_type('application/json')->set_output(json_encode($data));
    }

    function consultatiporiesgo() {

        $this->load->model("Riesgoclasificaciontipo_model");
        $data = $this->Riesgoclasificaciontipo_model->tipoxcategoria($this->input->post("categoria"));
        $this->output->set_content_type('application/json')->set_output(json_encode($data));
    }

    function clasificacionriesgo() {
        $this->load->model("Riesgoclasificacion_model");
        $categoria = $this->Riesgoclasificacion_model->detailandtipo();

        $i = array();
        foreach ($categoria as $c) {
            $i[$c->rieCla_id][$c->rieCla_categoria][] = array(
                $c->rieClaTip_id,
                $c->rieClaTip_tipo
            );
        }
        $this->data['categoria'] = $i;

        $this->data['categoria2'] = $this->Riesgoclasificacion_model->detail();
        $this->layout->view("riesgo/clasificacionriesgo", $this->data);
    }

    function listadoriesgo() {
        $this->load->model('Dimension2_model');
        $this->load->model('Dimension_model');
        $this->load->model('Empresa_model');
        $this->load->model('Cargo_model');
        $this->load->model("Riesgoclasificacion_model");
        $this->data['empresa'] = $this->Empresa_model->detail();
        if (!empty($this->data['empresa'][0]->Dim_id) && !empty($this->data['empresa'][0]->Dimdos_id)) {
            $this->data['categoria'] = $this->Riesgoclasificacion_model->detail();
            $this->data['cargo'] = $this->Cargo_model->detail();
            $this->data['dimension'] = $this->Dimension_model->detail();
            $this->data['dimension2'] = $this->Dimension2_model->detail();
            $this->layout->view("riesgo/listadoriesgo", $this->data);
        } else {
            redirect('index.php/administrativo/empresa', 'location');
        }
    }
    
    function listadoriesgocargos(){
        $this->load->model('Riesgocargo_model');
        $data["cargoId"] = $this->Riesgocargo_model->detailxcargoxid($this->input->post('rie_id'));
        $this->output->set_content_type('application/json')->set_output(json_encode($data["cargoId"]));
    }
    

    function estadosaceptacion() {
        $this->load->model("Estadoaceptacion_model");
        $this->load->model("Estadoaceptacioncolor_model");
        $this->load->model("Riesgocolor_model");

        $estadoaceptacion = $this->Estadoaceptacion_model->detailandcolor();
        $i = array();
        foreach ($estadoaceptacion as $es) {
            if ($es->estAceCol_id != null) {
                $i[$es->estAce_id][$es->estAce_estado][$es->estAceCol_id] = $es->rieCol_color;
            } else {
                $i[$es->estAce_id][$es->estAce_estado] = null;
            }
        }
        $this->data['estadoaceptacion'] = $i;
        $this->data['estadoaceptacionxcolor'] = $this->Estadoaceptacion_model->detail();
        $this->data['color'] = $this->Riesgocolor_model->detail();
        $this->layout->view("riesgo/estadosaceptacion", $this->data);
    }

    function tablaestadosaceptacion() {
        $this->load->model("Estadoaceptacion_model");

        $estadoaceptacion = $this->Estadoaceptacion_model->detailandcolor();
        $i = array();
        foreach ($estadoaceptacion as $es) {
            if ($es->estAceCol_id != null) {
                $i[$es->estAce_id][$es->estAce_estado][$es->estAceCol_id] = $es->rieCol_color;
            } else {
                $i[$es->estAce_id][$es->estAce_estado] = null;
            }
        }
        $this->output->set_content_type('application/json')->set_output(json_encode($i));
    }

    function guardaestadoaceptacion() {
        $this->load->model("Estadoaceptacion_model");
        if (empty($this->Estadoaceptacion_model->consultxname($this->input->post("estadoaceptacion")))) {
            //Inserta En La Estado Aceptación
            $this->Estadoaceptacion_model->insert($this->input->post("estadoaceptacion"));
            //Actualizamos el campo selector de estado aceptacion
            $this->data['estadoaceptacionxcolor'] = $this->Estadoaceptacion_model->detail();
            //Envio JSON
            $this->output->set_content_type('application/json')->set_output(json_encode($this->data['estadoaceptacionxcolor']));
        } else {
            echo 1;
        }
    }

    function consultaestadoaceptacion() {
        $this->load->model("Estadoaceptacion_model");
        $this->data["idDescripcion"] = $this->Estadoaceptacion_model->consult($this->input->post("idEstado"));
        $this->output->set_content_type('application/json')->set_output(json_encode($this->data['idDescripcion'][0]));
    }

    function actualizarestadoaceptacion() {
        $this->load->model("Estadoaceptacion_model");
        if (empty($this->Estadoaceptacion_model->consultxnamexid($this->input->post("editarNuevoEstado"), $this->input->post("EditarNuevoEstadoId")))) {
            $this->Estadoaceptacion_model->update($this->input->post("editarNuevoEstado"), $this->input->post("EditarNuevoEstadoId"));
            //Actualizamos el campo selector de estado aceptacion
            $this->data['estadoaceptacionxcolor'] = $this->Estadoaceptacion_model->detail();
            //Envio JSON
            $this->output->set_content_type('application/json')->set_output(json_encode($this->data['estadoaceptacionxcolor']));
        } else {
            echo 1;
        }
    }

    function eliminaestadoaceptacion() {
        $this->load->model("Estadoaceptacion_model");
        $this->Estadoaceptacion_model->delete($this->input->post("idEstado"), $this->input->post("descripcion"));
    }

    function consultacolor() {
        $this->load->model("Estadoaceptacioncolor_model");
        $this->data["idDescripcion"] = $this->Estadoaceptacioncolor_model->consult($this->input->post("idColor"));
        $this->output->set_content_type('application/json')->set_output(json_encode($this->data['idDescripcion'][0]));
    }

    function eliminacolor() {
        $this->load->model("Estadoaceptacioncolor_model");
        $this->Estadoaceptacioncolor_model->delete($this->input->post("idColor"), $this->input->post("idEstado"));
    }

    function actualizarcolor() {
        $this->load->model("Estadoaceptacioncolor_model");
        $this->Estadoaceptacioncolor_model->update($this->input->post("editarNuevoColor"), $this->input->post("editarNuevoColorId"));
    }

    function guardarcolorxestado() {
        $this->load->model("Estadoaceptacioncolor_model");
        if (empty($this->Estadoaceptacioncolor_model->exist($this->input->post("estados"), $this->input->post("color")))) {
            $this->Estadoaceptacioncolor_model->create($this->input->post("estados"), $this->input->post("color"));
        } else {
            echo 1;
        }
    }

    function guardarclasificacionriesgo() {
        try {
            $this->load->model("Riesgoclasificacion_model");
            if (empty($this->Riesgoclasificacion_model->detailxcategoria($this->input->post('categoria')))) {
                $this->Riesgoclasificacion_model->create($this->input->post('categoria'));
                $categoria = $this->Riesgoclasificacion_model->detailandtipo();
                $i = array();
                foreach ($categoria as $c) {
                    $i[$c->rieCla_id][$c->rieCla_categoria][] = array(
                        $c->rieClaTip_id,
                        $c->rieClaTip_tipo
                    );
                }

                $this->output->set_content_type('application/json')->set_output(json_encode($i));
            } else {
                echo 1;
            }
        } catch (exception $e) {
            
        }
    }

    function guardartipocategoria() {

        try {
            $this->load->model("Riesgoclasificacion_model");
            $this->load->model("Riesgoclasificaciontipo_model");
            if (empty($this->Riesgoclasificaciontipo_model->exist($this->input->post("categoria"), $this->input->post("tipo")))) {
                if ($this->input->post("accion") == 1) {
                    $this->Riesgoclasificaciontipo_model->create(
                            $this->input->post("categoria"), $this->input->post("tipo")
                    );
                } else {
                    $this->Riesgoclasificaciontipo_model->modificarClasificacionTipo(
                            $this->input->post("categoria"), $this->input->post("tip_id"), $this->input->post("tipo"));
                }
                $categoria = $this->Riesgoclasificacion_model->detailandtipo();
                $i = array();
                foreach ($categoria as $c) {
                    $i[$c->rieCla_id][$c->rieCla_categoria][] = array(
                        $c->rieClaTip_id,
                        $c->rieClaTip_tipo
                    );
                }
                $this->output->set_content_type('application/json')->set_output(json_encode($i));
            } else {
                echo 1;
            }
        } catch (exception $e) {
            
        }
    }

    function consultatiporiesgoxclasificacion() {

        $this->load->model("Riesgoclasificaciontipo_model");
        $data = $this->Riesgoclasificaciontipo_model->tipoxcategoria($this->input->post("categoria"));
        $this->output->set_content_type('application/json')->set_output(json_encode($data));
    }

    function busquedariesgo() {
        $this->load->model("Riesgo_model");
        $planes = $this->Riesgo_model->filtrobusqueda(
                $this->input->post("cargo"), $this->input->post("categoria"), $this->input->post("dimensionuno"), $this->input->post("dimensiondos"), $this->input->post("tipo")
        );
        $i = array();
        if (count($planes) > 0) {
            foreach ($planes as $t) {
                $i["Json"][$t->rieCla_id][$t->rieCla_categoria][] = array(
                    "rie_id" => $t->rie_id,
                    "des2" => $t->des2,
                    "des1" => $t->des1,
                    "estado" => $t->estado,
                    "rie_zona" => $t->rie_zona,
                    "rie_descripcion" => $t->rie_descripcion,
                    "rie_fecha" => $t->rie_fecha,
                    "rieClaTip_tipo" => $t->rieClaTip_tipo,
                    "rieCol_colorhtml" => $t->rieCol_colorhtml,
                    "rie_actividad" => $t->rie_actividad
                );
            }
            $this->output->set_content_type('application/json')->set_output(json_encode($i));
        }else{
            echo 1;
        }
    }

    function eliminar_riesgos() {
        $this->load->model("Riesgo_model");
        $this->Riesgo_model->eliminar_riesgos($this->input->post());
    }
    function eliminar() {
        $this->load->model("Riesgoclasificacion_model");
        $this->Riesgoclasificacion_model->eliminar(
                $this->input->post('id')
        );
        $categoria = $this->Riesgoclasificacion_model->detailandtipo();
        $i = array();
        foreach ($categoria as $c) {
            $i[$c->rieCla_id][$c->rieCla_categoria][] = array(
                $c->rieClaTip_id,
                $c->rieClaTip_tipo
            );
        }

        $this->output->set_content_type('application/json')->set_output(json_encode($i));
    }

    function eliminarCategoria() {
        $this->load->model("Riesgoclasificacion_model");
        $this->Riesgoclasificacion_model->eliminarCategoria(
                $this->input->post('rieCla_id')
        );
        $categoria = $this->Riesgoclasificacion_model->detailandtipo();
        $i = array();
        foreach ($categoria as $c) {
            $i[$c->rieCla_id][$c->rieCla_categoria][] = array(
                $c->rieClaTip_id,
                $c->rieClaTip_tipo
            );
        }

        $this->output->set_content_type('application/json')->set_output(json_encode($i));
    }

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class User_model extends CI_Model {

    public function get_user($username, $pass) {
        try {
            $this->db->where('usu_usuario', $username);
            $this->db->where('usu_contrasena', $pass);
            $query = $this->db->get('user');
            return $query->result_array();
        } catch (exception $e) {
            
        }
    }

    public function listo_politica($username, $pass) {
        try {
            $this->db->set('usu_politicas', '1');
            $this->db->where('usu_email', $username);
            $this->db->where('usu_contrasena', $pass);
            $this->db->update('user');
        } catch (exception $e) {
            
        }
    }

    public function validacionusuario($iduser) {
        try {
            $this->db->where('usu_id', $iduser);
            $query = $this->db->get('user');
            return $query->result();
        } catch (exception $e) {
            
        }
    }

    function admin_inicio() {
        try {
            $this->db->where('ini_id', 1);
            $dato = $this->db->get('inicio');
            return $dato->result();
        } catch (exception $e) {
            
        }
    }

    function reset($mail) {
        try {
            $datos = rand(1000000, 8155555);
            $this->db->set('usu_contrasena', $datos);
            $this->db->where('usu_email', $mail);
            $this->db->update('user');
            return $datos;
        } catch (exception $e) {
            
        }
    }

    function actualizar($mail) {
        try {
            $this->db->set('usu_cambiocontrasena', 1);
            $this->db->where('usu_email', $mail);
            $this->db->get('user');
            return $datos;
        } catch (exception $e) {
            
        }
    }

    function create($data) {
        try {
            $this->db->insert_batch('user', $data);
            return $this->db->insert_id();
        } catch (exception $e) {
            
        }
    }

    function filteruser($apellido = null, $cedula = null, $estado = null, $nombre = null) {
        try {
            if (!empty($apellido))
                $this->db->where('usu_apellido', $apellido);
            if (!empty($cedula))
                $this->db->where('usu_cedula', $cedula);
            if (!empty($estado))
                $this->db->where('est_id', $estado);
            if (!empty($nombre))
                $this->db->where('usu_nombre', $nombre);

            $this->db->select("user.*");
            $this->db->select("ingreso.ing_fechaIngreso");
            $this->db->where("user.est_id != ", 3);
            $this->db->join("ingreso", "ingreso.usu_id = user.usu_id and ingreso.ing_fechaIngreso = (select max(ing_fechaIngreso) from ingreso )", "LEFT");
            $user = $this->db->get('user');
            return $user->result();
        } catch (exception $e) {
            
        }
    }

    function consultageneral() {
        try {
            $this->db->select("user.usu_id as id,user.*,ingreso.Ing_fechaIngreso as ingreso");
            $this->db->where("user.est_id != ", 3);
            $this->db->join("ingreso", "ingreso.usu_id = user.usu_id and ingreso.ing_fechaIngreso = (select max(ing_fechaIngreso) from ingreso ) ", "LEFT");
            $user = $this->db->get('user');
            return $user->result();
        } catch (exception $e) {
            
        }
    }

    function consultausuarioxid($id) {
        try {
            $this->db->where("usu_id", $id);
            $this->db->where("user.est_id != ", 3);
            $user = $this->db->get("user");
            return $user->result();
        } catch (exception $e) {
            
        }
    }

    function update($data, $id) {
        try {
            $this->db->where("usu_id", $id);
            $this->db->update("user", $data);
        } catch (exception $e) {
            
        }
    }

    function consultausuarioxcedula($cedula) {
        try {
            $this->db->where("usu_cedula", $cedula);
            $this->db->where("user.est_id != ", 3);
            $user = $this->db->get("user");
            return $user->result();
        } catch (exception $e) {
            
        }
    }

    function rolxdefecto($rol, $usu_id) {
        try {
            $this->db->where("usu_id", $usu_id);
            $this->db->set("rol_id", $rol);
            $this->db->update("user");
        } catch (exception $e) {
            
        }
    }

    function consultausuariosflechas($idUsuarioCreado, $metodo) {
        try {
            switch ($metodo) {
                case "flechaIzquierdaDoble":
                    $this->db->where("usu_id = (select min(usu_id) from user)");
                    break;
                case "flechaIzquierda":
                    $this->db->where("usu_id < '" . $idUsuarioCreado . "' ");
                    $this->db->order_by("usu_id desc");
                    break;
                case "flechaDerecha":
                    $this->db->where("usu_id > '" . $idUsuarioCreado . "' ");
                    $this->db->order_by("usu_id asc");
                    break;
                case "flechaDerechaDoble":
                    $this->db->where("usu_id = (select max(usu_id) from user)");
                    break;
                default :
                    die;
                    break;
            }
            $this->db->select("user.*");
            $this->db->select("concat(empleado.emp_nombre,' ',empleado.emp_apellidos) as nombre", false);
            $this->db->where("user.est_id != ", 3);
            $this->db->join("empleado", "empleado.emp_id = user.emp_id", "left");
            $usuario = $this->db->get("user", 1);
            return $usuario->result();
        } catch (exception $e) {
            
        }
    }

    function eliminarusuario($id) {
        try {
            $this->db->where("usu_id", $id);
            $this->db->set("est_id", "3");
            $this->db->update("user");
        } catch (exception $e) {
            
        }
    }

    function buscar_rol_usuario($post) {
        try {
            $this->db->select('count(usu_id) as usu_id ');
            $this->db->where('rol_id', $post['id']);
            $datos = $this->db->get('user');
            $datos = $datos->result();
            return $datos[0]->usu_id;
        } catch (exception $e) {
            
        }
    }

}

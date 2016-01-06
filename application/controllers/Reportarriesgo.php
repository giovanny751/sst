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
class Reportarriesgo extends CI_Controller {

    function __construct() {
        parent::__construct();
    }

    function reporteUsuario() {
        $this->load->view("reportarriesgo/reporteusuario");
    }

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
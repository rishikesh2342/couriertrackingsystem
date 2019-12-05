<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of CRUDController
 *
 * @author uday
 */
class MY_Controller extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->database();
        $this->load->helper('url');
        $this->load->library('ViewLoader');
     


        $this->check();
    }
    public function check() {
        if (!$this->session->userdata('userId')) {
            redirect(base_url());
        }
    }

}

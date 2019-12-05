<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class AdminController extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('form_validation');
        $this->load->library('ViewLoader');
    }

}
//https://www.youtube.com/watch?v=PLkoEr0k4VE&feature=youtu.be
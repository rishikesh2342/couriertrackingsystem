<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class LoginController extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->library('ViewLoader');
        $this->load->model('UserModel');
        $this->load->model('StaffModel');
        $this->load->model('dto/StaffDTO');
        $this->load->model('dto/UserDTO');
    }

    public function index() {
        $this->viewloader->login("register/index.php");
    }

    public function register() {
        $this->viewloader->load_login("register/index.php");
    }

    public function submitLogin() {
        $this->form_validation->set_rules('username', 'User Name', 'required');
        $this->form_validation->set_rules('password1', 'Password', 'required');
        if ($this->form_validation->run() == FALSE) {
            echo validation_errors();
        } else {
            $userName = $_POST['username'];
            $password = md5($_POST['password1']);
            if ($_POST['username'] === "admin" && $_POST['password1'] === "admin@123") {
                $query = $this->UserModel->getUserByUserNameAndPassword($userName, $password)->result();
                if (count($query) > 0) {
                    $this->session->set_userdata('userId', $query[0]->id);
                    $this->session->set_userdata('userName', $query[0]->name);
                    $this->session->set_userdata('userEmail', $query[0]->email);
                    $this->session->set_userdata('logIn', true);
                    echo '1';
                } else {
                    echo '0';
                }
            } else {
                $query = $this->StaffModel->getStaffByUserNameAndPassword($userName, $password)->result();
                if (count($query) > 0) {
                    $this->session->set_userdata('userId', $query[0]->id);
                    $this->session->set_userdata('userName', $query[0]->staff_name);
                    $this->session->set_userdata('userEmail', $query[0]->staff_email);
                    $this->session->set_userdata('logIn', true);
                    echo '1';
                } else {
                    echo '0';
                }
            }
        }
    }

    public function logout() {
        $this->session->unset_userdata('userId');
        $this->session->sess_destroy();
        $this->session->set_userdata('logIn', false);
        redirect(base_url());
        session_destroy();
    }

}

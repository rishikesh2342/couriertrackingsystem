<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class PageController extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('form_validation');
        $this->load->library('ViewLoader');
        $this->load->model('BranchModel');
        $this->load->model('ReciepentModel');
        $this->load->model('dto/ReciepenttDTO');
        $this->load->model('CourierModel');
        $this->load->model('dto/CourierDTO');
        $this->load->model('SenderModel');
        $this->load->model('dto/SenderDTO');
        $this->load->model('CourierHistoryModel');
        $this->load->model('StaffModel');
        $this->load->model('dto/CourierHistoryDTO');
        $this->load->library("pagination");
    }

    public function courier() {
        $this->viewloader->load_user("courier/addcourier.php");
    }

    public function dashboard() {
        $this->viewloader->load_user("dashboard/index.php");
    }

    public function profile() {
        $staffId = $this->session->userdata('userId');
        $staffDetails = $this->StaffModel->getStaffDetailsByStaffId($staffId)->result()[0];
        $data['staffDetails'] = $staffDetails;
        $this->viewloader->load_user("profile/profile.php", $data);
    }

    public function changePassword() {
        $this->viewloader->load_user("profile/changePassword.php");
    }

    public function addBranch() {
        $this->viewloader->load_user("branch/addBranch.php");
    }

    public function manageBranchWithPagination() {
        $config = array();
        $config["base_url"] = base_url('manageBranch');
        $config["total_rows"] = $this->BranchModel->get_count();
        $config["per_page"] = 5;
        $config["uri_segment"] = 2;
        $this->pagination->initialize($config);
        $page = ($this->uri->segment(2)) ? $this->uri->segment(2) : 0;
        $data["links"] = $this->pagination->create_links();
        $data['BranchList'] = $this->BranchModel->getAllBranchListByPagination($config["per_page"], $page)->result();
        $this->viewloader->load_user("branch/manageBranch.php", $data);
    }

    /*     * ********** function for view student***************** */

    public function manageBranch() {
        $limit = 5;
        $count = $this->BranchModel->get_count();
        $config["total_rows"] = $count;
        $config["per_page"] = $limit;
        $config['use_page_numbers'] = TRUE;
        $config['page_query_string'] = TRUE;
        $config['enable_query_strings'] = TRUE;
        $config['num_links'] = 5;
        $config['full_tag_open'] = "<ul class='pagination'>";
        $config['full_tag_close'] = "</ul>";
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = "<li class='disabled'><li class='active'><a href='#'>";
        $config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
        $config['next_tag_open'] = "<li>";
        $config['next_tagl_close'] = "</li>";
        $config['prev_tag_open'] = "<li>";
        $config['prev_tagl_close'] = "</li>";
        $config['first_tag_open'] = "<li>";
        $config['first_tagl_close'] = "</li>";
        $config['last_tag_open'] = "<li>";
        $config['last_tagl_close'] = "</li>";
        $config['first_url'] = '?per_page=1';
        $this->pagination->initialize($config);
        $str_links = $this->pagination->create_links();
        $links = explode('&nbsp;', $str_links);
        $offset = 0;
        if (!empty($_GET['per_page'])) {
            $pageNo = $_GET['per_page'];
            $offset = ($pageNo - 1) * $limit;
        }

        $count = $this->BranchModel->getAllBranchListByPagination($limit, $offset);
        $this->viewloader->load_user("branch/manageBranch.php", array(
            'BranchList' => $count->result(),
            'links' => $links,
            'offset' => $offset
        ));
    }

    public function addStaff() {
        $data['branchList'] = $this->BranchModel->getAllBranchList()->result();
        $this->viewloader->load_user("staff/addStaff.php", $data);
    }

    public function manageStaff() {
        $staffList = $this->StaffModel->getAllStaffList()->result();
        $this->viewloader->load_user("staff/manageStaff.php");
    }

    public function newCourier() {
        $this->viewloader->load_user("courier/newCourier.php");
    }

    public function Delivered() {
        $this->viewloader->load_user("courier/Delivered.php");
    }

    public function arrivedDestination() {
        $this->viewloader->load_user("courier/arrivedDestination.php");
    }

    public function courierPickup() {
        $this->viewloader->load_user("courier/courierPickup.php");
    }

    public function addCourier() {
        $this->viewloader->load_user("courier/addCourier.php");
    }

    public function intransit() {
        $this->viewloader->load_user("courier/intransit.php");
    }

    public function outofDelivery() {
        $this->viewloader->load_user("courier/outofDelivery.php");
    }

    public function shipped() {
        $this->viewloader->load_user("courier/shipped.php");
    }

    public function countWiseReport() {
        $this->viewloader->load_user("report/count-report-dates.php");
    }

    public function dateWiseReport() {
        $this->viewloader->load_user("report/dateWise-report.php");
    }

    public function salesReport() {
        $this->viewloader->load_user("report/sales-report.php");
    }

    public function searchCourier() {
        $this->viewloader->load_user("courier/searchCourier.php");
    }

    public function contactUs() {
        $this->viewloader->load("cantactUs/contact.php");
    }

    public function branch() {
        $data['Branches'] = $this->BranchModel->getAllBranchList()->result();
        $this->viewloader->load("branch/Branches.php", $data);
    }

    public function logIn() {
        $this->viewloader->load("register/login.php");
    }

    public function courierDetails() {
        $courierId = $_GET['courierId'];
        $data['senderDetails'] = $this->SenderModel->getSenderDetailsByCourierId($courierId)->result()[0];
        $data['reciepentDetails'] = $this->ReciepentModel->getReciepentDetailsByCourierId($courierId)->result()[0];
        $data['courierDetails'] = $this->CourierModel->getCourierDetailsByCourierId($courierId)->result()[0];
        $courierHistory = $this->CourierHistoryModel->getcourierHistoryDetailsByCourierId($courierId)->result();
        if (isset($courierHistory)) {
            $data['courierHistoryDetails'] = $courierHistory;
        }
        $this->viewloader->load_user("courier/courierDetails.php", $data);
    }

}

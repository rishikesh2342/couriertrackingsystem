<?php

defined('BASEPATH') OR exit('No direct script access allowed');
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of AjaxController
 *
 * @author uday
 */
class AjaxController extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('ViewLoader');
        $this->load->model('UserModel');
        $this->load->model('BranchModel');
        $this->load->model('StaffModel');
        $this->load->model('dto/UserDTO');
        $this->load->model('dto/BranchDTO');
        $this->load->model('dto/StaffDTO');
        $this->load->library("pagination");
    }

    public function userRegistration() {
        $userDTO = new UserDTO();
        $userDTO->name = $_POST['username'];
        $result = $this->UserModel->checkUserName($_POST['username'])->result();
        if ($result) {
            echo "Username already exist !";
        } else {
            $userDTO->email = $_POST['email'];
            $userDTO->mobile = $_POST['mobile'];
            $userDTO->password = md5($_POST['password1']);
            $userId = $this->UserModel->createUser($userDTO);
            if ($userId) {
                echo '1';
            } else {
                echo 'Invalid Details';
            }
        }
    }

    public function branchRegistration() {
        if ($_POST['branchId'] == "" && $_POST['branchId'] == NULL) {
            $branchDTO = new BranchDTO();
            $branchDTO->branch_name = $_POST['branchName'];
            $branchDTO->branch_contactnumber = $_POST['branchContactNumber'];
            $branchDTO->branch_email = $_POST['branchEmail'];
            $branchDTO->branch_address = $_POST['branchAddress'];
            $branchDTO->branch_state = $_POST['State'];
            $branchDTO->branch_city = $_POST['City'];
            $branchDTO->branch_pincode = $_POST['pincode'];
            $branchDTO->branch_country = $_POST['country'];
            $branch = $this->BranchModel->createBranch($branchDTO);
            if ($branch) {
                echo '1';
            } else {
                echo 'Invalid Branch';
            }
        } else {
            $branchDTO = new BranchDTO();
            $branchDTO->branch_id = $_POST['branchId'];
            $branchDTO->branch_name = $_POST['branchName'];
            $branchDTO->branch_contactnumber = $_POST['branchContactNumber'];
            $branchDTO->branch_email = $_POST['branchEmail'];
            $branchDTO->branch_address = $_POST['branchAddress'];
            $branchDTO->branch_state = $_POST['State'];
            $branchDTO->branch_city = $_POST['City'];
            $branchDTO->branch_pincode = $_POST['pincode'];
            $branchDTO->branch_country = $_POST['country'];
            $branch = $this->BranchModel->updateBranch($branchDTO);
            echo '2';
        }
    }

    public function registerStaff() {
        $staffDTO = new StaffDTO();
        $staffDTO->branch_id = $_POST['branchName'];
        $staffDTO->staff_name = $_POST['staffName'];
        $staffDTO->staff_contactnumber = $_POST['staffContactNumber'];
        $staffDTO->staff_email = $_POST['staffEmail'];
        $staffDTO->staff_password = md5($_POST['staffPassword']);
        $staff = $this->StaffModel->CreateStaff($staffDTO);
        if ($staff) {
            echo '1';
        } else {
            echo 'Invalid staff';
        }
    }

//    public function getAllBranchList() {
//        $config = array();
//        $config["base_url"] = base_url() . "manageBranch";
//        $config["total_rows"] = $this->BranchModel->get_count();
//        $config["per_page"] = 5;
//        $config["uri_segment"] = 2;
//
//        $this->pagination->initialize($config);
//
//        $page = ($this->uri->segment(2)) ? $this->uri->segment(2) : 0;
//
//        $data["links"] = $this->pagination->create_links();
//
//        $BranchList = $this->BranchModel->getAllBranchListByPagination($config["per_page"], $page)->result();
//        $count = 1;
//        foreach ($BranchList as $key => $branch) {
//            echo '<tr>
//                  <td>' . $count . '</td>
//                  <td>' . $branch->branch_name . '</td>
//                   <td>' . $branch->branch_contactnumber . '</td>
//                   <td>' . $branch->branch_email . '</td>
//                   <td><a type="button" href=" ' . base_url() . 'updateBranch?branchId=' . $branch->branch_id . '" class="btn bg-teal btn-circle-lg waves-effect waves-circle waves-float"  style="margin: 0px 5px 0px 5px;"><i class="zmdi zmdi-edit"></i></a>
//                       <a type="button" onclick="openconfirmDialogue(' . $branch->branch_id . ')" href="#" class="btn btn-danger btn-circle-lg waves-effect waves-circle waves-float"><i class="zmdi zmdi-delete"></i></a></td>
//            </tr>';
//            $count++;
//        }
//    }

    public function deleteBranch() {
        $branchId = $_GET['branchId'];
        $courier = $this->BranchModel->deleteBranchById($branchId);
        echo '1';
    }

    public function deleteStaff() {
        $staffId = $_GET['staffId'];
        $courier = $this->StaffModel->deleteStaffById($staffId);
        echo '1';
    }

    public function updateBranch() {
        $branchId = $_GET['branchId'];
        $branch = $this->BranchModel->getBranchNameByBranchId($branchId)->result()[0];
        $data['branchDetails'] = $branch;
        $this->viewloader->load_user("branch/addBranch.php", $data);
    }

    public function getAllStaffList() {
        $staffList = $this->StaffModel->getAllStaffList()->result();
        $count = 1;
        foreach ($staffList as $staff) {
            print_r($staff);
            $branchName = $this->BranchModel->getBranchNameByBranchId($staff->branch_id)->result();
            foreach ($branchName as $branch) {
                $brName = $branch->branch_name;
            }
            echo '<tr>
                  <td>' . $count . '</td>
                  <td>' . $brName . '</td>
                   <td>' . $staff->staff_name . '</td>
                   <td>' . $staff->staff_contactnumber . '</td>
                <td><a type="button" onclick="openconfirmDialogue( ' . $staff->id . ')" class="btn btn-danger btn-circle-lg waves-effect waves-circle waves-float"><i class="zmdi zmdi-delete"></i></a></td>
            </tr>';
            $count++;
        }
    }

}

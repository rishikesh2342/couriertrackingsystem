<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class StaffController extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('form_validation');
        $this->load->library('ViewLoader');
        $this->load->model('ReciepentModel');
        $this->load->model('dto/ReciepenttDTO');
        $this->load->model('CourierModel');
        $this->load->model('dto/CourierDTO');
        $this->load->model('SenderModel');
        $this->load->model('dto/SenderDTO');
        $this->load->model('CourierHistoryModel');
        $this->load->model('StaffModel');
        $this->load->model('dto/CourierHistoryDTO');
        $this->load->model('dto/StaffDTO');
    }

    public function updateProfileOfStaff() {
        $staffDTO = new StaffDTO();
        $staffDTO->staff_name = $_POST['username'];
        $staffDTO->staff_contactnumber = $_POST['mobile'];
        $staffDTO->staff_email = $_POST['email'];
        $updateStaff = $this->StaffModel->updateStaffProfile($staffDTO);
        echo '1';
    }

    public function updatePassword() {
        $staffDTO = new StaffDTO();
        $staffDTO->staff_password = md5($_POST['newPassword']);
        $updatePassword = $this->StaffModel->updatePasswordOfStaff($staffDTO);
        echo '1';
    }

    public function courierRegistration() {
        if ($_POST['courierId'] > 0) {
            $courierDTO = new CourierDTO();
            $courierDTO->courier_description = $_POST['courierDescription'];
            $courierDTO->parcel_price = $_POST['parcelPrice'];
            $courierDTO->id = $_POST['courierId'];
            $courierDTO->parcel_weight = $_POST['parcelWeight'];
            $courierDTO->parcel_height = $_POST['ParcelHeight'];
            $courierDTO->parcel_length = $_POST['ParcelLength'];
            $courierDTO->parcel_width = $_POST['ParcelWidth'];
            $courierDTO->courier_date = date("d/m/Y");
            $courierInfo = $this->CourierModel->updateCouriers($courierDTO);
            $senderDTO = new SenderDTO();
            $senderDTO->sender_branch = $_POST['senderBranch'];
            $senderDTO->sender_name = $_POST['senderName'];
            $senderDTO->courier_id = $_POST['courierId'];
            $senderDTO->sender_contactnumber = $_POST['senderContactNumber'];
            $senderDTO->sender_address = $_POST['senderAddress'];
            $senderDTO->sender_state = $_POST['senderState'];
            $senderDTO->sender_city = $_POST['senderCity'];
            $senderDTO->sender_country = $_POST['senderCountry'];
            $senderDTO->sender_pincode = $_POST['senderPincode'];
            $senderInfo = $this->SenderModel->updateSender($senderDTO);
            $reciepentDTO = new ReciepenttDTO();
            $reciepentDTO->reciepent_name = $_POST['reciepentName'];
            $reciepentDTO->reciepent_branch = $_POST['reciepentBranch'];
            $reciepentDTO->courier_id = $_POST['courierId'];
            $reciepentDTO->reciepent_contactnumber = $_POST['reciepentContactNumber'];
            $reciepentDTO->reciepent_address = $_POST['ReciepentAddress'];
            $reciepentDTO->reciepent_state = $_POST['ReciepentState'];
            $reciepentDTO->reciepent_city = $_POST['ReciepentCity'];
            $reciepentDTO->reciepent_country = $_POST['ReciepentCountry'];
            $reciepentDTO->reciepent_pincode = $_POST['ReciepentPincode'];
            $reciepentInfo = $this->ReciepentModel->updateReciepent($reciepentDTO);
            echo '1';
        } else {
            $courierDTO = new CourierDTO();
            $courierDTO->courier_description = $_POST['courierDescription'];
            $courierDTO->parcel_price = $_POST['parcelPrice'];
            $courierDTO->staff_id = $_POST['staff_Id'];
            $courierDTO->parcel_weight = $_POST['parcelWeight'];
            $courierDTO->parcel_height = $_POST['ParcelHeight'];
            $courierDTO->parcel_length = $_POST['ParcelLength'];
            $courierDTO->parcel_width = $_POST['ParcelWidth'];
            $courierDTO->courier_date = date("d/m/Y");
            $courierInfo = $this->CourierModel->saveCourier($courierDTO);
            $reference_num = "CTSA" . $courierInfo;
            $updatedata = [
                'refrence_number' => $reference_num
            ];
            $this->CourierModel->updatrefrenceCourier($courierInfo, $updatedata);
            $senderDTO = new SenderDTO();
            $senderDTO->sender_branch = $_POST['senderBranch'];
            $senderDTO->sender_name = $_POST['senderName'];
            $senderDTO->staff_id = $_POST['staff_Id'];
            $senderDTO->courier_id = $courierInfo;
            $senderDTO->sender_contactnumber = $_POST['senderContactNumber'];
            $senderDTO->sender_address = $_POST['senderAddress'];
            $senderDTO->sender_state = $_POST['senderState'];
            $senderDTO->sender_city = $_POST['senderCity'];
            $senderDTO->sender_country = $_POST['senderCountry'];
            $senderDTO->sender_pincode = $_POST['senderPincode'];
            $senderInfo = $this->SenderModel->saveSender($senderDTO);
            $reciepentDTO = new ReciepenttDTO();
            $reciepentDTO->reciepent_name = $_POST['reciepentName'];
            $reciepentDTO->reciepent_branch = $_POST['reciepentBranch'];
            $reciepentDTO->staff_id = $_POST['staff_Id'];
            $reciepentDTO->courier_id = $courierInfo;
            $reciepentDTO->reciepent_contactnumber = $_POST['reciepentContactNumber'];
            $reciepentDTO->reciepent_address = $_POST['ReciepentAddress'];
            $reciepentDTO->reciepent_state = $_POST['ReciepentState'];
            $reciepentDTO->reciepent_city = $_POST['ReciepentCity'];
            $reciepentDTO->reciepent_country = $_POST['ReciepentCountry'];
            $reciepentDTO->reciepent_pincode = $_POST['ReciepentPincode'];
            $reciepentInfo = $this->ReciepentModel->saveReciepent($reciepentDTO);
            if (count($senderInfo) > 0 && count($reciepentInfo) > 0 && count($courierInfo) > 0) {
                echo '1';
            } else {
                echo '0';
            }
        }
    }

    public function updateCourier() {
        $courierId = $_GET['courierId'];
        $courier = $this->CourierModel->getCourierByCourierId($courierId)->result()[0];
        $data['courierDetails'] = $courier;
        $this->viewloader->load_user("courier/addCourier.php", $data);
    }

    function getCourierList() {
        $staffId = $this->session->userdata('userId');
        $couriers = $this->CourierModel->getCourierDetails($staffId)->result();
        $count = 1;
        foreach ($couriers as $courier) {
            echo '<tr>
            <td>' . $count . '</td>
            <td>CTSA' . $courier->id . '</td>
            <td>' . $courier->sender_name . '</td>
            <td>' . $courier->reciepent_name . '</td>
            <td>' . $courier->courier_date . '</td>
            <td><a href=" ' . base_url() . 'courierDetails?courierId=' . $courier->id . '" class="btn btn-success btn-circle-lg waves-effect waves-circle waves-float"><i class="zmdi zmdi-eye"></i></a>'
            . '<a  href=" ' . base_url() . 'updateCourier?courierId=' . $courier->id . '"  type="button" class="btn bg-teal btn-circle-lg waves-effect waves-circle waves-float"  style="margin: 0px 5px 0px 5px;"><i class="zmdi zmdi-brush"></i></a>'
            . '<a type="button" class="btn btn-danger btn-circle-lg waves-effect waves-circle waves-float" onclick="openConfirmDialog(' . $courier->id . ')" href="#"><i class="zmdi zmdi-delete"></i></a></td>
            </tr>
            ';
            $count++;
        }
    }

    function deleteCourier() {
        $courierId = $_GET['courierId'];
        $courier = $this->CourierModel->deleteCourierById($courierId);
        echo '1';
    }

    function registerCourierStatus() {

        if ($_POST['courierHistoryId'] == "") {
            $CourierHistoryDTO = new CourierHistoryDTO();
            $CourierHistoryDTO->courier_id = $_POST['courierId'];
            $CourierHistoryDTO->remark = $_POST['remark'];
            $CourierHistoryDTO->status = $_POST['Status'];
            $CourierHistoryDTO->statusupdatedate = $_POST['statusUpdateDate'];
            $updateStatus = $this->CourierHistoryModel->saveCourierStatus($CourierHistoryDTO);
            echo '0';
        } else {
            $CourierHistoryDTO = new CourierHistoryDTO();
            $CourierHistoryDTO->courier_id = $_POST['courierId'];
            $CourierHistoryDTO->id = $_POST['courierHistoryId'];
            $CourierHistoryDTO->remark = $_POST['remark'];
            $CourierHistoryDTO->status = $_POST['Status'];
            $CourierHistoryDTO->statusupdatedate =date('d/m/Y');
            $updateStatus = $this->CourierHistoryModel->updateCourierStatus($CourierHistoryDTO);
            echo '1';
        }
    }

    function deleteCourierStatus() {
        $CourierStatus = $_GET['courierHistoryId'];
        $this->CourierHistoryModel->deleteCourierStatusById($CourierStatus);
        echo '1';
    }

    function getCourierListBySearch() {
        $searchKey = $_GET['searchbox'];
        $courierListBySearch = $this->CourierModel->findCourierBySearchKey($searchKey);
        $count = 1;
        foreach ($courierListBySearch as $courier) {
            echo '<tr>
            <td>' . $count . '</td>
            <td>' . $courier['refrence_number'] . '</td>
            <td>' . $courier['courier_description'] . '</td>
            <td>' . $courier['parcel_price'] . '</td>
            <td>' . $courier['courier_date'] . '</td>
           </tr>
            ';
            $count++;
        }
    }

    function getAllCourierHistoryList() {
        $courierId = $_GET['courierId'];
        $courierHistoryList = $this->CourierHistoryModel->getcourierHistoryDetailsByCourierId($courierId)->result();
        $count = 1;
        foreach ($courierHistoryList as $courierHistory) {
            echo '<tr>
            <td>' . $count . '</td>
            <td>' . $courierHistory->remark . '</td>
            <td>' . $courierHistory->status . '</td>
            <td>' . $courierHistory->statusupdatedate . '</td>
            <td>
                <a type="button" data-toggle="modal"  data-target="#statusModal"onclick="courierHistoryDetails(' . $courierHistory->id . ')" href="#" class="btn bg-teal btn-circle-lg waves-effect waves-circle waves-float"  style="margin: 0px 5px 0px 5px;"><i class="zmdi zmdi-brush"></i></a>
                <span onclick="openconfirmDialogue( ' . $courierHistory->id . ');" href="#" class="btn btn-danger btn-circle-lg waves-effect waves-circle waves-float"><i class="zmdi zmdi-delete"></i></span></td>
            </tr>
            ';
            $count++;
        }
    }

    public function editCourierHistorydetails() {
        $courierHistoryId = $_GET['courierHistoryId'];
        $data['courierHistory'] = $this->CourierHistoryModel->getCourierHistoryDetailsById($courierHistoryId)->result()[0];
        echo json_encode($data);
    }

    function getCourierListByStatus() {
        $Status = $_GET['status'];
        $courierStatus = $this->CourierHistoryModel->getCourierHistoryDetailsBystatus($Status)->result();
        $count = 1;
        foreach ($courierStatus as $Status) {
            $courierList = $this->CourierModel->getCourierByCourierId($Status->courier_id)->result();
            foreach ($courierList as $courier) {
                echo '<tr>
            <td>' . $count . '</td>
            <td>CTSA' . $courier->id . '</td>
            <td>' . $courier->sender_name . '</td>
            <td>' . $courier->reciepent_name . '</td>
            <td>' . $courier->courier_date . '</td>
            <td><a href=" ' . base_url() . 'courierDetails?courierId=' . $courier->id . '" class="btn btn-success btn-circle-lg waves-effect waves-circle waves-float"><i class="zmdi zmdi-eye"></i></a>'
                . '<a  href=" ' . base_url() . 'updateCourier?courierId=' . $courier->id . '"  type="button" class="btn bg-teal btn-circle-lg waves-effect waves-circle waves-float"  style="margin: 0px 5px 0px 5px;"><i class="zmdi zmdi-brush"></i></a>'
                . '<a type="button" class="btn btn-danger btn-circle-lg waves-effect waves-circle waves-float" onclick="openConfirmDialog(' . $courier->id . ')" href="#"><i class="zmdi zmdi-delete"></i></a></td>
            </tr>
            ';
                $count++;
            }
            $count++;
        }
    }

}

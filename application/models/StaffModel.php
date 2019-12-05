<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class StaffModel extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function CreateStaff(StaffDTO $staffDTO) {
        $this->db->insert('staff', $staffDTO);
        return $this->db->insert_id();
    }

    function getStaffByUserNameAndPassword($userName, $password) {
        $this->db->select('*');
        $this->db->from('staff');
        $this->db->where('staff_email', $userName);
        $this->db->where('staff_password', $password);
        return $this->db->get();
    }

    function getStaffDetailsByStaffId($staffId) {
        $this->db->select('*');
        $this->db->from('staff');
        $this->db->where('id', $staffId);
        return $this->db->get();
    }

    function deleteStaffById($staffId) {
        $this->db->where('id', $staffId);
        $this->db->delete('staff');
    }

    function updateStaffProfile(StaffDTO $staffDTO) {
        $valuesToUpdate = array(
            'staff_name' => $staffDTO->staff_name,
            'staff_contactnumber' => $staffDTO->staff_contactnumber,
            'staff_email' => $staffDTO->staff_email
        );
        $this->db->where('id', $this->session->userdata('userId'));
        $this->db->update('staff', $valuesToUpdate);
    }

    function updatePasswordOfStaff(StaffDTO $staffDTO) {
        $valuesToUpdate = array(
            'staff_password' => $staffDTO->staff_password,
        );
        $this->db->where('id', $this->session->userdata('userId'));
        $this->db->update('staff', $valuesToUpdate);
    }

    function getAllStaffList() {
        $this->db->select('*');
        $this->db->from('staff');
        return $this->db->get();
    }

}

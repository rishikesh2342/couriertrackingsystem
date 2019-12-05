<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class BranchModel extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function createBranch(BranchDTO $BranchDTO) {
        $this->db->insert('branch', $BranchDTO);
        return $this->db->insert_id();
    }
      public function get_count() {
        return $this->db->count_all('branch');
    }

    function getAllBranchListByPagination($limit, $start) {
        $this->db->select('*');
        $this->db->from('branch');
        $this->db->limit($limit, $start);
        return $this->db->get();
    }
    
    function getAllBranchList() {
        $this->db->select('*');
        $this->db->from('branch');
        return $this->db->get();
    }


    function getBranchNameByBranchId($branchId) {
        $this->db->select('*');
        $this->db->from('branch');
        $this->db->where('branch_id', $branchId);
        return $this->db->get();
    }
    function deleteBranchById($branchId) {
        $this->db->where('branch_id', $branchId);
        $this->db->delete('branch');
    }
    
    function updateBranch( BranchDTO $BranchDTO) {
          $valuesToUpdate = array(
            'branch_name' => $BranchDTO->branch_name,
            'branch_contactnumber' => $BranchDTO->branch_contactnumber,
            'branch_email' => $BranchDTO->branch_email,
            'branch_address' => $BranchDTO->branch_address,
            'branch_state' => $BranchDTO->branch_state,
            'branch_city' => $BranchDTO->branch_city,
            'branch_pincode' => $BranchDTO->branch_pincode,
            'branch_country' => $BranchDTO->branch_country
        );
        $this->db->where('branch_id', $BranchDTO->branch_id);
        $this->db->update('branch', $valuesToUpdate);
    }

}

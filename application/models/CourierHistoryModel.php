<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class CourierHistoryModel extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function saveCourierStatus(CourierHistoryDTO $CourierHistoryDTO) {
        $this->db->insert('courierhistory', $CourierHistoryDTO);
        return $this->db->insert_id();
    }

    function getcourierHistoryDetailsByCourierId($courierId) {
        $this->db->select('*');
        $this->db->from('courierhistory');
        $this->db->where('courier_id', $courierId);
        $this->db->order_by("id", "desc");
        return $this->db->get();
    }

    function updateCourierStatus(CourierHistoryDTO $CourierHistoryDTO) {
        $valuesToUpdate = array(
            'remark' => $CourierHistoryDTO->remark,
            'status' => $CourierHistoryDTO->status,
            'statusupdatedate' => $CourierHistoryDTO->statusupdatedate,
        );
        $this->db->where('id', $CourierHistoryDTO->id);
        $this->db->update('courierhistory', $valuesToUpdate);
    }

    function getCourierHistoryDetailsById($courierHistoryId) {
        $this->db->select('*');
        $this->db->from('courierhistory');
        $this->db->where('id', $courierHistoryId);
        return $this->db->get();
    }

    function getCourierHistoryDetailsBystatus($Status) {
        $this->db->select('*');
        $this->db->from('courierhistory');
        $this->db->where('status', $Status);
        $this->db->order_by("id", "desc");
        $this->db->limit(1);
        return $this->db->get();
    }

    function deleteCourierStatusById($id) {
        $this->db->where('id', $id);
        $this->db->delete('courierhistory');
    }

}

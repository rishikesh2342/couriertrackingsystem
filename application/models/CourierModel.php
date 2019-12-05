<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class CourierModel extends CI_Model {

    function saveCourier(CourierDTO $courierDTO) {
        $this->db->insert('courier', $courierDTO);
        return $this->db->insert_id();
    }

    function updateCouriers(CourierDTO $courierDTO) {
        $valuesToUpdate = array(
            'courier_description' => $courierDTO->courier_description,
            'parcel_weight' => $courierDTO->parcel_weight,
            'parcel_height' => $courierDTO->parcel_height,
            'parcel_length' => $courierDTO->parcel_length,
            'parcel_width' => $courierDTO->parcel_width,
            'parcel_price' => $courierDTO->parcel_price,
        );
        $this->db->where('id', $courierDTO->id);
        $this->db->update('courier', $valuesToUpdate);
    }

    function updatrefrenceCourier($id,$valuesToUpdate) {
        $this->db->where('id', $id);
        $this->db->update('courier', $valuesToUpdate);
    }

    function getCourierDetailsByCourierId($courierId) {
        $this->db->select('*');
        $this->db->from('courier');
        $this->db->where('id', $courierId);
        return $this->db->get();
    }

    function getCourierDetails($staffId) {
        $this->db->select('courier.id,sender.sender_name,reciepent.reciepent_name,courier.courier_date');
        $this->db->from('courier');
        $this->db->join('sender', 'courier.id=sender.courier_id');
        $this->db->join('reciepent', 'reciepent.courier_id=courier.id');
        $this->db->join('staff', 'staff.id=courier.staff_id');
        $this->db->where('staff.id', $staffId);
        return $this->db->get();
    }

    function getCourierByCourierId($courierId) {
        $this->db->select('*');
        $this->db->from('courier');
        $this->db->join('sender', 'courier.id=sender.courier_id');
        $this->db->join('reciepent', 'reciepent.courier_id=courier.id');
        $this->db->where('id', $courierId);
        return $this->db->get();
    }

    function updateStatus(CourierDTO $courierDTO) {
        $valuesToUpdate = array(
            'remark' => $courierDTO->remark,
            'status' => $courierDTO->status,
            'statusupdate_date' => $courierDTO->statusupdate_date,
        );
        $this->db->where('id', $courierDTO->id);
        $this->db->update('courier', $valuesToUpdate);
    }

    function deleteCourierById($courierId) {
        $this->db->where('id', $courierId);
        $this->db->delete('courier');
    }

    function findCourierBySearchKey($searchKey) {
        $queryBuilder = "select * FROM courier where refrence_number like '%" . $searchKey . "%'";
        $query = $this->db->query($queryBuilder);
        return $query->result_array();
    }

}

<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class ReciepentModel extends CI_Model {

    function saveReciepent(ReciepenttDTO $reciepentDTO) {
        $this->db->insert('reciepent', $reciepentDTO);
        return $this->db->insert_id();
    }

    function getReciepentDetailsByCourierId($courierId) {
        $this->db->select('*');
        $this->db->from('reciepent');
        $this->db->where('courier_id', $courierId);
        return $this->db->get();
    }
    function updateReciepent(ReciepenttDTO $reciepentDTO) {
        $valuesToUpdate = array(
            'reciepent_name' => $reciepentDTO->reciepent_name,
            'reciepent_branch' => $reciepentDTO->reciepent_branch,
            'reciepent_contactnumber' => $reciepentDTO->reciepent_contactnumber,
            'reciepent_address' => $reciepentDTO->reciepent_address,
            'reciepent_state' => $reciepentDTO->reciepent_state,
            'reciepent_city' => $reciepentDTO->reciepent_city,
            'reciepent_country' => $reciepentDTO->reciepent_country,
            'reciepent_pincode' => $reciepentDTO->reciepent_pincode,
        );
        $this->db->where('courier_id', $reciepentDTO->courier_id);
        $this->db->update('reciepent', $valuesToUpdate);
    }

}

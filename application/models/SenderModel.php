<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class SenderModel extends CI_Model {

    function saveSender(SenderDTO $senderDTO) {
        $this->db->insert('sender', $senderDTO);
        return $this->db->insert_id();
    }

    function getSenderDetailsByCourierId($courierId) {
        $this->db->select('*');
        $this->db->from('sender');
        $this->db->where('courier_id', $courierId);
        return $this->db->get();
    }
    function updateSender(SenderDTO $senderDTO) {
        $valuesToUpdate = array(
            'sender_name' => $senderDTO->sender_name,
            'sender_branch' => $senderDTO->sender_branch,
            'sender_contactnumber' => $senderDTO->sender_contactnumber,
            'sender_address' => $senderDTO->sender_address,
            'sender_state' => $senderDTO->sender_state,
            'sender_city' => $senderDTO->sender_city,
            'sender_country' => $senderDTO->sender_country,
            'sender_pincode' => $senderDTO->sender_pincode,
        );
        $this->db->where('courier_id', $senderDTO->courier_id);
        $this->db->update('sender', $valuesToUpdate);
   
    }

}

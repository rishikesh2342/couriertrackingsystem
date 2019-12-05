<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class UserModel extends CI_Model {
     function __construct() {
        parent::__construct();
    }
 function createUser(UserDTO $userDTO) {
        $this->db->insert('user', $userDTO);
        return $this->db->insert_id();
    }
     function checkUserName($userName) {
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where('name', $userName);
        return $this->db->get();
    }
     function getUserByUserNameAndPassword($userName, $password) {
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where('name', $userName);
        $this->db->where('password', $password);
        return $this->db->get();
    }
}
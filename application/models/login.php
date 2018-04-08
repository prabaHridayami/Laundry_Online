<?php
    class login extends CI_Model{
        function can_login($username, $password){
            $this->db->where('username', $username);
            $this->db->where('password', $password);
            $this->db->limit(1);

            $query = $this->db->get('member');

            if($query->row_array()>1){
                return $query->result();
            }else{
                return false;
            }
        }
    }
?>
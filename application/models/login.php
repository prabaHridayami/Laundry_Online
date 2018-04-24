<?php
    class login extends CI_Model{

        private $table = "member";
        private $pk = "id";

        public function __construct() {
            parent::__construct();
        }

        // ambil data dari database yang usernamenya $username dan passwordnya p$assword
        public function login($username, $password)
        {
            $this->db->where('username', $username);
            $this->db->where('password', md5($password));
            return $this->db->get($this->table);
        }
        
        // update user
        public function update($data, $id)
        {
            $this->db->where($this->pk, $id);
            $this->db->update($this->table, $data);
        }
            
        // ambil data berdasarkan cookie
        public function get_by_cookie($cookie)
        {
            $this->db->where('cookie', $cookie);
            return $this->db->get($this->table);
        }

        // function can_login($username, $password){
        //     $this->db->where('username', $username);
        //     $this->db->where('password', $password);
        //     $this->db->limit(1);

        //     $query = $this->db->get('member');

        //     if($query->row_array()>1){
        //         return $query->result();
        //     }else{
        //         return false;
        //     }
        // }

        // public function get_by_cookie($cookie){
        //     $this->db->where('login', $cookie);
        //     return $this->db->get($this->table);
        // }
    }
?>
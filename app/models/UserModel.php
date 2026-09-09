<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class UserModel extends Model {
    protected $table = 'users';

    public function get_user_by_username($username) {
        return $this->db->table($this->table)
                        ->where('username', $username)
                        ->get();
    }

    public function get_user_by_id($id) {
        return $this->db->table($this->table)
                        ->where('id', $id)
                        ->get();
    }

    public function create_user($data) {
        return $this->db->table($this->table)->insert($data);
    }
}
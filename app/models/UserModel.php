<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class UserModel extends Model {
    protected $table = 'users';

    // Retrieve user record by username
    public function get_user_by_username($username) {
        return $this->db->table($this->table)
                        ->where('username', $username)
                        ->get();
    }

    // Retrieve user record by primary key ID
    public function get_user_by_id($id) {
        return $this->db->table($this->table)
                        ->where('id', $id)
                        ->get();
    }

    // Insert new user
    public function create_user($data) {
        return $this->db->table($this->table)->insert($data);
    }
}
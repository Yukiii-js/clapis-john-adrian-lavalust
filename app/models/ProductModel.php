<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class ProductModel extends Model {
    protected $table = 'products';

    public function get_all_products() {
        return $this->db->table($this->table)->get_all();
    }

    public function get_product_by_id($id) {
        return $this->db->table($this->table)
                        ->where('id', $id)
                        ->get();
    }

    public function insert_product($data) {
        return $this->db->table($this->table)->insert($data);
    }

    public function update_product($id, $data) {
        return $this->db->table($this->table)
                        ->where('id', $id)
                        ->update($data);
    }

    public function delete_product($id) {
        return $this->db->table($this->table)
                        ->where('id', $id)
                        ->delete();
    }
}
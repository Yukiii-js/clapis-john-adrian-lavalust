<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class ProductModel extends Model {
    protected $table = 'products';

    // Read: Fetch all products
    public function get_all_products() {
        return $this->db->table($this->table)->get_all();
    }

    // Read: Fetch a single product by ID
    public function get_product_by_id($id) {
        return $this->db->table($this->table)
                        ->where('id', $id)
                        ->get();
    }

    // Create: Insert product
    public function insert_product($data) {
        return $this->db->table($this->table)->insert($data);
    }

    // Update: Modify product record
    public function update_product($id, $data) {
        return $this->db->table($this->table)
                        ->where('id', $id)
                        ->update($data);
    }

    // Delete: Remove product record
    public function delete_product($id) {
        return $this->db->table($this->table)
                        ->where('id', $id)
                        ->delete();
    }
}
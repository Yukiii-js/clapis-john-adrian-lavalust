<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class ProductController_lab6 extends Controller {
    public function __construct() {
        parent::__construct();
        $this->call->library('api');
        $this->call->model('Product_model');
        $this->call->model('Auth_model');
    }

    public function index() {
        $this->authenticate();
        $products = $this->Product_model->get_all();
        return $this->api->respond(['status' => true, 'data' => $products], 200);
    }

    public function show($id) {
        $this->authenticate();
        $product = $this->Product_model->get_by_id($id);
        if ($product) {
            return $this->api->respond(['status' => true, 'data' => $product], 200);
        }
        return $this->api->respond(['status' => false, 'message' => 'Product not found'], 404);
    }


    public function create() {
        $this->authenticate();
        $data = json_decode(file_get_contents('php://input'), true);

        $insertData = [
            'product_name' => $data['product_name'] ?? '',
            'description'  => $data['description'] ?? '',
            'price'        => $data['price'] ?? 0.00,
            'quantity'     => $data['quantity'] ?? 0,
        ];

        if ($this->Product_model->insert($insertData)) {
            return $this->api->respond(['status' => true, 'message' => 'Product created successfully'], 201);
        }
        return $this->api->respond(['status' => false, 'message' => 'Failed to create product'], 500);
    }


    public function update($id) {
        $this->authenticate();
        $data = json_decode(file_get_contents('php://input'), true);

        $updateData = [
            'product_name' => $data['product_name'],
            'description'  => $data['description'],
            'price'        => $data['price'],
            'quantity'     => $data['quantity'],
        ];

        if ($this->Product_model->update($id, $updateData)) {
            return $this->api->respond(['status' => true, 'message' => 'Product updated successfully'], 200);
        }
        return $this->api->respond(['status' => false, 'message' => 'Failed to update product'], 500);
    }

   
    public function delete($id) {
        $this->authenticate();
        if ($this->Product_model->delete($id)) {
            return $this->api->respond(['status' => true, 'message' => 'Product deleted successfully'], 200);
        }
        return $this->api->respond(['status' => false, 'message' => 'Failed to delete product'], 500);
    }
}
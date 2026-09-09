<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class ProductController extends Controller {

    public function __construct() {
        parent::__construct();
        $this->call->library('session');
        $this->call->model('ProductModel'); // Load ProductModel
        
        // Protect endpoints: Redirect unauthenticated users
        if (!$this->session->has_userdata('logged_in')) {
            redirect('/login');
            exit;
        }
    }

    // Read: Display all products
    public function index() {
        $data['products'] = $this->ProductModel->get_all_products();
        $this->call->view('products/index', $data);
    }

    // Create: Render add form
    public function create() {
        $this->call->view('products/create');
    }

    // Create: Save new record
    public function store() {
        $data = [
            'product_name' => $this->io->post('product_name'),
            'description'  => $this->io->post('description'),
            'price'        => $this->io->post('price'),
            'quantity'     => $this->io->post('quantity')
        ];

        $this->ProductModel->insert_product($data);
        redirect('/products');
    }

    // Update: Render edit form with pre-filled data
    public function edit($id) {
        $data['product'] = $this->ProductModel->get_product_by_id($id);
        $this->call->view('products/edit', $data);
    }

    // Update: Process changes
    public function update($id) {
        $data = [
            'product_name' => $this->io->post('product_name'),
            'description'  => $this->io->post('description'),
            'price'        => $this->io->post('price'),
            'quantity'     => $this->io->post('quantity')
        ];

        $this->ProductModel->update_product($id, $data);
        redirect('/products');
    }

    // Delete: Remove product record
    public function delete($id) {
        $this->ProductModel->delete_product($id);
        redirect('/products');
    }
}
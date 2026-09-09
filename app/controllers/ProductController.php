<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class ProductController extends Controller {

    public function __construct() {
        parent::__construct();
        $this->call->library('session');
        $this->call->model('ProductModel'); 
       
        if (!$this->session->has_userdata('logged_in')) {
            redirect('/login');
            exit;
        }
    }

    public function index() {
        $data['products'] = $this->ProductModel->get_all_products();
        $this->call->view('products/index', $data);
    }

    public function create() {
        $this->call->view('products/create');
    }

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

    public function edit($id) {
        $data['product'] = $this->ProductModel->get_product_by_id($id);
        $this->call->view('products/edit', $data);
    }

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

    public function delete($id) {
        $this->ProductModel->delete_product($id);
        redirect('/products');
    }
}
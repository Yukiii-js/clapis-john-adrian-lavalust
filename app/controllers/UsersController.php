<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class UsersController extends Controller {

    public function index() {
        // 1. Load the Users Model[span_27](start_span)[span_27](end_span)
        $this->call->model('UsersModel');
        
        // 2. Fetch all users using the all() method
        $data['users'] = $this->UsersModel->all();
        
        // 3. Pass retrieved records to the view
        $this->call->view('users_view', $data);
    }
}
<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class AuthController_lab6 extends Controller {
    public function __construct() {
        parent::__construct();
        $this->call->library('api');
        $this->call->model('Auth_model'); 
    }

    public function login() {
    $data = json_decode(file_get_contents('php://input'), true);
    $username = $data['username'] ?? '';
    $password = $data['password'] ?? '';

  
    $user = $this->db->table('users')->where('username', $username)->get();

    if ($user && password_verify($password, $user['password'])) {
   
        $token = $this->api->generate_token($user['id']);

        return $this->api->respond([
            'status' => true,
            'message' => 'Login successful',
            'token' => $token
        ], 200);
    }

    return $this->api->respond([
        'status' => false,
        'message' => 'Invalid username or password'
    ], 401);
}

    private function authenticate() {
    $headers = getallheaders();
    $authHeader = $headers['Authorization'] ?? $headers['authorization'] ?? '';

    if (preg_match('/Bearer\s(\S+)/', $authHeader, $matches)) {
        $token = $matches[1];
        if ($this->Auth_model->check_token($token)) {
            return true;
        }
    }

    $this->api->respond(['status' => false, 'message' => 'Unauthorized access'], 401);
    exit();
}
}
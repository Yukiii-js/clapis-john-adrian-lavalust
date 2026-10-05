<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class AuthController_lab6 extends Controller {
    public function __construct() {
        parent::__construct();
        $this->call->library('api');
        $this->call->model('Auth_model'); 
    }

    public function login() {
        $raw = file_get_contents('php://input');
        $data = json_decode($raw, true);

        $username = $data['username'] ?? '';
        $password = $data['password'] ?? '';

        $user = $this->Auth_model->verify_user($username, $password);

        if ($user) {
            $token = base64_encode(random_bytes(32));
            $this->Auth_model->save_token($user['id'], $token);

            return $this->api->respond([
                'status' => true,
                'message' => 'Login successful',
                'token' => $token,
                'user' => [ 'id' => $user['id'], 'username' => $user['username'] ]
            ], 200);
        }

        return $this->api->respond([
            'status' => false,
            'message' => 'Invalid credentials'
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
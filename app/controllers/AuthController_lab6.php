<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class AuthController_lab6 extends Controller {
    public function __construct() {
        parent::__construct();
        $this->call->library('api');
        $this->call->model('UserModel');
    }

    public function login() {
        $data = $this->read_json_body();
        $username = trim((string) ($data['username'] ?? ''));
        $password = (string) ($data['password'] ?? '');
        $user = $this->UserModel->get_user_by_username($username);

        if ($user && password_verify($password, $user['password'])) {
            $tokens = $this->api->issue_tokens([
                'id' => $user['id'],
                'role' => $user['role'],
            ]);

            $this->api->respond([
                'status' => true,
                'message' => 'Login successful',
                'user' => [
                    'id' => $user['id'],
                    'username' => $user['username'],
                    'email' => $user['email'],
                    'role' => $user['role'],
                ],
                'tokens' => $tokens,
            ], 200);
        }

        $this->api->respond([
            'status' => false,
            'message' => 'Invalid username or password',
        ], 401);
    }

    public function register() {
        $data = $this->read_json_body();
        $username = trim((string) ($data['username'] ?? ''));
        $email = trim((string) ($data['email'] ?? ''));
        $password = (string) ($data['password'] ?? '');

        if ($username === '' || strlen($username) > 100) {
            $this->api->respond_error('A username of 1 to 100 characters is required.', 422);
        }

        if (!filter_var($email, FILTER_VALIDATE_EMAIL) || strlen($email) > 255) {
            $this->api->respond_error('A valid email address is required.', 422);
        }

        if (strlen($password) < 8) {
            $this->api->respond_error('Password must be at least 8 characters long.', 422);
        }

        if ($this->UserModel->get_user_by_username($username)
            || $this->UserModel->get_user_by_email($email)) {
            $this->api->respond_error('Username or email is already registered.', 409);
        }

        $created = $this->UserModel->create_user([
            'username' => $username,
            'email' => $email,
            'password' => password_hash($password, PASSWORD_DEFAULT),
            'role' => 'user',
        ]);

        if (!$created) {
            $this->api->respond_error('Unable to create the account.', 500);
        }

        $this->api->respond([
            'status' => true,
            'message' => 'Account created successfully.',
            'user' => [
                'username' => $username,
                'email' => $email,
                'role' => 'user',
            ],
        ], 201);
    }

    private function read_json_body() {
        $body = file_get_contents('php://input');
        $data = json_decode($body, true);

        if (!is_array($data)) {
            $this->api->respond_error('Request body must be a valid JSON object.', 400);
        }

        return $data;
    }
}
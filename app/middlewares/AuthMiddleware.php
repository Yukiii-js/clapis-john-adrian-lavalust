<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class AuthMiddleware implements MiddlewareInterface {
    public function run() {
        $lava = &get_instance();
        $lava->call->library('session');
        
        if (!$lava->session->has_userdata('logged_in')) {
            redirect('/login');
            exit;
        }
    }
}
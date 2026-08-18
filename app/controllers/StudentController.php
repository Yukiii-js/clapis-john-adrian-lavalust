<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

/**
 * Controller: StudentController
 * 
 * Automatically generated via CLI.
 */
class StudentController extends Controller {

    public $student = [
        'student_id' => '2024-01761',
        'name' => 'John Adrian Clapis',
        'course' => 'BSIT',
        'year' => '3rd Year',
        'section' => 'F2',
        'email' => 'johnclapis24@gmail.com'
    ];

    

    public function __construct()
    {
        parent::__construct();
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
    }

    public function index()
    {
        $_SESSION['student_access'] = true;
        $this->call->view('index');
    }

    public function profile()
    {
        $data['student'] = $this->student;
        $this->call->view('profile', $data);
    }
}
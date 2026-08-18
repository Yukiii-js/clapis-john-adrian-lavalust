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

    public function index()
    {
        $this->call->view('index');
    }

    public function profile()
    {
        $data['student'] = $this->student;
        $this->call->view('profile', $data);
    }

    public function __construct()
    {
        parent::__construct();
    }
}
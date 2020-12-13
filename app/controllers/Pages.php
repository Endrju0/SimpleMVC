<?php
    class Pages extends Controller {
        public function __construct() {

        }

        // Index method is mandatory
        // call_user_func_array() expects parameter 1 to be a valid callback
        public function index() {
            $this->view('pages/index', ['title' => 'Welcome']);
        }

        public function about() {
            $this->view('pages/about', ['title' => 'About']);
        }
    }
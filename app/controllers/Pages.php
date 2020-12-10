<?php
    class Pages {
        public function __construct() {

        }

        // Index method is mandatory
        // call_user_func_array() expects parameter 1 to be a valid callback
        public function index() {

        }

        public function about($param) {
            echo 'Test ' . $param;
        }
    }
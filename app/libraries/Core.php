<?php
    /**
     * App core class
     * Created URL & loads core controller
     * URL format: /controller/method/params
     */
    class Core {
        protected $currentController = 'Pages';
        protected $currentMethod = 'index';
        protected $params = [];

        /**
         * Calls the controller with selected methods and params
         */
        public function __construct() {
            $url = $this->getUrl();
            
            // Look in controllers for first value
            if(file_exists('../app/controllers/'. ucwords($url[0]) .'.php')) {
                //  If exists, set as controller
                $this->currentController = ucwords($url[0]);

                // Unset 0 idx
                unset($url[0]);
            }

            // Require the ctrl
            require_once '../app/controllers/' . $this->currentController . '.php';

            // Instantiate controller class
            $this->currentController = new $this->currentController;

            // Check for second part of URL
            if(isset($url[1])) {
                // Check to see if method exists in controller
                if(method_exists($this->currentController, $url[1])) {
                    $this->currentMethod = $url[1];
                    
                    // Unset 1 idx
                    unset($url[1]);
                }
            }
            
            // Get params
            $this->params = $url ?  array_values($url) : [];

            // Call a callback with array of params f.e. ['Pages', 'about'], [2])
            call_user_func_array([$this->currentController, $this->currentMethod], $this->params);
        }

        /**
         * Trims and assigns URL to controller, method and params
         */
        public function getUrl() {
            if(isset($_GET['url'])) {
                $url = rtrim($_GET['url'], '/');
                $url = filter_var($url, FILTER_SANITIZE_URL);
                $url = explode('/', $url);
                return $url;
            }
        }
    }
<?php
class App {
    protected $controller = 'AuthController';
    protected $method = 'login';
    protected $params = [];
    
    public function __construct() {
        $url = $this->parseUrl();
        
        // Check if controller exists
        if (isset($url[0]) && !empty($url[0])) {
            $controllerName = ucfirst($url[0]) . 'Controller';
            if (file_exists("../app/controllers/{$controllerName}.php")) {
                $this->controller = $controllerName;
                unset($url[0]);
            }
        }
        
        // Include controller
        require_once "../app/controllers/{$this->controller}.php";
        $this->controller = new $this->controller;
        
        // Determine method
        if (isset($url[1]) && !empty($url[1])) {
            if (method_exists($this->controller, $url[1])) {
                $this->method = $url[1];
                unset($url[1]);
            }
        } else {
            // Default methods based on controller type
            if (is_a($this->controller, 'DashboardController')) {
                $this->method = 'index';
            } elseif (is_a($this->controller, 'AuthController')) {
                $this->method = 'login';
            } elseif (is_a($this->controller, 'ExamController')) {
                $this->method = 'index';
            }
        }
        
        // Get parameters
        $this->params = !empty($url) ? array_values($url) : [];
        
        // Call the method
        call_user_func_array([$this->controller, $this->method], $this->params);
    }
    
    private function parseUrl() {
        if (isset($_GET['url'])) {
            $url = rtrim($_GET['url'], '/');
            $url = filter_var($url, FILTER_SANITIZE_URL);
            return explode('/', $url);
        }
        return [];
    }
}
?>
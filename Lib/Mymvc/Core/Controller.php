<?php

namespace Mymvc\Core;

class Controller extends View {
   
    protected $appConfig;

    public function __construct() {
        
        parent::__construct();
        $this->appConfig = $db = \Mymvc\Config\Repository::get('app');
        $this->parseUri();
    }
    
    protected function parseUri() {
      
        $path = trim(parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH), "/");
        $path = preg_replace('/[^a-zA-Z0-9]\//', "", $path);
        
        
        @list($controller, $action, $params) = explode("/", $path, 3);

        if (!empty($controller)) {
            $this->setController($controller);
        } else {
            $this->setController($this->appConfig['default_controller']);
        }

        if (!empty($action)) {
            $this->setAction($action);
        } else {
            $this->setAction($this->appConfig['default_action']);
        }

        if (!empty($params)) {
            $this->setParams(explode("/", $params));
        }
        
    }
    
    public function setController($controller) {
        $controller = ucfirst(strtolower($controller)) . "Controller";
        
        //@todo:this neeed to be changed to load dynamically.
        $controller = "\\App\\Controllers\\" . $controller;
        if (!class_exists($controller)) {
            throw new InvalidArgumentException(
                "The action controller '$controller' has not been defined.");
        }
    
        $this->controller = $controller;
        return $this;
    }
    
    public function setAction($action) {
        if (!method_exists( $this->controller ,$action)) {
            throw new InvalidArgumentException(
                "The controller action '$action' has been not defined.");
        }
        $this->action = $action;
        return $this;
    }
    
    public function setParams(array $params) {
        $this->params = $params;
        return $this;
    }
    
    public function run() {
        call_user_func_array(array(new $this->controller, $this->action), $this->params);
    }
    
    protected function redirect($url) {
        header("Location: $url");
    }

}

<?php

namespace Mymvc\Core;

class View {
    
    protected $controller;
    protected $action;
    protected $params = [];
    protected $template = null;

    public function __construct() {
        
    }

    /**
     * Safely escape/encode the provided data.
     */
    public function h($data) {
        return htmlspecialchars((string) $data, ENT_QUOTES, 'UTF-8');
    }

    /**
     * Render the template, returning it's content.
     * @param array $data Data made available to the view.
     * @return string The rendered template.
     */
    public function render($template, array $data) {
        extract($data);

        ob_start();
        
        include( APPPATH . DIRECTORY_SEPARATOR . 'Views' .  DIRECTORY_SEPARATOR . $template . '.php');
        $content = ob_get_contents();
        ob_end_clean();
        echo $content;
    }
    
}

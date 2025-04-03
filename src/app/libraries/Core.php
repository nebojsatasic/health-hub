<?php

/**
 * App Core Class
 * Creates URL and loads core controller
 * URL Format - /controller/method/params
 */
class Core
{
    protected $currentController = 'Pages';
    protected $currentMethod = 'index';
    protected $params = [];

    /**
     * Core constructor
     * Set controller, method and params using GET parameter 'url'.
     * If GET parameter 'url' is not set, the default controller and method are called.
     * 
     * @return void
     */
    public function __construct()
    {
        $url = $this->getUrl();

        // Set the controller
        if (isset($url[0])) {
            if (file_exists('../app/controllers/' . ucwords($url[0]) . '.php')) {
                $this->currentController = ucwords($url[0]);
                unset($url[0]);
            }
        }

        // Load the controller
        require_once '../app/controllers/' . $this->currentController . '.php';

        // Instantiate controller class
        $this->currentController = new $this->currentController();

        // Set the method
        if (isset($url[1])) {
            if (method_exists($this->currentController, $url[1])) {
                $this->currentMethod = $url[1];
                unset($url[1]);
            }
        }

        // Get parameters
        $this->params = $url ? array_values($url) : [];

        // Call a callback with array of parameters
        call_user_func_array([$this->currentController, $this->currentMethod], $this->params);
    }

    /**
     * Get parameter 'url' and explode it.
     * 
     * @return array
     */
    public function getUrl()
    {
        if (isset($_GET['url'])) {
            $url = rtrim($_GET['url'], '/');
            $url = filter_var($url, FILTER_SANITIZE_URL);
            $url = explode('/', $url);
            return $url;
        }
    }
}

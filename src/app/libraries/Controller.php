<?php

/**
 * Base Controller
 * Loads the models and views
 */
class Controller
{
    /**
     * Load and instantiate model
     * 
     * @param string $model
     * @return object
     */
    public function model ($model)
    {
require_once '../app/models/' . $model . '.php';

return new $model();
    }

    /**
     * Load view and send data to it.
     * 
     * @param string $view
     * @param array $data
     */
    public function view($view, $data =[])
    {
        if (file_exists('../app/views/' . $view . '.php')) {
            require_once '../app/views/' . $view . '.php';
        } else {
            die('View does not exist');
        }
    }
}
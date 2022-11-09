<?php
/* Base Controller loads the models and views*/

class Controller
{
    public function __construct()
    {
    }
    public function model($model)
    {
        //require model file
        require_once '../app/models/' . $model . '.php';

        return new $model();
    }

    //load view
    public function view($view, $data = [])
    {
        //check for the view file
        if (file_exists('../app/views/' . $view . '.php')) {
            require_once '../app/views/' . $view . '.php';
        }
        else{
            //view doesnot exists
            die('View doesnot exit');
        }
    }
    
}

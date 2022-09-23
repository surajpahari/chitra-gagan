<?php
//Core class of the app
//Creates URL and loads core controller
//URL Format - /controller/methods/param

class Core
{
    protected $current_controller = 'Pages';
    protected $current_method = 'index';

    public function __construct()
    {
        $url = $this->get_url();

        //look in controller for first  value
        // as first value of the url is controller


        if (isset($url)) {
            if (file_exists('../app/controllers/' . ucwords($url[0]) . '.php')) {
                //if controller exists set it the current_controller */
                $this->current_controller = ucwords($url[0]);
                //usets the url[0]
                unset($url[0]);
            }
            //require the controller
            require_once '../app/controllers/' . $this->current_controller . '.php';
            $this->current_controller = new $this->current_controller;
        }
        //check for the second part of the url 
        if(isset($url[1])){
            //check to see if method exists in controller
            if(method_exists($this->current_controller,$url[1])){
                $this->current_method = $url [1];
            }
        }

        echo $this->current_method;
    }


    /*function to check url
    *separate url by '/' sign and filter url content
    *return them in the array*/
    public function get_url()
    {
        if (isset($_GET['url'])) {
            $url = rtrim($_GET['url'], '/');
            //filters the illegal url characters
            $url = filter_var($url, FILTER_SANITIZE_URL);
            $url = explode('/', $url);

            return $url;
        }
    }
}

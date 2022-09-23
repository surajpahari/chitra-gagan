<?php
//Core class of the app
//Creates URL and loads core controller
//URL Format - /controller/methods/param

class Core{
    protected $current_controller = 'Pages';
    protected $current_method = 'index';

    public function __construct(){
       $url = $this->get_url();

        //look in controller for first  value
    
        if(file_exists('../app/controllers/'.ucwords($url[0]).'.php')){
            $this->current_controller = ucwords($url[0]);
        }
    }


    /*function to check url
    *separate url by '/' sign and filter url content
    *return them in the array*/
    public function get_url(){
        if(isset($_GET['url'])){
            $url=rtrim($_GET['url'],'/');
            //filters the illegal url characters
            $url = filter_var($url,FILTER_SANITIZE_URL);
            $url = explode('/',$url);

            return $url;
        }
    }

}
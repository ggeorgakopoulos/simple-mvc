<?php

class App
{
    //Set default controller method and params
    protected $controller = "error";
    protected $method = "index";
    protected $params = [];


    public function __construct()
    {
        //get an arrray out of the $_GET['url']
        $url = $this->splitUrl();

        //check if the controller that has been requested exists
        if( file_exists("../app/Controllers/{$url[0]}.php") ) {
            $this->controller = $url[0];
            unset($url[0]);
            require_once "../app/Controllers/{$this->controller}.php";

        } else if( $url[0] == '' ) {
            $this->controller = "home";
            require_once "../app/Controllers/{$this->controller}.php";

        } else {
            require_once "../app/Controllers/{$this->controller}.php";
        }

        //Instantiating the controller class
        $this->controller = new $this->controller;

        //checking if method exists
        if( isset($url[1]) ) {
            if( method_exists($this->controller, $url[1]) ) {
                $this->method = $url[1];
                unset($url[1]);
            }
        }

        //Setting the params value
        $this->params = $url ? array_values($url) : [];

        //Run the function within the controller, passing in the parameters
        call_user_func_array( [$this->controller, $this->method], $this->params );

    }

    //Splits the $_GET['url'] by exploding with /
    public function splitUrl()
    {
        if( isset($_GET['url']) ) {
            return explode( '/', filter_var( rtrim($_GET['url'], '/'), FILTER_SANITIZE_URL) );
        }
    }
}

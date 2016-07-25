<?php


class Home extends Controller
{
    public function index(){
        $this->view( 'home/index', ['header.base', 'footer.base'] );
    }
}
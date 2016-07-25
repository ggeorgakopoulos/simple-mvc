<?php

class Error extends Controller
{
    public function index() {
        $this->view( 'error/index', ['header.base', 'footer.base'] );
    }
}
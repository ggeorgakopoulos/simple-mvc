<?php

class Users extends Controller
{
    public function index() {
        header("Location: " . PATH . "users/login");
    }

    public function login() {
        $this->view( 'users/login', ['header.base', 'footer.base'] );
    }
}

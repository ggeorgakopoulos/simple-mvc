<?php


class Controller
{

    //Requiring a new Model - This function return object
    public function model($model) {
        require_once "../app/Models/$model.php";
        return new $model;
    }

    //Requiring a view, alogn with custom header and footer
    public function view($view, array $inc = null, array $data = null) {
        if ($inc != null) {
            require_once "assets/inc/$inc[0].php";
            require_once "../app/views/$view.php";
            require_once "assets/inc/$inc[1].php";
        } else {
            require_once "../app/views/$view.php";
        }
    }

}

<?php
namespace core;

class Models{

    public function get_model($model)
    {
        return New $model();
    }

}
<?php
namespace core;

class Models{

    public function get_model($model)
    {
        $model = 'app' . DS . 'models' . DS . ucwords($model);
        return new $model();
    }

}
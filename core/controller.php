<?php 
class Controller{
    protected $_view;
    protected $_model;
   
    public function __construct()
    {
        $this->_view = new Views();
        $this->_model = new Models();   
    }

    
}
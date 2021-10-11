<?php

namespace core {

    class Controller
    {
        protected $_view = null;
        protected $_model = null;

        public function __construct()
        {
            $this->_model = new \core\Models();
            $this->_view = new \core\Views();
        }
    }
}

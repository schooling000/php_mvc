<?php

namespace app\controller{

    class Dang_nhap extends \core\Controller
    {

        public function __constructor()
        {
            parent::__constructor();
        }

        public function xem_dang_nhap()
        {
           $this->_view->render('dang_nhap/dang_nhap');
        }
    }
}

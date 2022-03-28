<?php

namespace app\controller {

    class Lich_mo extends \core\Controller
    {

        public function __construct()
        {
            $this->view = $this->setView('lich_mo', 'layout');
        }

        public function lich_mo()
        {
            echo 'trang lich mo';
        }
    }
}

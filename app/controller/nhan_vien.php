<?php
namespace app\controller{
    class Nhan_vien extends \core\Controller{

        public function __construct(&$db, &$message, &$user)
        {
            parent::__construct($db, $message, $user);
            $this->model = $this->setModel('nhan_vien', $db);
            $this->view  = $this->setView('nhan_vien', DEFAULT_LAYOUT);

            
        }

        public function xem_trang($data = array())
        {
            $this->view->render();
        }

    }
}
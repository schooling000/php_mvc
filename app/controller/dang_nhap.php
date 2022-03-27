<?php
    namespace app\controller{
        class Dang_nhap extends \core\Controller{

            public function __construct(&$db)
            {
                parent::__construct($db);
                $this->model = $this->setModel('dang_nhap', $db);
                $this->view = $this->setView('dang_nhap');
            }

            public function dang_nhap()
            {
                
                if(isset($_POST['btn_dang_nhap']) && $_POST['btn_dang_nhap'] == true){
                    
                }
                $this->view->render();
            }

        }
    }
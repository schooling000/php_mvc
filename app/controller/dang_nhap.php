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

                    $validate = new \core\Validate();
                    $validate->removeScriptInput($_POST);
                    $validate->check($_POST, [
                        'tai_khoan_nhan_vien'=>[
                            'required'=>true,
                            'maxlength'=>30
                        ],
                        'mat_khau_nhan_vien'=>[
                            'maxlength'=>30
                        ]
                    ]);

                    if(!$validate->hasError()){

                    }else{

                    }
                                        
                    unset($validate);
                }
                $this->view->render();
            }

        }
    }
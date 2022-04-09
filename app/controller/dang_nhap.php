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

                        $tai_khoan_nhan_vien = $_POST['tai_khoan_nhan_vien'];
                        $mat_khau_nhan_vien = $_POST['mat_khau_nhan_vien'];

                        $result = $this->model->checkLogin($tai_khoan_nhan_vien, $mat_khau_nhan_vien);
                        
                        if(!empty($result)){
                            global $user;
                            $user->setUser($result[0]['MA_NHAN_VIEN'], 
                                           $result[0]['HO_TEN_NHAN_VIEN'],
                                           $result[0]['EMAIL_NHAN_VIEN'], 
                                           $result[0]['TAI_KHOAN_NHAN_VIEN'],
                                           $result[0]['MA_QUYEN_NHAN_VIEN'],
                                           $result[0]['TEN_QUYEN_NHAN_VIEN']);
                            
                            $user->setUserPermissions($this->model->getPermissions($user->getRoleId()));

                            header('location:index.php?controller=nhan_vien&&method=nhan_vien');
                        }else{
                            
                        }


                    }else{

                    }
                                        
                    unset($validate);
                }
                $this->view->render();
            }

        }
    }
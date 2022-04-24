<?php
    namespace app\controller{
        
        class Dang_nhap extends \core\Controller{

            public function __construct(&$db, &$message, &$user)
            {
                parent::__construct($db, $message, $user);
                $this->model = $this->setModel('dang_nhap', $db);
                $this->view = $this->setView('dang_nhap','layout_dang_nhap');
                $this->view->clearSidebar();
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
                            $this->user->setUser($result[0]['MA_NHAN_VIEN'], 
                                           $result[0]['HO_TEN_NHAN_VIEN'],
                                           $result[0]['EMAIL_NHAN_VIEN'], 
                                           $result[0]['TAI_KHOAN_NHAN_VIEN'],
                                           $result[0]['MA_QUYEN_NHAN_VIEN'],
                                           $result[0]['TEN_QUYEN_NHAN_VIEN']);

                            $this->user->setPermissions($this->model->getPermissions($this->user->getRoleId()));

                            $this->user->changPage('nhan_vien', 'xem_trang');
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
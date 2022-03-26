<?php
    namespace app\controller{
        class Dang_nhap extends \core\Controller{

            public function dang_nhap()
            {
                global $user; 
                $user->clearUser();
                //$user->setUser(1, 'HUỲNH THANH LỘC', 'SCHOOLING000@GMAIL.COM', 'LOCHT');
                //$user->changPage('lich_mo', 'lich_mo');
            }

        }
    }
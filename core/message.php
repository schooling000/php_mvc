<?php

namespace core {
    class Message
    {
        public function __construct()
        {
            $_SESSION['message'] =array();
        }

        public function addMessage($key, $type, $value)
        {
            $_SESSION['message'][$key]['type'] = $type;
            $_SESSION['message'][$key]['value'] = $value;
        }

        public function selectMessage($key = null)
        {
            if(isset($_SESSION['message'][$key])){
                return $_SESSION['message'][$key];
            }else{
                return $_SESSION['message'];
            }
        }
        
        public function deleteMessage($key = null)
        {
            if(isset($_SESSION['message'][$key])){
                unset($_SESSION['message'][$key]);
                $_SESSION['message'] =  array_values($_SESSION['message']);
            }else{
                foreach ($_SESSION['message'] as $key => $value) {
                    unset($_SESSION['message'][$key]);
                }
            }
        }

        public function controlModal($key)
        {
            if(isset($_SESSION['message'][$key]) && !empty($_SESSION['message'][$key])){
            
            }
        }
    }
}

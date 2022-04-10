<?php

namespace core {

    class App
    {

        private $user       = null;
        private $message    = null;
        private $db         = null;

        private $url        = null;
        private $controller = null;
        private $method     = null;
        private $param      = array();


        public function __construct()
        {
            try {
                $this->user = new \core\User();
                $this->message = new \core\Message();
                $this->db = new \PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASS);
                $this->db->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
                return $this;
            } catch (\PDOException $e) {
                echo ('Error Code: '    . $e->getCode()     . '<br>');
                echo ('Error: '         . $e->getMessage()  . '<br>');
                echo ('Line: '          . $e->getLine()     . '<br>');
                echo ('File: '          . $e->getFile()     . '<br>');
                exit();
            } catch (\Exception $e) {
                echo ('Error Code: '    . $e->getCode()     . '<br>');
                echo ('Error: '         . $e->getMessage()  . '<br>');
                echo ('Line: '          . $e->getLine()     . '<br>');
                echo ('File: '          . $e->getFile()     . '<br>');
                exit();
            }
        }


        public function getRequest()
        {
            $this->url = $_REQUEST;
            return $this;
        }

        public function Processing()
        {
            try {
                // KIỂM TRA NGƯỜI DÙNG ĐÃ ĐĂNG NHẬP CHƯA
                if (!$this->user->logged()) {
                    $this->controller = DS . 'app' . DS . 'controller' . DS . ucwords(DEFAULT_CONTROLLER);
                    $this->method     = DEFAULT_METHOD;
                    $this->param      = array();
                // KIÊM TRA NGƯỜI DÙNG ĐÃ ĐĂNG NHẬP MÀ CHƯA CÓ QUYỀN TRUY CẬP CONTROLLER HOẶC METHOD
                } elseif ($this->user->logged() && !$this->user->haveAccess($this->url['controller'], $this->url['method'])) {
                    $this->controller = DS . 'app' . DS . 'controller' . DS . ucwords(DEFAULT_CONTROLLER);
                    $this->method     = DEFAULT_METHOD;
                    $this->param      = array();
                    $this->message->deleteMessage();
                    $this->message->addMessage('dang_nhap', MESSAGE_TYPE_ERROR, 'Bạn Không Có Quyền Truy Cập');
                // KIỂM TRA NGƯỜI DÙNG ĐÃ ĐĂNG NHẬP CÓ QUYỀN TRUY CẬP CONTROLLER VÀ METHOD
                } elseif ($this->user->logged() && $this->user->haveAccess($this->url['controller'], $this->url['method'])) {
                    $this->controller = isset($this->url['controller']) & !empty($this->url['controller']) ? DS . 'app' . DS . 'controller' . DS . ucwords($this->url['controller']) : null;
                    unset($this->url['controller']);

                    $this->method = isset($this->url['method']) & !empty($this->url['method']) ? $this->url['method'] : null;
                    unset($this->url['method']);

                    $this->param = isset($this->url['param']) ? $this->url['param'] : array();
                    unset($this->url['param']);
                // BĂT CÁC LỔI CÓ THỂ PHÁT SINH ĐỂ TIỆN SỬA VỀ SAU
                } else {
                    throw new \Exception('Lổi Sử Lý Controller: ' . $this->controller . 'Và Method: ' . $this->method, ERRNO_DATA_INPUT);
                }

                $this->controller = class_exists($this->controller) ? new $this->controller($this->db, $this->message) : false;
                $this->method     = $this->controller !== false && method_exists($this->controller, $this->method) ? $this->method : false;

                if ($this->controller !== false && $this->method !== false) {
                    call_user_func_array(array($this->controller, $this->method), $this->param);
                } else {
                    throw new \Exception('Class ' . $this->controller . ' hoặc Method ' . $this->method . ' Không Tồn Tại', ERRNO_NOT_FOUND);
                }

            } catch (\Exception $e) {
                echo ('Error Code: '    . $e->getCode()     . '<br>');
                echo ('Error: '         . $e->getMessage()  . '<br>');
                echo ('Line: '          . $e->getLine()     . '<br>');
                echo ('File: '          . $e->getFile()     . '<br>');
            }
        }

        public function __destruct()
        {
            unset($this->user);
            unset($this->message);
            unset($this->db);
            unset($param);

            $this->user       = null;
            $this->message    = null;
            $this->db         = null;

            $this->url        = null;
            $this->controller = null;
            $this->method     = null;
            $this->param      = array();
        }
    }
}

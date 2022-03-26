<?php

namespace core {

    use Exception;

    class Views
    {
        const WEB_ELEMENT_TITLE   = 'web_title';
        const WEB_ELEMENT_SIDEBAR = 'web_sidebar';
        const WEB_ELEMENT_CONTENT = 'web_content';
        const WEB_ELEMENT_SCRIPT  = 'web_script';

        const MESSAGE__TYPE_ERROR = 'error';
        const MESSAGE_TYPE_SUCCESS = 'succes';

        private $web_title   = DEFAULT_WEB_NAME;
        private $web_sidebar = null;
        private $web_content = null;
        private $web_script  = null;

        private $data_buffer  = null;
        private $data         = array();
        private $file_layout  = DEFAULT_LAYOUT;
        private $file_content = null;

        public function __construct($file_content = null, $file_layout = null, $data = array())
        {

            $this->data = !empty($data)? $data : array();

            if (file_exists(ROOT_PATH . DS . 'app' . DS . 'views' . DS . 'content' . DS . strtolower($file_content) . '.php')) {
                $this->file_content = ROOT_PATH . DS . 'app' . DS . 'views' . DS . 'content' . DS . strtolower($file_content) . '.php';
            } else {
                throw new Exception('Class Views: Không Tìm Thấy File Content Với Tên ' . strtoupper($file_content), ERRNO_NOT_FOUND);
            }

            if (file_exists(ROOT_PATH . DS . 'app' . DS . 'views' . DS . 'layout' . DS . strtolower($file_layout) . '.php')) {
                $this->file_layout = ROOT_PATH . DS . 'app' . DS . 'views' . DS .   'layout' . DS . strtolower($file_layout) . '.php';
            } else {
                throw new Exception('Class Views: Không Tìm Thấy File Content Với Tên ' . strtoupper($file_layout), ERRNO_NOT_FOUND);
            }
        }

        public function set_file_content($file_content = null)
        {
            if (file_exists(ROOT_PATH . DS . 'app' . DS . 'views' . DS . 'content' . DS . strtolower($file_content) . '.php')) {
                $this->file_content = ROOT_PATH . DS . 'app' . DS . 'views' . DS . 'content' . DS . strtolower($file_content) . '.php';
            } else {
                throw new Exception('Class Views: Không Tìm Thấy File Content Với Tên ' . strtoupper($file_content), ERRNO_NOT_FOUND);
            }
        }

        public function set_file_layout($file_layout = null)
        {
            if (file_exists(ROOT_PATH . DS . 'app' . DS . 'views' . DS . 'layout' . DS . strtolower($file_layout) . '.php')) {
                $this->file_layout = ROOT_PATH . DS . 'app' . DS . 'views' . DS .   'layout' . DS . strtolower($file_layout) . '.php';
            } else {
                throw new Exception('Class Views: Không Tìm Thấy File Content Với Tên ' . strtoupper($file_layout), ERRNO_NOT_FOUND);
            }
        }

        public function set_web_title($web_title = DEFAULT_WEB_NAME)
        {
            $this->web_title = $web_title;
        }

        public function get_web_element($element = null)
        {
            switch ($element) {
                case self::WEB_ELEMENT_TITLE:
                    return $this->web_title;
                    break;

                case self::WEB_ELEMENT_SIDEBAR:
                    return $this->web_sideba;
                    break;

                case self::WEB_ELEMENT_CONTENT:
                    return $this->web_content;
                    break;

                case self::WEB_ELEMENT_SCRIPT:
                    return $this->web_script;
                    break;

                default:
                    exit('Class Views: Không Tìm Thấy Element');
                    break;
            }
        }

        public function start($element = null)
        {

            if ($element == null) {
                exit('Class Views: $element Không Đực Bổ Trống');
            }

            $this->data_buffer = $element;
            ob_start();
        }

        public function end()
        {
            switch ($this->data_buffer) {
                case self::WEB_ELEMENT_TITLE:
                    $this->web_title = ob_get_clean();
                    break;

                case self::WEB_ELEMENT_SIDEBAR:
                    $this->web_sidebar = ob_get_clean();
                    break;

                case self::WEB_ELEMENT_CONTENT:
                    $this->web_content = ob_get_clean();
                    break;

                case self::WEB_ELEMENT_SCRIPT:
                    $this->web_script = ob_get_clean();
                    break;

                default:
                    exit('Class Views: Không Tìm Thấy Element');
                    break;
            }
        }

        public function render()
        {
            require_once $this->file_content;
            require_once $this->file_layout;
        }

        public function add_data($key = null, $value = null)
        {
            if ($key == null || $key == '') {
                exit('Class Views: $key Không Được Để Trống');
            }

            $this->data[$key] = $value;

            return $this;
        }

        public function remove_data($key = null)
        {
            if ($key == null || $key == '' || !isset($this->data[$key])) {
                exit('Class Views: $key Không Được Để Trống Hoặc Không Tồn Tại');
            }
            unset($this->data[$key]);
            $this->data = array_values($this->data);
        }

        public function clear_data()
        {
            unset($this->data);
            $this->data = array();
            return $this;
        }

        public function select_data($key = null)
        {
            if ($key == null || $key == '' || !isset($this->data[$key])) {
                return '';
            }

            return $this->data[$key];
        }

        public function add_message($key = null, $value = array())
        {
            if ($key == null || $key == '') {
                return false;
            } else {
                $_SESSION['message'][$key] = $value;
            }
        }

        public function clear_message()
        {
            unset($_SESSION['message']);
            $_SESSION['message'] = array();
        }

        public function select_message($key = null)
        {
            return isset($_SESSION['message'][$key]) ? $_SESSION['message'][$key] : $_SESSION['message'];
        }
    }
}

<?php

namespace core {

    class Views
    {
        const HEAD = 'head';
        const BODY = 'body';
        private $_title = DEFAULT_TITLE_WEB_PAGE;
        private $_head = '';
        private $_body = '';
        private $_layout = DEFAULT_LAYOUT;
        private $_htmlBuffer;

        public function render($WebPagePath = '', $data = [])
        {
            $validate_view_path = explode('/', $WebPagePath);
            $view_path = implode(DS, $validate_view_path);
            require_once ROOT_PATH . DS . 'app' . DS . 'views' . DS . $view_path . '.php';
            echo $this->_head;
            require_once ROOT_PATH . DS . 'app' . DS . 'views' . DS . "layout" . DS . 'default_layout.php';
        }

        public function start($type)
        {
            $this->_htmlBuffer = $type;
            ob_start();
        }

        public function end()
        {
            if ($this->_htmlBuffer == self::HEAD) {
                $this->_head = ob_get_clean();
            } elseif ($this->_htmlBuffer == self::BODY) {
                $this->_body = ob_get_clean();
            } else {
                exit(ucwords($this->_htmlBuffer) . 'Không Tồn Tại Type Này');
            }
        }

        public function get_title()
        {
            return $this->_title;
        }

        public function set_title($newTitle)
        {
            $this->_title = $newTitle;
        }
    }
}

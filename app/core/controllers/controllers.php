<?php

declare(strict_types=1);

namespace app\core\controllers {

    use app\core\responsive\Responsive;

    class Controllers
    {
        protected $responsive = null;
        protected $model = null;

        public function __construct()
        {
            $this->responsive = new Responsive();
        }

        public function getModel( String $modelname) : Model {
            
        }
    }
}

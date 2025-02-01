<?php

declare(strict_types=1);

namespace app\core\controllers {

    use app\core\models\Models;
    use app\core\response\Response;

    class Controllers
    {
        protected Response $response;

        public function __construct(Response &$response)
        {
            $this->response = $response;
        }

        public function getModel(?string $modelName): Models
        {
            $objectModel = implode(DS, array('app', 'model', ucwords($modelName)));
            return new $objectModel();
        }

        public function view(): void
        {
        }
        public function update(): void
        {
        }
        public function insert(): void
        {
        }
        public function delete(): void
        {
        }
    }
}

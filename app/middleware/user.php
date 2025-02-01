<?php

declare(strict_types=1);

namespace app\middleware {

    use app\core\middlewares\Middlewares;
    use app\core\request\Request;
    use app\core\response\Response;
    use app\controller\Autheruser;

    class User extends Middlewares {

        public function executed(Request $request, &$callback): array|false
        {
            $callback = array(Autheruser::class, 'index');
            return array(
                'path'=>'/user/view',
                'method'=>'GET',
                'param'=>array()
            );
        }

    }
}
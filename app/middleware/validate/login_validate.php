<?php

declare(strict_types=1);

namespace app\middleware\validate {

    use app\core\middlewares\Middlewares;
    use app\core\validate\Validate;
    use app\help\Help;
    use app\controller\Login;

    class Login_validate extends Middlewares
    {

        public function executed(array $router): array
        {
            help::dnd($router);

            $router['path'] = '/';
            $router['method'] = 'GET';
            $router['callback'] = array(Login::class, 'index');
            $router['data'] = array('data' => [
                'accountMesssage'=>'Trường này không được trống'
            ]);
            return $router;
        }
    }
}

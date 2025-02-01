<?php

declare(strict_types=1);

namespace app\middleware\user_management {

    use app\controller\Autheruser;
    use app\controller\User_managerment;
    use app\core\middlewares\Middlewares;
    use app\core\request\Request;
    use app\help\Help;

    class Validate_login extends Middlewares
    {

        public function executed(Request $request, &$callback): array
        {
            $callback = array(User_managerment::class, 'view');
            return array(
                'path' => '/',
                'method' => 'GET',
                'param' => array('data' => array(
                    'messageAccount' => 'Trường tài khoản không được trống', 
                    'messagePassword' => 'Trường mật khẩu không được trống')
                )
            );
        }
    }
}

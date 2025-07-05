<?php

declare(strict_types=1);

namespace app\middleware\validate {

    use app\core\middleware\Middleware;
    use app\core\validate\Validate;
    use app\help\Help;
    use app\controller\Login;

    class Login_validate extends Middlewares
    {

        public function executed(array $router): array
        {
            echo '<b>Go In Login_validate->executed()</b>';
            Help::dnd($router);
            $validate = new Validate();
            $validate->addField('account', $router['param']['data']['account']);
            $validate->addField('password', $router['param']['data']['password']);
            $validate->textField('account');
            $validate->textField('password');

            if ($validate->hasFieldError()) {
                $router = array(
                    'path' => '/',
                    'method' => 'GET',
                    'callback' => array(Login::class, 'index'),
                    'param' => array(
                        'data' => array(
                            'messageAccount' => $validate->getMessageFieldError('account'),
                            'messagePassword' => $validate->getMessageFieldError('password')
                        )
                    )
                );
            }
            echo '<b>Go Out Login_validate->executed()</b></br>';
            return $router;
        }
    }
}

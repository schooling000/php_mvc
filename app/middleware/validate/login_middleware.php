<?php

declare(strict_types=1);

namespace app\middleware\validate {

    use app\core\help\Help;
    use app\controller\Login;
    use app\core\validate\Validate;
    use app\core\middleware\Middleware;

    class Login_middleware extends Middleware
    {

        public function execute(array $router): array
        {
            echo '<b>Go In Login_validate->executed()</b>';
            Help::dnd($router);
            $validate = new Validate();
            $validate->addField('E_Account', $router['param']['data']['E_Account']);
            $validate->addField('E_Password', $router['param']['data']['E_Password']);
            $validate->textField('E_Account',true,5);
            $validate->textField('E_Password');

            if ($validate->hasFieldError()) {
                $router = array(
                    'path' => '/',
                    'method' => 'GET',
                    'callback' => array(Login::class, 'index'),
                    'param' => array(
                        'data' => array(
                            'messageAccount' => $validate->getMessageFieldError('E_Account'),
                            'messagePassword' => $validate->getMessageFieldError('E_Password')
                        )
                    )
                );
            }
            echo '<b>Go Out Login_validate->executed()</b></br>';
            return $router;
        }
    }
}

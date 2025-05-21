<?php

    declare(strict_types=1);

    namespace app\middleware\validate{

    use app\core\middlewares\Middlewares;
    use app\core\validate\Validate;

        class Login_validate extends Middlewares{

            public function executed($request, $currentRouter): array
            {
                var_dump($request)   ;
                var_dump($currentRouter);
                session_destroy();
                $validate = new Validate();
                $validate->addField("account", $request['param']['account']);
                $validate->addField("password", $request['param']['password']);

                return $request;
            }
        }
    }
<?php

namespace App\Controllers;

//Os recursos do miniframework
use MF\Controller\Action;
use MF\Model\Container;

class AuthController extends Action {


    public function authenticate()
    {
        $usuario = Container::getModel('User');

        $usuario->__set('mail', $_POST['mail']);
        $usuario->__set('password', md5($_POST['password']));

       
        $return = $usuario->authenticate();

        if($usuario->__get('id') != '' && $usuario->__get('name')) {

            session_start();

            $_SESSION['id'] = $usuario->__get('id');
            $_SESSION['name'] = $usuario->__get('name');

            header('Location: /indexUser');

        } else {
            header('Location: login?login=error');
        }

    }

    public function logoff() {
        session_start();
        session_destroy();
        header('Location: /');

    }
}

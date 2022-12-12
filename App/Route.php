<?php

namespace App;

use MF\Init\Bootstrap;

class Route extends Bootstrap
{

	protected function initRoutes()
	{

		$routes['home'] = array(
			'route' => '/',
			'controller' => 'indexController',
			'action' => 'index'
		);

		$routes['cadastrar'] = array(
			'route' => '/cadastrar',
			'controller' => 'indexController',
			'action' => 'cadastrar'
		);

		$routes['registerUser'] = array(
			'route' => '/register_user',
			'controller' => 'indexController',
			'action' => 'registerUser'
		);

		$routes['login'] = array(
			'route' => '/login',
			'controller' => 'indexController',
			'action' => 'login'
		);

		/* AUTENTICAÇÃO */

		$routes['authenticate'] = array(
			'route' => '/authenticate',
			'controller' => 'AuthController',
			'action' => 'authenticate'
		);

		$routes['logoff'] = array(
			'route' => '/logoff',
			'controller' => 'AuthController',
			'action' => 'logoff'
		);

		/* APP */

		/* Index*/

		$routes['indexUser'] = array(
			'route' => '/indexUser',
			'controller' => 'AppController',
			'action' => 'indexUser'
		);

		/* Clientes */

		$routes['customers'] = array(
			'route' => '/customers',
			'controller' => 'AppController',
			'action' => 'customers'
		);

		$routes['customersRegister'] = array(
			'route' => '/customersRegister',
			'controller' => 'AppController',
			'action' => 'customersRegister'
		);

		$routes['customerRegistration'] = array(
			'route' => '/customerRegistration',
			'controller' => 'AppController',
			'action' => 'customerRegistration'
		);

		$routes['customersEdit'] = array(
			'route' => '/customersEdit',
			'controller' => 'AppController',
			'action' => 'customersEdit'
		);

		

		$this->setRoutes($routes);
	}
}

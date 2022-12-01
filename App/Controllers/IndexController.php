<?php

namespace App\Controllers;

//os recursos do miniframework
use MF\Controller\Action;
use MF\Model\Container;

class IndexController extends Action
{

	public function index()
	{
		$this->validateAuthentication();

		$this->render('index', 'layout');
	}

	public function cadastrar()
	{
		$this->validateAuthentication();

		$this->view->registerReturn = '';

		$this->render('cadastrar', 'layout');
	}

	public function login()
	{
		$this->validateAuthentication();

		$this->view->login = isset($_GET['login']) ? $_GET['login'] : '';

		$this->view->registerReturn = '';

		$this->render('login', 'layout');
	}

	public function registerUser()
	{
		//receber dados dos formulário
		$user = Container::getModel('User');

		$user->__set('name', $_POST['name']);
		$user->__set('mail', $_POST['mail']);
		$user->__set('password', md5($_POST['password']));

		if (md5($_POST['password']) == md5($_POST['passwordCheck'])) {
			if ($_POST['mail'] == $_POST['mailCheck']) {
				if (count($user->getUserByMail()) == 0) {

					$user->registerUser();

					$this->view->registerReturn = 'RegisteredSuccessfully';

					$this->render('cadastrar', 'layout');
				} else {
					$this->view->user = array(
						'name' => $_POST['name'],
						'mail' => $_POST['mail'],
						'password' => $_POST['password'],
					);

					$this->view->registerReturn = 'userAlreadyRegistered';

					$this->render('cadastrar', 'layout');
				}
			} else {

				$this->view->registerReturn = 'diferentMails';

				$this->render('cadastrar', 'layout');
			}
		} else {

			$this->view->registerReturn = 'diferentPasswords';

			$this->render('cadastrar', 'layout');
		}
	}

	public function validateAuthentication()
	{
		if (!isset($_SESSION)) {
			session_start();
		}

		if (isset($_SESSION['id']) || isset($_SESSION['name'])) {
			header('Location: /indexUser');
		} 
	}
}

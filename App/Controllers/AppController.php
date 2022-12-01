<?php

namespace App\Controllers;

//Os recursos do miniframework
use MF\Controller\Action;
use MF\Model\Container;

class appController extends Action
{

	public function indexUser()
	{
		$this->validateAuthentication();

		$this->render('indexUser', 'layout');
	}

	public function customers()
	{
		$this->validateAuthentication();

		$this->render('customers', 'layout');
	}

	public function customersRegister()
	{
		$this->validateAuthentication();

		$this->render('customersRegister', 'layout');
	}

	public function customerRegistration()
	{
		$this->validateAuthentication();

		$customer = Container::getModel('Customer');

		$customer->__set('name', $_POST['name']);
		$customer->__set('birth_date', $_POST['birth_date']);
		$customer->__set('cpf', $_POST['cpf']);
		$customer->__set('phone', $_POST['phone']);
		$customer->__set('email', $_POST['email']);

		if (count($customer->conferenceCPF()) == 0) {

			$customer->customerRegistration();

			$this->render('/customers', 'layout');
		} else {

			
			$this->render('/customersRegister', 'layout');
		}
	}

	public function validateAuthentication()
	{
		if (!isset($_SESSION)) {
			session_start();
		}

		if (!isset($_SESSION['id']) || $_SESSION['id'] == '' || !isset($_SESSION['name']) || $_SESSION['name'] == '') {

			header('Location: /login?login=erro');
		}
	}
}

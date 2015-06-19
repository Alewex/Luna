<?php

use Luna\HTTP\Controllers\BaseController;

class UsersController extends BaseController
{

	public function Main()
	{
		$users = $this->model->load('UsersModel')->model;
		$allUsers = $users->getAllUsers();

		$this->view->render('Users', 'Users', ['users' => $allUsers]);
	}

	public function Create()
	{
		$this->view->render('CreateUser', 'Create User');
	}

	public function CreateUser()
	{
		$name = $_POST['name'];
		$age = $_POST['age'];
		$location = $_POST['location'];

		$users = $this->model->load('UsersModel')->model;

		if ($users->createUser($name, $age, $location))
		{
			Luna\Core\ServiceContainer::load('Response')->redirect($_SERVER['ROOT'] . '/users');
		}
	}

}
<?php

use Luna\Services\HTTP\Controllers\BaseController;

class UsersController extends BaseController
{

	public function Main()
	{
		$users = $this->model->load('UsersModel')->model;
		$allUsers = $users->getAllUsers();

		$this->view->render('Users', 'Users', ['users' => $allUsers]);
	}

}
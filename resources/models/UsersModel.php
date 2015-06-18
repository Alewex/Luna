<?php

use Luna\Database\Database;

class UsersModel extends Database {

	public function getAllUsers()
	{
		return $this->fluent->from('users');
	}

}
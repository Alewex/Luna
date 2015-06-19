<?php

use Luna\Database\Database;

class UsersModel extends Database {

	public function getAllUsers()
	{
		return $this->fluent->from('users');
	}

	public function createUser($name, $age, $location)
	{
		$values = ['name' => $name, 'age' => $age, 'location' => $location];
		return $this->fluent->insertInto('users')->values($values)->execute();
	}

}
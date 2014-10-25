<?php

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\EloquentUserProvider;

class ApiUserProvider extends EloquentUserProvider {
	/**
	 * Validate a user against the given credentials.
	 *
	 * @param  \Illuminate\Auth\UserInterface  $user
	 * @param  array  $credentials
	 * @return bool
	 */
	public function validateCredentials(UserInterface $user, array $credentials)
	{
		return true;
	}

}

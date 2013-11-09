<?php

use Nette\Security,
	Nette\Utils\Strings;


/*
CREATE TABLE users (
	id int(11) NOT NULL AUTO_INCREMENT,
	username varchar(50) NOT NULL,
	password char(60) NOT NULL,
	role varchar(20) NOT NULL,
	PRIMARY KEY (id)
);
*/

/**
 * Users authenticator.
 */
class Authenticator extends Nette\Object implements Security\IAuthenticator
{
	/** @var Nette\Database\Connection */
	private $database;


	public function __construct(Nette\Database\Connection $database)
	{
		$this->database = $database;
	}


	/**
	 * Performs an authentication.
	 * @return Nette\Security\Identity
	 * @throws Nette\Security\AuthenticationException
	 */
	public function authenticate(array $credentials)
	{
		list($username, $password) = $credentials;

		//$arr = array('username' => $username, 'password' => $password, 'id'=>1, 'role'=>'user');
		//return new Nette\Security\Identity($arr['id'], $arr['role'], $arr);

		list($username, $password) = $credentials;
		$row = $this->database->table('Uzivatel')->where('username', $username)->fetch();

		if (!$row) {
			throw new Security\AuthenticationException('The username is incorrect.', self::IDENTITY_NOT_FOUND);
		}

		if ($row->hash_hesla !== $this->calculateHash($password, NULL)) {
			throw new Security\AuthenticationException('The password is incorrect.', self::INVALID_CREDENTIAL);
		}

		$arr = $row->toArray();
		unset($arr['password']);
		return new Nette\Security\Identity($row->username, "user", $arr);
	}


	/**
	 * Computes salted password hash.
	 * @param  string
	 * @return string
	 */
	public static function calculateHash($password, $salt = NULL)
	{
		if ($password === Strings::upper($password)) { // perhaps caps lock is on
			$password = Strings::lower($password);
		}
		//return crypt($password, $salt ?: '$2a$07$' . Strings::random(22));
		return sha1($password);
	}

}

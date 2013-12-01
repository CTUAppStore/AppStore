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
 * Autentikátor uživatelů.
 */
class Authenticator extends Nette\Object implements Security\IAuthenticator
{
	/** @var Nette\Database\Connection */
	private $database;


	/** @brief Konstruktor
	    @param Nette\Database\Connection Připojení do databáze
	*/
	public function __construct(Nette\Database\Connection $database)
	{
		$this->database = $database;
	}


	/**
	 * @brief Provádí autentifikaci.
	 * @return Nette\Security\Identity Identita uživatele
	 * @throws Nette\Security\AuthenticationException Vyjímka při neúspěchu (špatné údaje)
	 */
	public function authenticate(array $credentials)
	{
		list($username, $password, $role) = $credentials;

		//$arr = array('username' => $username, 'password' => $password, 'id'=>1, 'role'=>'user');
		//return new Nette\Security\Identity($arr['id'], $arr['role'], $arr);

		//list($username, $password) = $credentials;
		$row = $this->database->table('Udaje')->where('username', $username)->fetch();

		if (!$row) {
			throw new Security\AuthenticationException('The username is incorrect.', self::IDENTITY_NOT_FOUND);
		}

		if ( $row -> role != $role )
		{
			throw new Security\AuthenticationException('The username not found for this category.', self::IDENTITY_NOT_FOUND);
		}

//		if ($row->hash_hesla !== $this->calculateHash($password, NULL)) {
//			throw new Security\AuthenticationException('The password is incorrect.', self::INVALID_CREDENTIAL);
//		}

		//$arr = $row->toArray();
		$arr ['username'] = $row -> username;
		$arr ['role'] = $row -> role;
		//unset($arr['password']);
		return new Nette\Security\Identity($row->username, "user", $arr);
	}


	/**
	 * @brief Vypočítá hash hesla.
	 * @param  string Heslo
	 * @param  string Salt
	 * @return string Vypočítaný hash hesla
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

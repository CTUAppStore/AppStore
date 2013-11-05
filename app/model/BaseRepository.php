<?php

	class BaseRepository extends Nette\Object
	{
		protected $connection;

		public function __construct ( Nette\Database\Connection $database )
		{
			$this -> connection = $database;
		}
	}
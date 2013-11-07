<?php

	class BaseRepository extends Nette\Object
	{
		protected $connection;
		protected $m_Table;

		public function __construct ( Nette\Database\Connection $database )
		{
			$this -> connection = $database;
		}

		public function getTable ()
		{
			$table = $this -> connection -> table ( $this -> m_Table );
			return $table;
		}	
	}
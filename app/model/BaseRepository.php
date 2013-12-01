<?php
	/**
	 *  Base repository
	 */
	class BaseRepository extends Nette\Object
	{
		/** @brief Připojení do databáze */
		protected $connection;
		
		/** @cond HIDDEN */
		protected $m_Table;
		/** @endcond */

		
		/** @brief Konstruktor
		    @param Nette\Database\Connection Připojení do databáze
		*/
		public function __construct ( Nette\Database\Connection $database )
		{
			$this -> connection = $database;
		}

		/** @brief Start repositáře 
		    @return void
		 */
		public function startup ()
		{

		}
	      
		/** @cond HIDDEN */
		public function getTable ()
		{
			return $this -> connection -> table ( $this -> m_Table );
		}	
		/** @endcond */
	}
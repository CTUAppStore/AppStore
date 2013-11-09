<?
/**
 * AuthorRepository
 */

class AuthorRepository extends BaseRepository
{
	
	public function __construct ( Nette\Database\Connection $database )
	{
		parent::__construct( $database );
		$this -> m_Table = "Autor";
	}

	public function getAuthorsList ()
	{
		return $this -> getTable ();
	}

	public function getAuthorData ( $username )
	{
		return $this -> getTable () -> where ( "username", $username );
	}
}
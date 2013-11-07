<?
/**
 * AuthorRepository
 */

class AuthorRepository extends BaseRepository
{
	private $m_AppTable;

	public function __contstruct ( Nette\Database\Connection $database )
	{
		parent::__construct( $database );
		$this -> m_Table = "";
	}

	public function getAuthorsList ()
	{
		//return $this -> getTable ();
		return array(10);
	}
}
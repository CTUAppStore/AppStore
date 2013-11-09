<?
/**
 * ApplicationRepository
 */

class ApplicationRepository extends BaseRepository
{
	
	public function __construct ( Nette\Database\Connection $database )
	{
		parent::__construct( $database );
		$this -> m_Table = "Aplikace";
	}

	public function getApplicationData ( $id )
	{
		return $this -> getTable () -> where ( "ID_aplikace", $id ) -> fetch ();
	}

	public function getAppList ()
	{
		return $this -> getTable ();
	}
}
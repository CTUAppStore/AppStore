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
		return $this -> getTable () -> where ( "id", $id ) -> fetch ();
		//return array(10);
	}

	public function getAppList ()
	{
		return $this -> getTable ();
		//return array(10);
	}
}
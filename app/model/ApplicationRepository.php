<?
/**
 * ApplicationRepository
 */

class ApplicationRepository extends BaseRepository
{
	private $m_Table;

	public function __contstruct ( Nette\Database\Connection $database )
	{
		parent::__construct( $database );
		$this -> m_Table = "";
	}

	public function getApplicationData ( $id )
	{
		//return $this -> getTable () -> where ( "id", $id );
		return array(10);
	}

	public function getAppList ()
	{
		//return $this -> getTable ();
		return array(10);
	}
}
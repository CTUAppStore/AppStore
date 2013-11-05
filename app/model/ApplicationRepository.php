<?
/**
 * ApplicationRepository
 */

class ApplicationRepository extends BaseRepository
{
	private $m_AppTable;

	public function __contstruct ( Nette\Database\Connection $database )
	{
		parent::__construct( $database );
		$this -> m_AppTable = "";
	}

	public function getTable ()
	{
		$table = $this -> connection -> table ( $this -> m_AppTable );
		return $table;
	}	

	public function getApplicationData ( $id )
	{
		//return $this -> getTable () -> where ( "id", $id );
		return array(10);
	}
}
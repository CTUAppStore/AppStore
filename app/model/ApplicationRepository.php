<?
/**
 * ApplicationRepository
 */

class ApplicationRepository extends BaseRepository
{
	private $m_AplikaceTable;
	private $m_AutorTable;
	private $m_KomentarTable;
	private $m_LicenceTable;
	private $m_NakupTable;
	private $m_ObrazekTable;

	public function __construct ( Nette\Database\Connection $database )
	{
		parent::__construct( $database );
		$this -> m_AplikaceTable = "Aplikace";
		$this -> m_AutorTable = "Autor";
		$this -> m_KomentarTable = "Komentar";
		$this -> m_LicenceTable = "Licence";
		$this -> m_NakupTable = "Nakup";
		$this -> m_ObrazekTable = "Obrazek";
	}

	public function getAplikaceTable ()
	{
		return $this -> connection -> table ( $this -> m_AplikaceTable );
	}

	public function getAutorTable ()
	{
		return $this -> connection -> table ( $this -> m_AutorTable );
	}

	public function getKomentarTable ()
	{
		return $this -> connection -> table ( $this -> m_KomentarTable );
	}

	public function getLicenceTable ()
	{
		return $this -> connection -> table ( $this -> m_LicenceTable );
	}

	public function getNakupTable ()
	{
		return $this -> connection -> table ( $this -> m_NakupTable );
	}

	public function getObrazekTable ()
	{
		return $this -> connection -> table ( $this -> m_ObrazekTable );
	}

	public function getApplicationData ( $id )
	{
		return $this -> getAplikaceTable () -> where ( "ID_aplikace", $id ) -> fetch ();
	}

	public function getApplicationLicenceInfo ( $id )
	{
		return $this -> getLicenceTable () -> where ( "aplikace", $id ) -> fetch ();
	}

	public function getApplicationPictures ( $id )
	{
		return $this -> getObrazekTable () -> where ( "aplikace", $id );
	}

	public function getAuthorApps ( $username )
	{
		return $this -> getAplikaceTable () -> where ( "autor", $username );
	}

	public function getAppList ()
	{
		return $this -> getAplikaceTable ();
	}

	public function getAuthorsList ()
	{
		return $this -> getAutorTable ();
	}

	public function getAuthorData ( $username )
	{
		return $this -> getAutorTable () -> where ( "username", $username ) -> fetch ();
	}

	public function getAuthorName ( $appId )
	{
		$rowAuthor = $this -> getAplikaceTable () -> select ( "autor" ) -> where ( "ID_aplikace", $appId );
		return $this -> getAutorTable () -> select ( "jmeno" ) -> where ( "username", $rowAuthor ) -> fetch ();
	}
}
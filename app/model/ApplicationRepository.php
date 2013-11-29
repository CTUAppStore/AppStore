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

	public function getApplicationComments ( $id )
	{
		return $this -> getKomentarTable () -> where ( "aplikace", $id );
	}

	public function insertComment ( $appId, $title, $comment, $username )
	{
		return $this -> getKomentarTable () -> insert ( array (
			'nadpis' => $title,
			'obsah' => $comment,
			'aplikace' => $appId,
			'FK_uzivatel' => $username
			));
	}

	public function getAuthorApps ( $username )
	{
		return $this -> getAplikaceTable () -> where ( "FK_autor", $username );
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
		return $this -> getAutorTable () -> where ( "FK_username", $username ) -> fetch ();
	}

	public function getAuthorName ( $appId )
	{
		$rowAuthor = $this -> getAplikaceTable () -> select ( "FK_autor" ) -> where ( "ID_aplikace", $appId );
		return $this -> getAutorTable () -> select ( "jmeno" ) -> where ( "FK_username", $rowAuthor ) -> fetch ();
	}

	public function getUserLicences ( $username )
	{
		$rows = $this -> getNakupTable () -> where ( "FK_uzivatel", $username );
		foreach ( $rows as $row )
		{
			$appName = $this -> getAplikaceTable () -> select ( "nazev" ) -> where ( "ID_aplikace", $row [ 'licence' ]) -> fetch ();
			$row [ 'nazev' ] = $appName['nazev'];
		}
		return $rows;
	}

	public function getUserLicence ( $appId, $username )
	{
		$id = $this -> getLicenceTable () -> select ( "ID_licence" ) -> where ( "aplikace", $appId );
		return $this -> getNakupTable () -> where ( "licence", $id ) -> where ( "FK_uzivatel", $username );
	}
}
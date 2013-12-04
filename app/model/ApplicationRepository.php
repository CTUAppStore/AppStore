<?php
/**
 * Application Repository
 */

class ApplicationRepository extends BaseRepository
{
	private $m_AplikaceTable;
	private $m_AutorTable;
	private $m_KomentarTable;
	private $m_LicenceTable;
	private $m_NakupTable;
	private $m_ObrazekTable;

	/** @brief Konstruktor
	    @param Nette\Database\Connection Připojení do databáze
	*/
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

	/** @brief Vrací selektor tabulky Aplikace
	    @return Nette\\Database\\Table\\Selection
	*/
	public function getAplikaceTable ()
	{
		return $this -> connection -> table ( $this -> m_AplikaceTable );
	}

	/** @brief Vrací selektor tabulky Autor
	    @return Nette\\Database\\Table\\Selection
	*/
	public function getAutorTable ()
	{
		return $this -> connection -> table ( $this -> m_AutorTable );
	}

	/** @brief Vrací selektor tabulky Komentar
	    @return Nette\\Database\\Table\\Selection
	*/
	public function getKomentarTable ()
	{
		return $this -> connection -> table ( $this -> m_KomentarTable );
	}

	/** @brief Vrací selektor tabulky Licence
	    @return Nette\\Database\\Table\\Selection
	*/
	public function getLicenceTable ()
	{
		return $this -> connection -> table ( $this -> m_LicenceTable );
	}

	/** @brief Vrací selektor tabulky Nakup
	    @return Nette\\Database\\Table\\Selection
	*/
	public function getNakupTable ()
	{
		return $this -> connection -> table ( $this -> m_NakupTable );
	}

	/** @brief Vrací selektor tabulky Obrazek
	    @return Nette\\Database\\Table\\Selection
	*/
	public function getObrazekTable ()
	{
		return $this -> connection -> table ( $this -> m_ObrazekTable );
	}

	/** @brief Vrací data o aplikaci
	    @param int Id aplikace
	    @return Nette\\Database\\Table\\ActiveRow
	*/
	public function getApplicationData ( $id )
	{
		return $this -> getAplikaceTable () -> where ( "ID_aplikace", $id ) -> fetch ();
	}

	/** @brief Vrací informace o licenci pro aplikaci
	    @param int Id aplikace
	    @return Nette\\Database\\Table\\ActiveRow
	*/
	public function getApplicationLicenceInfo ( $id )
	{
		return $this -> getLicenceTable () -> where ( "aplikace", $id ) -> fetch ();
	}

	/** @brief Vrací selektor obrázků aplikace
	    @param int Id aplikace
	    @return Nette\\Database\\Table\\Selection
	*/
	public function getApplicationPictures ( $id )
	{
		return $this -> getObrazekTable () -> where ( "aplikace", $id );
	}

	/** @brief Vrací selektor komentářů aplikace
	    @param int Id aplikace
	    @return Nette\\Database\\Table\\Selection
	*/
	public function getApplicationComments ( $id )
	{
		return $this -> getKomentarTable () -> where ( "aplikace", $id );
	}

	/** @brief Vloží uživatelův komentář pro aplikaci
	    @param int Id aplikace
	    @param string Titulek komentáře
	    @param string Komentář
	    @param string Uživatelské jméno
	    @return Nette\\Database\\Table\\ActiveRow
	*/
	public function insertComment ( $appId, $title, $comment, $username )
	{
		return $this -> getKomentarTable () -> insert ( array (
			'nadpis' => $title,
			'obsah' => $comment,
			'aplikace' => $appId,
			'FK_uzivatel' => $username
			));
	}

	/** @brief Vrací selektor aplikací autora
	    @param string Uživatelské jméno autora
	    @return Nette\\Database\\Table\\Selection
	*/
	public function getAuthorApps ( $username )
	{
		return $this -> getAplikaceTable () -> where ( "FK_autor", $username );
	}

	/** @brief Vrací selektor tabulky Aplikace
	    @return Nette\\Database\\Table\\Selection
	*/
	public function getAppList ()
	{
		return $this -> getAplikaceTable ();
	}

	/** @brief Vrací selektor tabulky Autor
	    @return Nette\\Database\\Table\\Selection
	*/
	public function getAuthorsList ()
	{
		return $this -> getAutorTable ();
	}

	/** @brief Vrací data o autorovi
	    @param string Uživatelské jméno autora
	    @return Nette\\Database\\Table\\ActiveRow
	*/
	public function getAuthorData ( $username )
	{
		return $this -> getAutorTable () -> where ( "FK_username", $username ) -> fetch ();
	}

	/** @brief Vrací jmeno autora aplikace
	    @param int Id aplikace
	    @return Nette\\Database\\Table\\ActiveRow
	*/
	public function getAuthorName ( $appId )
	{
		$rowAuthor = $this -> getAplikaceTable () -> select ( "FK_autor" ) -> where ( "ID_aplikace", $appId );
		return $this -> getAutorTable () -> select ( "jmeno" ) -> where ( "FK_username", $rowAuthor ) -> fetch ();
	}

	/** @brief Vrací všechny uživatelovi licence
	    @param string Uživatelské jméno
	    @return Nette\\Database\\Table\\ActiveRow
	*/
	public function getUserLicences ( $username )
	{
		$rows = $this -> getNakupTable () -> where ( "FK_uzivatel", $username );
		foreach ( $rows as $row )
		{
			$appName = $this -> getAplikaceTable () -> where ( "ID_aplikace", $row [ 'licence' ]) -> fetch ();
			$row [ 'nazev' ] = $appName['nazev'];
		}
		return $rows;
	}

	/** @brief Vrací selektor licence uživatele pro aplikaci
	    @param int Id aplikace
	    @param string Uživatelské jméno
	    @return Nette\\Database\\Table\\Selection
	*/
	public function getUserLicence ( $appId, $username )
	{
		$id = $this -> getLicenceTable () -> select ( "ID_licence" ) -> where ( "aplikace", $appId );
		return $this -> getNakupTable () -> where ( "licence", $id ) -> where ( "FK_uzivatel", $username );
	}
}

<?php

namespace UserModule;

use \NiftyGrid\Grid;

/** Applications Catalog Grid.*/
class ApplicationsCatalogGrid extends Grid
{
    /** @brief Databázová tabulka kterou Grid zobrazuje */
    protected $data;

//    protected $article_id;

    
    /** @brief Konstruktor
	@param Nette\Database\Table Databázová tabulka
    */
    public function __construct($d)
    {
        parent::__construct();
        $this->data = $d;
    }

    /** @brief Provede veškeré nastavení Gridu
        @param Nette\ComponentModel\IComponent Presenter
        @return void
    */
    protected function configure($presenter)
    {
        $source = new \NiftyGrid\NDataSource($this->data);
        $this->setDataSource($source);

        $this->addColumn("nazev", "Nazev")
	    ->setTextFilter();
        $this->addColumn("popis", "Popis")
	    ->setTextFilter();
        $this->addColumn("OS", "OS")
	    ->setTextFilter();
        $this->addColumn("velikost", "Velikost")
	    ->setCellRenderer(function($row){return "text-align:right";})
	    ->setRenderer(function($row) use ($presenter){return \Nette\Utils\Html::el('span')->setText($row['velikost']."KB");})
	    ->setNumericFilter();


	$this->addButton("detail", "Detail")
	    ->setText("Detail")
	    ->setClass("edit")
	    ->setLink(function($row) use ($presenter){return $presenter->link(":User:Application:show", $row['ID_aplikace']);})
	    ->setAjax(FALSE);
    }
}
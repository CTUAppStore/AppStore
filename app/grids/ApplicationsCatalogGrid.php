<?php

namespace UserModule;

use \NiftyGrid\Grid;

class ApplicationsCatalogGrid extends Grid
{
    protected $data;

//    protected $article_id;

    public function __construct($d)
    {
        parent::__construct();
        $this->data = $d;
    }

    protected function configure($presenter)
    {
        $source = new \NiftyGrid\NDataSource($this->data);
        $this->setDataSource($source);

        $this->addColumn("nazev", "Nazev")
	    ->setTextFilter();
        $this->addColumn("popis", "Popis")
	    ->setTextFilter();

	$this->addButton("detail", "Detail")
	    ->setText("Detail")
	    ->setClass("edit")
	    ->setLink(function($row) use ($presenter){return $presenter->link(":User:Application:show", $row['ID_aplikace']);})
	    ->setAjax(FALSE);
    }
}
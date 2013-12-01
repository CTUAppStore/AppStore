<?php

namespace UserModule;

use \NiftyGrid\Grid;

class AuthorsCatalogGrid extends Grid
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

        $this->addColumn("jmeno", "Jmeno")
	    ->setTextFilter();
        $this->addColumn("email", "Email")
	    ->setTextFilter();

	$this->addButton("detail", "Detail")
	    ->setText("Detail")
	    ->setClass("edit")
	    ->setLink(function($row) use ($presenter){return $presenter->link(":User:Author:show", $row['FK_username']);})
	    ->setAjax(FALSE);
    }
}
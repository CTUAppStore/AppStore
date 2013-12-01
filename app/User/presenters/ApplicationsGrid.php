<?php
namespace UserModule;

use \NiftyGrid\Grid;

class ArticleGrid extends Grid{

    protected $articles;

    public function __construct($articles)
    {
        parent::__construct();
        $this->articles = $articles;
    }

    protected function configure($presenter)
    {
        //Vytvoříme si zdroj dat pro Grid
        //Při výběru dat vždy vybereme id
        $source = new \NiftyGrid\NDataSource($this->articles->select('article.id, title, status, published, category.name AS category_name, user.username, user.id AS user_id'));
        //Předáme zdroj
        $this->setDataSource($source);
    }
}
?>
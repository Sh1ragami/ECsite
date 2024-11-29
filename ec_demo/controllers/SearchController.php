<?php
require_once './models/Database.php';
require_once './models/Commodity.php';

class SearchController
{
    private $CommodityModel;

    public function __construct()
    {
        $db = new Database();
        $this->CommodityModel = new Commodity($db->getConnection());
    }

    // ホームページの表示
    public function showSearchPage()
    {
        // 商品一覧を取得   
        $commodities = $this->CommodityModel->getCommodityByQuery($_GET['query']);

        require './views/g7_search_results.php';
    }
}

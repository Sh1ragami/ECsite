<?php
require_once './models/Database.php';
require_once './models/Commodity.php';

class HomeController
{
    private $CommodityModel;

    public function __construct()
    {
        $db = new Database();
        $this->CommodityModel = new Commodity($db->getConnection());
    }

    // ホームページの表示
    public function showHomePage()
    {
        // 商品一覧を取得
        $commodities = $this->CommodityModel->getAllCommodities();

        require './views/g5_home.php';
    }
}

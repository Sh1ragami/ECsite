<?php
require_once './models/Database.php';
require_once './models/Commodity.php';

class DetailController
{
    private $CommodityModel;

    public function __construct()
    {
        $db = new Database();
        $this->CommodityModel = new Commodity($db->getConnection());
    }

    // 商品詳細ページの表示
    public function showDetailPage()
    {
        // 商品を取得
        $commodity = $this->CommodityModel->getCommodityByID($_GET['cm_ID']);
        // 関連商品を取得
        $commodities = $this->CommodityModel->getCommodityByCategory($_GET['category']);

        require './views/g8_commodity_detail.php';
    }
}

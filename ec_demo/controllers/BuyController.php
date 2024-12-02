<?php
session_start();
require_once './models/Database.php';
require_once './models/Cart.php';
require_once './models/Commodity.php';
require_once './models/User.php';

class BuyController
{
    private $CartModel;
    private $CommodityModel;
    private $UserModel;

    public function __construct()
    {
        $db = new Database();
        $this->CartModel = new Cart($db->getConnection());
        $this->CommodityModel = new Commodity($db->getConnection());
        $this->UserModel = new User($db->getConnection());
    }

    public function showBuyPage()
    {
        $is_logged_in = false;
        $cm_IDs = $_POST['cm_IDs'] ?? [];

        if (empty($cm_IDs)) {
            echo '商品が選択されていません。';
            exit;
        }
        $commodities = $this->CommodityModel->getCommoditiesByIDs($cm_IDs);

        // ログイン確認
        if (isset($_SESSION['user_ID'])) {
            $is_logged_in = true;
            $user = $this->UserModel->getUserByID($_SESSION['user_ID']);
            $name = explode('/', $user['name']);
            $address = explode('/', $user['address']);
        }
        require './views/g10_buy.php';
    }

    public function showBuyCheckPage()
    {
        // POSTデータから商品IDリストを取得
        $cm_IDs = $_POST['cm_IDs'] ?? [];
        if (empty($cm_IDs)) {
            echo '商品が選択されていません。';
            exit;
        }
        $commodities = $this->CommodityModel->getCommoditiesByIDs($cm_IDs);

        require './views/g11_buy_check.php';
    }

    public function showCompletePage()
    {
        require './views/g12_buy_complete.php';
    }
}

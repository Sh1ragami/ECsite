<?php
session_start();
require_once './models/Database.php';
require_once './models/Cart.php';
require_once './models/Commodity.php';

class CartController
{
    private $CartModel;
    private $CommodityModel;

    public function __construct()
    {
        $db = new Database();
        $this->CartModel = new Cart($db->getConnection());
        $this->CommodityModel = new Commodity($db->getConnection());
    }

    // カートの表示
    public function showCartPage()
    {
        $cart = [];
        $commodities = [];

        if (isset($_SESSION['user_ID'])) {
            $user_ID = $_SESSION['user_ID'];

            $cart = $this->CartModel->getCartByUserID($user_ID);

                if (!empty($cart)) {
                    // カート内の商品IDを収集
                    $commodityIDs = array_column($cart, 'cm_ID');

                    $commodities = $this->CommodityModel->getCommoditiesByIDs($commodityIDs);
                }

            require './views/g9_cart.php';
        } else {
            header('Location: ./login');
            exit;
        }
    }


    // カートを操作する処理
    public function actionCart()
    {
        if (isset($_SESSION['user_ID'])) {
            $user_ID = $_SESSION['user_ID'];

            if ($_POST['action'] == 'add') {
                $this->CartModel->addToCart($user_ID, $_POST['cm_ID'], $_POST['quantity']);
            } else if ($_POST['action'] == 'update') {
                $this->CartModel->updateToCart($user_ID, $_POST['cm_ID'], $_POST['quantity']);
            } else if ($_POST['action'] == 'delete') {
                $this->CartModel->deleteToCart($user_ID, $_POST['cm_ID'], $_POST['quantity']);
            }

            echo '<script>history.back();</script>';
        }
    }
}

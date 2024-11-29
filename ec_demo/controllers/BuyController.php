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
        $this->UserModel = new Commodity($db->getConnection());
    }

    public function showBuyPage()
    {

        $user_id = null;
        $user = [];
        $name = [];
        $address = [];
        $is_logged_in = false;

        // POSTデータから商品IDリストを取得
        $cm_IDs = $_POST['cm_IDs'] ?? [];
        if (empty($cm_IDs)) {
            echo '商品が選択されていません。';
            exit;
        }
        $commodities = $this->CommodityModel->getCommoditiesByIDs($cm_IDs);

        // ログイン確認
        if (isset($_SESSION['user_ID'])) {
            $user_id = $_SESSION['user_ID'];
            $is_logged_in = true;


            if ($user) {
                // ／区切りで保存したデータを分割して連想配列に保存
                $name = parseStringToArray($user['name']);
                $address = parseStringToArray($user['address']);
            } else {
                $is_logged_in = false; // ユーザーが見つからない場合
            }
            require './views/g10_buy.php';
        }
    }

    function parseStringToArray($input)
    {
        // 文字列を "／" で分割
        $parts = explode('/', $input);

        // 配列の長さが奇数の場合、エラーを返す
        if (count($parts) % 2 !== 0) {
            throw new Exception("入力文字列が不正です。キーと値のペアが必要です。");
        }

        // 空の連想配列を作成
        $result = [];

        // キーと値のペアを連想配列に格納
        for ($i = 0; $i < count($parts); $i += 2) {
            $key = $parts[$i];
            $value = $parts[$i + 1];
            $result[$key] = $value;
        }

        return $result;
    }



    public function showBuyCheckPage()
    {

        $user_id = null;
        $user = [];
        $name = [];
        $address = [];
        $is_logged_in = false;

        // POSTデータから商品IDリストを取得
        $cm_IDs = $_POST['cm_IDs'] ?? [];
        if (empty($cm_IDs)) {
            echo '商品が選択されていません。';
            exit;
        }
        // $commodities = $this->CommodityModel->getCommoditiesByIDs($cm_IDs);

        // ログイン確認
        if (isset($_SESSION['user_ID'])) {
            $user_id = $_SESSION['user_ID'];
            $is_logged_in = true;

            if ($user) {
                // ／区切りで保存したデータを分割して連想配列に保存
                $name = parseStringToArray($user['name']);
                $address = parseStringToArray($user['address']);
            } else {
                $is_logged_in = false; // ユーザーが見つからない場合
            }

            require './views/g11_buy_check.php';
        }
    }

    public function showCompletePage()
    {
        require './views/g15_change_complete.php';
    }
}

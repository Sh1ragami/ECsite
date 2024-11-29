<?php
session_start();
require_once './models/Database.php';
require_once './models/User.php';

class MyPageController
{
    private $UserModel;

    public function __construct()
    {
        $db = new Database();
        $this->UserModel = new User($db->getConnection());
    }

    // マイページの表示
    public function showMyPage()
    {
        if (isset($_SESSION['user_ID'])) {
            // ユーザー情報を取得
            $user = $this->UserModel->getUserByID($_SESSION['user_ID']);

            // スラッシュ区切りで分割するヘルパー関数
            function splitAndPad($input, $keys, $placeholder = '')
            {
                // スラッシュで分割
                $parts = explode('/', $input);
                // 不足分を補完
                while (count($parts) < count($keys)) {
                    $parts[] = $placeholder;
                }
                // キーと値で連想配列を作成
                return array_combine($keys, $parts);
            }

            // 名前と住所のキー配列
            $nameKeys = ['last_kanji', 'first_kanji', 'last_kana', 'first_kana'];
            $addressKeys = ['prefecture', 'municipality', 'address_below'];

            // 名前と住所を変換
            $name = splitAndPad($user['name'], $nameKeys);
            $address = splitAndPad($user['address'], $addressKeys);

            require './views/g13_my_page.php';
        } else {
            header('Location: ./login');
        }
    }
}

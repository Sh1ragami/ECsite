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
            $user = $this->UserModel->getUserByID($_SESSION['user_ID']);
            $name = explode('/', $user['name']);
            $address = explode('/', $user['address']);
            require './views/g13_my_page.php';
        } else {
            header('Location: ./login');
        }
    }
}

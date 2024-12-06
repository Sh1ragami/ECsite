<?php
require_once './models/Database.php';
require_once './models/User.php';

class AuthController
{
    private $UserModel;

    public function __construct()
    {
        $db = new Database();
        $this->UserModel = new User($db->getConnection());
    }

    // ログインフォームを表示
    public function showLoginPage()
    {
        require './views/g6_login.php';
    }

    // ログイン情報変更ページを表示
    public function showChangePage()
    {
        if (isset($_SESSION['user_ID'])) {
            require './views/g14_change_login.php';
        } else {
            header('Location: ./login');
        }
    }

    // ログイン情報を変更する処理
    public function changeLoginInfo()
    {
        if (isset($_SESSION['user_ID'])) {
            $this->UserModel->updateUser($_SESSION['user_ID'], $_POST['mail'], $_POST['password']);
        }
        header('Location: ./');
    }

    // ログイン処理
    public function userLogin()
    {
        $user = $this->UserModel->loginUser($_POST['mail'], $_POST['password']);
        if ($user) {
            $_SESSION['user_ID'] = $user['user_ID'];
            header('Location: ./');
        } else {
            $message = 'ログインに失敗しました。';
            require './views/g6_login.php';
        }
    }

    // ログアウト処理
    public function userLogout()
    {
        $_SESSION = array();
        session_destroy();
        header('Location: ./');
    }

    // 新規会員登録ページを表示
    public function showRegisterPage()
    {
        require './views/g1_register.php';
    }

    // 個人情報入力を表示
    public function showPersonalPage()
    {
        require './views/g2_personal_info.php';
    }

    // ユーザー登録後、仮登録画面を表示
    public function userRegister()
    {
        $name = $_POST['last_kanji'] . '/' . $_POST['first_kana'] . '/' . $_POST['last_kana'] . '/' . $_POST['first_kana'];
        $address = ['prefectures'] . '/' . $_POST['municipality'] . '/' . $_POST['address_below'];

        $this->UserModel->registerUser($name, $_POST["mail"], $_POST["password"], $_POST["pay_info"], $address);
        require './views/g3_email_verification.php';
    }
}

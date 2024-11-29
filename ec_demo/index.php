<?php
session_start();
require_once './models/Database.php';
require_once './controllers/HomeController.php';
require_once './controllers/AuthController.php';
require_once './controllers/DetailController.php';
require_once './controllers/SearchController.php';
require_once './controllers/CartController.php';
require_once './controllers/BuyController.php';
require_once './controllers/MyPageController.php';
require_once './public/Router.php';


// ここでエラーが起きた場合、コマンドパレットで Intelephense: Clear Cache を実行すると治る
$router = new Router();

// ルートの登録
$router->addRoute('GET', '/', 'HomeController@showHomePage'); // ホームページ
$router->addRoute('GET', '/home', 'HomeController@showHomePage'); // ホームページ
$router->addRoute('GET', '/login', 'AuthController@showLoginPage'); // ログインページ
$router->addRoute('POST', '/login', 'AuthController@userLogin'); // ログイン処理
$router->addRoute('GET', '/logout', 'AuthController@userLogout'); // ログアウト処理
$router->addRoute('GET', '/register', 'AuthController@showRegisterPage'); // 新規会員登録ページ
$router->addRoute('POST', '/info', 'AuthController@showPersonalPage'); // 個人情報入力ページ
$router->addRoute('POST', '/verification', 'AuthController@userRegister'); // 仮登録ページ
$router->addRoute('GET', '/detail', 'DetailController@showDetailPage'); // 商品詳細ページ
$router->addRoute('GET', '/search', 'SearchController@showSearchPage'); // 検索結果ページ
$router->addRoute('GET', '/cart', 'CartController@showCartPage'); // カートページ
$router->addRoute('POST', '/cart', 'CartController@actionCart'); // カート追加処理
$router->addRoute('POST', '/buy', 'BuyController@showBuyPage');
$router->addRoute('POST', '/check', 'BuyController@showBuyCheckPage');
$router->addRoute('POST', '/complete', 'BuyController@showCompletePage');
$router->addRoute('GET', '/my', 'MyPageController@showMyPage');
$router->addRoute('GET', '/change', 'AuthController@showChangePage');
$router->addRoute('POST', '/change', 'AuthController@changeLoginInfo');

// リクエスト処理
$router->handleRequest();

<?php
class Router
{
    private $routes = [];

    // ルートの登録
    public function addRoute($method, $uri, $controllerMethod)
    {
        $this->routes[] = [
            'method' => $method,
            'uri' => $uri,
            'controllerMethod' => $controllerMethod,
        ];
    }

    // リクエストを処理
    public function handleRequest()
    {
        // リクエストURIを取得し、サブディレクトリ部分を正規化
        $requestUri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        $requestMethod = $_SERVER['REQUEST_METHOD'];

        // サブディレクトリがある場合、それを削除
        $requestUri = str_replace('/ec_demo', '', $requestUri);

        // ルートを検索
        foreach ($this->routes as $route) {
            // メソッドとURIが一致する場合
            if ($route['method'] === $requestMethod && $route['uri'] === $requestUri) {
                // コントローラーメソッドを呼び出す
                list($controller, $method) = explode('@', $route['controllerMethod']);

                // コントローラが存在するか確認
                if (class_exists($controller)) {
                    $controllerInstance = new $controller();

                    // メソッドが存在するか確認
                    if (method_exists($controllerInstance, $method)) {
                        $controllerInstance->$method();
                        return;
                    } else {
                        // メソッドが見つからない場合
                        http_response_code(404);
                        echo "Method not found";
                        return;
                    }
                } else {
                    // コントローラが見つからない場合
                    http_response_code(404);
                    echo "Controller not found";
                    return;
                }
            }
        }

        // マッチしない場合
        http_response_code(404);
        echo "Page not found";
    }
}

<?php

namespace app\core;

use app\controllers\Auth;
use app\controllers\User;

class Application
{

    public Database $db;
    public Response $response;
    public Request $request;
    public Session $session;
    public Auth $auth;
    public ?User $user = null;

    public static Application $app;

    public static string $ROOT_DIR;

    public function __construct()
    {
        $this->response = new Response();
        $this->request = new Request();
        $this->db = new Database();
        $this->session = new Session();

        self::$ROOT_DIR = dirname(__DIR__);
        self::$app = $this;

        if ($this->session->get("auth_token")) {
            $this->auth = new Auth();
            $this->user = new User();
            $token = $this->auth->getSessionToken();
           $user = $this->user->getAuthenticatedUser($token->user_id);
            if ($user) $this->user->set($user);
            else $this->user = null;
        }
    }

    public function anonymous(): bool
    {
        return !self::$app->user;
    }

    public function getRoutes(string $dir = "../src/pages"): array
    {
        $pagesDir = "../src/pages";
        $paths = glob($dir . "/*");

        $pages = [];

        foreach ($paths as $path) {
            if (file_exists($path . "/_middleware.php")) {
                $pages[str_replace([$pagesDir, "/index", ".php"], "", $path) ?: '/']['middleware'] = $path . "/_middleware.php";
            }
            if (is_file($path)) {
                if (str_ends_with($path, "_middleware.php")) continue;
                $pages[str_replace([$pagesDir, "/index", ".php"], "", $path) ?: '/']["path"] = $path;
            } else {
                foreach ($this->getRoutes($path) as $route => $file) {
                    $pages[$route] = $file;
                    if (file_exists($path . "/_middleware.php")) {
                        $pages[$route]['middleware'] = $path . "/_middleware.php";
                    }
                };
            }
        }
        return $pages;
    }

    public function resolve()
    {
        $routes = $this->getRoutes();

        $url = $this->request->url ?: "/";
        $method = $this->request->method;
        $path = $routes[$url]["path"] ?? false;
        $middleware = $routes[$url]["middleware"] ?? false;

        $params = [];

        if (!$path) {
            foreach ($routes as $route => $actions) {
                $routeUrl = $route;
                preg_match_all('/{[^}]+}/', $route, $keys);
                $route = preg_replace('/{[^}]+}/', '(.+)', $route);
                if (preg_match("%^{$route}$%", $url, $matches)) {
                    unset($matches[0]);
                    foreach (array_values($matches) as $index => $param) {
                        if (str_contains($param, '/')) {
                            $params = [];
                            break;
                        }

                        $params[trim($keys[0][$index], '{}')] = $param;
                    }
                    if (empty($params)) break;
                    $path = $actions["path"];
                    $middleware = $actions["middleware"] ?? false;
                    break;
                }
            }
        }

        $this->request->setParams($params);

        if ($middleware !== false) call_user_func(include_once $middleware, $this->request, $this->response);

        if (!$path) {
            $this->response->status(404);
            include_once self::$ROOT_DIR . "\\pages\\_404.php";
        } else {
            ob_start();
            $getProps = include $path;
            if (is_array($getProps)) $getProps[0] = new $getProps[0];
            $props = is_callable($getProps) ? call_user_func($getProps, $this->request, $this->response) : null;
            ob_end_clean();

            $callback = include $path;

            if (is_array($callback)) $callback[0] = new $callback[0];

            if (is_callable($callback)) call_user_func($callback, $this->request, $this->response);
        }
    }

    public function init()
    {
        try {
            $this->resolve();
        } catch (\Exception $e) {
            $this->response->status(is_int($e->getCode()) ? $e->getCode() : 500);
            include self::$ROOT_DIR . "\\pages\\_error.php";
        }
    }
}
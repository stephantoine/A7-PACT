<?php

namespace app\core;


use app\core\exception\NotFoundException;
use app\core\exceptions\ForbiddenException;

class Application
{
    public static string $ROOT_DIR;

    public string $layout = 'main';
    public static Application $app;
    public Router $router;
    public Database $db;
    public Request $request;
    public Response $response;
    public ?Controller $controller = null;
    public Session $session;
    public string $userClass;
    public ?DBModel $user = null;
    public View $view;

    public function __construct(string $rootPath, array $config)
    {
        self::$ROOT_DIR = $rootPath;
        self::$app = $this;
        
        $this->request = new Request();
        $this->response = new Response();
        $this->router = new Router($this->request, $this->response);
        $this->db = new Database($config['db']);
        $this->session = new Session();
        $this->userClass = $config['userClass'];
        $this->view = new View();

        // Get the primary key of the user from the session
        $pkValue = $this->session->get('user');
        if ($pkValue) {
            $pk = $this->userClass::pk();
            $this->user = $this->userClass::findOne([$pk => $pkValue]);
        }
    }

    public function run() {
        try {
            echo $this->router->resolve();
        } catch (\Exception $e) {
            // Set the status code
            if ($e instanceof NotFoundException) {
                $this->response->setStatusCode($e->getCode());
            } elseif ($e instanceof ForbiddenException) {
                $this->response->setStatusCode($e->getCode());
            } else {
                $this->response->setStatusCode(500);
            }

            echo $this->view->renderView('_error', [
                'exception' => $e
            ]);
        }
    }

    public function getController(): Controller
    {
        return $this->controller;
    }

    public function setController(Controller $controller): void
    {
        $this->controller = $controller;
    }

    public function login(DBModel $user): bool
    {
        $this->user = $user;
        $pk = $user->pk();
        $pkValue = $user->{$pk};
        $this->session->set('user', $pkValue);

        return true;
    }

    public function logout()
    {
        $this->user = null;
        $this->session->remove('user');
    }

    public function isAuthenticated(): bool
    {
        return $this->user !== null;
    }
}

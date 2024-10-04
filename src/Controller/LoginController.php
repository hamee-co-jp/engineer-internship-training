<?php

declare(strict_types=1);

require_once '/var/www/src/Controller/AppController.php';

class LoginController extends AppController
{
    /**
     * ログイン画面を表示
     *
     * @return void
     */
    public function index(): void
    {
        $pageName = 'HOME / N（ベータバージョン）';
        $this->assign('pageName', $pageName);

        $this->show('Login/index.php');
    }

    /**
     * ログインする
     *
     * @return void
     */
    public function sign_in(): void
    {
        $name = $this->request->getData('name');

        $_SESSION['name'] = $name;

        header('Location: /');
    }

    /**
     * ログアウトする
     *
     * @return void
     */
    public function sign_out(): void
    {
        // setcookie(session_name(), '', time()-1, '/');
        session_destroy();

        header('Location: /Login/index');
    }
}

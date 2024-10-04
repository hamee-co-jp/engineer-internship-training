<?php

declare(strict_types=1);

require_once '/var/www/modules/ServerRequest.php';
require_once '/var/www/modules/TemplateEngine.php';

class AppController
{
    /** @var ServerRequest $request */
    protected $request;

    /** @var TemplateEngine $templateEngine */
    protected $templateEngine;

    /**
     * AppController constructor.
     */
    public function __construct()
    {
        session_start();

        $this->request = new ServerRequest();
        $this->templateEngine = TemplateEngine::factory();
    }

    /**
     * 表示する値を挿入する
     *
     * @param string $key 挿入する対象
     * @param mixed $values 表示される値
     * @return void
     */
    protected function assign(string $key, $values): void
    {
        $this->templateEngine->assign($key, $values);
    }

    /**
     * テンプレートを表示する
     *
     * @param string $templateName 表示するテンプレートの名前
     * @return void
     */
    protected function show(string $templateName): void
    {
        include($this->templateEngine->path($templateName));
    }

    /**
     * 格納された値を取得する
     *
     * @param string $key 取得する対象
     * @return mixed
     */
    protected function get(string $key)
    {
        return $this->templateEngine->get($key);
    }
}

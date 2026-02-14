<?php

namespace Framework;

class Request
{
    public function __construct(
        public string $uri
    ) {}

    public function getMethod(): string
    {
        return strtoupper($_SERVER['REQUEST_METHOD']);
    }

    public function isGet(): bool {
        return $this->getMethod() == 'GET';
    }

    public function isPost(): bool {
        return $this->getMethod() == 'POST';
    }

    public function isPut(): bool {
        return $this->getMethod() == 'PUT';
    }

    public function isDelete(): bool {
        return $this->getMethod() == 'DELETE';
    }

    public function isPatch(): bool {
        return $this->getMethod() == 'PATCH';
    }

    public function getUri(): string {
        return $this->uri;
    }

    public function isAjax(): bool
    {
        return isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'XMLHttpRequest';
    }

    public function get($name, $default = null)
    {
        return $_GET[$name] ?? $default;
    }

    public function post($name, $default = null)
    {
        return $_POST[$name] ?? $default;
    }

    public function getPath() {
        return $this->removeQueryString();
    }

    protected function removeQueryString() {
        if ($this->uri) {
            $params = explode('?', $this->uri);
            return trim($params[0], '/');
        }
        return '';
    }
}

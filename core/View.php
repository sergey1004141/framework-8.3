<?php

namespace Framework;

class View
{
    public string $content = "";
    public array $css = [];
    public array $js = [];

    public function __construct(
        public string $layout = 'default',
    )
    {
    }

    public function render($view, array $data, $layout = ''): bool|string
    {
        extract($data);

        $file = preg_split('#([/\\\])#', debug_backtrace()[0]['file']);
        array_pop($file);
        $folder = '';
        if (!preg_match('/^controllers|helpers|models$/', strtolower(end($file)))) {
            $folder = implode('/', $file);
        }

        $view_file = ($folder ?: VIEWS) . "/{$view}.php";

        if (is_file($view_file)) {
            ob_start();
            require $view_file;
            $this->content = ob_get_clean();
        } else {
            abort("View {$view_file} not found.");
        }

        if (false === $layout || $folder) {
            return $this->content;
        }

        $layout_file_name = $layout ?: $this->layout;
        $layout_file = LAYOUTS . "/{$layout_file_name}.php";
        if (is_file($layout_file)) {
            ob_start();
            require $layout_file;
            return ob_get_clean();
        } else {
            abort("Layout {$layout_file} not found.", 500);
            return $this->content;
        }
    }

    public function registerCSS($path): void
    {
        $this->css[] = $path;
    }

    public function registerJS($path): void
    {
        $this->js[] = WEB . $path;
    }

    public function renderCSS(): void
    {
        foreach ($this->css as $file) {
            $hash = hash('crc32', $file);
            echo "<link rel='stylesheet' type='text/css' href='{$file}?v={$hash}' />\n";
        }
    }

    public function renderJS(): void
    {
        foreach ($this->js as $file) {
            $hash = hash('crc32', $file);
            echo "<script type='text/javascript' src='{$file}?v={$hash}'></script>\n";
        }
    }

}
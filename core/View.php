<?php

namespace Framework;

class View
{
    public string $content = "";

    public function __construct(
        public string $layout = 'default',
    )
    {
    }

    public function render($view, array $data, $layout = ''): bool|string
    {
        extract($data);
        $view_file = VIEWS . "/{$view}.php";

        if (is_file($view_file)) {
            ob_start();
            require $view_file;
            $this->content = ob_get_clean();
        } else {
            abort("View {$view_file} not found.");
        }

        if (false === $layout) {
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
}
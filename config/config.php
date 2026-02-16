<?php

define('ROOT', dirname(__DIR__));
define("PATH", $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['SERVER_NAME']);
define("HOST", $_SERVER['SERVER_NAME']);
const CONFIG = ROOT . '/config';
const WWW = ROOT . '/public';
const HELPERS = ROOT . '/helpers';
const CORE = ROOT . '/core';
const WEB = ROOT . '/public';
const APP = ROOT . '/app';
const VIEWS = APP . '/Views';
const LAYOUTS = VIEWS . '/layouts';
const APP_NAME = 'Мой фреймворк';
const LANG = ROOT . '/lang';

const config = [
    'lang' => 'ru',
    'debug' => true
];

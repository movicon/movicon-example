<?php
/**
 * The only purpose of this file is to illustrate a 'route'. A 'route' is any
 * script accessible from the web that prints a document.
 *
 * Please delete this file in production.
 */
require_once "../vendor/autoload.php";
require_once "../config.php";
use views\Route1View;

$v = new Route1View();
$v->printDocument();

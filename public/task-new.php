<?php
require_once "../vendor/autoload.php";
require_once "../config.php";
use views\TaskNewView;

$v = new TaskNewView();
$v->printDocument();

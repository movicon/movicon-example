<?php
require_once "../vendor/autoload.php";
require_once "../config.php";
use views\TaskDeleteView;

$v = new TaskDeleteView();
$v->printDocument();

<?php
require_once "../vendor/autoload.php";
require_once "../config.php";
use views\TasksView;

$v = new TasksView();
$v->printDocument();

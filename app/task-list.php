<?php
require_once "../vendor/autoload.php";
require_once "../config.php";
use views\TaskListView;

$v = new TaskListView();
$v->printDocument();

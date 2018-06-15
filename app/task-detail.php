<?php
require_once "../vendor/autoload.php";
require_once "../config.php";
use views\TaskDetailView;

$v = new TaskDetailView();
$v->printDocument();

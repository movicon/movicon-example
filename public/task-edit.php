<?php
require_once "../vendor/autoload.php";
require_once "../config.php";
use views\TaskEditView;

$v = new TaskEditView();
$v->printDocument();

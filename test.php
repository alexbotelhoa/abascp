<?php

require_once("../vendor/autoload.php");
require_once("app/config.php");
require_once("app/functions.php");

use SCP\Model\Project;
use SCP\Model\Task;

$class = new Task();

$content = [
    [
        "foo0" => 'foo',
        "foo1" => 'foo',
        "foo2" => 'foo'
    ]
];

$value = $class->getTaskPage("idtask ASC", 1, 1);

var_dump($value);
<?php

use Hallyz\Page;

/*
 * ##########################################################################################
 * Páginas do Site - INICIO
 */


  //////////////////////////////////////////////////////
 ///                    STATUS                      ///
//////////////////////////////////////////////////////

$app->get("/status/notlate", function() {

    header("Location: /");

    exit;

});

$app->get("/status/late", function() {

    header("Location: /");

    exit;

});



  //////////////////////////////////////////////////////
 ///                    TAREFAS                     ///
//////////////////////////////////////////////////////

$app->get("/tasks", function() {

    $page = new Page();

    $page->setTpl("tasks", [
        "tasks" => []
    ]);

});

$app->get("/tasks/create", function() {

    $page = new Page();

    $page->setTpl("tasks-create");

});

$app->post("/tasks/create", function() {

    header("Location: /tasks");

    exit;

});

$app->get("/tasks/:idtask", function($idtask) {

    $page = new Page();

    $page->setTpl("tasks-update");

});

$app->post("/tasks/:idtask", function($idtask) {

    header("Location: /tasks");

    exit;

});

$app->get("/tasks/:idtask/details", function($idtask) {

    $page = new Page();

    $page->setTpl("/projects-details");

});

$app->get("/tasks/:idtask/delete", function($idtask) {

    header("Location: /tasks");

    exit;

});



  //////////////////////////////////////////////////////
 ///                    PROJETOS                    ///
//////////////////////////////////////////////////////

$app->get("/projects", function() {

    $page = new Page();

    $page->setTpl("projects", [
        "projects" => []
    ]);

});

$app->get("/projects/create", function() {

    $page = new Page();

    $page->setTpl("projects-create");

});

$app->post("/projects/create", function() {

    header("Location: /projects");

    exit;

});

$app->get("/projects/:idproject", function($idproject) {

    $page = new Page();

    $page->setTpl("projects-update");

});

$app->post("/projects/:idproject", function($idproject) {

    header("Location: /projects");

    exit;

});

$app->get("/projects/:idproject/details", function($idproject) {

    $page = new Page();

    $page->setTpl("/projects-details");

});

$app->get("/projects/:idproject/delete", function($idproject) {

    header("Location: /projects");

    exit;

});



  //////////////////////////////////////////////////////
 ///                    PRINCIPAL                   ///
//////////////////////////////////////////////////////

$app->get("/newsletter", function() {

    $page = new Page();

    $page->setTpl("index");

});

$app->get("/45-98413-6611", function() {

    $page = new Page();

    $page->setTpl("index");

});

$app->get("/", function() {

    $page = new Page();

    $page->setTpl("index");

});

?>
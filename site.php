<?php

use Hallyz\Page;

/*
 * ##########################################################################################
 * Páginas do Site - INICIO
 */


  //////////////////////////////////////////////////
 ///                    NIVEIS                  ///
//////////////////////////////////////////////////

$app->get("/levels/urgent", function() {

    header("Location: /");

    exit;

});

$app->get("/levels/attention", function() {

    header("Location: /");

    exit;

});

$app->get("/levels/normal", function() {

    header("Location: /");

    exit;

});

$app->get("/levels", function() {

    $page = new Page();

    $page->setTpl("index");

});



  //////////////////////////////////////////////////////
 ///                    TAREFAS                     ///
//////////////////////////////////////////////////////

$app->get("/projects/:idproject/delete", function($idproject) {

    header("Location: /projects");

    exit;

});

$app->get("/projects/:idproject/details", function($idproject) {

    $page = new Page();

    $page->setTpl("/projects-details");

});

$app->post("/projects/:idproject", function($idproject) {

    header("Location: /projects");

    exit;

});

$app->get("/tasks/:idproject", function($idproject) {

    $page = new Page();

    $page->setTpl("tasks-update");

});

$app->post("/tasks/create", function() {

    header("Location: /tasks");

    exit;

});

$app->get("/tasks/create", function() {

    $page = new Page();

    $page->setTpl("tasks-create");

});

$app->get("/tasks", function() {

    $page = new Page();

    $page->setTpl("tasks", [
        "tasks" => []
    ]);

});



  //////////////////////////////////////////////////////
 ///                    PROJETOS                    ///
//////////////////////////////////////////////////////

$app->get("/projects/:idproject/delete", function($idproject) {

    header("Location: /projects");

    exit;

});

$app->get("/projects/:idproject/details", function($idproject) {

    $page = new Page();

    $page->setTpl("/projects-details");

});

$app->post("/projects/:idproject", function($idproject) {

    header("Location: /projects");

    exit;

});

$app->get("/projects/:idproject", function($idproject) {

    $page = new Page();

    $page->setTpl("projects-update");

});

$app->post("/projects/create", function() {

    header("Location: /projects");

    exit;

});

$app->get("/projects/create", function() {

    $page = new Page();

    $page->setTpl("projects-create");

});

$app->get("/projects", function() {

    $page = new Page();

    $page->setTpl("projects", [
        "projects" => []
    ]);

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
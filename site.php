<?php

use Hallyz\Page;
use Hallyz\Model\Message;
use Hallyz\Model\Order;
use Hallyz\Model\Project;
use Hallyz\Model\Task;

/*
 * ##########################################################################################
 * Páginas do Site - INICIO
 */



//////////////////////////////////////////////////////
///                    PRINCIPAL                   ///
//////////////////////////////////////////////////////

$app->get("/", function() {

    $projects = Project::listProjectIndex();

    $projectslate = Project::listAllLate();

    $task = Task::listTaskIndex();

    $nrlates = count($projectslate);

    $projectsnotlate = Project::listAllNotLate();

    $nrnotlates = count($projectsnotlate);

    $page = new Page();

    $page->setTpl("index", [
        "projects" => $projects,
        "tasks" => $task,
        "nrnotlates" => (int)$nrnotlates,
        "nrlates" => $nrlates
    ]);

});

$app->get("/order/:page/:order", function($page, $order) {

    Order::getOrder($page, $order);

    header("Location: /$page");

    exit;

});

$app->get("/about", function() {

    $page = new Page();

    $page->setTpl("about");

});

$app->get("/45-98413-6611", function() {

    header("Location: /");

    exit;

});

$app->get("/newsletter", function() {

    header("Location: /");

    exit;

});



  //////////////////////////////////////////////////////
 ///                    PROJETOS                    ///
//////////////////////////////////////////////////////

$app->get("/projects", function() {

    (isset($_SESSION['ordemproject'])) ? $ordem = $_SESSION['ordemproject'] : $ordem = "desproject";

    $page = (isset($_GET['page'])) ? (int)$_GET['page'] : 1;

    $projects = new Project();

    $pagination = $projects->getProjectPage($ordem, $page);

    $pages = [];

    for ($i = 1; $i <= $pagination['pages']; $i++) {
        array_push($pages, [
            'link' => '/projects?page=' . $i,
            'page' => $i
        ]);
    }

    $page = new Page();

    $page->setTpl("projects", [
        "projects" => $pagination['data'],
        "error" => Message::getError(),
        "success" => Message::getSuccess(),
        "pages" => $pages
    ]);

});

$app->get("/projects/create", function() {

    $page = new Page();

    $page->setTpl("projects-create");

});

$app->post("/projects/create", function() {

    $project = new Project();

    $project->setData($_POST);

    $project->save();

    Message::setSuccess("Dados incluídos com sucesso!");

    header("Location: /projects");

    exit;

});

$app->get("/projects/:idproject/update", function($idproject) {

    $project = new Project();

    $project->get((int)$idproject);

    $project->setdtstart(date_format(date_create($project->getdtstart()), 'Y-m-d'));

    $project->setdtfinish(date_format(date_create($project->getdtfinish()), 'Y-m-d'));

    $page = new Page();

    $page->setTpl("projects-update", [
        "project" => $project->getValues()
    ]);

});

$app->post("/projects/:idproject/update", function($idproject) {

    $project = new Project();

    $project->get((int)$idproject);

    $_POST['rtprojetc'] = $project->getrtproject();
    $_POST['stprojetc'] = $project->getstproject();

    $project->setData($_POST);

    $project->save();

    Project::updateRate($idproject);

    Project::updateLate($idproject);

    Message::setSuccess("Dados alterados com sucesso!");

    header("Location: /projects");

    exit;

});

$app->get("/projects/:idproject/details", function($idproject) {

    $project = new Project();

    $project->get((int)$idproject);

    $project->setdtstart(date_format(date_create($project->getdtstart()), 'Y-m-d'));

    $project->setdtfinish(date_format(date_create($project->getdtfinish()), 'Y-m-d'));

    ($project->getstproject() == 0) ? $status = "Não" : $status = "Sim" ;

    $page = new Page();

    $page->setTpl("/projects-details", [
        "project" => $project->getValues(),
        "status" => $status
    ]);

});

$app->get("/projects/:idproject/delete", function($idproject) {

    $checkTaks = Project::checkTask($idproject);

    if (count($checkTaks) > 0) {

        Message::setError("Existem tarefas vinculadas a esse projeto!");

        header("Location: /projects");

        exit;

    }

    $project = new Project();

    $project->get((int)$idproject);

    $project->delete();

    Message::setSuccess("Dados excluídos com sucesso!");

    header("Location: /projects");

    exit;

});



  //////////////////////////////////////////////////////
 ///                    TAREFAS                     ///
//////////////////////////////////////////////////////

$app->get("/tasks", function() {

    (isset($_SESSION['ordemtask'])) ? $ordem = $_SESSION['ordemtask'] : $ordem = "destask";

    $page = (isset($_GET['page'])) ? (int)$_GET['page'] : 1;

    $tasks = new Task();

    $pagination = $tasks->getTaskPage($ordem, $page);

    $pages = [];

    for ($i = 1; $i <= $pagination['pages']; $i++) {
        array_push($pages, [
            'link' => '/tasks?page=' . $i,
            'page' => $i
        ]);
    }

    $page = new Page();

    $page->setTpl("tasks", [
        "tasks" => $pagination['data'],
        "error" => Message::getError(),
        "success" => Message::getSuccess(),
        "pages" => $pages
    ]);

});

$app->get("/tasks/create", function() {

    $page = new Page();

    $page->setTpl("tasks-create", [
        "projects" => Project::listAll()
    ]);

});

$app->post("/tasks/create", function() {

    $tasks= new Task();

    $tasks->setData($_POST);

    $tasks->save();

    Project::updateRate($_POST['idproject']);

    Project::updateLate($_POST['idproject']);

    Message::setSuccess("Dados incluídos com sucesso!");

    header("Location: /tasks");

    exit;

});

$app->get("/tasks/:idtask/update", function($idtask) {

    $tasks = new Task();

    $tasks->get((int)$idtask);

    $tasks->setdtstart(date_format(date_create($tasks->getdtstart()), 'Y-m-d'));

    $tasks->setdtfinish(date_format(date_create($tasks->getdtfinish()), 'Y-m-d'));

    $page = new Page();

    $page->setTpl("tasks-update", [
        "task" => $tasks->getValues(),
        "projects" => Project::listAll()
    ]);

});

$app->post("/tasks/:idtask/update", function($idtask) {

    $tasks = new Task();

    $tasks->get((int)$idtask);

    $_POST['sttask'] = $tasks->getsttask();

    $tasks->setData($_POST);

    $tasks->save();

    Project::updateRate($tasks->getidproject());

    Project::updateLate($tasks->getidproject());

    Message::setSuccess("Dados alterados com sucesso!");

    header("Location: /tasks");

    exit;

});

$app->get("/tasks/:idtask/situation", function($idtask) {

    $tasks = new Task();

    $tasks->get((int)$idtask);

    ($tasks->getsttask() == 0) ? $situation = 1 : $situation = 0 ;

    $tasks->situation($idtask, $situation);

    Project::updateRate($tasks->getidproject());

    Message::setSuccess("Dados alterados com sucesso!");

    header("Location: /tasks");

    exit;

});

$app->get("/tasks/:idtask/delete", function($idtask) {

    $tasks = new Task();

    $tasks->get((int)$idtask);

    $tasks->delete();

    Message::setSuccess("Dados excluídos com sucesso!");

    header("Location: /tasks");

    exit;

});



  //////////////////////////////////////////////////////
 ///                    STATUS                      ///
//////////////////////////////////////////////////////

$app->get("/status", function() {

    (isset($_SESSION['ordemlate'])) ? $ordemlate = $_SESSION['ordemlate'] : $ordemlate = "desproject";

    (isset($_SESSION['ordemnotlate'])) ? $ordemnotlate = $_SESSION['ordemnotlate'] : $ordemnotlate = "desproject";

    $projectslate = Project::listAllLate($ordemlate);

    $projectsnotlate = Project::listAllNotLate($ordemnotlate);

    $page = new Page();

    $page->setTpl("status", [
        "projectslate" => $projectslate,
        "projectsnotlate" => $projectsnotlate
    ]);

});

?>
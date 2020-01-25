<?php

use Hallyz\Page;
use Hallyz\Model\Message;
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

    $projects = Project::listAll();

    $projectslate = Project::listAllLate();

    $nrlates = count($projectslate);

    $projectsnotlate = Project::listAllNotLate();

    $nrnotlates = count($projectsnotlate);

    $page = new Page();

    $page->setTpl("index", [
        "projects" => $projects,
        "nrnotlates" => (int)$nrnotlates,
        "nrlates" => $nrlates
    ]);

});

$app->get("/45-98413-6611", function() {

    $page = new Page();

    $page->setTpl("index");

});

$app->get("/newsletter", function() {

    $page = new Page();

    $page->setTpl("index");

});



  //////////////////////////////////////////////////////
 ///                    PROJETOS                    ///
//////////////////////////////////////////////////////

$app->get("/projects", function() {

    $projects = Project::listAll();

    //$checkTaks = Project::checkTask((int)$projects->getidproject());

    $page = new Page();

    $page->setTpl("projects", [
        "projects" => $projects,
        "error" => Message::getError(),
        "success" => Message::getSuccess()
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

$app->get("/projects/:idproject", function($idproject) {

    $project = new Project();

    $project->get((int)$idproject);

    $project->setdtstart(date_format(date_create($project->getdtstart()), 'Y-m-d'));

    $project->setdtfinish(date_format(date_create($project->getdtfinish()), 'Y-m-d'));

    $page = new Page();

    $page->setTpl("projects-update", [
        "project" => $project->getValues()
    ]);

});

$app->post("/projects/:idproject", function($idproject) {

    $project = new Project();

    $project->get((int)$idproject);

    $_POST['rtprojetc'] = $project->getrtproject();
    $_POST['stprojetc'] = $project->getstproject();

    $project->setData($_POST);

    $project->save();

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

    $tasks = Task::listAll();

    $page = new Page();

    $page->setTpl("tasks", [
        "tasks" => $tasks,
        "error" => Message::getError(),
        "success" => Message::getSuccess()
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

    Message::setSuccess("Dados incluídos com sucesso!");

    header("Location: /tasks");

    exit;

});

$app->get("/tasks/:idtask", function($idtask) {

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

$app->post("/tasks/:idtask", function($idtask) {

    $tasks = new Task();

    $tasks->get((int)$idtask);

    $_POST['sttask'] = $tasks->getsttask();

    $tasks->setData($_POST);

    $tasks->save();

    Message::setSuccess("Dados alterados com sucesso!");

    header("Location: /tasks");

    exit;

});

$app->get("/tasks/:idtask/situation", function($idtask) {

    $tasks = new Task();

    $tasks->get((int)$idtask);

    ($tasks->getsttask() == 0) ? $situation = 1 : $situation = 0 ;

    $tasks->situation($idtask, $situation);

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

    $projectslate = Project::listAllLate();

    $projectsnotlate = Project::listAllNotLate();

    $page = new Page();

    $page->setTpl("status", [
        "projectslate" => $projectslate,
        "projectsnotlate" => $projectsnotlate
    ]);

});

?>
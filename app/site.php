<?php

require_once("functions.php");

use SCP\Model\Page;
use SCP\Model\Message;
use SCP\Model\Order;
use SCP\Model\Project;
use SCP\Model\Task;


//////////////////////////////////////////////////////
///                    PRINCIPAL                   ///
//////////////////////////////////////////////////////

$app->get("/sitescp", function () {

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

$app->get("/sitescp/order/:page/:sort", function ($page, $sort) {

    Order::getOrder($page, $sort);

    header("Location: /sitescp/$page");
    exit;

});

$app->get("/sitescp/about", function () {

    $page = new Page();
    $page->setTpl("about");

});

$app->get("/sitescp/45-98413-6611", function () {

    header("Location: /sitescp");
    exit;

});

$app->get("/sitescp/newsletter", function () {

    header("Location: /sitescp");
    exit;

});


//////////////////////////////////////////////////////
///                    PROJETOS                    ///
//////////////////////////////////////////////////////

$app->get("/sitescp/projects", function () {

    (!isset($_SESSION['SortProjectByField'])) ? $sort_field = $_SESSION['SortProjectByField'] = "idproject" : $sort_field = $_SESSION['SortProjectByField'];
    (!isset($_SESSION['SortProjectByOrder'])) ? $sort_order = $_SESSION['SortProjectByOrder'] = "ASC" : $sort_order = $_SESSION['SortProjectByOrder'];

    $sort = $sort_field . " " . $sort_order;

    $page = (isset($_GET['page'])) ? (int)$_GET['page'] : 1;

    $projects = new Project();

    $pagination = $projects->getProjectPage($sort, $page);

    $pages = [];

    for ($i = 1; $i <= $pagination['pages']; $i++) {
        array_push($pages, [
            'link' => '/sitescp/projects?page=' . $i,
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

$app->get("/sitescp/projects/create", function () {

    $page = new Page();
    $page->setTpl("projects-create");

});

$app->post("/sitescp/projects/create", function () {

    $project = new Project();
    $project->setData($_POST);
    $project->save();

    Message::setSuccess("Dados incluídos com sucesso!");

    header("Location: /sitescp/projects");
    exit;

});

$app->get("/sitescp/projects/:idproject/update", function ($idproject) {

    $project = new Project();
    $project->get((int)$idproject);
    $project->setdtstart(date_format(date_create($project->getdtstart()), 'Y-m-d'));
    $project->setdtfinish(date_format(date_create($project->getdtfinish()), 'Y-m-d'));

    $page = new Page();
    $page->setTpl("projects-update", [
        "project" => $project->getValues()
    ]);

});

$app->post("/sitescp/projects/:idproject/update", function ($idproject) {

    $project = new Project();
    $project->get((int)$idproject);

    $_POST['rtprojetc'] = $project->getrtproject();
    $_POST['stprojetc'] = $project->getstproject();

    $project->setData($_POST);
    $project->save();

    Project::updateRate($idproject);
    Project::updateLate($idproject);

    Message::setSuccess("Dados alterados com sucesso!");

    header("Location: /sitescp/projects");
    exit;

});

$app->get("/sitescp/projects/:idproject/details", function ($idproject) {

    $project = new Project();
    $project->get((int)$idproject);
    $project->setdtstart(date_format(date_create($project->getdtstart()), 'Y-m-d'));
    $project->setdtfinish(date_format(date_create($project->getdtfinish()), 'Y-m-d'));
    ($project->getstproject() == 0) ? $status = "Não" : $status = "Sim";

    $page = new Page();
    $page->setTpl("projects-details", [
        "project" => $project->getValues(),
        "status" => $status
    ]);

});

$app->get("/sitescp/projects/:idproject/delete", function ($idproject) {

    $checkTaks = Project::checkTask($idproject);
    if (count($checkTaks) > 0) {
        Message::setError("Existem tarefas vinculadas a esse projeto!");
        header("Location: /sitescp/projects");
        exit;
    }

    $project = new Project();
    $project->get((int)$idproject);
    $project->delete();

    Message::setSuccess("Dados excluídos com sucesso!");

    header("Location: /sitescp/projects");
    exit;

});


//////////////////////////////////////////////////////
///                    TAREFAS                     ///
//////////////////////////////////////////////////////

$app->get("/sitescp/tasks", function () {

    (!isset($_SESSION['SortTaskByField'])) ? $sort_field = $_SESSION['SortTaskByField'] = "idtask" : $sort_field = $_SESSION['SortTaskByField'];
    (!isset($_SESSION['SortTaskByOrder'])) ? $sort_order = $_SESSION['SortTaskByOrder'] = "ASC" : $sort_order = $_SESSION['SortTaskByOrder'];

    $sort = $sort_field . " " . $sort_order;

    $page = (isset($_GET['page'])) ? (int)$_GET['page'] : 1;

    $link = "/sitescp/?page=" . $page;

    $tasks = new Task();

    $pagination = $tasks->getTaskPage($sort, $page);

    $pages = [];

    for ($i = 1; $i <= $pagination['pages']; $i++) {
        array_push($pages, [
            'link' => '/sitescp/tasks?page=' . $i,
            'page' => $i
        ]);
    }

    $page = new Page();
    $page->setTpl("tasks", [
        "tasks" => $pagination['data'],
        "link" => $link,
        "error" => Message::getError(),
        "success" => Message::getSuccess(),
        "pages" => $pages
    ]);

});

$app->get("/sitescp/tasks/create", function () {

    $page = new Page();
    $page->setTpl("tasks-create", [
        "projects" => Project::listAll()
    ]);

});

$app->post("/sitescp/tasks/create", function () {

    $tasks = new Task();
    $tasks->setData($_POST);
    $tasks->save();

    Project::updateRate($_POST['idproject']);
    Project::updateLate($_POST['idproject']);

    Message::setSuccess("Dados incluídos com sucesso!");

    header("Location: /sitescp/tasks");
    exit;

});

$app->get("/sitescp/tasks/:idtask/update", function ($idtask) {

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

$app->post("/sitescp/tasks/:idtask/update", function ($idtask) {

    $tasks = new Task();
    $tasks->get((int)$idtask);
    $_POST['sttask'] = $tasks->getsttask();
    $tasks->setData($_POST);
    $tasks->save();

    Project::updateRate($tasks->getidproject());
    Project::updateLate($tasks->getidproject());

    Message::setSuccess("Dados alterados com sucesso!");

    header("Location: /sitescp/tasks");
    exit;

});

$app->get("/sitescp/tasks/:idtask/situation/:page", function ($idtask, $page) {

    $pagination = (isset($_GET['page'])) ? (int)$_GET['page'] : 1;

    $tasks = new Task();
    $tasks->get((int)$idtask);
    ($tasks->getsttask() == 0) ? $situation = 1 : $situation = 0;
    $tasks->situation($idtask, $situation);

    Project::updateRate($tasks->getidproject());

    Message::setSuccess("Dados alterados com sucesso!");

    ($page == "index") ? header("Location: /sitescp") : header("Location: /sitescp/tasks?page=$pagination");
    exit;

});

$app->get("/sitescp/tasks/:idtask/delete", function ($idtask) {

    $tasks = new Task();
    $tasks->get((int)$idtask);
    $tasks->delete();

    Message::setSuccess("Dados excluídos com sucesso!");

    header("Location: /sitescp/tasks");
    exit;

});


//////////////////////////////////////////////////////
///                    STATUS                      ///
//////////////////////////////////////////////////////

$app->get("/sitescp/status", function () {

    (!isset($_SESSION['SortLateByField'])) ? $sort_late_field = $_SESSION['SortLateByField'] = "idproject" : $sort_late_field = $_SESSION['SortLateByField'];
    (!isset($_SESSION['SortLateByOrder'])) ? $sort_late_order = $_SESSION['SortLateByOrder'] = "ASC" : $sort_late_order = $_SESSION['SortLateByOrder'];
    $SortLate = $sort_late_field . " " . $sort_late_order;
    $projectslate = Project::listAllLate($SortLate);

    (!isset($_SESSION['SortNotLateByField'])) ? $sort_notlate_field = $_SESSION['SortNotLateByField'] = "idproject" : $sort_notlate_field = $_SESSION['SortNotLateByField'];
    (!isset($_SESSION['SortNotLateByOrder'])) ? $sort_notlate_order = $_SESSION['SortNotLateByOrder'] = "ASC" : $sort_notlate_order = $_SESSION['SortNotLateByOrder'];
    $SortNotLate = $sort_notlate_field . " " . $sort_notlate_order;
    $projectsnotlate = Project::listAllNotLate($SortNotLate);

    $page = new Page();
    $page->setTpl("status", [
        "projectslate" => $projectslate,
        "projectsnotlate" => $projectsnotlate
    ]);

});

?>
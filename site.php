<?php

use Hallyz\Page;

/*
 * ##########################################################################################
 * Páginas do Site - INICIO
 */

$app->get("/niveis/urgente", function() {

    header("Location: /");

    exit;

});

$app->get("/niveis/atencao", function() {

    header("Location: /");

    exit;

});

$app->get("/niveis/normal", function() {

    header("Location: /");

    exit;

});

$app->get("/projetos/informacoes", function() {

    header("Location: /");

    exit;

});

$app->get("/niveis", function() {

    $page = new Page();

    $page->setTpl("index");

});

$app->get("/atividades", function() {

    $page = new Page();

    $page->setTpl("index");

});

$app->get("/projetos", function() {

    $page = new Page();

    $page->setTpl("index");

});

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
<?php

use ABA\Model\Project;

function formatDate($date)
{
    return date('d/m/Y', strtotime($date));
}

function qtdTask($idproject)
{

    return count(Project::checkTask($idproject));

}

function rateTask($idproject)
{

    return Project::rateTask($idproject);

}

?>